<?php
class ModelCatalogSuperProducts extends Model {
    public function getSuperProducts($data = array()) {
        $sql = "SELECT p.product_id, p.image, p.price, p.tax_class_id, p.date_added, p.super_date, pd.name FROM " . DB_PREFIX . "product p
                LEFT JOIN " . DB_PREFIX . "product_description pd ON (p.product_id = pd.product_id)
                WHERE p.super_product = '1' AND pd.language_id = '" . (int)$this->config->get('config_language_id') . "'";

        $sort_data = array(
            'sales'      => 'sales.total_sales',
            'date_added' => 'p.date_added',
            'name'       => 'pd.name',
            'price'      => 'p.price',
            'super_date' => 'p.super_date'
        );

        // join sales subquery for sales sorting
        if (isset($data['sort']) && $data['sort'] == 'sales') {
            $sql = "SELECT p.product_id, p.image, p.price, p.tax_class_id, p.date_added, p.super_date, pd.name, IFNULL(sales.total_sales,0) as total_sales
                    FROM " . DB_PREFIX . "product p
                    LEFT JOIN " . DB_PREFIX . "product_description pd ON (p.product_id = pd.product_id)
                    LEFT JOIN (
                        SELECT op.product_id, SUM(op.quantity) as total_sales
                        FROM " . DB_PREFIX . "order_product op
                        LEFT JOIN " . DB_PREFIX . "order o ON (op.order_id = o.order_id)
                        WHERE o.order_status_id > '0'
                        GROUP BY op.product_id
                    ) sales ON (p.product_id = sales.product_id)
                    WHERE p.super_product = '1' AND pd.language_id = '" . (int)$this->config->get('config_language_id') . "'";
        }

        if (isset($data['sort']) && array_key_exists($data['sort'], $sort_data)) {
            $sql .= " ORDER BY " . $sort_data[$data['sort']];
        } else {
            $sql .= " ORDER BY pd.name";
        }

        $sql .= (isset($data['order']) && ($data['order'] == 'DESC')) ? " DESC" : " ASC";

        if (isset($data['start']) || isset($data['limit'])) {
            $start = (int)($data['start'] ?? 0);
            $limit = (int)($data['limit'] ?? 20);

            if ($start < 0) $start = 0;
            if ($limit < 1) $limit = 20;

            $sql .= " LIMIT " . $start . "," . $limit;
        }

        $query = $this->db->query($sql);

        return $query->rows;
    }
}

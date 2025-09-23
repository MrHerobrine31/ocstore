<?php
class ControllerExtensionModuleSuperProducts extends Controller {
    public function index($setting) {
        $this->load->language('extension/module/super_products');

        $limit = isset($setting['module_super_products_limit']) ? (int)$setting['module_super_products_limit'] : 8;
        $sort  = isset($setting['module_super_products_sort']) ? $setting['module_super_products_sort'] : 'date_added';
        $order = isset($setting['module_super_products_order']) ? $setting['module_super_products_order'] : 'DESC';


        $this->load->model('catalog/super_products');
        $this->load->model('tool/image');

        $filter_data = array(
            'filter_super' => 1,
            'sort'         => $sort,
            'order'        => $order,
            'start'        => 0,
            'limit'        => $limit
        );

        $results = $this->model_catalog_super_products->getSuperProducts($filter_data);

        if ($results) {
            $data['products'] = array();

            foreach ($results as $result) {
                if ($result['image']) {
                    $image = $this->model_tool_image->resize($result['image'], $setting['width'] ?? 200, $setting['height'] ?? 200);
                } else {
                    $image = $this->model_tool_image->resize('placeholder.png', $setting['width'] ?? 200, $setting['height'] ?? 200);
                }

                if ($this->customer->isLogged() || !$this->config->get('config_customer_price')) {
                    $price = $this->currency->format($this->tax->calculate($result['price'], $result['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']);
                } else {
                    $price = false;
                }

                $data['products'][] = array(
                    'product_id' => $result['product_id'],
                    'thumb'      => $image,
                    'name'       => $result['name'],
                    'price'      => $price,
                    'href'       => $this->url->link('product/product', 'product_id=' . $result['product_id'])
                );
            }

            return $this->load->view('extension/module/super_products', $data);
        }
    }
}

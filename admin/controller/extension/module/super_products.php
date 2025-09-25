<?php
class ControllerExtensionModuleSuperProducts extends Controller {
    private $error = array();

    public function index() {
        $this->load->language('extension/module/super_products');
        $this->document->setTitle($this->language->get('heading_title'));
        $this->load->model('setting/module');

        if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
            if (!isset($this->request->get['module_id'])) {
                $this->model_setting_module->addModule('super_products', $this->request->post);
            } else {
                $this->model_setting_module->editModule($this->request->get['module_id'], $this->request->post);
            }

            if (!isset($this->request->get['module_id'])) {
                // створення нового модуля
                $this->model_setting_module->addModule('super_products', $this->request->post);
            } else {
                // редагування існуючого
                $this->model_setting_module->editModule($this->request->get['module_id'], $this->request->post);
            }

            $this->session->data['success'] = $this->language->get('text_success');

            $this->response->redirect(
                $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=module', true)
            );
        }

        if (isset($this->request->get['module_id']) && ($this->request->server['REQUEST_METHOD'] != 'POST')) {
            $module_info = $this->model_setting_module->getModule($this->request->get['module_id']);
        } else {
            $module_info = array();
        }

        $data['action'] = !isset($this->request->get['module_id'])
            ? $this->url->link('extension/module/super_products', 'user_token=' . $this->session->data['user_token'], true)
            : $this->url->link('extension/module/super_products', 'user_token=' . $this->session->data['user_token'] . '&module_id=' . $this->request->get['module_id'], true);

        $data['cancel'] = $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=module', true);

        // ----------- НАЗВА МОДУЛЯ -----------
        if (isset($this->request->post['name'])) {
            $data['name'] = $this->request->post['name'];
        } elseif (!empty($module_info)) {
            $data['name'] = $module_info['name'];
        } else {
            $data['name'] = '';
        }

        // ----------- ІНШІ ПАРАМЕТРИ ----------- 
$data['module_super_products_limit'] = $this->request->post['module_super_products_limit']
    ?? ($module_info['module_super_products_limit'] ?? 8);

$data['module_super_products_sort'] = $this->request->post['module_super_products_sort']
    ?? ($module_info['module_super_products_sort'] ?? 'date_added');

$data['module_super_products_order'] = $this->request->post['module_super_products_order']
    ?? ($module_info['module_super_products_order'] ?? 'DESC');

$data['module_super_products_status'] = $this->request->post['module_super_products_status']
    ?? ($module_info['status'] ?? 1);

        // ----------- ОПЦІЇ СОРТУВАННЯ -----------
        $data['sort_options'] = [
            'sales'      => $this->language->get('sort_sales'),
            'date_added' => $this->language->get('sort_date_added'),
            'name'       => $this->language->get('sort_name'),
            'price'      => $this->language->get('sort_price'),
            'super_date' => $this->language->get('sort_super_date')
        ];

        // ----------- ШАБЛОНИ -----------
        $data['header'] = $this->load->controller('common/header');
        $data['column_left'] = $this->load->controller('common/column_left');
        $data['footer'] = $this->load->controller('common/footer');

        $this->response->setOutput($this->load->view('extension/module/super_products', $data));
    }

    protected function validate() {
        if (!$this->user->hasPermission('modify', 'extension/module/super_products')) {
            $this->error['warning'] = $this->language->get('error_permission');
        }

        if (!$this->request->post['name'] || (utf8_strlen($this->request->post['name']) < 3) || (utf8_strlen($this->request->post['name']) > 64)) {
            $this->error['name'] = $this->language->get('error_name');
        }

        return !$this->error;
    }
}

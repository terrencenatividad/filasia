<?php
class controller extends wc_controller {

	public function __construct() {
		parent::__construct();

		$this->ui				= new ui();
		$this->input			= new input();
		$this->products			= new products_model();
		$this->session			= new session();
		$this->show_input		= true;
		$this->fields 			= array(
			'id',
			'image_1',
			'image_2',
			'image_3',
			'name',
			'description',
			'price'
			);

		$this->view->header_active = 'product/';
	}

	public function listing() {
		$this->view->title = 'Product List';
		$data['ui'] = $this->ui;
		$all = (object) array('ind' => 'null', 'val' => 'Filter: All');
		$this->view->load('product/product_list', $data);
	}

	public function create() {
		$this->view->title = 'Product Create';
		$data = $this->input->post($this->fields);
		$data['ui'] = $this->ui;
		$data['ajax_task'] = 'ajax_create';
		$data['ajax_post'] = '';
		$data['show_input'] = true;
		$this->view->load('product/product', $data);
	}

	public function edit($id) {
		$this->view->title = 'Product Edit';
		$data = (array) $this->products->getProductById($this->fields, $id);
		$data['ui'] = $this->ui;
		$data['ajax_task'] = 'ajax_edit';
		$data['ajax_post'] = "$id";
		$data['show_input'] = true;
		$this->view->load('product/product', $data);
	}

	public function view($id) {
		$this->view->title = 'Product View';
		$data = (array) $this->products->getProductById($this->fields, $id);
		$data['ui'] = $this->ui;
		$data['show_input'] = false;
		$this->view->load('product/product', $data);
	}

	public function ajax($task) {
		$ajax = $this->{$task}();
		if ($ajax) {
			header('Content-type: application/json');
			echo json_encode($ajax);
		}
	}

	private function ajax_create() {

		$image_uploader = new image_uploader();
		$filename1 = $image_uploader->setSize(array('large', 'thumb'))
		->setFolderName('../uploads/items')
		->getImage('item_image1');

		$filename2 = $image_uploader->setSize(array('large', 'thumb'))
		->setFolderName('../uploads/items')
		->getImage('item_image2');

		$filename3 = $image_uploader->setSize(array('large', 'thumb'))
		->setFolderName('../uploads/items')
		->getImage('item_image3');

		$data = $this->input->post($this->fields);
		$data['image_1'] = $filename1;
		$data['image_2'] = $filename2;
		$data['image_3'] = $filename3;
		
		$result = $this->products->saveProduct($data);
		return array(
			'redirect'	=> MODULE_URL,
			'success'	=> $result
			);
	}

	private function ajax_edit() {

		$image_uploader = new image_uploader();
		$filename1 = $image_uploader->setSize(array('large', 'thumb'))
		->setFolderName('../uploads/items')
		->getImage('item_image1');

		$filename2 = $image_uploader->setSize(array('large', 'thumb'))
		->setFolderName('../uploads/items')
		->getImage('item_image2');

		$filename3 = $image_uploader->setSize(array('large', 'thumb'))
		->setFolderName('../uploads/items')
		->getImage('item_image3');

		$data = $this->input->post($this->fields);
		$data['image_1'] = $filename1;
		$data['image_2'] = $filename2;
		$data['image_3'] = $filename3;

		$id = $this->input->post('id');
		$result = $this->products->updateProducts($data, $id);
		return array(
			'redirect'	=> MODULE_URL,
			'success'	=> $result
			);
	}

	private function ajax_delete() {
		$delete_id = $this->input->post('delete_id');
		$error_id = array();
		if ($delete_id) {
			$error_id = $this->products->deleteProduct($delete_id);
		}
		return array(
			'success'	=> (empty($error_id)),
			'error_id'	=> $error_id
			);
	}

	private function ajax_list() {
		$data	= $this->input->post(array('search', 'sort'));
		$search	= $data['search'];
		$sort	= $data['sort'];

		$pagination = $this->products->getProducts($this->fields, $sort , $search);
		$table = '';
		if (empty($pagination->result)) {
			$table = '<tr><td colspan="9" class="text-center"><b>No Records Found</b></td></tr>';
		}
		foreach ($pagination->result as $key => $row) {
			$table .= '<tr>';
			$dropdown = $this->ui->loadElement('check_task')
			->addView()
			->addEdit()
			->addPrint()
			->addDelete()
			->addCheckbox()
			->setValue($row->id)
			->draw();
			$table .= '<td align = "center">' . $dropdown . '</td>';
			$table .= '<td>
			<img style = "width: 80px;
			height: 80px;
			border-radius: 20px;" src="' . str_replace('/apanel', '', BASE_URL) . "uploads/items/thumb/".$row->image_1.'"></td>';
			$table .= '<td>
			<img style = "width: 80px;
			height: 80px;
			border-radius: 20px;" src="' . str_replace('/apanel', '', BASE_URL) . "uploads/items/thumb/".$row->image_2.'"></td>';
			$table .= '<td>
			<img style = "width: 80px;
			height: 80px;
			border-radius: 20px;" src="' . str_replace('/apanel', '', BASE_URL) . "uploads/items/thumb/".$row->image_3.'"></td>';
			$table .= '<td>' . $row->name . '</td>';
			$table .= '<td>' . $row->description . '</td>';
			$table .= '<td>' . number_format($row->price, 2) . '</td>';
			$table .= '</tr>';
		}
		
		$pagination->table = $table;
		return $pagination;
	}
}

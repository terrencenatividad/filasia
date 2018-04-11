<?php
class controller extends wc_controller {

	public function __construct() {
		parent::__construct();

		$this->ui				= new ui();
		$this->input			= new input();
		$this->banner			= new banner_model();
		$this->session			= new session();
		$this->show_input		= true;
		$this->fields 			= array(
			'id',
			'image',
			'title',
			'content'
			);
		$this->view->header_active = 'banner/';
	}

	public function listing() {
		$this->view->title = 'Banner List';
		$data['ui'] = $this->ui;
		$all = (object) array('ind' => 'null', 'val' => 'Filter: All');
		$this->view->load('banner/banner_list', $data);
	}

	public function create() {
		$this->view->title = 'Banner Create';
		$data = $this->input->post($this->fields);
		$data['ui'] = $this->ui;
		$data['ajax_task'] = 'ajax_create';
		$data['ajax_post'] = '';
		$data['show_input'] = true;
		$this->view->load('banner/banner', $data);
	}

	public function edit($id) {
		$this->view->title = 'Banner Edit';
		$data = (array) $this->banner->getBannerById($this->fields, $id);
		$data['ui'] = $this->ui;
		$data['ajax_task'] = 'ajax_edit';
		$data['ajax_post'] = "$id";
		$data['show_input'] = true;
		$this->view->load('banner/banner', $data);
	}

	public function view($id) {
		$this->view->title = 'Banner View';
		$data = (array) $this->banner->getBannerById($this->fields, $id);
		$data['ui'] = $this->ui;
		$data['show_input'] = false;
		$this->view->load('banner/banner', $data);
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
		$filename = $image_uploader->setSize(array('large', 'thumb'))
		->setFolderName('../uploads/items')
		->getImage('item_image');

		$data = $this->input->post($this->fields);
		$data['image'] = $filename;
		$result = $this->banner->saveBanner($data);
		return array(
			'redirect'	=> MODULE_URL,
			'success'	=> $result
			);
	}

	private function ajax_edit() {

		$image_uploader = new image_uploader();
		$filename = $image_uploader->setSize(array('large', 'thumb'))
		->setFolderName('../uploads/items')
		->getImage('item_image');

		$data = $this->input->post($this->fields);
		$data['image'] = $filename;

		$id = $this->input->post('id');
		$result = $this->banner->updateBanner($data, $id);
		return array(
			'redirect'	=> MODULE_URL,
			'success'	=> $result
			);
	}

	private function ajax_delete() {
		$delete_id = $this->input->post('delete_id');
		$error_id = array();
		if ($delete_id) {
			$error_id = $this->banner->deleteBanner($delete_id);
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

		$pagination = $this->banner->getBanner($this->fields, $sort, $search);
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
			<img src="' . str_replace('/apanel', '', BASE_URL) . "uploads/items/thumb/".$row->image.'"></td>';
			$table .= '<td>' . $row->title . '</td>';
			$table .= '<td>' . $row->content . '</td>';
			$table .= '</tr>';
		}
		
		$pagination->table = $table;
		return $pagination;
	}
}

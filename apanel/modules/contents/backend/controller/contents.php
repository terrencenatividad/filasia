<?php
class controller extends wc_controller {

	public function __construct() {
		parent::__construct();

		$this->ui				= new ui();
		$this->input			= new input();
		$this->contents			= new contents_model();
		$this->session			= new session();
		$this->show_input		= true;
		$this->fields 			= array(
			'id', 
			'mission_content' , 
			'vision_content' , 
			'commitment_content' , 
			'tech_content'
			);

		$this->view->header_active = 'contents/';
	}

	public function listing() {
		$this->view->title = 'Contents List';
		$data['ui'] = $this->ui;
		$all = (object) array('ind' => 'null', 'val' => 'Filter: All');
		$this->view->load('contents/contents_list', $data);
	}

	public function edit($id) {
		$this->view->title = 'Contents Edit';
		$data = (array) $this->contents->getContentsById($this->fields, $id);
		$data['ui'] = $this->ui;
		$data['ajax_task'] = 'ajax_edit';
		$data['ajax_post'] = "&id=$id";
		$data['show_input'] = true;
		$this->view->load('contents/contents', $data);
	}

	public function view($id) {
		$this->view->title = 'Contents View';
		$data = (array) $this->contents->getContentsById($this->fields, $id);
		$data['ui'] = $this->ui;
		$data['show_input'] = false;
		$this->view->load('contents/contents', $data);
	}

	public function ajax($task) {
		$ajax = $this->{$task}();
		if ($ajax) {
			header('Content-type: application/json');
			echo json_encode($ajax);
		}
	}

	private function ajax_edit() {
		$data = $this->input->post($this->fields);
		$id = $this->input->post('id');
		$result = $this->contents->updateContents($data, $id);
		return array(
			'redirect'	=> MODULE_URL,
			'success'	=> $result
			);
	}

	private function ajax_list() {
		$data	= $this->input->post(array('sort'));
		$sort	= $data['sort'];

		$pagination = $this->contents->getContents($this->fields, $sort);
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
			->setValue($row->id)
			->draw();
			$table .= '<td align = "center">' . $dropdown . '</td>';
			$table .= '<td>' . $row->mission_content . '</td>';
			$table .= '<td>' . $row->vision_content . '</td>';
			$table .= '<td>' . $row->commitment_content . '</td>';
			$table .= '<td>' . $row->tech_content . '</td>';

			$table .= '</tr>';
		}
		$pagination->table = $table;
		return $pagination;
	}
}

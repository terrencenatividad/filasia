<?php
class controller extends wc_controller {

	public function __construct() {
		parent::__construct();

		$this->ui				= new ui();
		$this->input			= new input();
		$this->contact			= new contact_model();
		$this->session			= new session();
		$this->show_input		= true;
		$this->fields 			= array(
			'id',
			'name',
			'email',
			'number',
			'subject',
			'message'
			);
		$this->view->header_active = 'contact/';
	}

	public function listing() {
		$this->view->title = 'Contacts';
		$data['ui'] = $this->ui;
		$all = (object) array('ind' => 'null', 'val' => 'Filter: All');
		$this->view->load('contact/contact_list', $data);
	}

	public function view($id) {
		$this->view->title = 'Contact View';
		$data = (array) $this->contact->getContactById($this->fields, $id);
		$data['ui'] = $this->ui;
		$data['show_input'] = false;
		$this->view->load('contact/contact', $data);
	}

	public function ajax($task) {
		$ajax = $this->{$task}();
		if ($ajax) {
			header('Content-type: application/json');
			echo json_encode($ajax);
		}
	}

	private function ajax_delete() {
		$delete_id = $this->input->post('delete_id');
		$error_id = array();
		if ($delete_id) {
			$error_id = $this->contact->deleteContact($delete_id);
		}
		return array(
			'success'	=> (empty($error_id)),
			'error_id'	=> $error_id
			);
	}

	private function ajax_list() {
		$data	= $this->input->post(array('sort'));
		$sort	= $data['sort'];

		$pagination = $this->contact->getContacts($this->fields, $sort);
		$table = '';
		if (empty($pagination->result)) {
			$table = '<tr><td colspan="9" class="text-center"><b>No Records Found</b></td></tr>';
		}
		foreach ($pagination->result as $key => $row) {
			$table .= '<tr>';
			$dropdown = $this->ui->loadElement('check_task')
			->addView()
			->addDelete()
			->addCheckbox()
			->setValue($row->id)
			->draw();
			$table .= '<td align = "center">' . $dropdown . '</td>';
			$table .= '<td>' . $row->name . '</td>';
			$table .= '<td>' . $row->email . '</td>';
			$table .= '<td>' . $row->number . '</td>';
			$table .= '<td>' . $row->subject . '</td>';
			$table .= '<td>' . $row->message . '</td>';
			$table .= '</tr>';
		}
		
		$pagination->table = $table;
		return $pagination;
	}
}

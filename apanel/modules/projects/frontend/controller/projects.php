<?php
class controller extends wc_controller {

	public function __construct() {
		parent::__construct();
		$this->projects			= new projects_model();
		$this->session		= new session();
		
		$this->fields = array(
			'id',
			'image',
			'title',
			'content'	
			);
	}

	public function view($id) {
		$this->view->title = 'View Project';
		$data['projects'] = $this->projects->getProjectsFront();
		$data['projects_list'] = $this->projects->getProjectsByIdFront($this->fields, $id);
		$this->view->load('project_list', $data);
	}
}
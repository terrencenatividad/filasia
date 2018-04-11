<?php
class controller extends wc_controller {

	public function __construct() {
		parent::__construct();
		$this->highlights   = new highlights_model();
		$this->session		= new session();
		
		$this->fields = array(
			'id',
			'image',
			'title',
			'content'
			);
	}

	public function view($id) {
		$this->view->title = 'View Highlights';
		$data['highlights'] = $this->highlights->getHighlightsFront();
		$data['highlights_list'] = $this->highlights->getHighlightsByIdFront($this->fields, $id);
		$this->view->load('highlights_list', $data);
	}
}
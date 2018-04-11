<?php
class controller extends wc_controller {

	public function __construct() {
		parent::__construct();
		$this->home			= new home_model();
		$this->session		= new session();

		$this->fields 			= array(
			'id',
			'image_1',
			'name',
			'description',
			'price'
			);
	}

	public function index() {
		$this->view->title = 'Home';
		$data = (array) $this->home->getContents();
		$data['banner'] = $this->home->getBanner();
		$data['products'] = $this->home->getProducts();
		$data['highlights'] = $this->home->getHighlights();
		$data['projects'] = $this->home->getProjects();
		$this->view->load('home', $data);
	}
}
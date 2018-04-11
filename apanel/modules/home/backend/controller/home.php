<?php
class controller extends wc_controller {

	public function __construct() {
		parent::__construct();
		$this->home			= new home_model();
		$this->session		= new session();

		$this->fields 			= array(
			'id',
			'image',
			'name',
			'description',
			'price'
			);
	}

	public function index() {
		$this->view->title	= 'Dashboard';
		$data['timecontact'] = $this->home->getContactTime();
		$data['productcontact'] = $this->home->getProductTime();
		$data['highlightcontact'] = $this->home->getHighlightTime();
		$data['projectcontact'] = $this->home->getProjectTime();
		$data['contacts'] = $this->home->getContacts();
		$data['products'] = $this->home->getProducts();
		$data['highlights'] = $this->home->getHighlights();
		$data['projects'] = $this->home->getProjects();
		$this->view->load('home' , $data);
	}
}
<?php
class controller extends wc_controller {
	
	public function __construct() {
		parent::__construct();
		$this->url				= new url();
		$this->ui				= new ui();
		$this->input			= new input();
		$this->product			= new products_model();
		$this->session			= new session();
		
		$this->prod = array(
			'id',
			'image_1',
			'image_2',
			'image_3',
			'name',
			'description',
			'price'
			);

		$this->proj = array(
			'id',
			'title',
			'image'
			);
	}

	public function view($id) {
		$this->view->title = 'View Product';
		$data['products'] = $this->product->getProductsFront();
		$data['products_list'] = $this->product->getProductByIdFront($this->prod, $id);
		$this->view->load('product_list', $data);
	}

	public function image($image) {
		$this->view->title = 'View Product';
		$data['product_view'] = $this->product->getProductImage($this->prod, $image);
		$this->view->load('product_list', $data);
	}

	public function search($search) {
		$this->view->title = 'Search product';
		$data['search_product'] = $this->product->getSearchProduct($this->prod, $search);
		$data['search_highlight'] = $this->product->getSearchHighlight($this->proj, $search);
		$data['search_project'] = $this->product->getSearchProject($this->proj, $search);
		$this->view->load('search', $data);
	}
}
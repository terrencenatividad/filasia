<?php
class home_model extends wc_model {

	public function __construct() {
		parent::__construct();
		$this->log = new log();
	}

	public function getContents() {
		
		return $result = $this->db->setTable("contents")
		->setFields('id, companycode, mission_content, vision_content, commitment_content, tech_content')
		->runSelect()
		->getRow(); //one-row
	}

	public function getBanner() {
		
		return $result = $this->db->setTable("banner")
		->setFields('id, image, title , content')
		->runSelect()
		->getResult(); //lists
	}

	public function getProducts() {
		
		return $result = $this->db->setTable("products")
		->setFields('id, image_1, name, description, price')
		->runSelect()
		->getResult(); //lists
	}

	public function getProjects() {
		$result = $this->db->setTable("projects_and_clients")
		->setFields('id , image, title , content')
		->runSelect()
		->getResult();//lists

		return $result;
	}

	public function getHighlights() {
		$result = $this->db->setTable("highlights")
		->setFields('id , image, title , content')
		->runSelect()
		->getResult();

		return $result;
	}

	public function getContacts() {
		$result = $this->db->setTable("contact")
		->setFields('id , email, number , subject, message')
		->runSelect()
		->getResult();//lists

		return $result;
	}

	public function getContactTime() {
		$result = $this->db->setTable("contact")
		->setFields('id , entereddate')
		->setOrderBy('entereddate DESC')
		->setLimit(1)
		->runSelect()
		->getRow();

		return $result;
	}

	public function getProductTime() {
		$result = $this->db->setTable("products")
		->setFields('id , entereddate')
		->setOrderBy('entereddate DESC')
		->setLimit(1)
		->runSelect()
		->getRow();

		return $result;
	}

	public function getHighlightTime() {
		$result = $this->db->setTable("highlights")
		->setFields('id , entereddate')
		->setOrderBy('entereddate DESC')
		->setLimit(1)
		->runSelect()
		->getRow();

		return $result;
	}

	public function getProjectTime() {
		$result = $this->db->setTable("projects_and_clients")
		->setFields('id , entereddate')
		->setOrderBy('entereddate DESC')
		->setLimit(1)
		->runSelect()
		->getRow();

		return $result;
	}
}
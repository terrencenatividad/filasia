<?php
class contact_model extends wc_model {

	public function __construct() {
		parent::__construct();
		$this->log = new log();
	}

	public function saveContact($data) {
		$result = $this->db->setTable('contact')
		->setValues($data)
		->runInsert();
		
		if ($result) {
			$this->log->saveActivity("Created");
		}
		return $result;
	}

	public function getContacts($fields, $sort) {
		$sort		= ($sort) ? $sort : 'email';
		
		$result = $this->db->setTable("contact")
		->setFields($fields)
		->setOrderBy($sort)
		->runPagination(); //pagination

		return $result;
	}

	public function getContactById($fields, $id) {
		return $this->db->setTable('contact')
		->setFields($fields)
		->setWhere("id = '$id'")
		->runSelect()
		->getRow(); //backend 
		//getResult() frontend
	}

	public function getAddress() {
		return $this->db->setTable('address')
		->setFields('id, street, barangay, city, email, cel_no, tel_no, fax_no')
		->runSelect()
		->getRow(); //backend 
	}

	public function deleteContact($data) {
		$error_id = array();
		foreach ($data as $id) {
			$result =  $this->db->setTable('contact')
			->setWhere("id = '$id'")
			->setLimit(1)
			->runDelete();

			if ($result) {
				$this->log->saveActivity("Delete Contact [$id]");
			} else {
				if ($this->db->getError() == 'locked') {
					$error_id[] = $id;
				}
			}
		}
		return $error_id;
	}
}
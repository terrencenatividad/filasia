<?php
class contents_model extends wc_model {

	public function __construct() {
		parent::__construct();
		$this->log = new log();
	}

	public function getContents($fields, $sort) {
		$sort		= ($sort) ? $sort : 'updatedate';
		
		$result = $this->db->setTable("contents")
		->setFields($fields)
		->setOrderBy($sort)
		->runPagination();

		return $result;
	}

	public function getContentsById($fields, $id) {
		return $this->db->setTable('contents')
		->setFields($fields)
		->setWhere("id = '$id' ")
		->runSelect()
		->getRow();
	}

	public function updateContents($data, $id) {

		$result = $this->db->setTable('contents')
		->setValues($data)
		->setWhere("id = '$id'")
		->setLimit(1)
		->runUpdate();

		if ($result) {
			$this->log->saveActivity("Update News [$id]");
		}

		return $result;
	}
}
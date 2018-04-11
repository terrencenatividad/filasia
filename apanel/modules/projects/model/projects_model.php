<?php
class projects_model extends wc_model {

	public function __construct() {
		parent::__construct();
		$this->log = new log();
	}

	public function saveProjects($data) {
		$result = $this->db->setTable('projects_and_clients')
		->setValues($data)
		->runInsert();
		
		if ($result) {
			$this->log->saveActivity("Created Projects");
		}
		return $result;
	}

	public function updateProjects($data, $id) {

		$result = $this->db->setTable('projects_and_clients')
		->setValues($data)
		->setWhere("id = '$id'")
		->setLimit(1)
		->runUpdate();

		if ($result) {
			$this->log->saveActivity("Update Projects [$id]");
		}

		return $result;
	}

	public function getProjectsById($fields, $id) {
		return $this->db->setTable('projects_and_clients')
		->setFields($fields)
		->setWhere("id = '$id'")
		->setLimit(1)
		->runSelect()
		->getRow(); //onerow
	}

	public function getProjectsByIdFront($fields, $id) {
		return $this->db->setTable('projects_and_clients')
		->setFields($fields)
		->setWhere("id = '$id'")
		->setLimit(1)
		->runSelect()
		->getResult(); //lists
	}

	public function deleteProjects($data) {
		$error_id = array();
		foreach ($data as $id) {
			$result =  $this->db->setTable('projects_and_clients')
			->setWhere("id = '$id'")
			->setLimit(1)
			->runDelete();

			if ($result) {
				$this->log->saveActivity("Delete Products [$id]");
			} else {
				if ($this->db->getError() == 'locked') {
					$error_id[] = $id;
				}
			}
		}
		return $error_id;
	}

	public function getProjectsFront() {
		
		return $result = $this->db->setTable("projects_and_clients")
		->setFields('id, image, title, content')
		->runSelect()
		->getResult(); //lists
	}

	public function getProjects($fields, $sort, $search) {
		$sort		= ($sort) ? $sort : 'image';

		$condition = '';
		if ($search) {
			$condition .= $this->generateSearch($search, array('title' , 'content'));
		}
		$result = $this->db->setTable("projects_and_clients")
		->setFields($fields)
		->setWhere($condition)
		->setOrderBy($sort)
		->runPagination(); //pagination

		return $result;
	}

	private function generateSearch($search, $array) {
		$temp = array();
		foreach ($array as $arr) {
			$temp[] = $arr . " LIKE '%" . str_replace(' ', '%', $search) . "%'";
		}
		return '(' . implode(' OR ', $temp) . ')';
	}
}
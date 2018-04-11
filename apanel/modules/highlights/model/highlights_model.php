<?php
class highlights_model extends wc_model {

	public function __construct() {
		parent::__construct();
		$this->log = new log();
	}

	public function saveHighlights($data) {
		$result = $this->db->setTable('highlights')
		->setValues($data)
		->runInsert();
		
		if ($result) {
			$this->log->saveActivity("Created Highlights");
		}
		return $result;
	}

	public function updateHighlights($data, $id) {

		$result = $this->db->setTable('highlights')
		->setValues($data)
		->setWhere("id = '$id'")
		->setLimit(1)
		->runUpdate();

		if ($result) {
			$this->log->saveActivity("Update Highlights [$id]");
		}

		return $result;
	}

	public function getHighlightsById($fields, $id) {
		return $this->db->setTable('highlights')
		->setFields($fields)
		->setWhere("id = '$id'")
		->setLimit(1)
		->runSelect()
		->getRow(); //onerow
	}

	public function getHighlightsByIdFront($fields, $id) {
		return $this->db->setTable('highlights')
		->setFields($fields)
		->setWhere("id = '$id'")
		->setLimit(1)
		->runSelect()
		->getResult(); //lists
	}

	public function deleteHighlights($data) {
		$error_id = array();
		foreach ($data as $id) {
			$result =  $this->db->setTable('highlights')
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

	public function getHighlightsFront() {
		
		return $result = $this->db->setTable("highlights")
		->setFields('id, image, title, content')
		->runSelect()
		->getResult(); //lists
	}

	public function getHighlights($fields, $sort, $search) {
		$sort		= ($sort) ? $sort : 'updatedate';
		$fields = array(
			'id',
			'image',
			'title',
			'content'
			);	
		$condition = '';
		if ($search) {
			$condition .= $this->generateSearch($search, array('title' , 'content'));
		}
		$result = $this->db->setTable("highlights")
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
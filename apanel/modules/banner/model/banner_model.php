<?php
class banner_model extends wc_model {

	public function __construct() {
		parent::__construct();
		$this->log = new log();
	}

	public function saveBanner($data) {
		$result = $this->db->setTable('banner')
		->setValues($data)
		->runInsert();
		
		if ($result) {
			$this->log->saveActivity("Created Highlights");
		}
		return $result;
	}

	public function updateBanner($data, $id) {

		$result = $this->db->setTable('banner')
		->setValues($data)
		->setWhere("id = '$id'")
		->setLimit(1)
		->runUpdate();

		if ($result) {
			$this->log->saveActivity("Update Highlights [$id]");
		}

		return $result;
	}

	public function getBannerById($fields, $id) {
		return $this->db->setTable('banner')
		->setFields($fields)
		->setWhere("id = '$id'")
		->setLimit(1)
		->runSelect()
		->getRow(); //onerow
	}

	public function getBannerByIdFront($fields, $id) {
		return $this->db->setTable('banner')
		->setFields($fields)
		->setWhere("id = '$id'")
		->setLimit(1)
		->runSelect()
		->getResult(); //lists
	}

	public function deleteBanner($data) {
		$error_id = array();
		foreach ($data as $id) {
			$result =  $this->db->setTable('banner')
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

	public function getBannerFront() {
		
		return $result = $this->db->setTable("banner")
		->setFields('id, image, title, content')
		->runSelect()
		->getResult(); //lists
	}

	public function getBanner($fields, $sort, $search) {
		$sort		= ($sort) ? $sort : 'id';
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
		$result = $this->db->setTable("banner")
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
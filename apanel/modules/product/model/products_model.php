<?php
class products_model extends wc_model {

	public function __construct() {
		parent::__construct();
		$this->log = new log();
	}

	public function saveProduct($data) {
		$result = $this->db->setTable('products')
		->setValues($data)
		->runInsert();
		
		if ($result) {
			$this->log->saveActivity("Created Products");
		}

		return $result;
	}

	public function updateProducts($data, $id) {

		$result = $this->db->setTable('products')
		->setValues($data)
		->setWhere("id = '$id'")
		->setLimit(1)
		->runUpdate();

		if ($result) {
			$this->log->saveActivity("Update Products [$id]");
		}

		return $result;
	}

	public function getProductById($fields, $id) {
		return $this->db->setTable('products')
		->setFields($fields)
		->setWhere("id = '$id'")
		->setLimit(1)
		->runSelect()
		->getRow(); //onerow
	}

	public function getSearchProduct($fields, $search) {
		$return = $this->db->setTable('products')
		->setFields($fields)
		->setWhere("name LIKE '%$search%' OR price LIKE '%$search%' ")
		->runSelect()
		->getResult(); //lists
		return $return;
	}

	public function getSearchHighlight($fields, $search) {
		$return = $this->db->setTable('highlights')
		->setFields($fields)
		->setWhere("title LIKE '%$search%' ")
		->runSelect()
		->getResult(); //lists
		return $return;
	}

	public function getSearchProject($fields, $search) {
		$return = $this->db->setTable('projects_and_clients')
		->setFields($fields)
		->setWhere("title LIKE '%$search%' ")
		->runSelect()
		->getResult(); //lists
		return $return;
	}

	public function getProductByIdFront($fields, $id) {
		return $this->db->setTable('products')
		->setFields($fields)
		->setWhere("id = '$id'")
		->setLimit(1)
		->runSelect()
		->getResult(); //lists
	}

	public function getProductImage($fields, $image) {
		return $this->db->setTable('products')
		->setFields($fields)
		->setWhere("image_1 = '$image' OR image_2 = '$image' OR image_3 = '$image' ")
		->setLimit(1)
		->runSelect()
		->getResult(); //lists
	}

	public function deleteProduct($data) {
		$error_id = array();
		foreach ($data as $id) {
			$result =  $this->db->setTable('products')
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

	public function getProductsFront() {
		
		return $result = $this->db->setTable("products")
		->setFields('id, image_1, image_2, image_3, name, description, price')
		->runSelect()
		->getResult(); //lists
	}

	public function getProducts($fields, $sort, $search) {
		$sort		= ($sort) ? $sort : 'updatedate';
		$fields = array(
			'id',
			'image_1',
			'image_2',
			'image_3',
			'name',
			'description',
			'price'
			);
		$condition = '';
		if ($search) {
			$condition .= $this->generateSearch($search, array('name' , 'description', 'price'));
		}
		$result = $this->db->setTable("products")
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
<?php
class controller extends wc_controller {

	public function __construct() {
		parent::__construct();
		$this->news			= new news_model();
		$this->session		= new session();
		$this->fields = array(
			'id',
			'title',
			'content',
			'entereddate'
			);	
	}

	public function listing() {
		$this->view->title = 'News';
		$data['news_list'] = (array) $this->news->getNewsList();
		$data = (array) $this->news->getAbout();
		$data['dropdown'] = $this->news->getDropdown();
		$this->view->load('news', $data);
	}

	public function view($id) {
		$this->view->title = 'News View';
		$data['news_id'] = $this->news->getNewsById($this->fields, $id);
		$this->view->load('news_list', $data);
	}

	public function viewcontent($id) {
		$this->view->title = 'About';
		$data['dropdown'] = $this->about->getDropdown();
		$data['dropdown_id'] = $this->about->getDropdownById($this->fields, $id);
		$data['submenu_id'] = $this->about->getSubmenuById($this->submenu, $id);
		$data['content'] = $this->about->getContentById($this->content, $id);
		$this->view->load('about_view', $data);
	}

	public function ajax($task) {
		header('Content-type: application/json');
		$result = $this->{$task}();
		echo json_encode($result);
	}

	private function ajax_get_list() {
		$pagination = $this->news->getNewsList();
		$table = '';
		if ($pagination->result_count) {
			foreach($pagination->result as $row) {
				$content = substr($row->content, 0, 70);
				$table .= '<div class="pstyle"><font size = "4">' . $row->title . '</font></div>';
				$table .= '<div class="pstyle">' . $row->content . ' ... 
				<a href="'.BASE_URL.'news/view/'.$row->id.'#news" style = "color:red!important; font-size:13px!important; text-decoration:none;">< Read More ></a></div>';
				$table .= '</div>';
				$table .= '<br/>';
			}
		} else {
			$table = '<div class="row"><div class="col-md-12">No Result Found</div></div>';
		}
		
		$pagination->table = $table;
		return $pagination;
	}
}
<?php
class controller extends wc_controller {

	public function __construct() {
		parent::__construct();
		$this->ui				= new ui();
		$this->input			= new input();
		$this->contact			= new contact_model();
		$this->session		= new session();
	}

	public function listing() {
		$this->view->title = 'Contact';
		$data['ui'] = $this->ui;
		$data['ajax_task'] = 'ajax_create';
		$data['ajax_post'] = '';
		$data['show_input'] = true;
		$data['address'] = $this->contact->getAddress();
		$this->view->load('contact', $data);
	}

	public function create() {
		$this->view->title = 'Submit';
		$data = $this->input->post($this->fields);
		$data['ajax_post'] = '';
		$this->view->load('contact', $data);
	}

	public function ajax($task) {
		$ajax = $this->{$task}();
		if ($ajax) {
			header('Content-type: application/json');
			echo json_encode($ajax);
		}
	}

	private function ajax_create() {
		$new = array('name', 'email', 'number', 'subject', 'message');
		$data = $this->input->post($new);

		$name = $this->input->post('name');
		$email = $this->input->post('email');
		$subject = $this->input->post('subject');
		$number = $this->input->post('number');
		$message = $this->input->post('message');

		$html = 'Good day' . $email . 
		'<br>Contact Number' . $number. 
		'<br>Subject ' . $subject .
		'<br>Message ' . $message;

		$mail = new PHPMailer();
		$mail->IsSendmail();
		try {  
			$mail->Sender = $email;        
			$mail->SetFrom($email,"FilAsia");
			$mail->AddReplyTo($email);
			$mail->AddBCC($email);
			$mail->AddAddress('natividadter@gmail.com');
			$mail->Subject = "Contact: FilAsia Contact Us";      
			$mail->AltBody = 'To view the message, please use an HTML compatible email viewer!';
			$mail->MsgHTML($html);
			$mail->Send();      
		} catch (phpmailerException $e) {
			$e->errorMessage();
			$json['email_sent'] = "Message Not Sent!";
		}
		$result = $this->contact->saveContact($data);
		return array(
			'redirect'	=> MODULE_URL,
			'success'	=> $result
			);
	}
}
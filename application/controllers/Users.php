<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends MY_Controller {

	
	public function dashboard()
	{
		$data = array();
		$this->load->model('queries');
		$college_id = $this->session->userdata('college_id');
		$data['students'] = $this->queries->getStudents($college_id);
		$this->load->view('users',$data);
	}
}

?>
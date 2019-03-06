<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller {

	
	public function dashboard()
	{
		$data = array();
		$this->load->model('queries');
		$data['users'] = $this->queries->viewAllColleges();
		$this->load->view('dashboard',$data);
	}

	public function addCollege()
	{
		$this->load->view('addCollege');
	}

	public function createCollege()
	{
		$this->form_validation->set_rules('collegename','College Name','required');
		$this->form_validation->set_rules('branch','Branch','required');

		$this->form_validation->set_error_delimiters('<div class="text-danger">','</div>');

		if ($this->form_validation->run()) {
			$data =$this->input->post();
			$this->load->model('queries');
			if ($this->queries->makeCollege($data)) {
				$this->session->set_flashdata('message','College Created Successfully');
			} else {
				$this->session->set_flashdata('message','Failed to Created College');
			}
			return redirect("admin/addCollege");
		} 
		else {
			$this->addCollege();
		}
	}

	public function addCoadmin()
	{
		$data = array();
		$this->load->model('queries');
		$data['roles'] = $this->queries->getRoles();
		$data['colleges'] = $this->queries->getColleges();

		$this->load->view('addCoadmin',$data);
	}

	public function createCoadmin()
	{
		$this->form_validation->set_rules('username','Username','required');
		$this->form_validation->set_rules('college_id','College Name','required');
		$this->form_validation->set_rules('email','Email','required|valid_email');
		$this->form_validation->set_rules('gender','Gender','required');
		$this->form_validation->set_rules('role_id','Role','required');
		$this->form_validation->set_rules('password','Password','required');
		$this->form_validation->set_rules('confpwd','Confirm Password','required');

		$this->form_validation->set_error_delimiters('<div class="text-danger">','</div>');
		if ($this->form_validation->run()) {
			$data = $this->input->post();
			$data['password'] = sha1($this->input->post('password'));
			$data['confpwd']  = sha1($this->input->post('confpwd'));
			$this->load->model('queries');
			if ($this->queries->registerCoadmin($data)) {
				$this->session->set_flashdata('message','CoAdmin Registered Successfully');
			} else {
				$this->session->set_flashdata('message','Failed to Register');
			}
			return redirect("admin/addCoadmin");
		} else {
			$this->addCoadmin();
		}
	}

	public function addStudent()
	{
		$data = array();
		$this->load->model('queries');
		$data['colleges'] = $this->queries->getColleges();
		$this->load->view('addStudent',$data);
	}
	
	public function createStudent()
	{
		$this->form_validation->set_rules('studentname','Student Name','required');
		$this->form_validation->set_rules('college_id','College Name','required');
		$this->form_validation->set_rules('email','Email','required|valid_email');
		$this->form_validation->set_rules('gender','Gender','required');
		$this->form_validation->set_rules('course','Course','required');

		$this->form_validation->set_error_delimiters('<div class="text-danger">','</div>');
		if ($this->form_validation->run()) {
			$data = $this->input->post();
			$this->load->model('queries');
			if ($this->queries->insertStudent($data)) {
				$this->session->set_flashdata('message','Student Added Successfully');
			} else {
				$this->session->set_flashdata('message','Failed to Add');
			}
			return redirect("admin/addStudent");
		} else {
			$this->addStudent();
		}
	}

	public function viewStudents($college_id)
	{
		$data = array();
		$this->load->model('queries');
		$data['students'] = $this->queries->getStudents($college_id);
		$this->load->view('viewStudents',$data);
	}

	public function editStudent($id)
	{
		$data = array();
		$this->load->model('queries');
		$data['studentData'] = $this->queries->getStudentRecord($id);
		$data['colleges'] = $this->queries->getColleges();
		$this->load->view('editStudent',$data);
	}

	public function modifyStudent($id)
	{
		$this->form_validation->set_rules('studentname','Student Name','required');
		$this->form_validation->set_rules('college_id','College Name','required');
		$this->form_validation->set_rules('email','Email','required|valid_email');
		$this->form_validation->set_rules('gender','Gender','required');
		$this->form_validation->set_rules('course','Course','required');

		$this->form_validation->set_error_delimiters('<div class="text-danger">','</div>');
		if ($this->form_validation->run()) {
			$data = $this->input->post();
			$this->load->model('queries');
			if ($this->queries->updateStudent($data,$id)) {
				$this->session->set_flashdata('message','Student Updated Successfully');
			} else {
				$this->session->set_flashdata('message','Failed to Update');
			}
			return redirect("admin/editStudent/{$id}");
		} else {
			$this->editStudent($id);
		}
	}

	public function deleteStudent($id)
	{
		$this->load->model('queries');
		if ($this->queries->removeStudent($id)) {
			return redirect("admin/dashboard");
		}
	}

	public function coadmins()
	{
		$data = array();
		$this->load->model('queries');
		$data['coAdmins'] = $this->queries->viewAllColleges();
		$this->load->view('viewCoadmins',$data);
	}

	public function __construct()
	{
		parent::__construct();
		if (! $this->session->userdata("user_id")) {
			return redirect("welcome/login");
		}
	}

	
}

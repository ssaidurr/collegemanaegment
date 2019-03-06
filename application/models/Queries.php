<?php

class Queries extends CI_Model
{
	
	public function getRoles()
	{
		$roles = $this->db->get('tbl_roles');
		if ($roles->num_rows() > 0) {
			return $roles->result();
		}
	}

	public function getColleges()
	{
		$colleges = $this->db->get('tbl_college');
		if ($colleges->num_rows() > 0) {
			return $colleges->result();
		}
	}

	public function registerAdmin($data)
	{
		return $this->db->insert('tbl_users',$data);
	}

	public function chkAdminExist()
	{
		$chkAdmin = $this->db->where(['role_id' => '1'])
							 ->get('tbl_users');
		if ($chkAdmin -> num_rows() > 0) {
			return $chkAdmin->num_rows();
		}
	}

	public function adminExist($email,$password)
	{
		$chkAdmin = $this->db->where(['email' => $email, 'password' => $password])
							 ->get('tbl_users');
		if ($chkAdmin->num_rows() > 0) {
			return $chkAdmin->row();
		}
	}

	public function makeCollege($data)
	{
		return $this->db->insert('tbl_college',$data);
	}
	
	public function registerCoadmin($data)
	{
		return $this->db->insert('tbl_users',$data);
	}

	public function viewAllColleges()
	{
		$this->db->select(['tbl_users.user_id','tbl_users.username','tbl_users.email','tbl_users.gender','tbl_college.college_id','tbl_college.collegename','tbl_college.branch','tbl_roles.rolename']);
		$this->db->from('tbl_college');
		$this->db->join('tbl_users','tbl_users.college_id = tbl_college.college_id');
		$this->db->join('tbl_roles','tbl_users.role_id = tbl_roles.role_id');
		$users = $this->db->get();
		return $users->result();
	}

	public function insertStudent($data)
	{
		return $this->db->insert('tbl_student',$data);
	}

	public function getStudents($college_id)
	{
		$this->db->select(['tbl_college.collegename','tbl_student.id','tbl_student.studentname','tbl_student.email','tbl_student.gender','tbl_student.course']);
		$this->db->from('tbl_student');
		$this->db->join('tbl_college','tbl_college.college_id = tbl_student.college_id');
		$this->db->where(['tbl_student.college_id' => $college_id]);
		$students = $this->db->get();
		return $students->result();
	}

	public function getStudentRecord($id)
	{
		$this->db->select(['tbl_college.college_id','tbl_college.collegename','tbl_student.id','tbl_student.studentname','tbl_student.email','tbl_student.gender','tbl_student.course']);
		$this->db->from('tbl_student');
		$this->db->join('tbl_college','tbl_college.college_id = tbl_student.college_id');
		$this->db->where(['tbl_student.id' => $id]);
		$student = $this->db->get();
		return $student->result();
	}

	public function updateStudent($data,$id)
	{
		return $this->db->where('id',$id)
		                ->update('tbl_student',$data);
	}

	public function removeStudent($id)
	{
		return $this->db->delete('tbl_student', ['id' => $id]);
	}
}
?>
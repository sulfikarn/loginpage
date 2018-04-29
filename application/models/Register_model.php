<?php
class Register_model extends CI_Model {

	function Register_model(){
		parent::__construct();
	}
	
	function save()
    {
		$data['name'] = $this->db->escape_str($this->input->post('name'));
		$data['mobile'] = $this->db->escape_str($this->input->post('mobile'));
		$data['email'] = $this->db->escape_str($this->input->post('email'));
		$data['password'] = base64_encode($this->input->post('password'));
		$this->db->insert('register', $data); 	
	} 
	
	function email_exists($email){
	
		$result_profile	=	$this->db->query("SELECT * FROM register WHERE email='$email'");
		$row_email = $result_profile->row();
		if(count($row_email)>0)
			return true;
		else	
			return false;
	}
	
	function get_user_details()
	{
		$id=$this->session->userdata('user_id');
		$this->db->select('*');
		$this->db->where("id", $id); 
		$result = $this->db->get('register');
		return $result->row();
	}

	function list_alluser()
    {
	
		$this->db->order_by("id", "desc");
	    $this->db->select('*');
	    $this->db->from('register');
		$result_rooms = $this->db->get();
		return $result_rooms->result();
    }

    function total_user()
    {
	
		$this->db->select('COUNT(id) AS total');
		$this->db->from('register');
		$result_total	=	$this->db->get();
		$row	= $result_total->row();	
		$count	=	$row->total;
		return $count;	
    }
	
	
}

?>

<?php if(!defined('BASEPATH')) exit('No direct script access is allowed');

class Authentication

{

     //Constructor method, we need the super CI object in order to use core libraries

     function Authentication()

     {
           $this->CI = &get_instance();

     }


	 function login($username, $password) {
        $result = FALSE;
        $username = $this->CI->db->escape_str($username);
        $password = $this->CI->db->escape_str($password);
        $sql = "SELECT * FROM register WHERE email = '" . $username . "' LIMIT 1";
        $query = $this->CI->db->query($sql);

        if ($query->num_rows() == 1) {
            $row = $query->row();
            if (base64_encode($password) == $row->password) {
                $result = TRUE;
                $sess_data = array('user_id' => $row->id, 'member_name' => $row->name, 'logged_in' => $result);
                $this->CI->session->set_userdata($sess_data);
            }
        }
        return $result;
    }

	  function user_logout()

     {

	 		$this->CI->session->unset_userdata('user_id');
     }

	 
}

?>


<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_login extends CI_model {

    public function ambil_login($username, $password)
    {
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $query = $this->db->get('tbl_admin');
        if ($query->num_rows()>0){
            foreach ($query->result() as $row){
                $sess = array ('id' => $row -> id,
                               'username' => $row -> username,
                               'password' => $row -> password
                );
            }
        $this->session->get_userdata($sess);
        // $this->_update_last_login($sess);
        $msg = [
            'sukses' => 'Hallo Admin'
        ];
        
        } else {

            $msg = [
                'error' => 'Invalid username or password!'
            ];
        }

        echo json_encode($msg);
    }

    // private function _update_last_login($id)
	// {
	// 	$data = [
	// 		'last_login' => date("YYYY-mm-dd HH:ii:ss"),
	// 	];

	// 	$this->db->query("UPDATE tbl_admin SET last_login = '$data' WHERE id = '$id'");
	// }

}
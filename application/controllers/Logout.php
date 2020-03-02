<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Logout extends MY_Controller
{

    public function index()
    {
        $session_data = [
            'id',
            'name',
            'email',
            'role',
            'is_login'
        ];
        $this->session->unset_userdata($session_data);
        $this->session->sess_destroy();
        redirect(base_url());
    }
}

/* End of file Logout.php */

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login_model extends MY_Model
{

    protected $table = 'user';

    public function getDefaultValues()
    {
        return [
            'email'     => '',
            'password'  => '',

        ];
    }

    public function getValidationRules()
    {
        $validationRules = [
            [
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'trim|required|valid_email'
            ],
            [
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'trim|required'
            ]
        ];
        return $validationRules;
    }

    public function run($input)
    {
        $query = $this->where('email', strtolower($input->email))->where('is_active', 1)->first();
        if (!empty($query) && hashDecrypt($input->password, $query->password)) {
            $session_data = [
                'id' => $query->id,
                'name' => $query->name,
                'email' => $query->email,
                'role' => $query->role,
                'is_login' => true,
                'image' => $query->image
            ];
            $this->session->set_userdata($session_data);
            return true;
        }
        return false;
    }
}

/* End of file Login_model.php */

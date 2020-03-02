<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Register_model extends MY_Model
{
    protected $table = 'user';

    public function getDefaultValues()
    {
        return [
            'name'      => '',
            'email'     => '',
            'password'  => '',
            'role'      => '',
            'is_active' => '',
            'image' => ''
        ];
    }
    public function getValidationRules()
    {
        $validationRules = [
            [
                'field' => 'name',
                'label' => 'Nama',
                'rules' => 'required|trim'
            ],
            [
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'required|trim|valid_email|is_unique[user.email]',
                'errors' => [
                    'is_unique' => 'This %s already exist!'
                ]
            ],
            [
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'required|trim|min_length[5]'
            ],
            [
                'field' => 'password_confirmation',
                'label' => 'Konfirmasi Password',
                'rules' => 'required|matches[password]'
            ]
        ];
        return $validationRules;
    }

    public function run($input)
    {
        $data = [
            'name' => $input->name,
            'email' => strtolower($input->email),
            'password' => hashEncrypt($input->password),
            'role' => 'member',
            'is_active' => 0,
            'image' => 'default.jpg'
        ];
        $this->create($data);

        return true;
    }
}

/* End of file Register_model.php */

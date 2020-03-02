<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Product_model extends MY_Model
{
    protected $perPage = 6;
    public function getDefaultValues()
    {
        return [
            'id_category' => '',
            'slug' => '',
            'title' => '',
            'description' => '',
            'price' => '',
            'is_available' => 1,
            'image' => '',
        ];
    }

    public function getValidationRules()
    {
        $validationRules = [
            [
                'field' => 'id_category',
                'rules' => 'required',
                'label' => 'Kategori'
            ],
            [
                'field' => 'slug',
                'rules' => 'required|trim|callback_unique_slug',
                'label' => 'Slug'
            ],
            [
                'field' => 'title',
                'rules' => 'required|trim',
                'label' => 'Nama Produk'
            ],
            [
                'field' => 'description',
                'rules' => 'required|trim',
                'label' => 'Deskripsi'
            ],
            [
                'field' => 'price',
                'rules' => 'required|trim|numeric',
                'label' => 'Harga'
            ],
            [
                'field' => 'is_available',
                'rules' => 'required',
                'label' => 'Ketersediaan'
            ],
        ];
        return $validationRules;
    }

    public function uploadImage($fieldName, $fileName)
    {
        $config = [
            'upload_path' => './images/product',
            'file_name' => $fileName,
            'allowed_types' => 'jpg|gif|jpeg|png',
            'max_size' => 2048,
            'max_width' => 0,
            'max_height' => 0,
            'overwrite' => true,
            'file_ext_tolower' => true
        ];

        $this->load->library('upload', $config);
        if ($this->upload->do_upload($fieldName)) {
            return $this->upload->data();
        } else {
            $this->session->set_flashdata('image_error', $this->upload->display_errors('', ''));
            return false;
        }
    }

    public function deleteImage($fileName)
    {
        if (file_exists("./images/product/$fileName")) {
            unlink("./images/product/$fileName");
        }
    }
}

/* End of file Product_model.php */

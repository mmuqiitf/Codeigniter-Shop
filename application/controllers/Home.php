<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Home_model', 'home');
    }


    public function index($page = null)
    {

        $data['title'] = 'Homepage';
        $data['content'] = $this->home->select(
            ['product.id', 'product.title AS product_title', 'product.image', 'product.price', 'product.slug', 'product.is_available', 'product.description', 'category.title AS category_title', 'category.slug AS category_slug']
        )->join('category')->where('product.is_available', 1)->orderBy('id', 'DESC')->paginate($page)->get();
        $data['total_rows'] = $this->home->where('product.is_available', 1)->count();
        $data['pagination'] = $this->home->makePagination(base_url('home'), 2, $data['total_rows']);
        $data['page'] = 'pages/home/index';
        $this->view($data);
    }
}

/* End of file Home.php */

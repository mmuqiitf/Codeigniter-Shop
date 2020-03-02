<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Shop extends MY_Controller
{
    public function index()
    {
        redirect(base_url());
    }

    public function sortprice($sort, $page = null)
    {
        $data['title'] = 'Belanja';
        $data['content'] =
            $this->shop->select(
                ['product.id', 'product.title AS product_title', 'product.image', 'product.price', 'product.slug', 'product.is_available', 'product.description', 'category.title AS category_title', 'category.slug AS category_slug']
            )
            ->join('category')
            ->where('product.is_available', 1)
            ->orderBy('product.price', $sort)
            ->paginate($page)->get();
        $data['total_rows'] = $this->shop->where('product.is_available', 1)->count();
        $data['pagination'] = $this->shop->makePagination(base_url('shop/sortprice/' . $sort), 4, $data['total_rows']);

        $data['page'] = 'pages/home/index';
        $this->view($data);
    }

    public function sortdate($sort, $page = null)
    {
        $data['title'] = 'Belanja';
        $data['content'] =
            $this->shop->select(
                ['product.id', 'product.title AS product_title', 'product.image', 'product.price', 'product.slug', 'product.is_available', 'product.description', 'category.title AS category_title', 'category.slug AS category_slug']
            )
            ->join('category')
            ->where('product.is_available', 1)
            ->orderBy('product.id', $sort)
            ->paginate($page)->get();
        $data['total_rows'] = $this->shop->where('product.is_available', 1)->count();
        $data['pagination'] = $this->shop->makePagination(base_url('shop/sortdate/' . $sort), 4, $data['total_rows']);

        $data['page'] = 'pages/home/index';
        $this->view($data);
    }

    public function category($category, $page = null)
    {
        $data['title'] = 'Belanja';
        $data['content'] =
            $this->shop->select(
                ['product.id', 'product.title AS product_title', 'product.image', 'product.price', 'product.slug', 'product.is_available', 'product.description', 'category.title AS category_title', 'category.slug AS category_slug']
            )
            ->join('category')
            ->where('product.is_available', 1)
            ->where('category.slug', $category)
            ->paginate($page)->get();
        $data['total_rows'] = $this->shop->where('product.is_available', 1)->where('category.slug', $category)->join('category')->count();
        $data['pagination'] = $this->shop->makePagination(base_url('shop/category/' . $category), 4, $data['total_rows']);
        $data['category'] = ucwords(str_replace('-', ' ', $category));
        $data['page'] = 'pages/home/index';
        $this->view($data);
    }

    public function search($page = null)
    {
        if (isset($_POST['keyword'])) {
            $this->session->set_userdata('keyword', $this->input->post('keyword'));
        } else {
            redirect(base_url('/'));
        }

        $keyword = $this->session->userdata('keyword');
        $data['title']   = 'Pencarian Produk';
        $data['content'] = $this->shop->select(
            ['product.id', 'product.title AS product_title', 'product.image', 'product.price', 'product.description', 'product.is_available', 'category.title AS category_title', 'category.slug AS category_slug']
        )->join('category')->like('product.title', $keyword)->orLike('category.title', $keyword)->paginate($page)->get();
        $data['total_rows'] = $this->shop->like('product.title', $keyword)->orLike('category.title', $keyword)->join('category')->count();
        $data['pagination'] = $this->shop->makePagination(base_url('shop/search'), 3, $data['total_rows']);
        $data['page'] = 'pages/home/index';
        $this->view($data);
    }
}

/* End of file Shop.php */

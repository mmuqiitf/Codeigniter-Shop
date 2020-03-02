<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Detail extends MY_Controller
{

    public function index($slug)
    {
        $data['content'] = $this->detail->where('slug', $slug)->first();
        $data['title'] = 'Detail ' . $data['content']->title;
        $data['page'] = 'pages/home/detail';
        $this->view($data);
    }
}

/* End of file Detail.php */

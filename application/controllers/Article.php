<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Article extends CI_Controller
{
    function index($page = 'IDTS Web.iD')
    {
        $data['title'] = $page;
        $data['article'] = $this->M_Article->get_article_public('article');

        $this->load->view('header', $data);
        $this->load->view('article/index', $data);
        $this->load->view('footer', $data);
    }
}
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

    function detail()
    {
        $id = $id = $this->uri->segment(3);
        $article = $this->M_Article->article_detail('article', $id);
        $data['title'] = 'Article-'.$article[0]['title'];
        $data['article'] = $article;

        $this->load->view('header', $data);
        $this->load->view('article/detail_article', $data);
        $this->load->view('footer', $data);
    }
}
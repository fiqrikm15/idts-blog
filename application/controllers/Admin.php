<?php
defined('BASEPATH') or exit('No allowed script to access');

class Admin extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper('url_helper');
        $this->M_User->cek_login();
    }

    function index($page='Admin Panel')
    {
        $data['title'] = $page;
        $data['article'] = $this->M_Article->get_byid_user('article');

        $this->load->view('header', $data);
        $this->load->view('sidebar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('footer', $data);
    }

    function create_article($page = 'Create Article')
    {
        $data['title'] = $page;
        $this->load->view('header', $data);
        $this->load->view('sidebar', $data);
        $this->load->view('admin/create_article', $data);
        $this->load->view('footer', $data);
    }

    function create_action()
    {
        $filename = md5(uniqid(rand(), true));
        $config = array(
            'upload_path' => 'uploads/header-img',
            'allowed_types' => "gif|jpg|png|jpeg",
            'file_name' => $filename,
            'max_size' => 1000
        );

        $this->load->library('upload', $config);

        if($this->upload->do_upload('header-pic'))
        {
            $file_data = $this->upload->data();
            $data['image'] = $file_data['file_name'];
            $data_article = array(
                'id_user' => $this->session->userdata['id'],
                'title' => $this->input->post('title'),
                'slug' => $this->input->post('slug'),
                'content' => nl2br($this->input->post('content')),
                'image' =>  $file_data['file_name'],
                'status' => $this->input->post('status'),
                'tgl_create' => date('Y-m-d'),
                'last_update' => date('Y-m-d')
            );

            //echo $data_article;

            $insert = $this->M_Article->add('article', $data_article);

            if ($insert) {
                $this->session->set_flashdata('insert_sess', 'Insert Data Sucess');
                redirect(site_url('admin'));
            } else {
                $this->session->set_flashdata('insert_sess', 'Insert Data Gagal');
                redirect(site_url('admin'));
            }
        }
    }

    function edit($page='Edit Article')
    {
        $id = $this->uri->segment(3);

        $data['title'] = 'Edit Article';
        $data['ids'] = $id;
        $data['article'] = $this->M_Article->get_by_id('article', $id);

        $this->load->view('header', $data);
        $this->load->view('sidebar', $data);
        $this->load->view('admin/edit_article', $data);
        $this->load->view('footer', $data);
    }

    function edit_action()
    {
        $id = $this->uri->segment(3);
        $id_user = $this->uri->segment(4);
        $filename = md5(uniqid(rand(), true));
        $config = array(
            'upload_path' => 'uploads/header-img',
            'allowed_types' => "gif|jpg|png|jpeg",
            'file_name' => $filename,
            'max_size' => 1000
        );

        $this->load->library('upload', $config);

        if($this->upload->do_upload('header-pic')) {
            $file_data = $this->upload->data();
            $data['image'] = $file_data['file_name'];
            $data_article = array(
                'id_user' => $id_user,
                'title' => $this->input->post('title'),
                'slug' => $this->input->post('slug'),
                'content' => $this->input->post('content'),
                'status' => $this->input->post('status'),
                'image' =>  $file_data['file_name'],
                'last_update' => date('Y-m-d')
            );

            $edit = $this->M_Article->update('article', $data_article, $id);

            if ($edit) {
                $this->session->set_flashdata('edit_sess', 'Edit Data Sucess');
                redirect(site_url('admin'));
            } else {
                $this->session->set_flashdata('edit_sess', 'Edit Data Gagal');
                redirect(site_url('admin'));
            }
        }
    }

    function delete()
    {
        $id = $this->uri->segment(3);
        $delete = $this->M_Article->delete('article', $id);

        if($delete)
        {
            $this->session->set_flashdata('delete_sess', 'Delete Data Sucess');
            redirect(site_url('admin'));
        }
        else
        {
            $this->session->set_flashdata('delete_sess', 'Delete Data Gagal');
            redirect(site_url('admin'));
        }
    }

    function article()
    {
        $id = $id = $this->uri->segment(3);
        $article = $this->M_Article->article_detail('article', $id);
        $data['title'] = 'Article-'.$article[0]['title'];
        $data['article'] = $article;

        $this->load->view('header', $data);
        $this->load->view('sidebar', $data);
        $this->load->view('admin/detail_article', $data);
        $this->load->view('footer', $data);
    }
}
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
        $data['article'] = $this->M_Article->get('article');

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
        $data = array(
            'id_user' => '1',
            'title' => $this->input->post('title'),
            'slug' => $this->input->post('slug'),
            'content' => nl2br($this->input->post('content')),
            'status' => 'Publish',
            'tgl_create' => date('Y-m-d'),
            'last_update' => date('Y-m-d')
        );

        $insert = $this->M_Article->add('article', $data);

        if($insert)
        {
            $this->session->set_flashdata('insert_sess', 'Insert Data Sucess');
            redirect(site_url('admin'));
        }
        else
        {
            $this->session->set_flashdata('insert_sess', 'Insert Data Gagal');
            redirect(site_url('admin'));
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

        $data = array(
            'id_user' => $id_user,
            'title' => $this->input->post('title'),
            'slug' => $this->input->post('slug'),
            'content' => $this->input->post('content'),
            'status' => $this->input->post('status'),
            'last_update' => date('Y-m-d')
        );

        $edit = $this->M_Article->update('article', $data, $id);

        if($edit)
        {
            $this->session->set_flashdata('edit_sess', 'Edit Data Sucess');
            redirect(site_url('admin'));
        }
        else
        {
            $this->session->set_flashdata('edit_sess', 'Edit Data Gagal');
            redirect(site_url('admin'));
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
}
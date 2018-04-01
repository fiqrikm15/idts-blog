<?php

class User extends CI_Controller
{
    function index($page = 'User Login')
    {
        $data['title'] = $page;
        $this->load->view('header', $data);
        $this->load->view('user/login', $data);
        $this->load->view('footer', $data);
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
    }

    function login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

        $form_vald = array(
          array(
              'field' => 'username',
              'label' => 'username',
              'rules' => 'required',
              'errors' => array(
                  'required' => 'Username cannot be empty!'
              )
          ),
            array(
                'filed' => 'password',
                'label' => 'password',
                'rules' => 'required',
                'errors' => array(
                    'required' => 'Password cannot be empty!'
                )
            )
        );

        $this->form_validation->set_rules($form_vald);

        if($this->form_validation->run())
        {
            $this->M_User->login($username, $password, base_url('admin'), base_url('user'));
        }

        $tt['title'] = 'User Login';

        $this->load->view('header', $tt);
        $this->load->view('user/login', $tt);
        $this->load->view('footer', $tt);
    }

    function logout()
    {
        $this->M_User->logout();
    }
}
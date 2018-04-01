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

    function register($page = 'New User Register')
    {
        $data['title'] = $page;
        $this->load->view('header', $data);
        $this->load->view('user/register', $data);
        $this->load->view('footer', $data);
    }

    function register_action()
    {
        $config_validation = array(
            array(
                'field' => 'nama',
                'label' => 'nama',
                'rules' => 'required'
            ),
            array(
                'field' => 'username',
                'label' => 'username',
                'rules' => 'required'
            ),

            array(
                'field' => 'email',
                'label' => 'email',
                'rules' => 'required|valid_email|is_unique[users.email]'
            ),

            array(
                'field' => 'password',
                'label' => 'password',
                'rules' => 'required',
                'errors' => array(
                    'required' => 'Isi password dengan benar.',
                )
            ),

            array(
                'field' => 'c_password',
                'label' => 'c_password',
                'rules' => 'required|matches[password]',
                'errors' => array(
                    'required' => 'Password harus sama dengan password di atas.',
                )
            )
        );

        $this->form_validation->set_rules($config_validation);

        if(!$this->form_validation->run())
        {
            $data['title'] = "Register New User";
            $this->load->view('header', $data);
            $this->load->view('user/register', $data);
            $this->load->view('footer', $data);
        }
        else
        {
            $nama = $this->input->POST('nama');
            $username = $this->input->POST('username');
            $email = $this->input->POST('email');
            $password = md5($this->input->POST('password'));

            $user_data = array(
                'nama' => $nama,
                'email' => $email,
                'username' => $username,
                'password' => $password
            );

            $this->M_User->register($user_data);
            redirect(site_url('user'));
        }
    }
}
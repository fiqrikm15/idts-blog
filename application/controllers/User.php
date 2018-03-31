<?php
defined('BASEPATH') or exit('No allowed script to access');

class User extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function index($page = 'Login')
    {
        $data['title'] = $page;
        $this->load->view('header', $data);
        $this->load->view('user/login', $data);
        $this->load->view('footer', $data);
    }

    function login_action()
    {
        
    }

    function register($page = 'Register')
    {

    }

    function register_acton()
    {

    }

    function logout_action()
    {

    }
} 
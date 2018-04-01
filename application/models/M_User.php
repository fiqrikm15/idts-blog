<?php

class M_User extends CI_Model
{
    function login($username, $password)
    {
        $query = $this->db->get_where('users', array('username' => $username, 'password' => md5($password)));

        if($query->num_rows() == 1)
        {
            $row = $this->db->query("select id_user from users where username ='".$username."'");
            $id_user = $row->row();
            $id = $id_user->id_user;

            $this->session->set_userdata('username', $username);
            $this->session->set_userdata('id_login', uniqid(rand()));
            $this->session->set_userdata('id', $id);

            redirect(site_url('admin'));
        }
        else
        {
            $this->session->set_flashdata('login_failed','Username atau password anda salah, silakan coba lagi.');
            redirect(site_url('user'));
        }

        return false;
    }

    function cek_login()
    {
        if($this->session->userdata('username') == "")
        {
            $this->session->set_flashdata('login_failed', 'Anda Belum Melakukan Login');
            redirect('user');
        }
    }

    function regiter($data)
    {
        $this->db->insert('users', $data);
    }

    function logout()
    {
        $items = array('username', 'id_login', 'id');
        $this->session->unset_userdata($items);
        $this->session->sess_destroy();
        redirect(site_url('user'));
    }
}
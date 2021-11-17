<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/userguide3/general/urls.html
     */
    public function index()
    {
        if ($this->session->userdata('isLogin') == true) {
            $this->template->load('admin/template', 'admin/admin_dashboard');
        } else {
            redirect('admin/login');
        }
    }

    public function login()
    {
        if ($this->session->userdata('isLogin') == true) {
            redirect('admin');
        } else {
            $this->load->view('admin/admin_login');
        }
    }

    public function login_proses()
    {
        $email = $this->input->post('email');
        $password = md5($this->input->post('password'));


        $this->db->where('email', $email);
        $this->db->where('password', $password);
        $user = $this->db->get('users')->row_array();

        // var_dump($email, $password);
        if ($user) {
            $this->session->set_userdata(['user_name' => $user['name'], 'isLogin' => true]);
            redirect('admin');
            // echo 'Login berhasil';
        } else {
            $this->session->set_flashdata('messageFail', 'Username atau Password anda salah');
            redirect('admin/login');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('user_name');
        $this->session->set_userdata(['isLogin' => false]);
        $this->session->set_flashdata('messageSuccess', 'Berhasil logout');
        redirect('admin/login');
    }
}

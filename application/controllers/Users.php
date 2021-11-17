<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users extends CI_Controller
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

            $users = $this->db->get('users')->result();

            $data['users'] = $users;
            $this->template->load('admin/template', 'admin/users_index', $data);
            // $this->load->view('users_index');
        } else {
            redirect('admin/login');
        }
    }

    public function add()
    {
        $this->template->load('admin/template', 'admin/users_add');
    }

    public function add_proses()
    {
        //load library
        $this->load->library('form_validation');

        //buat rules
        $this->form_validation->set_rules('name', 'Name', 'required|min_length[5]');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        //cek kondisi
        if ($this->form_validation->run() == false) {
            $this->template->load('admin/template', 'admin/users_add');
        } else {
            $name = $this->input->post('name');
            $email = $this->input->post('email');
            $password = $this->input->post('password');

            $this->db->insert('users', [
                'name' => $name,
                'email' => $email,
                'password' => md5($password)
            ]);

            $this->session->set_flashdata('messageSuccess', 'User berhasil ditambahkan.');
            redirect('users');
        }
    }

    public function edit($id)
    {
        $this->db->where('id', $id);
        $data['user'] = $this->db->get('users')->row_array();
        $this->template->load('admin/template', 'admin/users_edit', $data);
    }

    public function edit_proses()
    {
        //load library
        $this->load->library('form_validation');

        //buat rules
        $this->form_validation->set_rules('name', 'Name', 'required|min_length[5]');
        $this->form_validation->set_rules('email', 'Email', 'required');
        // $this->form_validation->set_rules('password', 'Password', 'required');

        $id = $this->input->post('id');
        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        //cek kondisi
        if ($this->form_validation->run() == false) {
            $this->db->where('id', $id);
            $data['user'] = $this->db->get('users')->row_array();
            $this->template->load('admin/template', 'admin/users_edit', $data);
        } else {

            $this->db->where('id', $id);
            $this->db->set('name', $name);
            $this->db->set('email', $email);
            if ($password) {
                $this->db->set('password', md5($password));
            }
            $this->db->update('users');

            $this->session->set_flashdata('messageSuccess', 'Data user berhasil diubah.');
            redirect('users');
        }
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('users');

        $this->session->set_flashdata('messageSuccess', 'User berhasil dihapus.');
        redirect('users');
    }
}

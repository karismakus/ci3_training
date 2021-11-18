<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Employees extends CI_Controller
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

    public function __construct()
    {
        parent::__construct();

        //load model
        $this->load->model('Employees_model');
    }
    public function index()
    {
        if ($this->session->userdata('isLogin') == true) {

            // $users = $this->db->get('employees')->result();

            $data['employees'] = $this->Employees_model->getAll();
            $this->template->load('admin/template', 'admin/employees_index', $data);
            // $this->load->view('users_index');
        } else {
            redirect('admin/login');
        }
    }

    public function add()
    {
        $this->template->load('admin/template', 'admin/employees_add');
    }

    public function add_proses()
    {
        //load library
        $this->load->library('form_validation');

        //buat rules
        $this->form_validation->set_rules('ID', 'ID', 'min_length[16]|required');
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('address', 'Address', 'required');
        $this->form_validation->set_rules('phone', 'Phone', 'required');

        //cek kondisi
        if ($this->form_validation->run() == false) {
            $this->template->load('admin/template', 'admin/employees_add');
        } else {
            $ID = $this->input->post('ID');
            $name = $this->input->post('name');
            $email = $this->input->post('email');
            $address = $this->input->post('address');
            $phone = $this->input->post('phone');

            $parameter = [
                'ID' => $ID,
                'name' => $name,
                'email' => $email,
                'address' => $address,
                'phone' => $phone,
            ];

            $this->Employees_model->add($parameter);

            $this->session->set_flashdata('messageSuccess', 'Employee berhasil ditambahkan.');
            redirect('employees');
        }
    }

    public function edit($id)
    {
        $data['employee'] = $this->Employees_model->get($id);
        $this->template->load('admin/template', 'admin/employees_edit', $data);
    }

    public function edit_proses()
    {
        //load library
        $this->load->library('form_validation');

        //buat rules
        $this->form_validation->set_rules('ID', 'ID', 'min_length[16]|required');
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('address', 'Address', 'required');
        $this->form_validation->set_rules('phone', 'Phone', 'required');

        $ID = $this->input->post('ID');
        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $address = $this->input->post('address');
        $phone = $this->input->post('phone');


        //cek kondisi
        if ($this->form_validation->run() == false) {
            $this->db->where('ID', $ID);
            $data['employee'] = $this->Employees_model->get($ID);
            $this->template->load('admin/template', 'admin/employees_edit', $data);
        } else {

            $parameter = [
                'ID' => $ID,
                'name' => $name,
                'email' => $email,
                'address' => $address,
                'phone' => $phone,
            ];

            $this->Employees_model->update($ID, $parameter);

            $this->session->set_flashdata('messageSuccess', 'Employee berhasil diedit.');
            redirect('employees');
        }
    }

    public function delete($ID)
    {
        $this->Employees_model->delete($ID);
        $this->session->set_flashdata('messageSuccess', 'Employee berhasil dihapus.');
        redirect('employees');
    }
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Articles extends CI_Controller
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

            // $articles = $this->db->get('articles')->result();

            $this->db->select('articles.id as article_id, title, content, date_created, articles_category.category as category');
            $this->db->from('articles');
            $this->db->join('articles_category', 'articles_category.id = articles.category');
            $articles =  $this->db->get()->result();

            $data['articles'] = $articles;
            $this->template->load('admin/template', 'admin/articles_index', $data);
            // $this->load->view('users_index');
        } else {
            redirect('admin/login');
        }
    }

    public function add()
    {
        if ($this->session->userdata('isLogin') == true) {
            $data['categories'] = $this->db->get('articles_category')->result();
            $this->template->load('admin/template', 'admin/articles_add', $data);
        } else {
            redirect('admin/login');
        }
    }

    public function add_proses()
    {
        //set zona wakt ke WIB
        date_default_timezone_set("Asia/Jakarta");

        //load library
        $this->load->library('form_validation');

        //buat rules
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('category', 'Category', 'required');
        $this->form_validation->set_rules('content', 'Content', 'required');

        //cek kondisi
        if ($this->form_validation->run() == false) {
            $this->template->load('admin/template', 'admin/articles_add');
        } else {
            $title = $this->input->post('title');
            $category = $this->input->post('category');
            $content = $this->input->post('content');
            $date = date("Y-m-d");

            $this->db->insert('articles', [
                'title' => $title,
                'content' => $content,
                'date_created' => $date,
                'category' => $category
            ]);

            $this->session->set_flashdata('messageSuccess', 'Artikel berhasil ditambahkan.');
            redirect('articles');
        }
    }

    public function edit($id)
    {
        if ($this->session->userdata('isLogin') == true) {
            $this->db->where('id', $id);
            $data['article'] = $this->db->get('articles')->row_array();
            $data['categories'] = $this->db->get('articles_category')->result();
            $this->template->load('admin/template', 'admin/articles_edit', $data);
        } else {
            redirect('admin/login');
        }
    }

    public function edit_proses()
    {
        //load library
        $this->load->library('form_validation');

        //buat rules
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('category', 'Category', 'required');
        $this->form_validation->set_rules('content', 'Content', 'required');

        $id = $this->input->post('id');
        $title = $this->input->post('title');
        $category = $this->input->post('category');
        $content = $this->input->post('content');
        $date = date("Y-m-d");

        //cek kondisi
        if ($this->form_validation->run() == false) {
            $this->db->where('id', $id);
            $data['article'] = $this->db->get('articles')->row_array();
            $data['categories'] = $this->db->get('articles_category')->result();
            $this->template->load('admin/template', 'admin/articles_edit', $data);
        } else {

            $this->db->where('id', $id);
            $this->db->set('title', $title);
            $this->db->set('content', $content);
            $this->db->set('category', $category);
            $this->db->set('date_edited', $date);
            $this->db->update('articles');

            $this->session->set_flashdata('messageSuccess', 'Artikel berhasil diubah.');
            redirect('articles');
        }
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('articles');
        $this->session->set_flashdata('messageSuccess', 'Artikel berhasil dihapus.');
        redirect('articles');
    }
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pages extends CI_Controller
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
        $data['title'] = 'Home';
        $this->load->view('layouts/layout_header', $data);
        $this->load->view('pages_index');
        $this->load->view('layouts/layout_footer');
    }

    public function pages_artikel()
    {
        $data['title'] = 'Artikel';
        $data['artikel'] = [
            'Artikel 1',
            'Artikel 2',
            'Artikel 3',
            'Artikel 4',
            'Artikel 5',
            'Artikel 6',
            'Artikel 7',
            'Artikel 8'
        ];

        $this->load->view('layouts/layout_header', $data);
        $this->load->view('pages_artikel');
        $this->load->view('layouts/layout_footer');
    }

    public function pages_data_gempa()
    {
        $data['title'] = 'Data Gempa';
        $this->load->view('layouts/layout_header', $data);
        $this->load->view('pages_data_gempa');
        $this->load->view('layouts/layout_footer');
    }
}

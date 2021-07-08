<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_entry extends CI_Controller {

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
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->view('admin/template/header',$data);
		$this->load->view('admin/template/menu_dashboard',$data);
		$this->load->view('data_entry/index', $data);
		$this->load->view('admin/template/footer');
	}
	public function add_data()
	{
		$data['title'] = 'Tambah Data';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->view('admin/template/header',$data);
		$this->load->view('admin/template/menu_dashboard',$data);
		$this->load->view('data_entry/add_data', $data);
		$this->load->view('admin/template/footer');
	}
}
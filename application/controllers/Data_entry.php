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
	public function tampil_data()
	{
		$data['title'] = 'Tampil Data';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['surat'] = $this->Data_model->getDataSurat();
		$this->load->view('admin/template/header',$data);
		$this->load->view('admin/template/menu_dashboard',$data);
		$this->load->view('data_entry/tampil_data', $data);
		$this->load->view('admin/template/footer');
	}
	public function add_data()
	{
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->form_validation->set_rules('nama_pasien', 'Nama Pasien', 'required|trim', ['required' => 'Nama Pasien Tidak Boleh Kosong']);
		$this->form_validation->set_rules('nik', 'NIK', 'required|trim|is_unique[data_surat.nik]', ['required' => 'NIK Tidak Boleh Kosong','is_unique' => 'NIK Sudah Terdaftar']);
        $this->form_validation->set_rules('alamat_pasien', 'Alamat', 'required|trim', ['required' => 'Alamat Tidak Boleh Kosong']);
		$this->form_validation->set_rules('jk_pasien', 'Jenis Kelamin', 'required|trim', ['required' => 'Jenis Kelamin Tidak Boleh Kosong']);
        $this->form_validation->set_rules('umur_pasien', 'Umur', 'required|trim', ['required' => 'Umur Tidak Boleh Kosong']);
        $this->form_validation->set_rules('tanggal_periksa', 'Tanggal Periksa', 'required|trim', ['required' => 'Tanggal Periksa Tidak Boleh Kosong']);
        $this->form_validation->set_rules('no_surat', 'No. Surat/Register', 'required|trim', ['required' => 'No. Surat/Register Tidak Boleh Kosong']);
        $this->form_validation->set_rules('hasil', 'Hasil Pemeriksaan', 'required|trim', ['required' => 'Hasil Pemeriksaan Tidak Boleh Kosong']);
        $this->form_validation->set_rules('jenis_pemeriksaan', 'Jenis Pemeriksaan', 'required|trim', ['required' => 'Jenis Pemeriksaan Tidak Boleh Kosong']);
        $this->form_validation->set_rules('jam_periksa', 'Jam Periksa', 'required|trim', ['required' => 'Jam Periksa Tidak Boleh Kosong']);
        
        
        if ($this->form_validation->run() == false) {
			$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['menu'] = $this->db->get('user_menu')->result_array();
            $data['title'] = 'Tambah Data';
			$this->load->view('admin/template/header',$data);
			$this->load->view('admin/template/menu_dashboard',$data);
			$this->load->view('data_entry/add_data', $data);
			$this->load->view('admin/template/footer');
        } else {
            $data = [
                'id' => random_string('alnum', 10),
                'nama_pasien' => htmlspecialchars($this->input->post('nama_pasien'), true),
                'nik' => htmlspecialchars($this->input->post('nik'), true),
                'alamat_pasien' => htmlspecialchars($this->input->post('alamat_pasien'), true),
                'jk_pasien' => htmlspecialchars($this->input->post('jk_pasien'), true),
                'umur_pasien' => htmlspecialchars($this->input->post('umur_pasien'), true),
                'tanggal_periksa' => htmlspecialchars($this->input->post('tanggal_periksa'), true),
                'no_surat' => htmlspecialchars($this->input->post('no_surat'), true),
                'hasil' => htmlspecialchars($this->input->post('hasil'), true),
                'asal_rs' => htmlspecialchars($this->input->post('asal_rs'), true),
                'jenis_pemeriksaan' => htmlspecialchars($this->input->post('jenis_pemeriksaan'), true),
                'jam_periksa' => htmlspecialchars($this->input->post('jam_periksa'), true),
                'nama_penginput' => $this->input->post('nama_penginput')

            ];
            $this->db->insert('data_surat', $data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data telah Berhasil ditambahkan</div>');
            redirect('data_entry/tampil_data');
        }
		
	}
}
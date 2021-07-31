<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_entry extends CI_Controller
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
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$data['title'] = 'Dashboard';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->view('admin/template/header', $data);
		$this->load->view('admin/template/menu_dashboard', $data);
		$this->load->view('data_entry/index', $data);
		$this->load->view('admin/template/footer');
	}
	public function tampil_data()
	{
		$data['title'] = 'Tampil Data';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['surat'] = $this->Data_model->getDataSurat();
		$this->load->view('admin/template/header', $data);
		$this->load->view('admin/template/menu_dashboard', $data);
		$this->load->view('data_entry/tampil_data', $data);
		$this->load->view('admin/template/footer');
	}
	public function add_data()
	{
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->form_validation->set_rules('nama_pasien', 'Nama Pasien', 'required|trim', ['required' => 'Nama Pasien Tidak Boleh Kosong']);
		$this->form_validation->set_rules('nik', 'NIK', 'required|trim|is_unique[data_surat.nik]', ['required' => 'NIK Tidak Boleh Kosong', 'is_unique' => 'NIK Sudah Terdaftar']);
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
			$this->load->view('admin/template/header', $data);
			$this->load->view('admin/template/menu_dashboard', $data);
			$this->load->view('data_entry/add_data', $data);
			$this->load->view('admin/template/footer');
		} else {
			$id = random_string('alnum', 10);
			$this->load->library('ciqrcode'); //pemanggilan library QR CODE

			$config['cacheable']    = true; //boolean, the default is true
			$config['cachedir']     = './assets/'; //string, the default is application/cache/
			$config['errorlog']     = './assets/'; //string, the default is application/logs/
			$config['imagedir']     = './assets/images/'; //direktori penyimpanan qr code
			$config['quality']      = true; //boolean, the default is true
			$config['size']         = '1024'; //interger, the default is 1024
			$config['black']        = array(224, 255, 255); // array, default is array(255,255,255)
			$config['white']        = array(70, 130, 180); // array, default is array(0,0,0)
			$this->ciqrcode->initialize($config);

			$image_name = $id . '.png'; //buat name dari qr code sesuai dengan nim

			$params['data'] = $id; //data yang akan di jadikan QR CODE
			$params['level'] = 'H'; //H=High
			$params['size'] = 10;
			$params['savename'] = FCPATH . $config['imagedir'] . $image_name; //simpan image QR CODE ke folder assets/images/
			$this->ciqrcode->generate($params); // fungsi untuk generate QR CODE
			$data = [
				'id' => $id,
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
				'nama_penginput' => $this->input->post('nama_penginput'),
				'qr_code' => $image_name

			];

			$this->db->insert('data_surat', $data);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data telah Berhasil ditambahkan</div>');
			redirect('data_entry/tampil_data');
		}
	}
	public function cetak_surat($id)
	{
		$data['title'] = 'Data Qr';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['menu'] = $this->db->get('user_menu')->result_array();
		$data['nama_pasien'] = $this->db->get_where('data_surat', ['id' => $id])->row_array();
		$namafile = $this->db->get_where('data_surat', ['id' => $id])->row_array();
		$this->load->library('Pdf');

		// ukuran kertas atau  new FPDF('P','mm','A4');  
		// $pdf = new FPDF('P', 'cm', 'Legal');
		// $pdf->AddPage();
		// $pdf->SetFont('Arial', 'B', 20);
		// $pdf->SetX(2);
		// $pdf->MultiCell(19.5, 1, 'Hasil Pemeriksaan Laboratorium', 0, 'L');
		// $pdf->SetX(2);
		// $pdf->MultiCell(19.5, 1, 'Uji ' . $namafile['jenis_pemeriksaan'], 0, 'L');
		// $pdf->Line(2, 3.1, 20.5, 3.1);
		// $pdf->SetLineWidth(0.1);
		// $pdf->Line(2, 3.2, 20.5, 3.2);
		// $pdf->SetLineWidth(0);
		// $pdf->Ln();
		// $pdf->Output('', 'Surat Hasil Test ' . $namafile['nama_pasien'] . ' ');
		$this->load->library('pdf');
		$this->pdf->setPaper('A4', 'potrait');
		$this->pdf->filename = $namafile['nama_pasien'] . ".pdf";
		$this->pdf->load_view('data_entry/cetak_surat', $data);
	}
}

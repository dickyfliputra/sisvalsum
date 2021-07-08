<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

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
		$this->load->view('admin/index', $data);
		$this->load->view('admin/template/footer');
	}
    public function pengguna()
	{
        $data['title'] = 'Pengguna';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $data['pengguna'] = $this->User_model->getUser();
		$this->load->view('admin/template/header',$data);
		$this->load->view('admin/template/menu_dashboard',$data);
		$this->load->view('admin/user', $data);
		$this->load->view('admin/template/footer');
	}
    public function level_user()
	{
        $data['title'] = 'Level Pengguna';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $data['pengguna'] = $this->User_model->getUser();
		$this->load->view('admin/template/header',$data);
		$this->load->view('admin/template/menu_dashboard',$data);
		$this->load->view('admin/level_user', $data);
		$this->load->view('admin/template/footer');
	}

    public function profile()
	{
        $data['title'] = 'Profile';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['menu'] = $this->db->get('user_menu')->result_array();
		$this->load->view('admin/template/header',$data);
		$this->load->view('admin/template/menu_dashboard',$data);
		$this->load->view('admin/profile', $data);
		$this->load->view('admin/template/footer');
	}
    public function tambah_user()
	{
        $this->form_validation->set_rules('nama', 'Nama Pengguna', 'required|trim', ['required' => 'Nama Lengkap Tidak Boleh Kosong']);
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', ['required' => 'Email Tidak Boleh Kosong', 'is_unique' => 'Email Sudah Terdaftar']);
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[5]', [
            'required' => 'Password Anda Kosong',
            'min_length' => 'Password Terlalu Pendek'
        ]);
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim', ['required' => 'Alamat Tidak Boleh Kosong']);
        $this->form_validation->set_rules('no_hp', 'Nomor Handphone', 'required|trim', ['required' => 'Nomor handphone Tidak Boleh Kosong']);
        $this->form_validation->set_rules('jabatan', 'Jabatan', 'required|trim', ['required' => 'Jabatan Tidak Boleh Kosong']);
        $this->form_validation->set_rules('tempat_kerja', 'Tempat Kerja', 'required|trim', ['required' => 'Tempat Kerja Tidak Boleh Kosong']);
        $this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required|trim', ['required' => 'Jenis Kelamin Tidak Boleh Kosong']);
        $this->form_validation->set_rules('level_user', 'Level Pengguna', 'required|trim', ['required' => 'Level Pengguna Tidak Boleh Kosong']);
        //cek gambar yang akan diupload
        
        $config['allowed_types'] = 'gif|jpg|png';
       // $config['max_size']     = '4048';
        $config['upload_path'] = './assets/img/profile/';
        $this->load->library('upload', $config);
        $this->upload->do_upload('foto');
        $new_image = $this->upload->data('file_name');
        
        
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Tambah User';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['menu'] = $this->db->get('user_menu')->result_array();
            $this->load->view('admin/template/header',$data);
		    $this->load->view('admin/template/menu_dashboard',$data);
		    $this->load->view('admin/tambah_user',$data);
		    $this->load->view('admin/template/footer');
        } else {
            $data = [
                'id' => random_string('alnum', 5),
                'nama' => htmlspecialchars($this->input->post('nama'), true),
                'email' => htmlspecialchars($this->input->post('email'), true),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'alamat' => htmlspecialchars($this->input->post('alamat'), true),
                'no_hp' => htmlspecialchars($this->input->post('no_hp'), true),
                'jk' => htmlspecialchars($this->input->post('jk'), true),
                'jabatan' => htmlspecialchars($this->input->post('jabatan'), true),
                'tempat_kerja' => htmlspecialchars($this->input->post('tempat_kerja'), true),
                'foto' => $new_image,
                'level_user' => htmlspecialchars($this->input->post('level_user'), true),
                'user_active' => 1,
                'date_create' => time()

            ];
            $this->db->insert('user', $data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Selamat Akun Anda Telah Terdaftar, Silahkan Login.</div>');
            redirect('admin/tambah_user');
        }
	}
    public function edit_profile()
    {
        
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->form_validation->set_rules('nama', 'Nama Pengguna', 'required|trim', ['required' => 'Nama Lengkap Tidak Boleh Kosong']);
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim', ['required' => 'Alamat Tidak Boleh Kosong']);
        $this->form_validation->set_rules('no_hp', 'Nomor Handphone', 'required|trim', ['required' => 'Nomor handphone Tidak Boleh Kosong']);
        $this->form_validation->set_rules('jabatan', 'Jabatan', 'required|trim', ['required' => 'Jabatan Tidak Boleh Kosong']);
        $this->form_validation->set_rules('tempat_kerja', 'Tempat Kerja', 'required|trim', ['required' => 'Tempat Kerja Tidak Boleh Kosong']);
        $this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required|trim', ['required' => 'Jenis Kelamin Tidak Boleh Kosong']);
        if ($this->form_validation->run() == false) {
            redirect('admin/profile');
            echo 'gagal';
        }
        else {
            $name = $this->input->post('nama');
            $alamat = $this->input->post('alamat');
            $no_hp = $this->input->post('no_hp');
            $jabatan = $this->input->post('jabatan');
            $tempat_kerja = $this->input->post('tempat_kerja');
            $jk = $this->input->post('jk');
            $upload_image = $_FILES['gambar']['name'];
            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']     = '2048';
                $config['upload_path'] = './assets/img/profile/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('gambar')) {
                    $old_image = $data['user']['gambar'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/profile/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('gambar', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }
                $this->db->set('nama', $name);
                $this->db->set('alamat', $alamat);
                $this->db->set('no_hp', $no_hp);
                $this->db->set('jabatan', $jabatan);
                $this->db->set('jk', $jk);
                $this->db->set('tempat_kerja', $tempat_kerja);
                $this->db->where('email', $this->session->userdata('email'));
                $this->db->update('user');
                $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Selamat Profile anda telah berhasil diubah.</div>');
                redirect('admin/profile');
        }
        
    }
    public function ubah_admin($id)
    {
       $this->db->set('level_user', 1);
       $this->db->where('id', $id);
       $this->db->update('user');
       $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Selamat Level User telah berhasil diubah.</div>');
       redirect('admin/level_user');
    }
    public function ubah_valid($id)
    {
       $this->db->set('level_user', 2);
       $this->db->where('id', $id);
       $this->db->update('user');
       $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Selamat Level User telah berhasil diubah.</div>');
       redirect('admin/level_user');
    }
    public function ubah_data($id)
    {
       $this->db->set('level_user', 3);
       $this->db->where('id', $id);
       $this->db->update('user');
       $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Selamat Level User telah berhasil diubah.</div>');
       redirect('admin/level_user');
    }
}

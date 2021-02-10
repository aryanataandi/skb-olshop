<?php

class Kategori extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Kategori_model');
		$this->load->library('form_validation');
		$this->load->model('Info_model');
		cek_admin();
	}

	public function index()
	{
		// Ambil session
		$data['admin'] = cek_session_admin();
		$data['info'] = $this->Info_model->getInfo();

		$data['judul'] = 'Data Kategori';

		$data['tb_kategori'] = $this->Kategori_model->getAllKategori();
		$this->load->view('template/header', $data);
		$this->load->view('admin/kategori', $data);
		$this->load->view('template/footer');
	}

	public function tambah()
	{
		// Ambil session
		$data['admin'] = cek_session_admin();
		$data['info'] = $this->Info_model->getInfo();

		$data['judul'] = 'Tambah Kategori';

		$this->form_validation->set_rules('nama_kategori', 'Nama kategori', 'required|is_unique[tb_kategori.nama_kategori]');
		if ($this->form_validation->run() == false) {
			$this->load->view('template/header', $data);
			$this->load->view('admin/kategori_tambah', $data);
			$this->load->view('template/footer');
		} else {
			$this->Kategori_model->tambahDataKategori();
			$this->session->set_flashdata('alert', '<div class="form-row">
											          <div class="form-group col-md-12">
											            <div class="alert alert-success alert-dismissible fade show" role="alert">
											              Data kategori <strong>berhasil</strong> ditambahkan.
											            </div>
											          </div>
											        </div>');
			redirect('admin/kategori');
		}
	}

	public function hapus($id)
	{
		$this->Kategori_model->hapusDataKategori($id);
		$this->session->set_flashdata('alert', '<div class="form-row">
											          <div class="form-group col-md-12">
											            <div class="alert alert-success alert-dismissible fade show" role="alert">
											              Data kategori <strong>berhasil</strong> dihapus.
											            </div>
											          </div>
											        </div>');
		redirect('admin/kategori');
	}

	public function edit($id)
	{
		// Ambil session
		$data['admin'] = cek_session_admin();
		$data['info'] = $this->Info_model->getInfo();

		$data['judul'] = 'Edit Kategori';
		$data['k'] = $this->Kategori_model->getKategoriById($id);


		$this->form_validation->set_rules('nama_kategori', 'Nama kategori', 'required|is_unique[tb_kategori.nama_kategori]');
		if ($this->form_validation->run() == false) {
			$this->load->view('template/header', $data);
			$this->load->view('admin/kategori_edit', $data);
			$this->load->view('template/footer');
		} else {
			$this->Kategori_model->editDataKategori($id);
			$this->session->set_flashdata('alert', '<div class="form-row">
											          <div class="form-group col-md-12">
											            <div class="alert alert-success alert-dismissible fade show" role="alert">
											              Data kategori <strong>berhasil</strong> diupdate.
											            </div>
											          </div>
											        </div>');
			redirect('admin/kategori');
		}
	}
}

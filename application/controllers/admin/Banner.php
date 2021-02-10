<?php

class Banner extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Banner_model');
		$this->load->library('form_validation');
		$this->load->model('Info_model');

		cek_admin();
	}

	public function index()
	{
		$data['judul'] = 'Banner';
		$data['info'] = $this->Info_model->getInfo();

		// Ambil session
		$data['admin'] = cek_session_admin();

		$data['header'] = 'Tabel Banner';
		$data['tb_banner'] = $this->Banner_model->getAllBanner();
		$this->load->view('template/header', $data);
		$this->load->view('admin/banner', $data);
		$this->load->view('template/footer');
	}

	public function tambah()
	{
		$data['judul'] = 'Form Tambah Banner';
		$data['info'] = $this->Info_model->getInfo();

		// Ambil session
		$data['admin'] = cek_session_admin();

		$this->form_validation->set_rules('nama_banner', 'Nama banner', 'required');
		$this->form_validation->set_rules('url', 'URL', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('template/header', $data);
			$this->load->view('admin/banner_tambah', $data);
			$this->load->view('template/footer');
		} else {
			$this->Banner_model->tambahDataBanner();
			$this->session->set_flashdata('alert', 'ditambahkan');
			redirect('admin/banner');
		}
	}

	public function hapus($id)
	{
		$this->Banner_model->hapusDataBanner($id);
		$this->session->set_flashdata('alert', 'dihapus');
		redirect('admin/banner');		
	}

	public function edit($id)
	{
		$data['judul'] = 'Edit Data Banner';
		$data['info'] = $this->Info_model->getInfo();
		$data['b'] = $this->Banner_model->getBannerById($id);

		// Ambil session
		$data['admin'] = cek_session_admin();

		$this->form_validation->set_rules('nama_banner', 'Nama banner', 'required');
		$this->form_validation->set_rules('url', 'URL', 'required|valid_url');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('template/header', $data);
			$this->load->view('admin/banner_edit', $data);
			$this->load->view('template/footer');
		} else {
			$this->Banner_model->editDataBanner($id);
			$this->session->set_flashdata('alert', 'diubah');
			redirect('admin/banner');
		}
	}
}

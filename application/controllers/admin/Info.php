<?php

class Info extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Info_model');
		$this->load->library('form_validation');
		$this->load->model('Info_model');
		cek_admin();
	}

	public function index()
	{
		$data['judul'] = 'Info Website';
		$data['info'] = $this->Info_model->getInfo();

		// Ambil session
		$data['admin'] = cek_session_admin();
		$data['info'] = $this->Info_model->getInfo();

		$this->load->view('template/header', $data);
		$this->load->view('admin/info_web', $data);
		$this->load->view('template/footer');
	}

	public function edit()
	{
		$data['judul'] = 'Edit Info Website';
		$data['info'] = $this->Info_model->getInfo();

		// Ambil session
		$data['admin'] = cek_session_admin();
		$data['info'] = $this->Info_model->getInfo();

		$this->form_validation->set_rules('judulweb', 'Judul Website', 'required');
		$this->form_validation->set_rules('deskweb', 'Deskripsi Website', 'required');
		$this->form_validation->set_rules('nomorweb', 'Nomor Telepon Website', 'required');
		$this->form_validation->set_rules('email', 'Email Website', 'required');
		$this->form_validation->set_rules('wa', 'Nomor Whatsapp', 'required');
		$this->form_validation->set_rules('bank', 'Nama Bank', 'required');
		$this->form_validation->set_rules('rekening', 'Rekening', 'required|numeric');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('template/header', $data);
			$this->load->view('admin/info_web_edit', $data);
			$this->load->view('template/footer');
		} else {
			$data = [
				"judul_web" => htmlspecialchars($this->input->post('judulweb', true)),
				"deskripsi_web" => htmlspecialchars($this->input->post('deskweb', true)),
				"nomor_web" => htmlspecialchars($this->input->post('nomorweb', true)),
				"email_web" => htmlspecialchars($this->input->post('email', true)),
				"wa_web" => htmlspecialchars($this->input->post('wa', true)),
				"alamat_web" => htmlspecialchars($this->input->post('alamat', true)),
				"info_bank" => htmlspecialchars($this->input->post('bank', true)),
				"no_rek" => htmlspecialchars($this->input->post('rekening', true))
			];

			$this->db->where('id_info', 1);
			$this->db->update('tb_info', $data);

			$this->session->set_flashdata('alert', '<div class="row">
				<div class="col-12">
					<div class="alert alert-success" role="alert">
					  Informasi Website berhasil diperbarui
					</div>
				</div>
			</div>');
			redirect('admin/info');
		}
	}
}

<?php

class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Info_model');
		cek_admin();
	}

	public function index()
	{
		$data['info'] = $this->Info_model->getInfo();
		$data['judul'] = $data['info']['judul_web'] . ' Admin';
		
		// Ambil session
		$data['admin'] = cek_session_admin();

		$data['pendapatan'] = $this->db->get_where('tb_invoice', ['status' => 'Selesai'])->result_array();
		$data['total_invoice'] = $this->db->get_where('tb_invoice', ['status' => 'Baru'])->num_rows();
		$data['total_user'] = $this->db->get('tb_user')->num_rows();
		// $data['total_produk'] = $this->db->get('tb_produk')->num_rows();
		$data['total_produk'] = $this->db->from('tb_invoice as a')
								->join('tb_invoice_detail as b', 'a.id_invoice = b.id_invoice', 'left')
								->where('a.status', 'Selesai')
								->get()->result_array();

		$this->load->view('template/header', $data);
		$this->load->view('admin/home');
		$this->load->view('template/footer');
	}
}

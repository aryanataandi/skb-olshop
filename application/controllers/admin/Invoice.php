<?php

class Invoice extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('Invoice_model');
		$this->load->model('Info_model');
		cek_admin();
	}

	public function index()
	{
		$data['judul'] = 'Data Invoice';
		$data['invoice'] = $this->Invoice_model->getAllInvoice();
		$data['info'] = $this->Info_model->getInfo();

		// Ambil session
		$data['admin'] = cek_session_admin();

		$this->load->view('template/header', $data);
		$this->load->view('admin/invoice', $data);
		$this->load->view('template/footer');
	}

	public function view($id)
	{
		if (!$id) {
			redirect('admin/invoice');
		}
		$data['judul'] = 'Data Invoice';
		$data['invoice'] = $this->Invoice_model->getInvoiceById($id);
		$data['invoice_detail'] = $this->Invoice_model->getInvoiceDetail($id);

		// Ambil session
		$data['admin'] = cek_session_admin();

		$this->form_validation->set_rules('status', 'Status', 'required');
		$this->form_validation->set_rules('resi', 'Resi', 'required', ['required' => 'Resi harus diisi, beri tanda ( - ) bila dikosongkan']);
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('template/header', $data);
			$this->load->view('admin/invoice_view', $data);
			$this->load->view('template/footer');
		} else {
			$data = [
				"status" => $this->input->post('status'),
				"resi" => $this->input->post('resi')
			];

			$this->db->where('id_invoice', $this->input->post('id'));
			$this->db->update('tb_invoice', $data);
			$this->session->set_flashdata('success', '<div class="form-row">
											          <div class="form-group col-md-12">
											            <div class="alert alert-success alert-dismissible fade show" role="alert">
											              Status order berhasil diubah.
											            </div>
											          </div>
											        </div>');
			redirect('admin/invoice');
		}
	}
}

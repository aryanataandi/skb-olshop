<?php

class Profil_model extends CI_Model
{
	public function getPesananById($id)
	{
		return $this->db->get_where('tb_invoice', ['id_invoice' => $id])->row_array();
	}

	public function getAllPesanan()
	{
		$user['user'] = cek_session_user();
		$this->db->from('tb_invoice');
		$this->db->where('email', $user['user']['email']);
		$this->db->order_by('tgl_pesan', 'desc');
		return $this->db->get()->result_array();
	}

	public function getPesananBaru()
	{
		$user['user'] = cek_session_user();
		$this->db->from('tb_invoice');
		$this->db->where('email', $user['user']['email']);
		$this->db->where('status', 'Baru');
		$query = $this->db->get();

		return $query->result_array();
	}

	public function getPesananDiproses()
	{
		$user['user'] = cek_session_user();
		$this->db->from('tb_invoice');
		$this->db->where('email', $user['user']['email']);
		$this->db->where('status', 'Diproses');
		$query = $this->db->get();

		return $query->result_array();
	}

	public function getPesananDikirim()
	{
		$user['user'] = cek_session_user();
		$this->db->from('tb_invoice');
		$this->db->where('email', $user['user']['email']);
		$this->db->where('status', 'Dikirim');
		$query = $this->db->get();

		return $query->result_array();
	}

	public function getPesananDibatalkan()
	{
		$user['user'] = cek_session_user();
		$this->db->from('tb_invoice');
		$this->db->where('email', $user['user']['email']);
		$this->db->where('status', 'Dibatalkan');
		$query = $this->db->get();

		return $query->result_array();
	}

	public function getPesananSelesai()
	{
		$user['user'] = cek_session_user();
		$this->db->from('tb_invoice');
		$this->db->where('email', $user['user']['email']);
		$this->db->where('status', 'Selesai');
		$query = $this->db->get();

		return $query->result_array();
	}

	public function getInvoiceDetail($id)
	{
		$user['user'] = cek_session_user();

		$this->db->select('*');
		$this->db->from('tb_invoice as a');
		$this->db->join('tb_invoice_detail as b', 'a.id_invoice = b.id_invoice', 'left');
		$this->db->join('tb_produk as c', 'b.id_produk = c.id_produk', 'left');
		$this->db->where('a.id_invoice', $id);
		$query = $this->db->get();

		return $query->result_array();
	}

	public function getSuccessInvoice()
	{
		$user['user'] = cek_session_user();

		$this->db->select('*');
		$this->db->from('tb_invoice');
		$this->db->where('email', $user['user']['email']);
		$this->db->where('status', 'Selesai');
		$query = $this->db->get();

		return $query->num_rows();
	}

	public function getTotalBelanja()
	{
		$user['user'] = cek_session_user();

		$this->db->from('tb_invoice');
		$this->db->where('email', $user['user']['email']);
		$this->db->where('status', 'Selesai');
		$query = $this->db->get();

		return $query->result_array();
	}

	public function getPesananBelumTerbayar()
	{
		$user['user'] = cek_session_user();

		$this->db->select('*');
		$this->db->from('tb_invoice as a');
		$this->db->join('tb_invoice_detail as b', 'a.id_invoice = b.id_invoice', 'left');
		$this->db->join('tb_produk as c', 'b.id_produk = c.id_produk', 'left');
		$this->db->where('a.email', $user['user']['email']);
		$this->db->where('status', 'Baru');
		$query = $this->db->get();

		return $query->result_array();
	}
}

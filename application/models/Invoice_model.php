<?php

class Invoice_model extends CI_Model
{
	public function getAllInvoice()
	{
		return $this->db->get('tb_invoice')->result_array();
	}

	public function tambahInvoice()
	{
		$this->load->helper('string');

		$user['user'] = cek_session_user();

		// $kode = strtoupper(random_string('alpha', 3)) . random_string('numeric', 3) . substr(htmlspecialchars($this->input->post('telp')), 1);
		$kode = strtoupper(random_string('alpha', 3)) . random_string('numeric', 9);

		date_default_timezone_set("Asia/Bangkok");
		$data = [
			"id_invoice" => $kode,
			"email" => $user['user']['email'],
			"nama_pemesan" => htmlspecialchars($this->input->post('nama')),
			"no_telp" => htmlspecialchars($this->input->post('telp')),
			"alamat" => htmlspecialchars($this->input->post('alamat')) . ", " . $this->input->post('kelurahan') . ", " . $this->input->post('kecamatan') . ", " . $this->input->post('input_kota') . ", " . $this->input->post('input_prov'),
			"kode_pos" => htmlspecialchars($this->input->post('kode_pos')),
			"ekspedisi" => $this->input->post('ekspedisi'),
			"resi" => "-",
			"bayar" => $this->input->post('total') - $this->input->post('ongkir'),
			"ongkir" => $this->input->post('ongkir'),
			"berat_total" => $this->input->post('berat'),
			"total" => $this->input->post('total'),
			"status" => "Baru",
			"tgl_pesan" => date('Y-m-d H:i:s')
		];

		$this->db->insert('tb_invoice', $data);

		foreach ($this->cart->contents() as $item) {
			$dataDetail[] = [
				"id_invoice" => $kode,
				"id_produk" => $item['id'],
				"jumlah" => $item['qty'],
				"harga_detail" => $item['price'] * $item['qty']
			];
		}

		$this->db->insert_batch('tb_invoice_detail', $dataDetail);
	}

	public function getInvoiceDetail($id)
	{
		$this->db->select('*');
		$this->db->from('tb_invoice as a');
		$this->db->join('tb_invoice_detail as b', 'a.id_invoice = b.id_invoice', 'left');
		$this->db->join('tb_produk as c', 'b.id_produk = c.id_produk', 'left');
		$this->db->where('a.id_invoice', $id);
		$query = $this->db->get();

		return $query->result_array();
	}

	public function getInvoiceById($id)
	{
		return $this->db->get_where('tb_invoice', ['id_invoice' => $id])->row_array();
	}
}

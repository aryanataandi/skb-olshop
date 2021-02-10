<?php

class Kategori_model extends CI_Model
{
	public function getAllKategori()
	{
		$this->db->order_by('nama_kategori', 'asc');
		return $this->db->get('tb_kategori')->result_array();
	}

	public function getKategoriById($id)
	{
		return $this->db->get_where('tb_kategori', ['id_kategori' => $id])->row_array();
	}

	public function tambahDataKategori()
	{
		$data = ["nama_kategori" => preg_replace('~[^\pL0-9_]+~u', ' ', htmlspecialchars(ucwords($this->input->post('nama_kategori', true))))];
		$this->db->insert('tb_kategori', $data);
	}

	public function hapusDataKategori($id)
	{
		$this->db->where('id_kategori', $id);
		$this->db->delete('tb_kategori');
	}

	public function editDataKategori($id)
	{
		$data = ["nama_kategori" => preg_replace('~[^\pL0-9_]+~u', ' ', htmlspecialchars(ucwords($this->input->post('nama_kategori', true))))];

		$this->db->where('id_kategori', $id);
		$this->db->update('tb_kategori', $data);
	}
}

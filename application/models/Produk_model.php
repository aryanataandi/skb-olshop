<?php

class Produk_model extends CI_Model
{
	public function getAllProduk()
	{
		return $this->db->get('tb_produk')->result_array();
	}

	public function getAllActiveProduk()
	{
		$this->db->where('status_produk', 1);
		return $this->db->get('tb_produk')->result_array();
	}

	public function tambahDataProduk()
	{
		// Upload gambar
		$upload_image = $_FILES['gambar']['name'];
		$file_name = strtolower($_POST['nama']) . "-" . date('mdY');

		if ($upload_image) {
			$config['upload_path'] = './assets/img_produk/temp/';
			$config['allowed_types'] = 'jpeg|jpg|png';
			$config['max_size']     = '5120';
			$config['file_name'] = $file_name;

			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('gambar')) {
				$this->session->set_flashdata('gambar', '<div class="form-row">
												          <div class="form-group col-md-12">
												            <div class="alert alert-danger alert-dismissible fade show" role="alert">
												              Gambar yang diupload tidak memenuhi syarat.
												            </div>
												          </div>
												        </div>');
				redirect('admin/produk/tambah');
				die;
			}

			$gambar_baru = $this->upload->data();

			$config['image_library'] = 'gd2';
			$config['source_image'] = './assets/img_produk/temp/' . $gambar_baru['file_name'];
			$config['width'] = 700;
			$config['height'] = 700;
			$config['quality'] = '90%';
			$config['maintain_ratio'] = FALSE;
			$config['new_image'] = './assets/img_produk/' . $gambar_baru['file_name'];

			$this->load->library('image_lib', $config);

			$this->image_lib->resize();

			date_default_timezone_set("Asia/Bangkok");
			// Input data
			$data = [
				"nama_produk" => preg_replace('~[^\pL0-9_]+~u', ' ', htmlspecialchars($this->input->post('nama', true))),
				"id_kategori" => htmlspecialchars($this->input->post('id_kategori', true)),
				"deskripsi_produk" => $this->input->post('deskripsi', true),
				"stok_produk" => htmlspecialchars($this->input->post('stok', true)),
				"berat_produk" => htmlspecialchars($this->input->post('berat', true)),
				"harga_produk" => htmlspecialchars($this->input->post('harga', true)),
				"gambar_produk" => htmlspecialchars($gambar_baru['file_name']),
				"diskon_produk" => htmlspecialchars($this->input->post('diskon', true)),
				"status_produk" => 1,
				"tanggal_produk" => date('Y-m-d H:i:s')
			];

			$this->db->insert('tb_produk', $data);

			unlink(FCPATH . 'assets/img_produk/temp/' . $gambar_baru['file_name']);
		}
	}

	public function hapusDataProduk($id)
	{
		$hapusGambar = $this->db->get_where('tb_produk', ['id_produk' => $id])->row_array();
		unlink(FCPATH . 'assets/img_produk/' . $hapusGambar['gambar_produk']);
		$this->db->where('id_produk', $id);
		$this->db->delete('tb_produk');
	}

	public function getProdukById($id)
	{
		return $this->db->get_where('tb_produk', ['id_produk' => $id])->row_array();
	}

	public function getProdukByNama($nama)
	{
		return $this->db->get_where('tb_produk', ['nama_produk' => urltostr($nama)])->row_array();
	}

	public function search($keyword)
	{
		$data['keyword'] = $this->input->post('keyword', true);
		$this->db->like('nama_produk', $data['keyword']);
		return $this->db->get('tb_produk')->result_array();
	}

	// Pagination + Search
	public function getProduk($limit, $start, $keyword = null)
	{
		if ($keyword) {
			$this->db->like('nama_produk', $keyword);
		}
		return $this->db->get('tb_produk', $limit, $start)->result_array();
	}

	public function jumlahProduk()
	{
		return $this->db->get('tb_produk')->num_rows();
	}

	public function getSomeProduk($limit)
	{
		$this->db->order_by('rand()');
		$this->db->where('status_produk', 1);
		$this->db->limit($limit);
		return $this->db->get('tb_produk')->result_array();
	}

	public function getProdukDiskon()
	{
		$this->db->where('diskon_produk >', '0');
		return $this->db->get('tb_produk')->result_array();
	}

	public function getMaxDiskon()
	{
		$this->db->select_max('diskon_produk');
		return $this->db->get('tb_produk')->row_array();
	}

	public function getProdukbyKategori($kategori)
	{
		$this->db->select('*');
		$this->db->from('tb_produk as a');
		$this->db->join('tb_kategori as b', 'a.id_kategori = b.id_kategori', 'left');
		$this->db->where('b.nama_kategori', ucwords(str_replace("-", " ", $kategori)));
		$query = $this->db->get();

		return $query->result_array();
	}

	public function getProdukTerbaru($limit)
	{
		$this->db->order_by('tanggal_produk', 'desc');
		$this->db->where('status_produk', 1);
		$this->db->limit($limit);
		return $this->db->get('tb_produk')->result_array();
	}

	public function getRupiah($value)
	{
		$rupiah = "Rp." . number_format($value, 2, ',', '.');
		return $rupiah;
	}

	public function find($id)
	{
		$result = $this->db->where('id_produk', $id)
			->limit(1)
			->get('tb_produk');
		if ($result->num_rows() > 0) {
			return $result->row_array();
		} else {
			return array();
		}
	}

	// public function ambilNama($nama) {
	// 	$result = $this->db->where('nama_produk', url_produk($nama))
	// 					   ->limit(1)
	// 					   ->get('tb_produk');
	// 	if($result->num_rows() > 0) {
	// 		return $result->row_array();
	// 	} else {
	// 		return array();
	// 	}
	// }
}

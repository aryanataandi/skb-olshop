<?php

class Banner_model extends CI_Model
{
	public function getAllBanner()
	{
		return $this->db->get('tb_banner')->result_array();
	}

	public function getBannerById($id)
	{
		return $this->db->get_where('tb_banner', ['id_banner' => $id])->row_array();
	}

	public function tambahDataBanner()
	{
		// Upload gambar
		$upload_image = $_FILES['gambar_banner']['name'];

		if ($upload_image) {
			$config['upload_path'] = './assets/img_banner/';
			$config['allowed_types'] = 'jpeg|jpg|png';
			$config['max_size']     = '10240';
			$config['max_width']     = '1600';
			$config['max_height']     = '500';

			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('gambar_banner')) {
				$this->session->set_flashdata('gambar', 'harus berukuran kurang dari 2 Mb, beresolusi 1200 x 500px dan berformat jpeg/jpg/png');
				redirect('admin/banner/tambah');
				die;
			}

			$banner = $this->upload->data();

			// Input data
			$data = [
				"nama_banner" => $this->input->post('nama_banner', true),
				"url" => $this->input->post('url', true),
				"gambar_banner" => $banner['file_name']
			];

			$this->db->insert('tb_banner', $data);
		}
	}

	public function hapusDataBanner($id)
	{
		$hapusBanner = $this->db->get_where('tb_banner', ['id_banner' => $id])->row_array();
		unlink(FCPATH . 'assets/img_banner/' . $hapusBanner['gambar_banner']);
		$this->db->where('id_banner', $id);
		$this->db->delete('tb_banner');
	}

	public function editDataBanner($id)
	{
		// Input data
		$data = [
			"nama_banner" => $this->input->post('nama_banner', true),
			"url" => $this->input->post('url', true)
		];

		$this->db->where('id_banner', $this->input->post('id_banner'));
		$this->db->update('tb_banner', $data);
	}
}

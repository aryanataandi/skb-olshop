<?php

class Produk extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Produk_model');
		$this->load->model('Kategori_model');
		$this->load->library('form_validation');
		$this->load->model('Info_model');
		cek_admin();
	}

	public function index()
	{
		$data['judul'] = 'Data Produk';
		$data['info'] = $this->Info_model->getInfo();
		$this->load->library('pagination');
		$data['tb_kategori'] = $this->Kategori_model->getAllKategori();

		// Ambil session
		$data['admin'] = cek_session_admin();

		$data['tb_produk'] = $this->Produk_model->getAllProduk();

		$this->load->view('template/header', $data);
		$this->load->view('admin/produk', $data);
		$this->load->view('template/footer');
	}

	public function tambah()
	{
		$data['judul'] = 'Form Tambah Data';
		$data['info'] = $this->Info_model->getInfo();
		$data['tb_kategori'] = $this->Kategori_model->getAllKategori();

		// Ambil session
		$data['admin'] = cek_session_admin();

		$this->form_validation->set_rules('nama', 'Nama', 'required|is_unique[tb_produk.nama_produk]');
		$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
		$this->form_validation->set_rules('stok', 'Stok', 'required|numeric');
		$this->form_validation->set_rules('harga', 'Harga', 'required|numeric');
		$this->form_validation->set_rules('diskon', 'Diskon', 'required|numeric');
		$this->form_validation->set_rules('berat', 'Berat', 'required|numeric');

		if ($this->form_validation->run() == false) {
			$this->load->view('template/header', $data);
			$this->load->view('admin/produk_tambah', $data);
			$this->load->view('template/footer');
		} else {
			$this->Produk_model->tambahDataProduk();
			$this->session->set_flashdata('alert', '<div class="form-row">
											          <div class="form-group col-md-12">
											            <div class="alert alert-success alert-dismissible fade show" role="alert">
											              Data produk <strong>berhasil</strong> ditambahkan.
											            </div>
											          </div>
											        </div>');
			redirect('admin/produk/tambah');
		}
	}

	public function hapus($id)
	{
		$this->Produk_model->hapusDataProduk($id);
		$this->session->set_flashdata('alert', '<div class="form-row">
											          <div class="form-group col-md-12">
											            <div class="alert alert-success alert-dismissible fade show" role="alert">
											              Data produk <strong>berhasil</strong> dihapus.
											            </div>
											          </div>
											        </div>');
		redirect('admin/produk');
	}

	public function edit($id)
	{
		$data['judul'] = 'Form Edit Data';
		$data['info'] = $this->Info_model->getInfo();
		$data['produk'] = $this->Produk_model->getProdukById($id);

		// Ambil session
		$data['admin'] = cek_session_admin();

		$this->load->model('Kategori_model');
		$data['tb_kategori'] = $this->Kategori_model->getAllKategori();

		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
		$this->form_validation->set_rules('stok', 'Stok', 'required|numeric');
		$this->form_validation->set_rules('harga', 'Harga', 'required|numeric');
		$this->form_validation->set_rules('diskon', 'Diskon', 'required|numeric');
		$this->form_validation->set_rules('berat', 'Berat', 'required|numeric');

		if ($this->form_validation->run() == false) {
			$this->load->view('template/header', $data);
			$this->load->view('admin/produk_edit', $data);
			$this->load->view('template/footer');
		} else {

			// Upload gambar
			$upload_image = $_FILES['gambar']['name'];
			$file_name = strtolower($_POST['nama']) . "-" . date('mdY');

			if ($upload_image) {
				$config['upload_path'] = './assets/img_produk/temp/';
				$config['allowed_types'] = 'jpeg|jpg|png';
				$config['max_size']     = '2048';
				$config['file_name'] = $file_name;

				$this->load->library('upload', $config);

				if (!$this->upload->do_upload('gambar')) {
					$this->session->set_flashdata('alert', '<div class="form-row">
											          <div class="form-group col-md-12">
											            <div class="alert alert-danger alert-dismissible fade show" role="alert">
											              Gambar yang diupload <strong>tidak memenuhi syarat</strong>.
											            </div>
											          </div>
											        </div>');
					redirect('admin/produk/tambah');
					die;
				} else {
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

					unlink(FCPATH . 'assets/img_produk/temp/' . $gambar_baru['file_name']);
				}

				$data = [
					"gambar_produk" => $gambar_baru['file_name']
				];

				$this->db->where('id_produk', $this->input->post('id'));
				$this->db->update('tb_produk', $data);
			}

			$data = [
				"nama_produk" => preg_replace('~[^\pL0-9_]+~u', ' ', htmlspecialchars($this->input->post('nama', true))),
				"id_kategori" => htmlspecialchars($this->input->post('id_kategori', true)),
				"deskripsi_produk" => $this->input->post('deskripsi', true),
				"stok_produk" => htmlspecialchars($this->input->post('stok', true)),
				"berat_produk" => htmlspecialchars($this->input->post('berat', true)),
				"harga_produk" => htmlspecialchars($this->input->post('harga', true)),
				"diskon_produk" => htmlspecialchars($this->input->post('diskon', true))
			];

			$this->db->where('id_produk', $this->input->post('id'));
			$this->db->update('tb_produk', $data);

			$this->session->set_flashdata('alert', '<div class="form-row">
											          <div class="form-group col-md-12">
											            <div class="alert alert-success alert-dismissible fade show" role="alert">
											              Data produk <strong>berhasil</strong> diupdate.
											            </div>
											          </div>
											        </div>');
			redirect('admin/produk');
		}
	}

	public function status($id)
	{
		$data['produk'] = $this->Produk_model->getProdukById($id);

		if ($data['produk']['status_produk'] == 1) {
			$this->db->set('status_produk', '0');
			$this->db->where('id_produk', $id);
			$this->db->update('tb_produk');
		} elseif ($data['produk']['status_produk'] == 0) {
			$this->db->set('status_produk', '1');
			$this->db->where('id_produk', $id);
			$this->db->update('tb_produk');
		}
		$this->session->set_flashdata('alert', '<div class="form-row">
                                                      <div class="form-group col-md-12">
                                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                          Status <strong>berhasil</strong> diubah.
                                                        </div>
                                                      </div>
                                                    </div>');
		redirect('admin/produk');
	}
}

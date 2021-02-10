<?php

class Profil extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('Kategori_model');
		$this->load->model('Produk_model');
		$this->load->model('Profil_model');
		$this->load->model('Info_model');
		cek_user();
	}

	public function index()
	{
		$data['judul'] = 'Profil';
		$data['tb_kategori'] = $this->Kategori_model->getAllKategori();
		$data['info'] = $this->Info_model->getInfo();
		$data['user'] = cek_session_user();
		$data['keranjang'] = $this->Produk_model->getAllProduk();
		$data['total_transaksi'] = $this->Profil_model->getSuccessInvoice();
		$data['total_belanja'] = $this->Profil_model->getTotalBelanja();

		$this->load->view('user/header', $data);
		$this->load->view('user/menu', $data);
		$this->load->view('user/profil', $data);
		$this->load->view('user/footer', $data);
	}

	public function edit()
	{
		$data['judul'] = 'Profil';
		$data['tb_kategori'] = $this->Kategori_model->getAllKategori();
		$data['info'] = $this->Info_model->getInfo();
		$data['user'] = cek_session_user();
		$data['keranjang'] = $this->Produk_model->getAllProduk();

		$this->form_validation->set_rules('nama_user', 'Nama', 'required', [
			'required' => 'Nama Lengkap harus diisi'
		]);
		if ($this->form_validation->run() == false) {
			$this->load->view('user/header', $data);
			$this->load->view('user/menu', $data);
			$this->load->view('user/profil_edit', $data);
			$this->load->view('user/footer', $data);
		} else {
			$gambar = $_FILES['gambar']['name'];
			$file_name = strtolower($data['user']['nama_user'] . "-" . $data['user']['id_user']);

			if ($gambar) {
				$config['upload_path'] = './assets/img_user/temp/';
				$config['allowed_types'] = 'jpeg|jpg|png';
				$config['max_size']  = '5120';
				$config['max_width']  = '1440';
				$config['max_height']  = '1440';
				$config['file_name'] = $file_name;


				$this->load->library('upload', $config);

				if (!$this->upload->do_upload('gambar')) {
					$this->session->set_flashdata('alert', '<div class="row">
				<div class="col-12">
					<div class="alert alert-danger" role="alert">
					  Foto yang anda upload tidak sesuai syarat.
					</div>
				</div>
			</div>');
					redirect('profil/edit');
				} else {
					$old_image = $data['user']['img_user'];
					if ($old_image != 'default.png') {
						unlink(FCPATH . 'assets/img_user/' . $old_image);
					}

					$gambar_baru = $this->upload->data();

					$config['image_library'] = 'gd2';
					$config['source_image'] = './assets/img_user/temp/' . $gambar_baru['file_name'];
					$config['width'] = 480;
					$config['height'] = 480;
					$config['quality'] = '90%';
					$config['maintain_ratio'] = FALSE;
					$config['new_image'] = './assets/img_user/' . $gambar_baru['file_name'];

					$this->load->library('image_lib', $config);

					$this->image_lib->resize();

					unlink(FCPATH . 'assets/img_user/temp/' . $gambar_baru['file_name']);

					$nama_user = $this->input->post('nama_user');
					$id = $this->input->post('id_user');


					$data = [
						"nama_user" => htmlspecialchars($this->input->post('nama_user', true)),
						"img_user" => $gambar_baru['file_name']
					];
					$this->db->where('id_user', $id);
					$this->db->update('tb_user', $data);
				}
			} else {
				$nama_user = $this->input->post('nama_user');
				$id = $this->input->post('id_user');


				$data = [
					"nama_user" => htmlspecialchars($this->input->post('nama_user', true))
				];
				$this->db->where('id_user', $id);
				$this->db->update('tb_user', $data);
			}


			$this->session->set_flashdata('alert', '<div class="row">
				<div class="col-12">
					<div class="alert alert-success" role="alert">
					  Profil berhasil diperbarui.
					</div>
				</div>
			</div>');
			redirect('profil/edit');
		}
	}

	public function hapus_foto_profil()
	{
		$data['user'] = cek_session_user();

		$old_image = $data['user']['img_user'];
		if ($old_image != 'default.png') {
			unlink(FCPATH . 'assets/img_user/' . $old_image);
		}

		$id = $data['user']['id_user'];

		$data = ["img_user" => "default.png"];

		$this->db->where('id_user', $id);
		$this->db->update('tb_user', $data);

		$this->session->set_flashdata('alert', '<div class="row">
				<div class="col-12">
					<div class="alert alert-success" role="alert">
					  Foto profil berhasil dihapus.
					</div>
				</div>
			</div>');
		redirect('profil/edit', 'refresh');
	}

	public function ubah_password()
	{
		$data['judul'] = 'Profil';
		$data['tb_kategori'] = $this->Kategori_model->getAllKategori();
		$data['info'] = $this->Info_model->getInfo();
		$data['user'] = cek_session_user();
		$data['keranjang'] = $this->Produk_model->getAllProduk();

		$this->form_validation->set_rules('password', 'Password Lama', 'required|trim|min_length[4]', ['min_length' => 'Password terlalu pendek', 'required' => 'Password lama harus diisi']);
		$this->form_validation->set_rules('passwordbaru', 'Password Baru', 'required|trim|min_length[4]|matches[passwordbaru2]', ['min_length' => 'Password terlalu pendek', 'required' => 'Password baru harus diisi', 'matches' => 'Password tidak cocok']);
		$this->form_validation->set_rules('passwordbaru2', 'Konfirmasi Password', 'required|trim|min_length[4]|matches[passwordbaru]');

		if ($this->form_validation->run() == true) {
			if (password_verify($this->input->post('password', true), $data['user']['password'])) {

				$data = [
					"password" => password_hash($this->input->post('passwordbaru', true), PASSWORD_DEFAULT)
				];

				$this->db->where('id_user', $this->input->post('id_user'));
				$this->db->update('tb_user', $data);
				$this->session->set_flashdata('alert', '<div class="row">
	                <div class="col-12">
	                    <div class="alert alert-success" role="alert">
	                      Password berhasil diperbarui.
	                    </div>
	                </div>
	            </div>');
			} else {
				$this->session->set_flashdata('alert', '<div class="row">
	                <div class="col-12">
	                    <div class="alert alert-danger" role="alert">
	                      Password lama salah. Silahkan coba lagi.
	                    </div>
	                </div>
	            </div>');
			}
			redirect('profil/ubah_password');
		} else {
			$this->load->view('user/header', $data);
			$this->load->view('user/menu', $data);
			$this->load->view('user/profil_password', $data);
			$this->load->view('user/footer', $data);
		}
	}

	public function pesanan($id = null)
	{

		$data['judul'] = 'Profil';
		$data['tb_kategori'] = $this->Kategori_model->getAllKategori();
		$data['info'] = $this->Info_model->getInfo();
		$data['user'] = cek_session_user();
		$data['keranjang'] = $this->Produk_model->getAllProduk();

		$data['pesanan_all'] = $this->Profil_model->getAllPesanan();
		$data['pesanan_baru'] = $this->Profil_model->getPesananBaru();
		$data['pesanan_diproses'] = $this->Profil_model->getPesananDiproses();
		$data['pesanan_dikirim'] = $this->Profil_model->getPesananDikirim();
		$data['pesanan_dibatalkan'] = $this->Profil_model->getPesananDibatalkan();
		$data['pesanan_selesai'] = $this->Profil_model->getPesananSelesai();
		$data['item'] = $this->Profil_model->getInvoiceDetail($id);
		$data['pesanan'] = $this->Profil_model->getPesananById($id);

		if ($id == null) {
			$this->load->view('user/header', $data);
			$this->load->view('user/menu', $data);
			$this->load->view('user/pesanan', $data);
			$this->load->view('user/footer', $data);
		} elseif ($data['pesanan']!=null) {
			// Lihat rincian pesanan
			$this->load->view('user/header', $data);
			$this->load->view('user/pesanan_view', $data);
			$this->load->view('user/footer', $data);
		} else {
			redirect('error');
		}
	}

	public function batal($id)
	{
		$data['pesanan'] = $this->Profil_model->getPesananById($id);

		if ($data['pesanan']['status'] != "Baru") {
			redirect('error');
		} else {
			$this->db->set('status', 'Dibatalkan');
			$this->db->where('id_invoice', $id);
			$this->db->update('tb_invoice');
			$this->session->set_flashdata('batal', 'swal');
			redirect('profil/pesanan');
		}
	}

	public function konfirmasi($id)
	{
		$data['pesanan'] = $this->Profil_model->getPesananById($id);

		if ($data['pesanan']['status'] != "Dikirim") {
			redirect('error');
		} else {
			$this->db->set('status', 'Selesai');
			$this->db->where('id_invoice', $id);
			$this->db->update('tb_invoice');
			$this->session->set_flashdata('confirm', 'swal');
			redirect('profil/pesanan');
		}
	}
}

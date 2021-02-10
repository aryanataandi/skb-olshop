<?php

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Produk_model');
        $this->load->model('Info_model');
        $this->load->model('Kategori_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['judul']  = 'Beranda';
        $data['user'] = cek_session_user();
        $data['info'] = $this->Info_model->getInfo();
        $data['keranjang'] = $this->Produk_model->getAllActiveProduk();

        $this->load->model('Banner_model');
        $data['produk'] = $this->Produk_model->getSomeProduk(10);
        $data['terbaru'] = $this->Produk_model->getProdukTerbaru(8);
        $data['diskon'] = $this->Produk_model->getProdukDiskon();
        $data['max_diskon'] = $this->Produk_model->getMaxDiskon();
        $data['tb_kategori'] = $this->Kategori_model->getAllKategori();
        $data['tb_banner'] = $this->Banner_model->getAllBanner();
        $this->load->view('user/header', $data);
        $this->load->view('user/index', $data);
        $this->load->view('user/footer');
    }

    public function detail($nama = null)
    {
        $data['user'] = cek_session_user();
        $data['info'] = $this->Info_model->getInfo();
        $data['keranjang'] = $this->Produk_model->getAllActiveProduk();

        $data['produk'] = $this->Produk_model->getProdukByNama($nama);
        $data['rekomendasi'] = $this->Produk_model->getSomeProduk(10);
        $data['tb_kategori'] = $this->Kategori_model->getAllKategori();
        $data['judul']  = $data['produk']['nama_produk'];

        if ($data['produk'] == null) {
            redirect('error');
        } elseif ($data['produk']['status_produk'] == 0) {
            $this->load->view('user/off', $data);
        } else {
            $this->load->view('user/header', $data);
            $this->load->view('user/detail', $data);
            $this->load->view('user/footer');
        }
    }

    public function kategori($kategori = "")
    {
        $data['judul'] = 'Kategori ' . ucwords(urltostr($kategori));
        $data['header'] = ucwords(str_replace("-", " ", $kategori));
        $data['info'] = $this->Info_model->getInfo();
        $data['keranjang'] = $this->Produk_model->getAllActiveProduk();
        $data['user'] = cek_session_user();
        $data['tb_kategori'] = $this->Kategori_model->getAllKategori();
        $data['produk'] = $this->Produk_model->getProdukbyKategori($kategori);

        $this->load->view('user/header', $data);
        $this->load->view('user/result_view', $data);
        $this->load->view('user/footer', $data);
    }

    public function search()
    {
        if ($this->input->post('keyword')) {
            $keyword = $this->input->post('keyword');
        } else {
            redirect('home/all');
        }

        $data['judul'] = 'Pencarian';
        $data['header'] = 'Hasil pencarian "' . $keyword . '"';
        $data['info'] = $this->Info_model->getInfo();
        $data['keranjang'] = $this->Produk_model->getAllActiveProduk();
        $data['user'] = cek_session_user();
        $data['tb_kategori'] = $this->Kategori_model->getAllKategori();
        $data['produk'] = $this->Produk_model->search($keyword);

        $this->load->view('user/header', $data);
        $this->load->view('user/result_view', $data);
        $this->load->view('user/footer', $data);
    }

    public function all()
    {
        $data['judul'] = 'Semua Produk';
        $data['header'] = 'Katalog Produk';
        $data['info'] = $this->Info_model->getInfo();
        $data['keranjang'] = $this->Produk_model->getAllActiveProduk();
        $data['user'] = cek_session_user();
        $data['tb_kategori'] = $this->Kategori_model->getAllKategori();
        $data['produk'] = $this->Produk_model->getAllActiveProduk();

        $this->load->view('user/header', $data);
        $this->load->view('user/result_view', $data);
        $this->load->view('user/footer', $data);
    }

    public function keranjang()
    {
        $data['judul'] = 'Keranjang Belanja';
        $data['user'] = cek_session_user();
        $data['info'] = $this->Info_model->getInfo();
        $data['produk'] = $this->Produk_model->getAllActiveProduk();
        $data['keranjang'] = $this->Produk_model->getAllActiveProduk();
        $data['tb_kategori'] = $this->Kategori_model->getAllKategori();

        $this->load->view('user/header', $data);
        $this->load->view('user/keranjang', $data);
        $this->load->view('user/footer');
    }

    public function checkout()
    {
        $this->load->model('Invoice_model');

        $data['judul'] = 'Pemesanan';
        $data['user'] = cek_session_user();
        $data['tb_kategori'] = $this->Kategori_model->getAllKategori();
        $data['keranjang'] = $this->Produk_model->getAllActiveProduk();
        $data['info'] = $this->Info_model->getInfo();
        $data['produk'] = $this->Produk_model->getAllActiveProduk();
        $this->load->model('Invoice_model');

        cek_user();

        if (!$this->cart->contents()) {
            $this->session->set_flashdata('swal', 'err');
            redirect('home');
            die;
        }

        $this->form_validation->set_rules('nama', 'Nama Penerima', 'required', ['required' => 'Nama harus diisi']);
        $this->form_validation->set_rules('telp', 'Nomor Telepon/HP', 'required|numeric|min_length[11]', ['required' => 'Nomor Telp/HP harus diisi', 'numeric' => 'Nomor Telepon tidak valid', 'min_length' => 'Nomor Telepon tidak valid']);
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('kelurahan', 'Kelurahan', 'required');
        $this->form_validation->set_rules('kecamatan', 'Kecamatan', 'required');
        $this->form_validation->set_rules('kode_pos', 'Kode Pos', 'required|numeric|max_length[5]');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('user/header', $data);
            $this->load->view('user/pemesanan', $data);
            $this->load->view('user/footer');
        } else {
            $this->Invoice_model->tambahInvoice();
            redirect('home/pembayaran');
        }
    }

    public function pembayaran()
    {
        $this->cart->destroy();
        redirect('profil/pesanan');
    }

    // Keranjang Belanja 'Cart'
    public function addcart($id)
    {
        $produk = $this->Produk_model->find($id);

        $this->form_validation->set_rules('qty', 'Jumlah', 'required');
        if ($this->form_validation->run() == true) {
            $data = array(
                'id' => $produk['id_produk'],
                'qty' => $this->input->post('qty'),
                'price' => $produk['harga_produk'] - ($produk['diskon_produk'] / 100) * $produk['harga_produk'],
                'name' => $produk['nama_produk']
            );

            $this->cart->insert($data);
            $this->session->set_flashdata('alert', 'test');
            redirect('home/detail/' . strtourl($produk['nama_produk']));
        }
    }

    public function addcartinstant($id)
    {
        $produk = $this->Produk_model->find($id);

        if ($produk['stok_produk'] == 0) {
            $this->session->set_flashdata('fail', 'test');
            redirect('home/detail/' . strtourl($produk['nama_produk']));
        } else {

            $data = array(
                'id' => $produk['id_produk'],
                'qty' => 1,
                'price' => $produk['harga_produk'] - ($produk['diskon_produk'] / 100) * $produk['harga_produk'],
                'name' => $produk['nama_produk']
            );

            $this->cart->insert($data);
            $this->session->set_flashdata('swal', 'add');
            redirect('home/keranjang');
        }
    }

    public function delitem($rowid)
    {
        $data = [
            'rowid' => $rowid,
            'qty' => 0
        ];

        $this->cart->update($data);
        $this->session->set_flashdata('alert', '<div class="alert alert-warning" role="alert">
          Barang berhasil dihapus
        </div>');
        redirect('home/keranjang');
    }

    public function delcart()
    {
        $this->cart->destroy();
        redirect('home/keranjang');
    }

    // API Rajaongkir
    private $api_key = '3a34e653f7296b286d5c2d74cf67df36';

    public function provinsi()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
            CURLOPT_SSL_VERIFYHOST => 0,
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "key: $this->api_key"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        $array_response = json_decode($response, true);
        $status = $array_response['rajaongkir']['status']['code'];
        $provinsi = $array_response['rajaongkir']['results'];

        if ($err) {
            echo "cURL Error #:" . $err;
        } elseif ($status == 200) {
            echo "<option value=''>- Pilih provinsi -</option>";
            foreach ($provinsi as $key => $value) {
                echo "<option value='" . $value['province_id'] . "' id_provinsi='" . $value['province_id'] . "' nama_provinsi='" . $value['province'] . "'>" . $value['province'] . "</option>";
            }
        } elseif ($status != 200) {
            echo "<option value=''>Harap tunggu..</option>";
        }
    }

    public function kota()
    {
        $id_selected_provinsi = $this->input->post('id_provinsi');

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/city?province=" . $id_selected_provinsi,
            CURLOPT_SSL_VERIFYHOST => 0,
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "key: $this->api_key"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $array_response = json_decode($response, true);
            $kota = $array_response['rajaongkir']['results'];
            echo "<option value=''>- Pilih provinsi -</option>";
            foreach ($kota as $key => $value) {
                echo "<option value='" . $value['city_id'] . "' id_kota='" . $value['city_id'] . "' nama_kota='";
                if ($value['type'] == "Kabupaten") {
                    echo "Kab. " . $value['city_name'];
                } else {
                    echo $value['type'] . " " . $value['city_name'];
                }
                echo "'>" . $value['type'] . " " . $value['city_name'] . "</option>";
            }
        }
    }

    public function kurir()
    {
        echo "<option value=''>- Pilih kurir -</option>";
        echo "<option value='jne'>JNE</option>";
        echo "<option value='tiki'>TIKI</option>";
        echo "<option value='pos'>POS Indonesia</option>";
    }

    public function layanan()
    {
        $asal_kota = "386"; // Salatiga
        $kota = $this->input->post('id_kota');
        $berat = $this->input->post('berat');
        $kurir = $this->input->post('kurir');

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
            CURLOPT_SSL_VERIFYHOST => 0,
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "origin=" . $asal_kota . "&destination=" . $kota . "&weight=" . $berat . "&courier=" . $kurir,
            CURLOPT_HTTPHEADER => array(
                "content-type: application/x-www-form-urlencoded",
                "key: $this->api_key"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $array_response = json_decode($response, true);
            $layanan = $array_response['rajaongkir']['results'][0]['costs'];
            echo "<option value=''>- Pilih layanan -</option>";
            foreach ($layanan as $key => $value) {
                echo "<option value='" . $value['service'] . "' ongkir='" . $value['cost'][0]['value'] . "' ekspedisi='" . strtoupper($kurir) . " - " . $value['service'] . "'>" . $value['service'] . " (" . $value['cost'][0]['etd'] . " Hari) " . getRupiah($value['cost'][0]['value']) . "</option>";
            }
        }
    }
}

<?php

class Users extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Users_model');
        $this->load->library('form_validation');
        $this->load->model('Info_model');
        cek_admin();
    }

    public function index()
    {
        $data['judul'] = 'User';
        $data['info'] = $this->Info_model->getInfo();

        // Ambil session
        $data['admin'] = cek_session_admin();

        $data['header'] = 'Tabel User';
        $this->load->library('pagination');

        $data['tb_user'] = $this->Users_model->getAllUsers();

        $this->load->view('template/header', $data);
        $this->load->view('admin/users', $data);
        $this->load->view('template/footer');
    }

    public function edit($id)
    {
        $data['judul'] = 'Edit user';
        $data['info'] = $this->Info_model->getInfo();
        $data['users'] = $this->Users_model->getUserById($id);

        // Ambil session
        $data['admin'] = cek_session_admin();

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('password', 'Password', 'trim|min_length[4]');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('admin/users_edit', $data);
            $this->load->view('template/footer');
        } else {
            if ($this->input->post('password')) {
                $data = [
                    "nama_user" => htmlspecialchars($this->input->post('nama', true)),
                    "password" => password_hash($this->input->post('password', true), PASSWORD_DEFAULT),
                    "is_active" => $this->input->post('status')
                ];
            } else {
                $data = [
                    "nama_user" => htmlspecialchars($this->input->post('nama', true)),
                    "is_active" => $this->input->post('status')
                ];
            }

            $this->db->where('id_user', $this->input->post('id'));
            $this->db->update('tb_user', $data);

            $this->session->set_flashdata('alert', '<div class="form-row">
                                                      <div class="form-group col-md-12">
                                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                          Data user <strong>berhasil</strong> diubah.
                                                        </div>
                                                      </div>
                                                    </div>');
            redirect('admin/users');
        }
    }

    public function hapus($id)
    {
        $this->Users_model->hapusDataUser($id);
        $this->session->set_flashdata('alert', 'dihapus');
        redirect('admin/users');
    }

    public function status($id)
    {
        $data['users'] = $this->Users_model->getUserById($id);

        if ($data['users']['is_active'] == 1) {
            $this->db->set('is_active', '0');
            $this->db->where('id_user', $id);
            $this->db->update('tb_user');
        } elseif ($data['users']['is_active'] == 0) {
            $this->db->set('is_active', '1');
            $this->db->where('id_user', $id);
            $this->db->update('tb_user');
        }
        $this->session->set_flashdata('alert', '<div class="form-row">
                                                      <div class="form-group col-md-12">
                                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                          Status <strong>berhasil</strong> diubah.
                                                        </div>
                                                      </div>
                                                    </div>');
        redirect('admin/users');
    }
}

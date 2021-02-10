<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Auth_model');
        $this->load->model('Info_model');
    }

    public function index()
    {
        if ($this->session->userdata('email')) {
            redirect('home');
            die;
        }

        $data['info'] = $this->Info_model->getInfo();
        $data['judul'] = 'Login' . ' | ' . $data['info']['judul_web'];

        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required', ['required' => 'Password harus diisi!']);

        if ($this->form_validation->run() == false) {
            $this->load->view('auth/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('auth/auth_footer');
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('tb_user', ['email' => $email])->row_array();

        if ($user) {
            if ($user['is_active'] == 1) {
                if (password_verify($password, $user['password'])) {
                    $data = ['email' => $user['email']];

                    $this->session->set_userdata($data);
                    redirect('home');
                } else {
                    $this->session->set_flashdata('danger', 'Password salah');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('danger', 'Email belum diaktifkan');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('danger', 'Email tidak terdaftar');
            redirect('auth');
        }
    }

    public function registrasi()
    {
        $data['info'] = $this->Info_model->getInfo();
        $data['judul'] = 'Registrasi' . ' | ' . $data['info']['judul_web'];

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[tb_user.email]', [
            'is_unique' => 'Email sudah terdaftar!'
        ]);
        $this->form_validation->set_rules(
            'password',
            'Password',
            'required|trim|min_length[4]|matches[password2]',
            [
                'matches' => 'Password tidak cocok!',
                'min_length' => 'Password terlalu pendek'
            ]
        );
        $this->form_validation->set_rules('password2', 'Konfirmasi', 'required|trim|matches[password]');

        if ($this->form_validation->run() == false) {
            $this->load->view('auth/auth_header', $data);
            $this->load->view('auth/registrasi');
            $this->load->view('auth/auth_footer');
        } else {
            $this->Auth_model->registrasi();
            redirect('auth');
        }
    }

    public function admin()
    {
        if ($this->session->userdata('username')) {
            redirect('admin');
            die;
        }

        $data['info'] = $this->Info_model->getInfo();
        $data['judul'] = 'Login Admin' . ' | ' . $data['info']['judul_web'];

        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->load->view('auth/admin', $data);
        } else {
            $this->_admin();
            redirect('admin');
        }
    }

    private function _admin()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $admin = $this->db->get_where('tb_admin', ['username' => $username])->row_array();

        if ($admin) {
            if ($admin['is_active'] == 1) {
                if ($password == $admin['password']) {
                    $data = ['username' => $admin['username']];

                    $this->session->set_userdata($data);
                    $this->session->set_flashdata('welcome', 'Selamat Datang');
                    redirect('admin');
                } else {
                    $this->session->set_flashdata('danger', 'Password salah');
                    redirect('auth/admin');
                }
            } else {
                $this->session->set_flashdata('danger', 'Status User ini tidak aktif');
                redirect('auth/admin');
            }
        } else {
            $this->session->set_flashdata('danger', 'User tidak ditemukan');
            redirect('auth/admin');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->set_flashdata('logout', 'Logout berhasil');
        redirect('auth');
    }

    public function logout_admin()
    {
        $this->session->unset_userdata('username');
        $this->session->set_flashdata('logout', 'Logout berhasil');
        redirect('auth/admin');
    }
}

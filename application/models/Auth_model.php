<?php

class Auth_model extends CI_Model
{
    public function registrasi()
    {
        $data = [
            "nama_user" => htmlspecialchars($this->input->post('nama', true)),
            "email" => htmlspecialchars($this->input->post('email', true)),
            "img_user" => 'default.png',
            "password" => password_hash($this->input->post('password', true), PASSWORD_DEFAULT),
            "is_active" => 1,
            "tanggal_user" => time()
        ];

        $this->db->insert('tb_user', $data);
        $this->session->set_flashdata('alert', 'Akun berhasil dibuat, silahkan login untuk masuk.');
    }
}

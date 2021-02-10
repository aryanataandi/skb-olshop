<?php

class Users_model extends CI_Model
{
    public function getAllUsers()
    {
        return $this->db->get('tb_user')->result_array();
    }

    public function getUserById($id)
    {
        return $this->db->get_where('tb_user', ['id_user' => $id])->row_array();
    }

    public function tambahDataUser()
    {
        $data = [
            "nama_user" => htmlspecialchars($this->input->post('nama', true)),
            "email" => htmlspecialchars($this->input->post('email', true)),
            "img_user" => 'default.png',
            "password" => password_hash($this->input->post('password', true), PASSWORD_DEFAULT),
            "is_active" => $this->input->post('status'),
            "tanggal_user" => time()
        ];

        $this->db->insert('tb_user', $data);
    }

    public function hapusDataUser($id)
    {
        $this->db->where('id_user', $id);
        $this->db->delete('tb_user');
    }

    // Pagination + Search
    public function getUsers($limit, $start, $keyword = null)
    {
        if ($keyword) {
            $this->db->like('nama_user', $keyword);
            $this->db->or_like('email', $keyword);
        }
        return $this->db->get('tb_user', $limit, $start)->result_array();
    }
}

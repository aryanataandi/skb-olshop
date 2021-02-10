<?php

function cek_admin() {
	$ci = get_instance();
    if (!$ci->session->userdata('username')) {
        redirect('auth/admin');
    }
}

function cek_user() {
	$ci = get_instance();
    if (!$ci->session->userdata('email')) {
        $ci->session->set_flashdata('danger', 'Anda harus login terlebih dahulu');
        redirect('auth');
    } 
    // elseif($ci->session->userdata('is_active') == 0) {
    //     $ci->session->unset_userdata('email');
    //     $ci->session->set_flashdata('danger', 'Akun anda telah dinonaktifkan');
    //     redirect('auth');
    // }
}

function cek_session_admin() {
	$ci = get_instance();
	return $ci->db->get_where('tb_admin', ['username' => $ci->session->userdata('username')])->row_array();
}

function cek_session_user() {
    $ci = get_instance();
    return $ci->db->get_where('tb_user', ['email' => $ci->session->userdata('email')])->row_array();
}

function getRupiah($value) {
    $rupiah = "Rp" . number_format($value,0,'.','.');
    return $rupiah;
}

function strtourl($produk) {
    $url = str_replace(" ", "-", $produk);
    $url = strtolower($url);
    $url = urlencode($url);
    return $url;
}

function urltostr($produk) {
    $url = urldecode($produk);
    $url = str_replace("-", " ", $url);
    return $url;
}
<?php

class Cetak_model extends CI_Model
{
    function get_tahun()
    {
        return $this->db->query("SELECT YEAR(tgl_pesan) AS tahun FROM tb_invoice WHERE status = 'Selesai' GROUP BY YEAR(tgl_pesan) ORDER BY YEAR(tgl_pesan) ASC")->result_array();
    }

    function filter_tanggal($tanggal_awal, $tanggal_akhir)
    {
        return $this->db->query("SELECT * FROM tb_invoice WHERE tgl_pesan BETWEEN '$tanggal_awal' AND '$tanggal_akhir' ORDER BY tgl_pesan ASC")->result_array();
    }

    function filter_bulan($tahun, $bulan_awal, $bulan_akhir)
    {
        return $this->db->query("SELECT * FROM tb_invoice WHERE YEAR(tgl_pesan) = '$tahun' AND MONTH(tgl_pesan) BETWEEN '$bulan_awal' AND '$bulan_akhir' AND status = 'Selesai' ORDER BY tgl_pesan ASC")->result_array();
    }

    function filter_tahun($filter_tahun)
    {
        return $this->db->query("SELECT * FROM tb_invoice WHERE YEAR(tgl_pesan) = '$filter_tahun' AND status = 'Selesai' ORDER BY tgl_pesan ASC")->result_array();
    }
}

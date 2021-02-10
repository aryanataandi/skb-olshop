<?php

class Info_model extends CI_Model
{
	public function getInfo()
	{
		return $this->db->get_where('tb_info', ['id_info', 1])->row_array();
	}
}
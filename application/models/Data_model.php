<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_model extends CI_Model
{
    public function getDataSurat()
    {
        return $this->db->get('data_surat')->result_array();
    }
}
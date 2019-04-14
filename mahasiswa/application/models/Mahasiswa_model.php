<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa_model extends CI_Model
{
   private $table    = 'tbl_mahasiswa';

   public function add($id_user)
   {
      $data = array(
        'nim' => $this->input->post('nim'),
        'nama' => $this->input->post('nama'),
        'jumlah_sks' => $this->input->post('jumlah_sks'),
        'ipk' => $this->input->post('ipk'),
        'dosen_id' => $this->input->post('dosen_id'),
        'bukti_pembayaran' => $this->input->post('bukti_pembayaran'),
        'user_id' => $id_user
      );

      return $this->db->insert($this->table, $data);
   }

   public function get($where = '1 = 1') {

      $query = $this->db->get_where($this->table, $where);

      if ($query->num_rows() > 0) {
         foreach ($query->result() as $row) {
            $data[] = $row;
         }
         return $data;
      }

      return false;
   }

   public function get_for_session($where = '1 = 1') {

      $query = $this->db->get_where($this->table, $where);

      if ($query->num_rows() > 0) {
         $row = $query->row_array();
         $this->session->set_userdata('userdata', $row);
      }
   }
}
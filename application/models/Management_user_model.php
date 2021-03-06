<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Management_user_model extends CI_Model
{
   private $table    = 'tbl_dosen';

   public function record_count() {
      return $this->db->count_all($this->table);
   }

   public function fetch_data($limit, $start) {
      $this->db->limit($limit, $start);

      $query = $this->db->get($this->table);

      if ($query->num_rows() > 0) {
         foreach ($query->result() as $row) {
            $data[] = $row;
         }
         return $data;
      }

      return false;
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

   public function add($id_user)
   {
      $data = array(
        'nip' => $this->input->post('nip'),
        'nama' => $this->input->post('nama'),
        'user_id' => $id_user
      );

      return $this->db->insert($this->table, $data);
   }

   public function update()
   {
      $id = $this->input->post('id');

      $data = array(
        'nip' => $this->input->post('nip'),
        'nama' => $this->input->post('nama')
      );

      $this->db->where('id', $id);
      return $this->db->update($this->table, $data);
   }

   public function delete($id)
   {

      $this->db->where('id', $id);
      return $this->db->delete($this->table);
   }
}
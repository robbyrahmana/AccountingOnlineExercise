<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_ujian_model extends CI_Model
{
   private $table    = 'tbl_kategori_ujian';

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

   public function add()
   {
      $data = array(
        'kategori_ujian' => $this->input->post('kategori_ujian')
      );

      return $this->db->insert($this->table, $data);
   }

   public function update()
   {
      $id = $this->input->post('id');

      $data = array(
        'kategori_ujian' => $this->input->post('kategori_ujian')
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

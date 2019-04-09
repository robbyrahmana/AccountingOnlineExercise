<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mata_kuliah_model extends CI_Model
{
   private $table    = 'tbl_mata_kuliah';

   public function record_count() {
      return $this->db->count_all($this->table);
   }

   public function fetch_data($limit, $start) {
      $this->db->select('mk.id, mk.mata_kuliah_cd, mk.mata_kuliah, ku.kategori_ujian, d.nama');
      $this->db->from($this->table . ' mk');
      $this->db->join('tbl_kategori_ujian ku', 'mk.kategori_ujian_id = ku.id', 'left');
      $this->db->join('tbl_dosen d', 'mk.dosen_id = d.id', 'left');
      $this->db->limit($limit, $start);
      $query = $this->db->get();

      if ($query->num_rows() > 0) {
         foreach ($query->result() as $row) {
            $data[] = $row;
         }
         return $data;
      }

      return false;
   }

   public function get($where) {

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
        'mata_kuliah_cd' => $this->input->post('mata_kuliah_cd'),
        'mata_kuliah' => $this->input->post('mata_kuliah'),
        'kategori_ujian_id' => $this->input->post('kategori_ujian_id'),
        'dosen_id' => $this->input->post('dosen_id'),
      );

      return $this->db->insert($this->table, $data);
   }

   public function update()
   {
      $id = $this->input->post('id');

      $data = array(
        'mata_kuliah_cd' => $this->input->post('mata_kuliah_cd'),
        'mata_kuliah' => $this->input->post('mata_kuliah'),
        'kategori_ujian_id' => $this->input->post('kategori_ujian_id'),
        'dosen_id' => $this->input->post('dosen_id'),
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

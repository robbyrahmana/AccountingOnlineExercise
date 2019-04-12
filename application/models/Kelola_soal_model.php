<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelola_soal_model extends CI_Model
{
   private $table    = 'tbl_kelola_soal';

   public function record_count() {
      return $this->db->count_all($this->table);
   }

   public function fetch_data($limit, $start) {
      $this->db->select('ks.id, ks.tanggal, ks.jumlah_soal, ks.waktu, mk.mata_kuliah, ku.kategori_ujian, d.nama');
      $this->db->from($this->table . ' ks');
      $this->db->join('tbl_mata_kuliah mk', 'ks.mata_kuliah_id = mk.id', 'left');
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

   public function fetch_calendar() {
      $this->db->select('ks.id, ks.tanggal, mk.mata_kuliah, ku.kategori_ujian, d.nama');
      $this->db->from($this->table . ' ks');
      $this->db->join('tbl_mata_kuliah mk', 'ks.mata_kuliah_id = mk.id', 'left');
      $this->db->join('tbl_kategori_ujian ku', 'mk.kategori_ujian_id = ku.id', 'left');
      $this->db->join('tbl_dosen d', 'mk.dosen_id = d.id', 'left');
      $query = $this->db->get();

      if ($query->num_rows() > 0) {
         foreach ($query->result() as $row) {
            $data[] = $row;
         }
         return $data;
      }

      return false;
   }

   public function get_join($id = '') {

      $this->db->select('ks.id, ks.tanggal, ks.jumlah_soal, ks.waktu, mk.mata_kuliah, ku.kategori_ujian, d.nama');
      $this->db->from($this->table . ' ks');
      $this->db->join('tbl_mata_kuliah mk', 'ks.mata_kuliah_id = mk.id', 'left');
      $this->db->join('tbl_kategori_ujian ku', 'mk.kategori_ujian_id = ku.id', 'left');
      $this->db->join('tbl_dosen d', 'mk.dosen_id = d.id', 'left');
      if ($id) {
        $this->db->where('ks.id', $id);
      }
      
      $query = $this->db->get();

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

      $tanggal = explode('/', $this->input->post('tanggal'));
      $data = array(
        'mata_kuliah_id' => $this->input->post('mata_kuliah_id'),
        'tanggal' => $tanggal[2] .'-'. $tanggal[0] .'-'. $tanggal[1],
        'jumlah_soal' => $this->input->post('jumlah_soal'),
        'waktu' => $this->input->post('waktu')
      );

      return $this->db->insert($this->table, $data);
   }

   public function update()
   {
      $id = $this->input->post('id');

     $tanggal = explode('/', $this->input->post('tanggal'));
      $data = array(
        'mata_kuliah_id' => $this->input->post('mata_kuliah_id'),
        'tanggal' => $tanggal[2] .'-'. $tanggal[0] .'-'. $tanggal[1],
        'jumlah_soal' => $this->input->post('jumlah_soal'),
        'waktu' => $this->input->post('waktu')
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

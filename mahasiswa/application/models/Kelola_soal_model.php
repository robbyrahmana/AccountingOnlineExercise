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
      $this->db->where('d.id', $this->session->userdata('userdata')['dosen_id']);
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
}

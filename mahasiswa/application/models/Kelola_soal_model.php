<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelola_soal_model extends CI_Model
{
   private $table    = 'tbl_kelola_soal';

   public function record_count() {
      return $this->db->count_all($this->table);
   }

   public function fetch_data($limit, $start) {
      $kelola_soal_id = $this->get_existing_kelola_mahasiswa();

      $this->db->select('ks.id, ks.tanggal, ks.jumlah_soal, ks.waktu, mk.mata_kuliah, ku.kategori_ujian, d.nama');
      $this->db->from($this->table . ' ks');
      $this->db->join('tbl_mata_kuliah mk', 'ks.mata_kuliah_id = mk.id', 'inner');
      $this->db->join('tbl_kategori_ujian ku', 'mk.kategori_ujian_id = ku.id', 'inner');
      $this->db->join('tbl_dosen d', 'mk.dosen_id = d.id', 'inner');
      $this->db->where('d.id', $this->session->userdata('userdata')['dosen_id']);
      $this->db->where_not_in('ks.id', $kelola_soal_id);
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

   public function get_existing_kelola_mahasiswa() {
      $query1 = $this->db->query('select `kelola_soal_id` from tbl_kelola_soal_mahasiswa where mahasiswa_id = '.$this->session->userdata('userdata')['id']);
      $query1_result = $query1->result();
      $data_id= array();
      foreach($query1_result as $row){
         $data_id[] = $row->kelola_soal_id;
      }
      $kelola_soal = implode(",",$data_id);
      return explode(",", $kelola_soal);
   }
}

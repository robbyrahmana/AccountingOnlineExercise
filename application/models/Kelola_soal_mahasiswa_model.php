<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelola_soal_mahasiswa_model extends CI_Model
{
   private $table    = 'tbl_kelola_soal_mahasiswa';

   public function get_siswa_by_kelola_soal_id($kelola_soal_id) {

      $this->db->select('ksm.id, m.nim, m.nama, m.jumlah_sks, m.ipk, d.nama nama_dosen, m.bukti_pembayaran, ksm.tanggal, ksm.nilai');
      $this->db->from($this->table . ' ksm');
      $this->db->join('tbl_mahasiswa m', 'ksm.mahasiswa_id = m.id', 'inner');
      $this->db->join('tbl_dosen d', 'm.dosen_id = d.id', 'inner');
      $this->db->where('ksm.kelola_soal_id', $kelola_soal_id);
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

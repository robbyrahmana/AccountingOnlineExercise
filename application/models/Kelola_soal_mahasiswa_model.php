<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelola_soal_mahasiswa_model extends CI_Model
{
   private $table    = 'tbl_kelola_soal_mahasiswa';

   public function get_siswa_by_kelola_soal_id($kelola_soal_id) {

      $this->db->select('ksm.id, m.id mahasiswa_id, m.nim, m.nama, m.jumlah_sks, m.ipk, d.nama nama_dosen, m.bukti_pembayaran, ksm.tanggal, ksm.nilai, (select count(1) from tbl_kelola_soal_jawaban where nilai = \'\' and kelola_soal_mahasiswa_id = ksm.id) as total_essai');
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

   public function get_soal_essai_by_kelola_mahasiswa_id($id_kelola_soal_mahasiswa, $mahasiswa_id) {
      
      $this->db->select('ksj.id, s.soal, s.jawaban, ksj.jawaban jawaban_mahasiswa, ksj.nilai, s.bobot_nilai, ksm.id id_kelola_mahasiswa, ksm.nilai final_result');
      $this->db->from($this->table . ' ksm');
      $this->db->join('tbl_kelola_soal_soal kss', 'ksm.kelola_soal_id = kss.kelola_soal_id', 'inner');
      $this->db->join('tbl_soal s', 'kss.soal_id = s.id', 'inner');
      $this->db->join('tbl_kelola_soal_jawaban ksj', 'ksm.id = ksj.kelola_soal_mahasiswa_id and ksj.soal_id = s.id', 'inner');
      $this->db->where('ksm.id', $id_kelola_soal_mahasiswa);
      $this->db->where('s.tipe_soal', '0');
      $this->db->where('ksm.mahasiswa_id', $mahasiswa_id);
      $query = $this->db->get();
      if ($query->num_rows() > 0) {
         foreach ($query->result() as $row) {
            $data[] = $row;
         }
         return $data;
      }

      return false;
   }

   public function update()
   {
      $id = $this->input->post('id');
      $data = array(
        'nilai' => $this->input->post('nilai')
      );

      $this->db->where('id', $id);
      $this->db->update('tbl_kelola_soal_jawaban', $data);

      $id_kelola_mahasiswa = $this->input->post('id_kelola_mahasiswa');
      $data = array(
        'nilai' => $this->input->post('final_result') + $this->input->post('nilai')
      );

      $this->db->where('id', $id_kelola_mahasiswa);
      
      return $this->db->update('tbl_kelola_soal_mahasiswa', $data);
   }
}

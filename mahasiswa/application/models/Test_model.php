<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test_model extends CI_Model
{
   private $table    = 'tbl_soal';

   public function get_soal($id) {
      $this->db->select('s.id, j.id jawaban_id, s.tipe_soal, s.soal, s.jawaban, j.jawaban_a, j.jawaban_b, j.jawaban_c, j.jawaban_d, j.jawaban_essai');
      $this->db->from('tbl_kelola_soal_soal kss');
      $this->db->join('tbl_soal s', 'kss.soal_id = s.id', 'left');
      $this->db->join('tbl_soal_jawaban j', 's.soal_jawaban_id = j.id', 'left');
      $this->db->where('kss.kelola_soal_id', $id);
      $query = $this->db->get();

      if ($query->num_rows() > 0) {
         foreach ($query->result() as $row) {
            $data[] = $row;
         }
         shuffle($data);
         $this->session->set_userdata('soal', $data);
      }

      return false;
   }

   public function get_time($id) {
      $query = $this->db->get_where('tbl_kelola_soal', 'id = '. $id);

      if ($query->num_rows() > 0) {
         $data = $query->row_array();
         $this->session->set_userdata('time', $data['waktu']);
      }

      return false;
   }

   public function add($id, $temp_data = array())
   {
      if ($temp_data['tipe_soal']) {
         $data = array(
            'mahasiswa_id' => $temp_data['mahasiswa_id'],
            'kelola_soal_id' => $temp_data['kelola_soal_id'],
            'soal_id' => $temp_data['soal_id'],
            'kelola_soal_mahasiswa_id' => $id,
            'jawaban' => $temp_data['jawaban'],
            'nilai' => $temp_data['jawaban'] == $temp_data['jawaban_benar'] ? '1' : '0'
         );
         $this->db->insert('tbl_kelola_soal_jawaban', $data);
      } else {
         $data = array(
            'mahasiswa_id' => $temp_data['mahasiswa_id'],
            'kelola_soal_id' => $temp_data['kelola_soal_id'],
            'soal_id' => $temp_data['soal_id'],
            'kelola_soal_mahasiswa_id' => $id,
            'jawaban' => $temp_data['jawaban']
         );
         $this->db->insert('tbl_kelola_soal_jawaban', $data);
      }

      return $this->db->insert_id();
   }

   public function kelola_soal_mahasiswa($id)
   {
      $data = array(
         'mahasiswa_id' => $this->session->userdata('userdata')['id'],
         'kelola_soal_id' => $id,
         'tanggal' => date("Y-m-d")
      );

      $this->db->insert('tbl_kelola_soal_mahasiswa', $data);

      return $this->db->insert_id();
   }

   public function update_nilai_kelola_soal_mahasiswa($kelola_soal_mahasiswa_id, $id_jawaban) 
   {
      $this->db->select('s.bobot_nilai, ksj.nilai, ksm.nilai final_result');
      $this->db->from('tbl_kelola_soal_jawaban ksj');
      $this->db->join('tbl_soal s', 'ksj.soal_id = s.id', 'inner');
      $this->db->join('tbl_kelola_soal_mahasiswa ksm', 'ksj.kelola_soal_mahasiswa_id = ksm.id', 'inner');
      $this->db->where('ksj.id', $id_jawaban);
      $this->db->where('s.tipe_soal', '1');
      $query = $this->db->get();

      if ($query->num_rows() > 0) {
         $data = $query->row_array();
         $final_result = $data['final_result'] + ($data['bobot_nilai'] * $data['nilai']);

         $data = array(
            'nilai' => $final_result
         );

         $this->db->where('id', $kelola_soal_mahasiswa_id);
         $this->db->update('tbl_kelola_soal_mahasiswa', $data);
      }

      
   }

}

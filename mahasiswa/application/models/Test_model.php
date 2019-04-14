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

   public function add()
   {
      $data = array(
         'mahasiswa_id' => $this->input->post('mahasiswa_id'),
         'kelola_soal_id' => $this->input->post('kelola_soal_id'),
         'soal_id' => $this->input->post('soal_id'),
         'jawaban' => $this->input->post('jawaban')
      );

      $this->db->insert($this->table, $data);
   }
}

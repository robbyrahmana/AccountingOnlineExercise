<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Soal_jawaban_model extends CI_Model
{
   private $table    = 'tbl_soal_jawaban';

   public function add_pilihan_ganda()
   {
      $data = array(
        'jawaban_a' => $this->input->post('jawaban_a'),
        'jawaban_b' => $this->input->post('jawaban_b'),
        'jawaban_c' => $this->input->post('jawaban_c'),
        'jawaban_d' => $this->input->post('jawaban_d'),
      );

      $this->db->insert($this->table, $data);

      return $this->db->insert_id();
   }

   public function add_essai()
   {
      $data = array(
        'jawaban_essai' => $this->input->post('jawaban')
      );

      $this->db->insert($this->table, $data);

      return $this->db->insert_id();
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

   public function update_pilihan_ganda()
   {

      $id = $this->input->post('jawaban_id');

      $data = array(
        'jawaban_a' => $this->input->post('jawaban_a'),
        'jawaban_b' => $this->input->post('jawaban_b'),
        'jawaban_c' => $this->input->post('jawaban_c'),
        'jawaban_d' => $this->input->post('jawaban_d'),
      );

      $this->db->where('id', $id);
      return $this->db->update($this->table, $data);
   }

   public function update_essai()
   {

      $id = $this->input->post('jawaban_id');

      $data = array(
        'jawaban_essai' => $this->input->post('jawaban')
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

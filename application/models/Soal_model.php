<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Soal_model extends CI_Model
{
   private $table    = 'tbl_soal';

   public function count_essai($id) {
      $query = $this->db->query('select count(1) as val from tbl_soal s inner join tbl_kelola_soal_soal ks on s.id = ks.soal_id where tipe_soal = 0 and ks.kelola_soal_id = '. $id);

      $result = $query->row();
      return substr( $result->val, 0);
   }

   public function count_pilihan_ganda($id) {
      $query = $this->db->query('select count(1) as val from tbl_soal s inner join tbl_kelola_soal_soal ks on s.id = ks.soal_id where tipe_soal = 1 and ks.kelola_soal_id = '. $id);

      $result = $query->row();
      return substr( $result->val, 0);
   }


   public function fetch_data($id) {
      $this->db->select('kss.id, s.id soal_id, s.tipe_soal, s.soal, s.jawaban, j.jawaban_a, j.jawaban_b, j.jawaban_c, j.jawaban_d, s.bobot_nilai');
      $this->db->from('tbl_kelola_soal_soal kss');
      $this->db->join($this->table.' s', 'kss.soal_id = s.id', 'left');
      $this->db->join('tbl_soal_jawaban j', 's.soal_jawaban_id = j.id', 'left');
      $this->db->where('kss.kelola_soal_id', $id);
      $query = $this->db->get();

      if ($query->num_rows() > 0) {
         foreach ($query->result() as $row) {
            $data[] = $row;
         }
         return $data;
      }

      return false;
   }

   public function get_soal($id) {
      $this->db->select('s.id, j.id jawaban_id, s.tipe_soal, s.soal, s.jawaban, j.jawaban_a, j.jawaban_b, j.jawaban_c, j.jawaban_d, j.jawaban_essai, s.bobot_nilai');
      $this->db->from('tbl_soal s');
      $this->db->join('tbl_soal_jawaban j', 's.soal_jawaban_id = j.id', 'left');
      $this->db->where('s.id', $id);
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

   public function add($id)
   {
      $data = array(
        'soal' => $this->input->post('soal'),
        'jawaban' => $this->input->post('jawaban'),
        'soal_jawaban_id' => $id,
        'tipe_soal' => $this->input->post('tipe_soal'),
        'bobot_nilai' => $this->input->post('bobot_nilai'),
      );

      $this->db->insert($this->table, $data);

      return $this->db->insert_id();
   }

   public function update()
   {
      $id = $this->input->post('id');

      $data = array(
        'soal' => $this->input->post('soal'),
        'jawaban' => $this->input->post('jawaban'),
        'bobot_nilai' => $this->input->post('bobot_nilai'),
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

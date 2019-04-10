<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Soal_model extends CI_Model
{
   private $table    = 'tbl_soal';

   public function fetch_data($id) {
      $this->db->from('tbl_kelola_soal_soal kss');
      $this->db->join($this->table.' s', 'kss.soal_id = s.id', 'left');
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
      );

      $this->db->insert($this->table, $data);

      return $this->db->insert_id();
   }

   public function update()
   {
      $id = $this->input->post('id');

      $data = array(
        'kategori_ujian' => $this->input->post('kategori_ujian')
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

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelola_soal_soal_model extends CI_Model
{
   private $table    = 'tbl_kelola_soal_soal';

   public function add($kelola_soal_id, $soal_id)
   {
      $data = array(
        'kelola_soal_id' => $kelola_soal_id,
        'soal_id' => $soal_id
      );

      return $this->db->insert($this->table, $data);;
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

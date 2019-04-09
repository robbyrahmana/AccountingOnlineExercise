<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model
{
   private $table    = 'tbl_user';
   private $_data    = array();

   public function validate()
   {
      $username = $this->input->post('username');
      $password = $this->input->post('password');

      $this->db->where('username', $username);
      $this->db->where('password', sha1($password));

      $query = $this->db->get($this->table);

      if ($query->num_rows()) {
         
         $row = $query->row_array();
         // no need to store password in session
         unset($row['password']);
         $this->_data = $row;

         return ERR_NONE;
      } else {
         return ERR_INVALID_LOGIN;
      }
   }

   public function get_data() 
   {
      return $this->_data;
   }
}

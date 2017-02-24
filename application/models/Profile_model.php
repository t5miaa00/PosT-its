<?php
Class Profile_model extends CI_Model
{
   public function addUser($user_data)
   {
      $this->db->insert('users', $user_data);
      return ($this->db->affected_rows() != 0);
   }
}
?>

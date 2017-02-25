<?php
Class Profile_model extends CI_Model
{
   public function addUser($user_data)
   {
      $this->db->insert('users', $user_data);
      return ($this->db->affected_rows() != 0);
   }
   public function signInUser($signin_data)
   {
      $this->db->select('*');
      $this->db->from('users');
      $this->db->where($signin_data);
      $this->db->limit(1);

      $query = $this->db->get();

      if ($query->num_rows() == 1)
      {
         return $query->result();
      }
      else
      {
         return false;
      }
   }
}
?>

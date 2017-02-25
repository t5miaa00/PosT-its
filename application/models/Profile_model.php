<?php
Class Profile_model extends CI_Model
{
   public function checkLogin()
   {
      return ($this->session->userdata('logged_in') != null);
   }
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
   public function getAllPosts()
   {
      $this->db->select('*');
      $this->db->from('notes');

      $query = $this->db->get();
      return $query->result();
   }
   public function getPosts($userID)
   {
      $this->db->select('*');
      $this->db->from('notes');
      $this->db->where('userID', $userID);

      $query = $this->db->get();

      return $query->result();
   }
}
?>

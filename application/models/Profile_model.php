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
   public function removeAccount($userID)
   {
      $this->db->where('userID', $userID);
      $this->db->delete('users');
      return ($this->db->affected_rows() != 0);
   }
   public function getSessionData()
   {
      $session_data = $this->session->userdata('logged_in');

      $data['username'] = $session_data['username'];
      $data['notes_left'] = $session_data['notes_left'];
      $data['userID'] = $session_data['userID'];
      $data['message_draft'] = $session_data['message_draft'];
      #$data['user_posts'] = $this->Profile_model->getPosts($data['userID']);

      return $session_data;
   }
}
?>

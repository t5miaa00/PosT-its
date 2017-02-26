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
      return ($this->db->affected_rowsaffected_rows() != 0);
   }
   public function isOwner($noteID, $userID)
   {
      $this->db->select('noteID, userID');
      $this->db->from('notes');
      $this->db->where('noteID', $noteID);
      $this->db->where('userID', $userID);
      $this->db->limit(1);

      $query = $this->db->get();

      if ($query->num_rows() == 1)
      {
         return true;
      }
      else
      {
         return false;
      }
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
      $this->db->select('notes.*, users.username');
      $this->db->from('notes');
      $this->db->join('users', 'notes.userID = users.userID', 'left');

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
   public function removePost($noteID)
   {
      # First we need to check if the user owns the post, or is the user even
      # logged in as a matter of fact!
      $session_data = $this->session->userdata('logged_in');
      ($session_data) ? $userID = $session_data['userID'] : redirect('profile/signin');

      $note_to_remove = $this->isOwner($noteID, $userID);
      if ($note_to_remove)
      {
         # Then we can go and remove the post.
         $this->db->where('noteID', $noteID);
         $this->db->where('userID', $userID);
         $this->db->delete('notes');

         # Update the note count for the person.
         $new_note_count = ($session_data['note_amount'] - 1);
         $session_data['notes_left'] = (10 - $new_note_count);
         $this->session->set_userdata('logged_in', $session_data);
         $this->db->where('userID', $userID);
         $this->db->update('users', array('note_amount' => $new_note_count));
      }
      else
      {
         return false;
      }
   }
   public function getSessionData()
   {
      $session_data = $this->session->userdata('logged_in');

      $data['username'] = $session_data['username'];
      $data['notes_left'] = $session_data['notes_left'];
      #debug data...
      $data['userID'] = $session_data['userID'];
      $data['message_draft'] = $session_data['message_draft'];
      $data['user_posts'] = $this->Profile_model->getPosts($data['userID']);

      return $data;
   }
}
?>

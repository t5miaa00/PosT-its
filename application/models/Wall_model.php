<?php
Class Wall_model extends CI_Model
{
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
         $session_data['note_amount'] = ($session_data['note_amount'] - 1);
         $session_data['notes_left'] = (10 - $session_data['note_amount']);
         $this->session->set_userdata('logged_in', $session_data);
         $this->db->where('userID', $userID);
         $this->db->update('users', array('note_amount' => $session_data['note_amount']));
         return true;
      }
      else
      {
         return false;
      }
   }
   public function plusNote($userID)
   {
      $this->db->set('note_amount', 'note_amount+1', FALSE);
      $this->db->where('userID', $userID);
      $this->db->update('users');

      return ($this->db->affected_rows() != 0);
   }
   public function addPost($note_data, $session_data)
   {
      $session_data['note_amount'] = ($session_data['note_amount'] + 1);
      $session_data['notes_left'] = (10 - $session_data['note_amount']);
      $this->session->set_userdata('logged_in', $session_data);

      $this->plusNote($session_data['userID']);
      $this->db->insert('notes', $note_data);
      return ($this->db->affected_rows() != 0);
   }
}

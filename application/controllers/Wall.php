<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wall extends CI_Controller
{
   public function index()
   {
      $data['page'] = 'wall/wall';
      if ($this->session->userdata('logged_in')) # do this if a user is logged in.
      {
         $session_data = $this->session->userdata('logged_in');
         $data['username'] = $session_data['username'];
         $data['notes_left'] = $session_data['notes_left'];
         $data['userID'] = $session_data['userID'];
      }

      $this->load->view('menu/content', $data);
   }
}
?>

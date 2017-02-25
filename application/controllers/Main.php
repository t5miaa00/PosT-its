<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
   }
   public function index()
   {
      $data['page'] = 'main/index';
      if ($this->session->userdata('logged_in')) # do this if a user is logged in.
      {
         $session_data = $this->session->userdata('logged_in');
         $data['username'] = $session_data['username'];
         $data['notes_left'] = $session_data['notes_left'];
         #debug data...
         $data['userID'] = $session_data['userID'];
         $data['message_draft'] = $session_data['message_draft'];
      }

      $this->load->view('menu/content', $data);
   }
}
?>

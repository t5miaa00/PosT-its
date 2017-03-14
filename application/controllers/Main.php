<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->model("Profile_model");
   }
   public function index()
   {
      if ($this->session->userdata('logged_in')) # do this if a user is logged in.
      {
         $data = $this->Profile_model->getSessionData();
      }
      $data['page'] = 'main/index';

      $this->load->view('menu/content', $data);
   }
}
?>

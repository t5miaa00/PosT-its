<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->model('Profile_model');
   }
   public function index()
   {
      $data = $this->Profile_model->getSessionData();
      $data['page'] = 'about/main';
      $this->load->view('menu/content', $data);
   }
}
?>

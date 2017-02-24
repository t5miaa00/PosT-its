<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller
{
   public function index()
   {
      $data['page'] = 'main/index';
      $this->load->view('menu/content', $data);
   }
}
?>

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wall extends CI_Controller
{
   public function index()
   {
      $data['page'] = 'wall/wall';
      $this->load->view('menu/content', $data);
   }
}
?>

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller
{
   public function signin()
   {
      $this->load->view('profile/signin');
   }
   public function register()
   {
      $this->load->view('profile/register');
   }
   public function registerUser()
   {
      $this->load->model('Profile_model');
      $btn = $this->input->post('registerBtn');
      if (isset($btn))
      {
         $user_data = array(
            "username"=>$this->input->post('username'),
            "password"=>hash("sha256",$this->input->post('password')),
            "note_amount"=>0,
            "message_draft"=>""
         );
         $data['trying'] = $this->Profile_model->addUser($user_data);
      }
      $data['page'] = 'main/index';
      $this->load->view('menu/content',$data);
   }
}

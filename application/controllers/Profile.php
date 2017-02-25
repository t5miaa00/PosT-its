<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->model('Profile_model');
   }

   public function index()
   {
      if (! $this->Profile_model->checkLogin())
      {
         redirect('profile/signin');
         return false;
      }
      $data['page'] = 'profile/main';

      $session_data = $this->session->userdata('logged_in');
      $data['username'] = $session_data['username'];
      $data['notes_left'] = $session_data['notes_left'];
      #debug data...
      $data['userID'] = $session_data['userID'];
      $data['message_draft'] = $session_data['message_draft'];
      $data['user_posts'] = $this->Profile_model->getPosts($data['userID']);

      $this->load->view('menu/content', $data);
   }
   public function signin()
   {
      if ($this->Profile_model->checkLogin())
      {
         redirect('profile');
      }
      $btn = $this->input->post('signInBtn');


      if (isset($btn))
      {
         $signin_data = array(
            "username" => $this->input->post('username'),
            "password" => hash("sha256", $this->input->post('password'))
         );
         $result = $this->Profile_model->signInUser($signin_data);

         if ($result) # returns something of use.
         {
            $session_data = array();
            # save the data to session.
            foreach ($result as $row)
            {
               $session_data = array(
                  'userID' => $row->userID,
                  'username' => $row->username,
                  'notes_left' => (10 - $row->note_amount),
                  'message_draft' => $row->message_draft
               );
               $this->session->set_userdata('logged_in', $session_data);
            }
            redirect('main');
         }
         else
         {
            $data['login_fail'] = true;
            $this->load->view('profile/signin', $data);
         }
      }
      else
      {
         $this->load->view('profile/signin');
      }
   }
   public function register()
   {
      if ($this->Profile_model->checkLogin())
      {
         redirect('profile');
      }
      $btn = $this->input->post('registerBtn');
      if (isset($btn))
      {
         $user_data = array(
            "username" => $this->input->post('username'),
            "password" => hash("sha256", $this->input->post('password')),
            "note_amount"=>0,
            "message_draft"=>""
         );
         $data['trying'] = $this->Profile_model->addUser($user_data);
         $this->load->view('profile/signin', $data);
      }
      else
      {
         $this->load->view('profile/register');
      }
   }
   public function logout()
   {
      $this->session->unset_userdata('logged_in');
      session_destroy();
      $data['logged_out'] = true;
      $this->load->view('profile/signin', $data);
   }
   public function registerUser()
   {
      $this->load->model('Profile_model');
      $btn = $this->input->post('registerBtn');
      if (isset($btn))
      {
         $user_data = array(
            "username" => $this->input->post('username'),
            "password" => hash("sha256", $this->input->post('password')),
            "note_amount"=>0,
            "message_draft"=>""
         );
         $data['trying'] = $this->Profile_model->addUser($user_data);
      }
      $this->load->view('profile/signin', $data);
   }
}

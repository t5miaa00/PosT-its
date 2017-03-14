<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->model('Profile_model');
      $this->load->model('Wall_model');
   }

   public function index()
   {
      if (! $this->Profile_model->checkLogin())
      {
         redirect('profile/signin');
         return false;
      }
      $data = $this->Profile_model->getSessionData();
      $data['user_posts'] = $this->Wall_model->getPosts($data['userID']);
      $data['page'] = 'profile/main';

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
                  'note_amount' => $row->note_amount,
                  'message_draft' => $row->message_draft
               );
               $this->session->set_userdata('logged_in', $session_data);
            }
            redirect('main');
         }
         else # if the sign in fails
         {
            $this->session->set_flashdata('alert', array('danger' => 'Username/Password was wrong.'));
            $this->load->view('profile/signin');
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
         if (hash("sha256", $this->input->post('password'))
             == hash("sha256", $this->input->post('redoPassword')))
         {
            $user_data = array(
               "username" => $this->input->post('username'),
               "password" => hash("sha256", $this->input->post('password')),
               "note_amount"=>0,
               "message_draft"=>""
            );
            $this->Profile_model->addUser($user_data);
            $this->session->set_flashdata('alert', array('success' => 'User added succesfully you can now sign in!'));
            redirect('profile/signin');
         }
         else
         {
            $this->session->set_flashdata('alert', array('danger' => 'Please check your password!'));
            $this->load->view('profile/register');
         }
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

      $this->session->set_flashdata('alert', array('success' => 'You have been succesfully logged out!'));
      redirect('profile/signin');
   }
   public function removeAccount($userID)
   {
      if (! $this->Profile_model->checkLogin())
      {
         $this->session->set_flashdata('alert', array('info' => 'Please sign in first to do this.'));
         redirect('profile/signin');
      }
      else
      {
         $this->Profile_model->removeAccount($userID);
         $this->session->set_flashdata('alert', array('info' => 'Account removed succesfully!'));
         $this->logout();
      }
   }
}

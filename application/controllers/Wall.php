<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wall extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->model('Profile_model');
      $this->load->model('Wall_model');
      $this->load->helper('date');
   }
   public function index()
   {
      if ($this->session->userdata('logged_in')) # do this if a user is logged in.
      {
         $data = $this->Profile_model->getSessionData();
      }
      $data['page'] = 'wall/wall';
      if (isset($message))
      {
         $data['removal'] = $message;
      }

      $data['user_posts'] = $this->Wall_model->getAllPosts();

      $this->load->view('menu/content', $data);
   }
   public function removePost($noteID)
   {
      $removal = $this->Wall_model->removePost($noteID);
      if ($removal)
      {
         $this->session->set_flashdata('alert', array('success' => 'Post removed succesfully!'));
      }
      else
      {
         $this->session->set_flashdata('alert', array('danger' => 'This post could not be removed!'));
      }
      redirect('wall');
   }
   public function addPost()
   {
      $btn = $this->input->post('postItBtn');
      # do this if the user is logged in.
      if ($this->session->userdata('logged_in') && isset($btn))
      {
         $session_data = $this->session->userdata('logged_in');
         #0000-00-00 00:00:00
         #YYYY-MM-DD HH:MM:SS
         $datestring = '%Y-%m-%d %H:%m:%s';
         $time = time();

         $note_data = array(
            'userID' => $session_data['userID'],
            'message' => htmlspecialchars($this->input->post('message')),
            'position_x' => $this->input->post('position_x'),
            'position_y' => $this->input->post('position_y'),
            'colour' => $this->input->post('colour'),
            'post_date' => mdate($datestring, $time)
         );
         $adding = $this->Wall_model->addPost($note_data, $session_data);
         if ($adding)
         {
            $this->session->set_flashdata('alert', array('success' => 'Post added succesfully!'));
         }
         else
         {
            $this->session->set_flashdata('alert', array('danger' => 'Your post could not be added!'));
         }
         redirect('wall');
      }
      else
      {
         $this->session->set_flashdata('alert', array('info' => 'Please log in.'));
         redirect('profile/signin');
      }
   }
}
?>

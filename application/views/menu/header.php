<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">

      <link rel="stylesheet"
            href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
            integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
            crossorigin="anonymous">
      <link rel="stylesheet" href="<?php echo base_url('css/main.css');?>">

      <script src="http://code.jquery.com/jquery-3.1.1.min.js"
              integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
              crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
              integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
              crossorigin="anonymous"></script>

      <title>PosT-its</title>
   </head>
   <body>

      <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
         <div class="container">
            <div class="navbar-header">
               <button class="navbar-toggle collapsed" type="button"
                       data-toggle="collapse" data-target="#navbar">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
               </button>
               <a class="navbar-brand" href="<?php echo site_url('main')?>">PosT-its</a>
            </div>

            <div id="navbar" class="collapse navbar-collapse">
               <ul class="nav navbar-nav">
                  <li><a href="<?php echo site_url('main');?>">
                     Home
                  </a></li>
                  <li><a href="<?php echo site_url('wall');?>">
                     The wall
                  </a></li>
                  <li><a href="<?php echo site_url('about');?>">
                     About
                  </a></li>
               </ul>
               <ul class="nav navbar-nav navbar-right">
                  <li>
                     <!--<a href="#"><span class="glyphicon glyphicon-log-in"></span> Log in</a>-->
                     <?php
                     if(isset($userID))
                     {
                        $user_url = array('profile', $userID);
                        echo "<a href=\"". site_url($user_url) ."\"><span class=\"glyphicon glyphicon-log-in\"></span> ". $username
                            ." <span title=\"You have ". $notes_left ." notes left to put to the wall!\" class=\"badge\">". $notes_left ."</span></a>";
                     }
                     ?>
                  </li>
               </ul>
            </div>
         </div>
      </nav>

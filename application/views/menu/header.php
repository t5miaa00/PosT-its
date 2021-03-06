<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">

      <link rel="stylesheet"
            href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <link rel="stylesheet" href="<?php echo base_url('css/main.css');?>">

      <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

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
                        echo '<a href="'. site_url('profile') .'">'
                            .'<span class="glyphicon glyphicon-user"></span> '. $username .' <span title="You have '. $notes_left .' notes left to put to the wall!" class="badge">'. $notes_left .'</span>'
                            .'</a>'
                            .'</li><li>'
                            .'<a href="'. site_url('profile/logout') .'">Log out'
                            .'</a></li>';
                     }
                     else
                     {
                        echo '<a href="'. site_url('profile/signin') .'">'
                            .'<span class="glyphicon glyphicon-log-in"></span> Sign in'
                            .'</a>';
                     }
                     ?>
                  </li>
               </ul>
            </div>
         </div>
      </nav>

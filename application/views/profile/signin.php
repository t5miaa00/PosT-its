<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">

      <link rel="stylesheet"
            href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <link rel="stylesheet" href="<?php echo base_url('css/signin.css');?>">

      <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

      <title>PosT-its</title>
   </head>
   <body>

      <div class="container">
         <form class="form-signin" action="<?php echo site_url('profile/signin')?>"
               method="post">
            <h4><a href="<?php echo site_url('main');?>">
               <span class="glyphicon glyphicon-menu-left"></span> Home
            </a></h4>
            <h2 class="form-signin-heading">Sign in to PosT-its!</h2>

            <label for="inputUsername" class="sr-only">Username</label>
            <input type="text" id="inputUsername" class="form-control top-input"
                   name="username" placeholder="Username" maxlength="25" required autofocus>
            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" id="inputPassword" class="form-control bottom-input"
                   name="password" placeholder="Password" pattern=".{10,32}"
                   title="Password must be between 10 and 32 characters." required>

            <br>

            <input class="btn btn-lg btn-primary btn-block" name="signInBtn" type="submit" value="Sign in">
            <?php
            $alert = $this->session->flashdata('alert');
            if (isset($alert))
            {
               foreach ($alert as $type => $message)
               {
                  echo '<div class="alert alert-'. $type .'" role="alert">'. $message
                  .'<button type="button" class="close" data-dismiss="alert"><span>&times;</span></button></div>';
               }
            }
            /*if (isset($trying))
            {
               echo '<br>';
               if ($trying)
               {
                  echo '<div class="alert alert-success" role="alert"><b>SUCCESS! </b>User added succesfully!</div>';
               }
               else
               {
                  echo '<div class="alert alert-danger" role="alert"><b>OOPS! </b>Something went wrong while adding the user! :(</div>';
               }
               echo '<br>';
            }
            if (isset($login_fail) && $login_fail)
            {
               echo '<br>'
                   .'<div class="alert alert-danger role="alert"><b>OOPS! </b>Check your username or password.</div>'
                   .'<br>';
            }
            if (isset($logged_out) && $logged_out)
            {
               echo '<br>'
                   .'<div class="alert alert-success role="alert"><b>SUCCESS!</b> Logged out succesfully!</div>'
                   .'<br>';
            }*/
            ?>
            <p>Don't have an account? <a href="<?php echo site_url('profile/register');?>">Register here!</a></p>
         </form>
      </div>

   </body>
</html>

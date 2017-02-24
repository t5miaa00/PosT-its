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
      <link rel="stylesheet" href="<?php echo base_url('css/signin.css');?>">

      <script src="http://code.jquery.com/jquery-3.1.1.min.js"
              integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
              crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
              integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
              crossorigin="anonymous"></script>

      <title>PosT-its</title>
   </head>
   <body>

      <div class="container">
         <form class="form-signin" action="<?php echo site_url('profile/registerUser')?>"
               method="post">
            <h4><a href="<?php echo site_url('main');?>">
               <span class="glyphicon glyphicon-menu-left"></span> Home
            </a>
            \
            <a href="<?php echo site_url('profile/signin')?>">
               <span class="glyphicon glyphicon-menu-left"></span> Sign in
            </a></h4>
            <h2 class="form-signin-heading">Register to PosT-its!</h2>

            <label for="inputUsername" class="sr-only">Username</label>
            <input type="text" id="inputUsername" class="form-control"
                   name="username" placeholder="Username" maxlength="25" required autofocus>
            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" id="inputPassword" class="form-control"
                   name="password" placeholder="Password" maxlength="32" required>

            <br>

            <input class="btn btn-lg btn-primary btn-block" name="registerBtn" type="submit" value="Register">
         </form>
      </div>

   </body>
</html>

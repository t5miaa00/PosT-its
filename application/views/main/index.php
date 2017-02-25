<div class="jumbotron">
   <div class="container">
      <h1>PosT-its</h1>
      <p>This is a little application to post your own notes to a global wall for everyone to see!</p>
      <p>
      <?php
      if (isset($userID))
      {
         echo '<a class="btn btn-primary btn-lg" href="'. site_url('wall/post') .'"><span class="glyphicon glyphicon-hand-right"></span> Post a note</a>';
      }
      else
      {
         echo '<a class="btn btn-primary btn-lg" href="'. site_url('profile/register') .'"><span class="glyphicon glyphicon-hand-right"></span> Register now</a>';
      }
      ?>
      </p>
   </div>
</div>
<div class="container alert alert-info">
   <p>Debugging information: <hr> session ID: <?php echo session_id(); ?></p>
   <p>user ID: <?php echo (isset($userID)) ? $userID : "n/a"; ?></p>
   <p>username: <?php echo (isset($username)) ? $username : "n/a"; ?></p>
   <p>notes left: <?php echo (isset($notes_left)) ? $notes_left : "n/a"; ?></p>
   <p>message draft: <br> <?php echo (isset($message_draft)) ? $message_draft : "n/a"; ?></p>
</div>

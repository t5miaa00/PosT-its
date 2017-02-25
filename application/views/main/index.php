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
   <p>DEBUG! <br> session ID: <?php echo session_id(); ?></p>
   <p>user ID: <?php echo $userID; ?></p>
   <p>username: <?php echo $username; ?></p>
   <p>notes left: <?php echo $notes_left; ?></p>
   <p>message draft: <?php echo $message_draft; ?></p>
</div>

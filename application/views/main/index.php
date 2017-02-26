<div class="jumbotron">
   <div class="container">
      <h1>PosT-its</h1>
      <p>This is a little application to post your own notes to a global wall for everyone to see!</p>
      <p>
      <?php
      if (isset($userID))
      {
         echo '<a class="btn btn-primary btn-lg" href="'. site_url('profile') .'"><span class="glyphicon glyphicon-hand-right"></span> Post a note</a>';
      }
      else
      {
         echo '<a class="btn btn-primary btn-lg" href="'. site_url('profile/register') .'"><span class="glyphicon glyphicon-hand-right"></span> Register now</a>';
      }
      ?>
      </p>
   </div>
</div>

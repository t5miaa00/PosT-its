<div class="jumbotron">
   <div class="container">
      <h1>PosT-its</h1>
      <p>This is a little application to post your own notes to a global wall for everyone to see!</p>
      <p><a class="btn btn-primary btn-lg" role="button" href="<?php echo site_url('profile/register')?>">
         <span class="glyphicon glyphicon-hand-right"></span> Register now
      </a></p>
   </div>
</div>
<?php
if (isset($trying))
{
   echo '<div class="container">';
   if ($trying)
   {
      echo '<div class="alert alert-success" role="alert"><b>SUCCESS! </b>User added succesfully!</div>';
   }
   else
   {
      echo '<div class="alert alert-danger" role="alert"><b>OOPS! </b>Something went wrong while adding the user! :(</div>';
   }
   echo '</div>';
}
?>

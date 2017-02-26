<div class="container">
   <h1>Hey, <?php echo $username; ?>!</h1><hr>
   <div class="col-md-6 col-sm-6">
      <h3>Your posts:</h3>
      <table class="table">
      <?php
      echo '<tr>'
          .'<th>noteID</th><th>message</th><th>remove</th>'
          .'</tr>';
      foreach ($user_posts as $row)
      {
         echo '<tr style="background:#'. $row->colour .';">'
             .'<td>'. $row->noteID .'</td><td>'. $row->message .'</td>'
             .'<td><a class="btn btn-danger" href="'. site_url("wall/removepost/$row->noteID") .'">&times;</a></td>'
             .'</tr>';
      }
      ?>
   </table>
   </div>
   <div class="col-md-6 col-sm-6">
      <h3>Create a post:</h3>
   </div>
</div>

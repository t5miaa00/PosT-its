<div class="container">
   <h1>Hey, <?php echo $username; ?>!</h1><hr>
   <div class="col-md-6 col-sm-6">
      <h3 class="well no-bg">Your posts:</h3>
      <p>Here are you can see your posts. If you want to remove posts, please find them from the wall</p>
      <table class="table">
      <?php
      echo '<tr>'
          .'<th>message</th>'
          .'</tr>';
      foreach ($user_posts as $row)
      {
         echo '<tr style="background:#'. $row->colour .';">'
             .'<td>'. $row->message .'</td>'
             .'</tr>';
      }
      ?>
   </table>
   </div>
   <div class="col-md-6 col-sm-6">
      <h3 class="well no-bg">Create a post:</h3>
      <form class="" action="<?php echo site_url('wall/addpost')?>" method="post">
         <h4>Note message:</h4>
         <div class="input-group">
            <span class="input-group-addon glyphicon glyphicon-font"></span>
            <input type="textarea" name="message" class="form-control" value="" placeholder="Your message here.." maxlength="255" required>
         </div>
         <hr>

         <h4>Note position:</h4>
         <div class="input-group">
            <span class="input-group-addon glyphicon glyphicon-resize-horizontal"></span>
            <input type="range" class="form-control" name="position_x" value="10"
                   step="1" min="10" max="1250" title="Horizontal position of the post.">
         </div>
         <div class="input-group">
            <span class="input-group-addon glyphicon glyphicon-resize-vertical"></span>
            <input type="range" class="form-control" name="position_y" value="10"
                   step="1" min="10" max="610" title="Vertical position of the post.">
         </div>
         <hr>

         <h4>Note colour:</h4>
         <div class="colour-radio-cont">
            <label for="colour5" class="col-xs-2 colour-radio" style="background:#E8584C"><input type="radio" name="colour" id="colour5" value="E8584C" required></label>
            <label for="colour6" class="col-xs-2 colour-radio" style="background:#FFAD70"><input type="radio" name="colour" id="colour6" value="FFAD70" required></label>
            <label for="colour1" class="col-xs-2 colour-radio" style="background:#EBFF68"><input type="radio" name="colour" id="colour1" value="EBFF68" required></label>
            <label for="colour3" class="col-xs-2 colour-radio" style="background:#75E88D"><input type="radio" name="colour" id="colour3" value="75E88D" required></label>
            <label for="colour2" class="col-xs-2 colour-radio" style="background:#80FFFA"><input type="radio" name="colour" id="colour2" value="80FFFA" required></label>
            <label for="colour4" class="col-xs-2 colour-radio" style="background:#D398E8"><input type="radio" name="colour" id="colour4" value="D398E8" required></label>
         </div>
         <hr>

         <input type="submit" class="btn btn-primary btn-block btn-lg" name="postItBtn" value="Post!"
         <?php echo ($notes_left < 0)? 'disabled title="remove some posts to post more!"' : "" ;?>>
         <br>
      </form>
   </div>
   <div class="col-xs-12">
      <h3 class="well no-bg">Account settings:</h3>
      <hr>
      <div class="col-xs-4">
         <button type="button" class="btn btn-alert btn-block" data-toggle="modal" data-target="#remove-account">Remove account</button>
         <div class="modal fade" id="remove-account" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
               <div class="modal-content">
                  <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal">
                        &times;
                     </button>
                     <h4 class="modal-title">Remove account?</h4>
                  </div>
                  <div class="modal-body">
                     <p>Are you sure you want to remove your account?</p>
                     <p>This can't be undone!</p>
                  </div>
                  <div class="modal-footer">
                     <button type="button" class="btn btn-primary">No.</button>
                     <a href="<?php echo("profile/removeaccount/$userID")?>" class="btn btn-danger">Yes.</a>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

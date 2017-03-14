<div class="jumbotron">
   <div class="container">
      <h1>The wall</h1>
      <p>All the posts are here! You can also check the posts more closely by clicking on them!</p>
   </div>
</div>
<?php
if (isset($userID))
{
   $alert = $this->session->flashdata('alert');
   echo '<div class="container-flow no-margin"><div class="container padded-container">'
   .'<div class="col-sm-4 col-md-4"><a href="'. site_url('profile') .'" class="btn btn-primary">Post a note</a></div>';
   if (isset($alert))
   {
      foreach ($alert as $type => $message)
      {
         echo '<div class="col-md-8 col-sm-8 alert alert-'. $type .'" role="alert">'. $message
         .'<button type="button" class="close" data-dismiss="alert"><span>&times;</span></button></div>';
      }
   }
   echo '</div></div>';
}
?>
<div class="container-flow no-bg">
   <div class="corkwall-container">

      <div class="corkwall">

         <?php
         # Beware! This looks ugly as heck! But it works, so I won't be changing anything in this!
         foreach ($user_posts as $note)
         {
            echo '
<div class="post-grouping">
   <div class="post-note" style="top: '. $note->position_y .'px; left: '. $note->position_x .'px; background:#'. $note->colour .'"
        data-toggle="modal" data-target="#postID-'. $note->noteID .'">
      '. $note->message .'
      <div class="post-note-footer">
         <p>'. $note->username .'</p>
      </div>
   </div>

   <div class="modal fade" id="postID-'. $note->noteID .'" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
         <div class="modal-content modal-postit" style="background:#'. $note->colour .'">
            <div class="modal-header">';
         if (isset($userID) && $userID == $note->userID)
         {
            echo '<a href="'. site_url("wall/removepost/$note->noteID") .'" class="delete-post"><span class="glyphicon glyphicon-trash"></span>Delete post?</a>';
         }
         echo '<button type="button" class="close" data-dismiss="modal">
                  &times;
               </button>
            </div>
            <div class="modal-body">
            '. $note->message .'
            </div>
            <div class="modal-footer">
               <sub>Date of post: '. $note->post_date .'</sub><p>'. $note->username .'</p>
            </div>
         </div>
      </div>
   </div>
</div>';
         }
         ?>

      </div>
   </div>
</div>

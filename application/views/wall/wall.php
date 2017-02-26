<?php
if (isset($userID))
{
   echo '<div class="container-flow no-margin"><div class="container padded-container">'
   .'<a href="#" class="btn btn-primary">Post a note</a>'
   .'</div></div>';
}
?>
<div class="container-flow no-bg">
   <div class="corkwall-container">

      <div class="corkwall">

         <div class="post-grouping">
            <div class="post-note" style="top: 120px; left: 233px;"
               data-toggle="modal" data-target="#postID-test">
               <p>Ferst post pitses! This post will be a long one, you'll see! This post will go over everything you see!
                  This post will have more than the basic amount of stuff written!</p>
               <div class="post-note-footer">
                  <!-- This post is to show the poster name~ -->
                  <p>Aatu</p>
               </div>
            </div>

            <!-- MODAL START -->
            <!-- This is only a template for a modal in which all the posts will have
            own modal to show the post more accurately. The site will load slowly
            when there'll be buttloads of posts. Going to rectify this sooner or
            later... probably...-->
            <div class="modal fade" id="postID-test" tabindex="-1" role="dialog">
               <div class="modal-dialog" role="document">
                  <div class="modal-content modal-postit">
                     <div class="modal-header">
                        <a href="#" class="delete-post"><span class="glyphicon glyphicon-trash"></span>Delete post?</a>
                        <button type="button" class="close" data-dismiss="modal">
                           &times;
                        </button>
                     </div>
                     <div class="modal-body">
                        <p>Ferst post pitses! This post will be a long one, you'll see! This post will go over everything you see!</p>
                     </div>
                     <div class="modal-footer">
                        <p>Aatu</p>
                     </div>
                  </div>
               </div>
            </div>
            <!-- MODAL END -->
         </div>
         <!-- POST END -->
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
         if ($userID == $note->userID)
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
               <p>'. $note->username .'</p>
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

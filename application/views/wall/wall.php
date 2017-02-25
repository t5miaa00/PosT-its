<div class="container-flow">
   <?php
      if (isset($userID))
      {
         echo '<a href="#" class="btn btn-primary">Post a note</a>';
      }
    ?>
   <div class="corkwall-container">

      <div class="corkwall">

         <div class="post-grouping">
            <div class="post-note" style="top: 120px; left: 233px;"
               data-toggle="modal" data-target="#postID-1">
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
            <div class="modal fade" id="postID-1" tabindex="-1" role="dialog">
               <div class="modal-dialog" role="document">
                  <div class="modal-content">
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

      </div>
   </div>
</div>

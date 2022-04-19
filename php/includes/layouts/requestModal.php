     <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">×</button>
          <h4><span class="glyphicon fa fa-calendar"></span> Add to Calendar</h4>
        </div>

        <div class="modal-body">
        <form action="<?php echo htmlspecialchars('php/add_request.php'); ?>" method="post" role="form" id="data-form" class="margin-clear" >
     

     <div class="form-group has-feedback">
           <label class="sr-only" for="fname">Name</label>
           <input type="text" id="first_name" class="form-control" name="first_name" placeholder="First Name">
           <i class="fa fa-user form-control-feedback"></i>
       </div>

     <div class="form-group has-feedback"> 
           <label class="sr-only" for="lname">last Name</label>    
           <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name">
           <i class="fa fa-user form-control-feedback"></i>
     </div>

             <div class="form-group has-feedback">
           <label class="sr-only" for="email">Enter email</label>
           <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" required>
           <i class="fa fa-envelope form-control-feedback"></i>
           </div>

           <div class="form-group has-feedback">
               <label class="sr-only" for="home_address">Message</label>
               <textarea class="form-control" rows="6" id="home_address" placeholder="Message" name="home_address"></textarea>
               <i class="fa fa-pencil form-control-feedback"></i>
             </div>

           <button type="submit" class="btn btn-block submit-button  btn-default" value="Send">Submit
           <span class="glyphicon glyphicon-ok"></span>
           </button>

      </form>

        </div>
        <div class="modal-footer">
        </div>
      </div>

  </div>
</div>

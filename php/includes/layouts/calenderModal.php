  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">×</button>
          <h4><span class="glyphicon fa fa-calendar"></span> Add to Calendar</h4>
        </div>

        <div class="modal-body">
          <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?> " method="post" role="form" id="data-form">

            <div class="form-group has-feedback">
              <label for="event"></label>
              <input type="text" class="form-control" id="event" name="event" placeholder="Enter an event (Not more than 30 characters)" required>
            </div>

            <div class="form-group has-feedback">
              <input type="date" class="form-control" id="dob" name="dob" placeholder="dd-mm-yyyy" value="" min="2021-04-30" max="" required>
            </div>
          
            <button type="submit" class="btn btn-block submit-button  btn-default" value="Send">Enter
            <span class="glyphicon glyphicon-ok"></span>
            </button>
          </form>

        </div>
        <div class="modal-footer">
        </div>
      </div>

  </div>
</div>

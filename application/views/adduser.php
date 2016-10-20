<!DOCTYPE html>
<html>
 <head>
  <title>User Registration Form</title>
	
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap-datepicker.min.css">
	
	<!-- Latest compiled and minified JavaScript -->
    <script src="<?php echo base_url(); ?>js/jquery-1.12.3.min.js"></script>
	<script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
	<script src="<?php echo base_url(); ?>js/bootstrap-datepicker.min.js"></script>
    <script src="<?php echo base_url(); ?>js/jquery.validate.js"></script>

 </head>
 <body>
   
   <div class="container">
	<br><br>
	<form class="form-horizontal form" action="<?php echo base_url(); ?>user/saveUser" name="registrationForm"
			id="registrationForm" method="post" enctype="multipart/form-data">
	  <div class="col-md-8 col-md-offset-2">   	
		<div class="box row-fluid">	
			<br>
			<div class="step">
				<h4 class="text-center">Personal Information</h4><br>
				  <div class="form-group">
				    <label for="firstname" class="col-sm-2 control-label">First Name</label>
				    <div class="col-sm-10">
				      <input type="text" name="firstname" class="form-control" id="firstname" placeholder="First Name">
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="lastname" class="col-sm-2 control-label">Last Name</label>
				    <div class="col-sm-10">
				      <input type="text" name="lastname" class="form-control" id="lastname" placeholder="Last Name">
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="email" class="col-sm-2 control-label">Email</label>
				    <div class="col-sm-10">
				      <input type="text" name="email" class="form-control" id="email" placeholder="Email">
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="name" class="col-sm-2 control-label">Password</label>
				    <div class="col-sm-10">
				      <input type="password" name="password" class="form-control" id="password" placeholder="Password">
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="confirm_password" class="col-sm-2 control-label">Confirm Password</label>
				    <div class="col-sm-10">
				      <input type="password" name="confirm_password" class="form-control" id="confirm_password" placeholder="Confirm Password">
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="phone" class="col-sm-2 control-label">Mobile No</label>
				    <div class="col-sm-10">
				      <input type="text" name="phone" class="form-control" id="phone" placeholder="Mobile No">
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="email" class="col-sm-2 control-label">Address</label>
				    <div class="col-sm-10">
				      <textarea name="address" id="address" class="form-control" rows="4" placeholder="Address"></textarea>
				    </div>
				  </div>			  
			</div>
			<div class="step">
				  <div class="form-group">
				    <label for="dob" class="col-sm-2 control-label">Birthday</label>
				    <div class="col-sm-10">
				      <input type="text" name="dob" class="form-control" id="dob" placeholder="Birthday">
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="gender" class="col-sm-2 control-label">Gender</label>
				    <div class="col-sm-10">
				      <input name="gender" type="radio" value="Male">Male&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					  <input name="gender" type="radio" value="Female">Female
				    </div>
				  </div>			  
				  <div class="form-group">
				    <label for="marital_status" class="col-sm-2 control-label">Marital Status</label>
				    <div class="col-sm-10">
				      <input name="marital_status" type="radio" value="Married">Married&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					  <input name="marital_status" type="radio" value="Unmarried">Unmarried
				    </div>
				  </div>			  	
			</div>
			<div class="step display">
				  <div class="form-group">
				    <label for="education" class="col-sm-2 control-label">Education</label>
				    <div class="col-sm-10">
				    	<select id="education" name="education" class="form-control">
							<option value="">--Select Education--</option>
							<option value="Post Graduate">Post Graduate</option>
							<option value="Graduate">Graduate</option>
							<option value="HSC">HSC</option>
							<option value="SSC">SSC</option>	
						</select>
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="hobbies" class="col-sm-2 control-label">Hobbies</label>
				    <div class="col-sm-10">
				    	<input type="checkbox" name="hobbies[]" value="Singing" />Singing&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<input type="checkbox" name="hobbies[]" value="Dancing"/>Dancing&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<input type="checkbox" name="hobbies[]" value="Movies"/>Movies&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<input type="checkbox" name="hobbies[]" value="Reading"/>Reading&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				    </div>
				  </div>			  
				  <div class="form-group">
				    <label for="profile" class="col-sm-2 control-label">Profile</label>
				    <div class="col-sm-10">
				    	<input class="form-control" type="file" name="profile" id="profile">
				    </div>
				  </div>			  		  
			</div>

			<div class="row">
			  <div class="col-sm-12">
			      <div class="pull-right">
					<button type="button" class="action btn-sky text-capitalize back btn">Back</button>
					<button type="button" class="action btn-sky text-capitalize next btn">Next</button>
					<button type="submit" class="action btn-hot text-capitalize submit btn">Submit</button>
			      </div>
			  </div>
			</div>			

		</div>
		
	  </div> 
	</form>
   </div>

 </body>
</html>
<script type="text/javascript">
	$(document).ready(function(){

		$('#dob').datepicker({});

		var current = 1;
		
		widget      = $(".step");
		btnnext     = $(".next");
		btnback     = $(".back"); 
		btnsubmit   = $(".submit");

		// Init buttons and UI
		widget.not(':eq(0)').hide();
		hideButtons(current);

		// Next button click action
		btnnext.click(function(){
			if(current < widget.length){
				// Check validation
				if($(".form").valid()){
					widget.show();
					widget.not(':eq('+(current++)+')').hide();
				}
			}
			hideButtons(current);
		})

		// Back button click action
		btnback.click(function(){
			if(current > 1){
				current = current - 2;
				if(current < widget.length){
					widget.show();
					widget.not(':eq('+(current++)+')').hide();
				}
			}
			hideButtons(current);
		})

	    $('.form').validate({ // initialize plugin
			ignore:":not(:visible)",			
			rules: {
				firstname: "required",
				lastname : "required",
				email    : {required : true, email:true},
				password : "required",
				confirm_password: { required : true, equalTo: "#password"},
				phone 	: "required",
				address : "required",
				dob : "required",
				gender : "required",
				marital_status : "required",
				education : "required",
				"hobbies[]" : "required",
				profile : "required"
			},
	    });

	});

	
	// Hide buttons according to the current step
	hideButtons = function(current){
		var limit = parseInt(widget.length); 

		$(".action").hide();

		if(current < limit) btnnext.show();
		if(current > 1) btnback.show();
		if (current == limit) { 
			// Show entered values
			$(".display label:not(.control-label)").each(function(){
				console.log($(this).find("label:not(.control-label)").html($("#"+$(this).data("id")).val()));	
			});
			btnnext.hide(); 
			btnsubmit.show();
		}
	}
</script>



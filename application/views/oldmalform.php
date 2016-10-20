<!DOCTYPE html>
<html>
<head>
<title>Multistep Registration form</title>
<meta content="noindex, nofollow" name="robots">
<!-- Including CSS File Here -->
<link href="../css/style.css" rel="stylesheet" type="text/css">
<!-- Including JS File Here -->
<script src="../js/multi_step_form.js" type="text/javascript"></script>
</head>
<body>
<div class="content">
<!-- Multistep Form -->
<div class="main">
<form action="<?php base_url();?>save" class="regform" method="get">
<!-- Progressbar -->
<ul id="progressbar">
<li id="active1">Personal Information</li>
<li id="active2">General Information</li>
<li id="active3">Educational Profile</li>
</ul>
<!-- Fieldsets -->
<fieldset id="first">
<h2 class="title">Personal Information</h2>
<p class="subtitle">Step 1</p>
<input class="text_field" name="fname" id="fname" placeholder="First Name" type="text">
<input class="text_field" name="lname" id="lname" placeholder="Last Name" type="text">
<input class="text_field" name="contactno" id="contactno" placeholder="Contact No" type="text">
<textarea name="add" placeholder="Address">
</textarea>
<input class="text_field" name="email" placeholder="Email" type="text" value="">
<input class="text_field" name="pass" placeholder="Password" type="password" value="">
<input class="text_field" name="cpass" placeholder="Confirm Password" type="password" value="">
<input id="next_btn1" onclick="next_step1()" type="button" value="Next">
</fieldset>
<fieldset id="second">
<h2 class="title">General Information</h2>
<p class="subtitle">Step 2</p>
<div>
<label>Gender</label>
<input name="gender" type="radio" value="Male">Male
<input name="gender" type="radio" value="Female">Female
</div>
<div>
<label>Date of Birth</label>
<input type="date" name="dob" id="dob">
</div>
<div>
<label>Marrital Status</label>
<input name="mar" type="radio" value="Married">Married
<input name="mar" type="radio" value="Unmarried">Unmarried
</div>
<input id="pre_btn1" onclick="prev_step1()" type="button" value="Previous">
<input id="next_btn2" name="next" onclick="next_step2()" type="button" value="Next">
</fieldset>

<fieldset id="third">
<h2 class="title">Personal Details</h2>
<p class="subtitle">Step 3</p>

<select id="edu" name="edu" class="options">
<option>--Select Education--</option>
<option>Post Graduate</option>
<option>Graduate</option>
<option>HSC</option>
<option>SSC</option>	
</select>

<input class="text_field" name="marks" placeholder="Marks Obtained" type="text" >
<input class="text_field" name="pyear" placeholder="Passing Year" type="text" >
<input class="text_field" name="univ" placeholder="University" type="text">

<lable class="options" for="hobbies[]">Hobbies : </lable>
<input type="checkbox" name="hobbies[]" id="hobbies" value="Singing" />Singing							<lable class="checkbox-inline"><input type="checkbox" name="hobbies[]" id="hobbies"value="Diving" />Diving</lable>
<input type="checkbox" name="hobbies[]" id="hobbies" value="Dancing"/>Dancing
<input type="checkbox" name="hobbies[]" id="hobbies" value="Movies"/>Movies
<input type="checkbox" name="hobbies[]" id="hobbies" value="Reading"/>Reading
<div>
<lable class="options" for="dp">Profile Pic : </lable>
<input class="text_field" type="file" name="dp" id="dp">
</div>
<input id="pre_btn2" onclick="prev_step2()" type="button" value="Previous">
<input class="submit_btn" onclick="validation(event)" type="submit" value="Submit">
</fieldset>

</form>
</div>
</div>
</body>
</html>
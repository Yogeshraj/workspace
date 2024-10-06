<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="addnew">
	<div class="container">
		<div class="add">
			<!-- <button id="box">Click me</button> -->
			<div  class="circle" id="box">
				<span class="add-plus"><i class="fa fa-close" aria-hidden="true"></i></span>
			</div>

<!-- 			<div  class="result" id="reslut">
				<span class="add-plus"><i class="fa fa-close" aria-hidden="true"></i></span>
			</div> -->

			<form name="add_new" id="add_new" method="post">
        <div class="form_sec">
					<span class="form_head">User Name</span>
          <select class="form_inputs" id="a_user_name" name="a_user_name" required>
  					<option value=""></option>
  					<option value="Deepakpandi">Deepakpandi</option>
  					<option value="Jagadheesh">Jagadheesh</option>
  					<option value="Ponnuchamy">Ponnuchamy</option>
  					<option value="Prabhu">Prabhu</option>
  					<option value="Rajganapathi">Rajganapathi</option>
  					<option value="Rajesh">Rajesh</option>
  					<option value="Sulthana">Sulthana</option>
  					<option value="Veldurai">Veldurai</option>
  					<option value="Vengat">Vengat</option>
  					<option value="Yogesh Raj">Yogesh Raj</option>
  				</select>
				</div>
				<div class="form_sec">
				 <span class="form_head">Date</span>
				<input type="date" name="date" id="date" required>
				</div> 
				<input type="hidden" name="tstamp" id="tstamp" value="" />
				<div class="form_sec">
					<span class="form_head">Project Name</span>
					<input type="text" class="form_inputs" name="project_name" id="project_name" required>
				</div>
				<div class="form_sec">
				<span class="form_head">Client</span>
				<input type="text" class="form_inputs" name="client_name" id="client_name" required>
			</div>
				<div class="form_sec">
				<span class="form_head">Service line</span>
				<select class="form_inputs" id="service_line" name="service_line" required>
					<option value=""></option>
					<option value="web">Web</option>
					<option value="design">Design</option>
					<option value="video">Video</option>
					<option value="others">Others</option>
				</select>
			</div>
				<div class="form_sec">
				<span class="form_head">Job Type</span>
				<select class="form_inputs" id="job_type" name="job_type" required>
					<option value=""></option>
					<option value="L1 PPT/Word/Excel">L1 PPT/Word/Excel</option>
					<option value="Level 2 Presentation">Level 2 Presentation</option>
					<option value="Level 3 Presentation">Level 3 Presentation</option>
					<option value="Production Design">Production Design</option>
					<option value="Creative Design">Creative Design</option>
					<option value="E-Learning">E-Learning</option>
					<option value="Research">Research</option>
					<option value="Front-end Web Development">Front-end Web Development</option>
					<option value="Video & Motion Graphics">Video &amp; Motion Graphics</option>
				</select>
			</div>
			<div class="form_sec">
				<span class="form_head">Working for</span>
				<select class="form_inputs" id="billing_status" name="billing_status" required>
					<option value=""></option>
					<option value="Billable">Billable</option>
					<option value="Non-Billable">Non-Billable</option>
					<option value="Cross Utilization">Cross Utilization</option>
				</select>
			</div>
			<div class="form_sec">
				<span class="form_head">Job Nature</span>
				<select class="form_inputs" id="job_nature" name="job_nature" required>
					<option value=""></option>
					<option value="Production">Production</option>
					<option value="Review">Review</option>
					<option value="Training">Training</option>
					<option value="Rework">Rework</option>
				</select>
			</div>
				<div class="form_sec">
				<span class="form_head">Time taken</span>
				<input type="text" class="form_inputs" name="time_taken" id="time_taken" pattern="([0-9][0-9])(:[0-9][0-9])" required title="Production Time. e.g., 02:20">
			</div>
				<div class="form_sec">
				<span class="form_head">Comments</span>
				<input type="text" class="form_inputs" name="comments" id="comments" required>
			</div>
				<input type="hidden" name="r_no" id="r_no">
				<input class="btn" type="submit" name="submit" value="Submit" id="submit">
			</form>

		</div>
	</div>
</div>

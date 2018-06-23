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
				<label>Date</label>
				<input type="date" name="date" id="date" required>
				<label>Project Name</label>
				<input type="text" name="project_name" id="project_name" required>
				<label>Client</label>
				<input type="text" name="client_name" id="client_name" required><br>
				<label>Working for</label>
				<select id="billing_status" name="billing_status" required>
					<option value="billing">Billing</option>
					<option value="non-Billing">Non-Billing</option>
					<option value="new-implementation">New-implementation</option>
					<option value="training">Training</option>
				</select>
				<label>Service line</label>
				<select id="service_line" name="service_line" required>
					<option value="web">Web</option>
					<option value="design">Design</option>
					<option value="video">Video</option>
					<option value="others">Others</option>
				</select>
				<label>Time taken</label>
				<input type="text" name="time_taken" id="time_taken" pattern="(0[0-9]|1[0-9])(:[0-5][0-9]){1}" required title="Production Time. e.g., 02:20">
				<label>Comments</label>
				<input type="text" name="comments" id="comments" required>
				<input class="btn" type="submit" name="submit" value="Submit" id="submit">
			</form>

		</div>
	</div>
</div>

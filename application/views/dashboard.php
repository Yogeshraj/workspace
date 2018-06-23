<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?php require('header.php'); ?>
<div class="header" id="head">
  <div class="container">
    <div class="logo">
      <img src="<?php echo base_url();?>/assests/images/logo.png" alt="logo">
    </div>
    <div class="menu">
      <div class="info">
        <h2>CS WEB Team</h2>
        <p id="user"><?php echo $this->session->userdata('u_name'); ?></p>
      </div>
      <div class="point">
        <span class="dot"></span>
        <span class="dot"></span>
        <span class="dot"></span>
      </div>
      <div class="drop-down">
        <ul class="drop">
          <li><a href="">Profile</a></li>
          <li><a href="">Privacy</a></li>
          <li><a href="">Settings</a></li>
          <li><a href="<?php echo base_url();?>welcome/logout">Logout</a></li>
        </ul>
      </div>
    </div>
  </div>
</div>
<div class="banner">
  <img src="<?php echo base_url();?>/assests/images/banner.jpg" alt="banner" width="100%">
  <div class="sun_rise"><img src="<?php echo base_url();?>/assests/images/sun_rise.svg" alt="sun rise"><p><?php echo date('h:i A', strtotime(date_sunrise(time(), SUNFUNCS_RET_STRING, 13.0833, 80.2833, 90, 5.30)));?></p></div>
  <div class="sun_set"><img src="<?php echo base_url();?>/assests/images/sun_set.svg" alt="sun set"><p><?php echo date('h:i A', strtotime(date_sunset(time(), SUNFUNCS_RET_STRING, 13.0833, 80.2833, 90, 5.30))); ?></p></div>
</div>
		<div class="section2">
			<div class="container">
        <div class="addons">
        <div class="getbydate">
          <label>Minimum Date:</label><input name="min" id="min" type="text">
          <label>Maximum Date:</label><input name="max" id="max" type="text">
        </div>
				<div  class="circle" id="circle">
					<span class="add-plus"><i class="fa fa-plus" aria-hidden="true"></i></span>
				</div>
      </div>
				<div class="report-table">
							<table width="100%" align="center" id="new_data">
								<thead>
								<tr>
									<th class="heading">
										R. No
									</th>
									<th class="heading">
										Date
									</th>
									<th class="heading">
										Project Name
									</th>
									<th class="heading">
										Cient Name
									</th>
									<th class="heading">
										Billing Status
									</th>
                  <th class="heading">
										Service Line
									</th>
									<th class="heading">
										Time Taken
									</th>
									<th class="heading">
										Comments
									</th>
                  <th class="heading">
										Edit/Delete
									</th>
								</tr>
							</thead>
							</table>
				</div>
			</div>
		</div>
		<?php require('add.php'); ?>
		<?php require('footer.php'); ?>

<!--Desinged and developed by Yogesh Raj -->

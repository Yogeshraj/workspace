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
        <h2>My Team</h2>
        <p id="user"><?php echo $this->session->userdata('u_name'); ?></p>
      </div>
      <div class="point">
        <span class="dot"></span>
        <span class="dot"></span>
        <span class="dot"></span>
      </div>
      <div class="drop-down">
        <ul class="drop" id="drop">
          <li><a href="javascript:void(0)">Profile</a></li>
          <!-- <li><a href="">Privacy</a></li> -->
          <li><a href="javascript:void(0)" id="change_pwd">Change Password</a></li>
          <li><a href="javascript:void(0)" id="full_data"><span class="change_btn">View Monthly Data</span></a></li>
          <li><a href="<?php echo base_url();?>welcome/logout">Logout</a></li>
        </ul>
      </div>
    </div>
  </div>
</div>
<div class="banner">
  <img src="<?php echo base_url();?>/assests/images/banner_2.jpg" alt="banner" width="100%">
    <!-- <div class="sun_rise"><img src="<?php //echo base_url();?>/assests/images/sun_rise.svg" alt="sun rise"><p><?php //echo date('h:i A', strtotime(date_sunrise(time(), SUNFUNCS_RET_STRING, 13.0833, 80.2833, 90, 5.30)));?></p></div> -->
  <div class="sun_rise"><img src="<?php echo base_url();?>/assests/images/chennai_time.png" alt="sun rise"><p id="timestamp"><?php //echo date('h:i:s A', time());?></p></div>
  <div class="sun_set"><img src="<?php echo base_url();?>/assests/images/usa_time.png" alt="sun set"><p id="timestamp_est"><?php //echo date('h:i A', strtotime(date_sunset(time(), SUNFUNCS_RET_STRING, 13.0833, 80.2833, 90, 5.30))); ?></p></div>
</div>
		<div class="section2" id="section2">
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
									<th class="heading name_header">
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
										Job Type
									</th>
									<th class="heading">
										Job Nature
									</th>
									<th class="heading">
										Time Taken
									</th>
									<th class="heading">
										Comments
									</th>
									<th class="heading">
										Action
									</th>
<!--
									<th class="heading">
										Delete
									</th>
-->
								</tr>
							</thead>
							</table>
				</div>
			</div>
			<?php require('add.php'); ?>
		</div>
		<div class="section3" id="section3">
			<div class="container">
        <div class="addons">
        <div class="getbydate_2">
          <label>Minimum Date:</label><input name="min_2" id="min_2" type="text">
          <label>Maximum Date:</label><input name="max_2" id="max_2" type="text">
        </div>
      </div>
				<div class="report-table">
					<table width="100%" align="center" id="new_data" class="data_new">
						<thead>
						<tr>
							<th class="heading">
								R. No
							</th>
							<th class="heading">
								Date
							</th>
							<th class="heading name_header">
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
						</tr>
					</thead>
					</table>
				</div>
			</div>
		</div>


<!-- Loader -->
<div id="loader">
<div id=container-loader>
  <div id=flip>
    <div><div>LEARN</div></div>
    <div><div>WORK</div></div>
    <div><div>PARTY</div></div>
  </div>
  Hard!
</div>
<p class="anote-text">Made with <span class="heart">&hearts;</span> by Yogesh</p>
</div>
<!-- Loader -->

<div id="change_pwd">
  <div class="container">
    <div class="model_box">
      <div  class="circle" id="box">
        <span class="add-plus"><i class="fa fa-close" aria-hidden="true"></i></span>
      </div>
      <h3>Change Password</h3>
      <form class="change_pwd" method="post">
        <div class="errors">
          <?php echo validation_errors('<div class="error">', '</div>'); ?>
        </div>
        <input type="hidden" class="u_id" name="u_id" value="<?php echo $this->session->userdata('s_uid'); ?>">
        <input type="password" class="pwd" name="pwd" placeholder="Enter your current password">
        <input type="password" class="pwd_new" name="pwd_new" placeholder="Enter your New password">
        <input type="password" class="re_pwd_new" name="re_pwd_new" placeholder="Re-Enter your New password">
        <input type="submit" class="submit" name="submit" id="pwd_submit" value="Change Password">
      </form>
    </div>
</div>
</div>


		<?php require('bottom_content.php'); ?>
		<?php require('footer.php'); ?>

<!--Desinged and developed by Yogesh Raj -->

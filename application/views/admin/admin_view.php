<?php require('admin_header.php'); ?>
    <div class="nav">
      <div class="nav-left">
        My Team
      </div>
      <div class="nav-right">
		  <span id="user"><?php echo $this->session->userdata('u_name'); ?></span>
				<a href="<?php echo base_url();?>welcome/logout">Logout</a>
      </div>
    </div>
    <div class="content">
      <aside class="content-left">
      	<ul class="sidebar_menu">
      		<li><a href="javascript:void(0)"><i class="fa fa-angle-right pull-right"></i>View Data</a></li>
      		<li><a href="javascript:void(0)"><i class="fa fa-angle-right pull-right"></i>View Chart</a></li>
      		<li><a href="javascript:void(0)"><i class="fa fa-angle-right pull-right"></i>Add User</a></li>
      		<li><a href="javascript:void(0)"><i class="fa fa-angle-right pull-right"></i>Settings</a></li>
      	</ul>
      </aside>
			<aside class="content-right">
        <div class="addons">
        <div class="getbydate">
          <label>Minimum Date:</label><input name="min" id="min" type="text">
          <label>Maximum Date:</label><input name="max" id="max" type="text">
        </div>
				<div  class="circle" id="circle">
					<span class="add-plus"><i class="fa fa-plus" aria-hidden="true"></i></span>
				</div>
      </div>

                <div class="admin-report-table">
              <table width="100%" align="center" id="admin_data">
                <thead>
                <tr>
                  <th class="heading">
                    R. No
                  </th>
                  <th class="heading open-search">
                    User Name
                  </th>
                  <th class="heading">
                    Date
                  </th>
                  <th class="heading name_header open-search">
                    Project Name
                  </th>
<!--                   <th class="heading open-search">
                    Cient Name
                  </th> -->
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
                </tr>
              </thead>
<!--               <tfoot>
                  <tr>
                      <th colspan="9" style="text-align:right">Total:</th>
                      <th></th>
                      <th></th>
                      <th></th>
                  </tr>
              </tfoot> -->
              </table>
        </div>
      </aside>
    </div>
    <?php require('admin_add.php'); ?>
<?php require('admin_footer.php'); ?>

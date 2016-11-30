<nav class="navbar-default navbar-side" role="navigation">
    <div class="sidebar-collapse">
	<?php //print_r($this->session->user_logged_in['role_id']); exit;?>
        <ul class="nav" id="main-menu">
            <li>
                <a href="<?php echo base_url(); ?>FranchiseeManagement/dashboard"><i class="fa fa-dashboard"></i>
                    Dashboard</a>
            </li>
			<?php if($this->session->user_logged_in['role_id'] == 1 || $this->session->user_logged_in['role_id'] == 5
					 || $this->session->user_logged_in['role_id'] == 2 || $this->session->user_logged_in['role_id'] == 3 ) { ?>
            <li>
                <a href="<?php echo base_url(); ?>FranchiseeManagement"><i class="fa fa-list-alt"></i> Franchisee
                    Registration</a>
            </li>
               <?php } ?>
			<?php if($this->session->user_logged_in['role_id'] == 1 || $this->session->user_logged_in['role_id'] == 5
					 || $this->session->user_logged_in['role_id'] == 2 || $this->session->user_logged_in['role_id'] == 3 ) { ?>   
            <li>
                <a href="#"><i class="fa fa-gift"></i> Franchisee Details<span class="fa fa-angle-right"></span></a>
                <ul class="nav nav-second-level">
				<?php if($this->session->user_logged_in['role_id'] == 1 || $this->session->user_logged_in['role_id'] == 5 
				|| $this->session->user_logged_in['role_id'] == 2 ){?>
                    <li>
                        <a href="<?php echo base_url(); ?>FranchiseeManagement/smfList">State Master Franchisee(s)</a>
                    </li>
					<?php }else{
						
					} ?>
					<?php if($this->session->user_logged_in['role_id'] == 1 || $this->session->user_logged_in['role_id'] == 5
					 || $this->session->user_logged_in['role_id'] == 2 || $this->session->user_logged_in['role_id'] == 3){?>
                    <li>
                        <a href="<?php echo base_url(); ?>FranchiseeManagement/dmfList">District Master
                            Franchisee(s)</a>
                    </li>
					<?php }else{?>
						
					<?php } ?>
					<?php if($this->session->user_logged_in['role_id'] == 1 || $this->session->user_logged_in['role_id'] == 5
					 || $this->session->user_logged_in['role_id'] == 2 || $this->session->user_logged_in['role_id'] == 3
					 || $this->session->user_logged_in['role_id'] == 4){?>
                    <li>
                        <a href="<?php echo base_url(); ?>FranchiseeManagement/ufList">Unit Franchisee(s)</a>
                    </li>
					 <?php }else{?> 
					 <?php } ?>
					<?php if($this->session->user_logged_in['role_id'] == 1 ){?>
                    <li>
                        <a href="<?php echo base_url(); ?>FranchiseeManagement/consultantsList">Consultants</a>
                    </li>
					<?php }else{?> 
					
					<?php }?>
                </ul>
            </li>
					 <?php } ?>     

            <li>
			<?php if($this->session->user_logged_in['role_id'] == 1 || $this->session->user_logged_in['role_id'] == 4) { ?> 
                <a href="<?php echo base_url() ?>StudentManagement"><i class="fa fa-list-alt"></i> Student Registration</a>
            </li>
			<?php } ?>
            <li>

                <a href="#"><i class="fa fa-users"></i> Student Details<span class="fa fa-angle-right"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="<?php echo base_url() ?>StudentManagement/currentStudentsList">Current Students</a>
                    </li>
                    <li>
                        <a href="/CourseComlpetedStudents">Course Completed Students</a>
                    </li>
                </ul>
            </li>
            <!--<li>
                <a href="#"><i class="fa fa-envelope"></i>Messages<span class="fa fa-angle-right"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="/Inbox">Inbox</a>
                    </li>
                    <li>
                        <a href="/ComposeMail">Compose Mail</a>
                    </li>
                    <li>
                        <a href="/SentMails">Sent Mails</a>
                    </li>
                    <li>
                        <a href="/Drafts">Drafts</a>
                    </li>
                    <li class="hide">
                        <a href="#">Folders<span class="fa fa-angle-right"></span></a>
                        <ul class="nav nav-third-level">
                            <li>
                                <a href="#">Folder1</a>
                            </li>
                            <li>
                                <a href="#">Folder2</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>-->
			<li>
                <a href="#"><i class="fa fa-envelope"></i>Exams<span class="fa fa-angle-right"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="StudentManagement/creatExams">Create Exams</a>
                    </li>
                    <li>
                        <a href="StudentManagement/viewExams">View Exams</a>
                    </li>
                  
                   
                </ul>
            </li>
			
			
			
			
            <!--<li>
                <a href="/Kitorders"><i class="fa fa-shopping-cart"></i> Kit Orders</a>
            </li>
            <li>
                <a href="/Bulksms"><i class="fa fa-comment"></i> Bulk SMS</a>
            </li>-->
            <li>
                <!--<a href="/Reports/Revenue"><i class="fa fa-rupee"></i> Revenue</a>-->
                <a href="#"><i class="fa fa-rupee"></i> Revenue<span class="fa fa-angle-right"></span></a>
                <ul class="nav nav-second-level">
                    <!--<li>
                        <a href="<?php /*echo base_url(); */?>RevenueManagement/companyRevenue">Company</a>
                    </li>
                    <li>
                        <a href="<?php /*echo base_url(); */?>RevenueManagement/consultantRevenue">Consultants</a>
                    </li>
                    <li>
                        <a href="<?php /*echo base_url(); */?>RevenueManagement/stateRevenue">State</a>
                    </li>
                    <li>
                        <a href="<?php /*echo base_url(); */?>RevenueManagement/districtRevenue">District</a>
                    </li>-->
                    <li>
                        <a href="<?php echo base_url()?>RevenueManagement/franchiseRevenueGrid">Franchise</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url()?>RevenueManagement/studentRevenueGrid">Student</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="/Attendance"><i class="fa fa-book"></i> Attendance</a>
            </li>
        </ul>
    </div>
</nav>
<!-- /. NAV SIDE  -->
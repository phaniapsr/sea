<nav class="navbar-default navbar-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">
            <li>
                <a href="<?php echo base_url();?>FranchiseeManagement/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a>
            </li>
            <li>
                <a href="<?php echo base_url();?>FranchiseeManagement"><i class="fa fa-list-alt"></i> Franchisee Registration</a>
            </li>

            <li>
                <a href="#"><i class="fa fa-gift"></i> Franchisee Details<span class="fa fa-angle-right"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="<?php echo base_url();?>FranchiseeManagement/smfList">State Master Franchisee(s)</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url();?>FranchiseeManagement/dmfList">District Master Franchisee(s)</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url();?>FranchiseeManagement/ufList">Unit Franchisee(s)</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url();?>FranchiseeManagement/consultantsList">Consultants</a>
                    </li>
                </ul>
            </li>


            <li>
                <a href="<?php echo base_url()?>StudentManagement"><i class="fa fa-list-alt"></i> Student Registration</a>
            </li>
            <li>

                <a href="#"><i class="fa fa-users"></i> Student Details<span class="fa fa-angle-right"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="<?php echo base_url()?>StudentManagement/currentStudentsList">Current Students</a>
                    </li>
                    <li>
                        <a href="/CourseComlpetedStudents">Course Completed Students</a>
                    </li>
                </ul>
            </li>
            <li>
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
            </li>
            <li>
                <a href="/Kitorders"><i class="fa fa-shopping-cart"></i> Kit Orders</a>
            </li>
            <li>
                <a href="/Bulksms"><i class="fa fa-comment"></i> Bulk SMS</a>
            </li>
            <li>
                <a href="/Reports/Revenue"><i class="fa fa-rupee"></i> Revenue</a>
            </li>
            <li>
                <a href="/Attendance"><i class="fa fa-book"></i> Attendance</a>
            </li>
        </ul>
    </div>
</nav>
<!-- /. NAV SIDE  -->
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Skills Education Academy</title>
    <!-- Bootstrap Styles-->

    <link href="<?php echo base_url();?>content/css/bootstrap.css" rel="stylesheet" />
    <!-- FontAwesome Styles-->
    <link href="<?php echo base_url();?>content/css/font-awesome.css" rel="stylesheet" />
    <!-- Morris Chart Styles-->
    <!-- Custom Styles-->
    <link href="<?php echo base_url();?>content/css/custom-styles.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>content/css/seastyle.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>content/css/magnific-popup.css" rel="stylesheet" />


    <!-- Google Fonts-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <!-- TABLE STYLES-->



    <script src="<?php echo base_url();?>scripts/admin/jquery-1.10.2.js"></script>

    <script src="<?php echo base_url();?>scripts/admin/validations/formValidation.min.js"></script>


    <link href="<?php echo base_url();?>scripts/admin/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
    <script src="<?php echo base_url();?>scripts/admin/bootstrap.min.js"></script>

    <script src="<?php echo base_url();?>scripts/admin/validations/bootstraps.min.js"></script>
    <script src="<?php echo base_url();?>scripts/admin/app/lookup.js"></script>
    <script src="<?php echo base_url();?>scripts/admin/jquery.popup.js"></script>
    <script src="<?php echo base_url();?>scripts/admin/revenueconfiguration.js"></script>
    <script src="<?php echo base_url();?>scripts/admin/jquery.magnific-popup.js"></script>
</head>
<body>

<div id="wrapper">
    <nav class="navbar navbar-default top-navbar" role="navigation">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="Index" style="font-size:15px;font-family:Arial;">Skills Education Academy</a>
        </div>

        <ul class="nav navbar-top-links navbar-right">
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                    <i class="fa fa-envelope fa-fw"></i> <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-messages">
                    <li>
                        <a href="#">
                            <div>
                                <strong>John Doe</strong>
                                    <span class="pull-right text-muted">
                                        <em>Today</em>
                                    </span>
                            </div>
                            <div>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s...</div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="#">
                            <div>
                                <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                            </div>
                            <div>Lorem Ipsum has been the industry's standard dummy text ever since an kwilnw...</div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="#">
                            <div>
                                <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                            </div>
                            <div>Lorem Ipsum has been the industry's standard dummy text ever since the...</div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a class="text-center" href="#">
                            <strong>Read All Messages</strong>
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </li>
                </ul>
                <!-- /.dropdown-messages -->
            </li>
            <!-- /.dropdown -->
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                    <i class="fa fa-tasks fa-fw"></i> <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-tasks">
                    <li>
                        <a href="#">
                            <div>
                                <p>
                                    <strong>Task 1</strong>
                                    <span class="pull-right text-muted">60% Complete</span>
                                </p>
                                <div class="progress progress-striped active">
                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                        <span class="sr-only">60% Complete (success)</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="#">
                            <div>

                                <p>
                                    <strong>Task 2</strong>
                                    <span class="pull-right text-muted">28% Complete</span>
                                </p>
                                <div class="progress progress-striped active">
                                    <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="28" aria-valuemin="0" aria-valuemax="100" style="width: 28%">
                                        <span class="sr-only">28% Complete</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="#">
                            <div>
                                <p>
                                    <strong>Task 3</strong>
                                    <span class="pull-right text-muted">60% Complete</span>
                                </p>
                                <div class="progress progress-striped active">
                                    <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                        <span class="sr-only">60% Complete (primary)</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="#">
                            <div>
                                <p>
                                    <strong>Task 4</strong>
                                    <span class="pull-right text-muted">85% Complete</span>
                                </p>
                                <div class="progress progress-striped active">
                                    <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 85%">
                                        <span class="sr-only">85% Complete (danger)</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a class="text-center" href="#">
                            <strong>See All Tasks</strong>
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </li>
                </ul>
                <!-- /.dropdown-tasks -->
            </li>
            <!-- /.dropdown -->
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                    <i class="glyphicon glyphicon-cog"></i> <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-alerts">
                    <li>
                        <a href="RevenueConfiguration">
                            <div>
                                <i class="fa fa-comment fa-fw"></i> RevenueConfiguration
                            </div>
                        </a>
                    </li>

                </ul>
                <!-- /.dropdown-alerts -->
            </li>
            <!-- /.dropdown -->
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                    <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li>
                        <a href="/UserProfile"><i class="fa fa-user fa-fw"></i> User Profile</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="<?php echo base_url();?>Login/logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                    </li>
                </ul>
                <!-- /.dropdown-user -->
            </li>
            <!-- /.dropdown -->
        </ul>
    </nav>
    <!--/. NAV TOP  -->
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

                    </ul>
                </li>


                <li>
                    <a href="<?php echo base_url()?>StudentManagement"><i class="fa fa-list-alt"></i> Student Registration</a>
                </li>
                <li>

                    <a href="#"><i class="fa fa-users"></i> Student Details<span class="fa fa-angle-right"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="/CurrentStudent">Current Students</a>
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
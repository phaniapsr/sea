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
    <div id="small-dialog1" class="">
        <form novalidate="novalidate" id="loginform" method="post" class="form-horizontal fv-form fv-form-bootstrap" name="loginform" action="<?php echo base_url();?>Login/forgotpassword">
            <button style="display: none; width: 0px; height: 0px;" class="fv-hidden-submit" type="submit"></button>
			
            <div class="pop_up">
                <div class="row form-group">
				<?php if($this->session->flashdata('message')) {?>
			 <label><span style="color: #CC6633"><?php echo $this->session->flashdata('message');?><span></label>
			<?php }?>
                    <center>
                        <h1>
                            <div id="cse">
                                <div style="display: block; opacity: 1; transition-property: opacity; transition-duration: 500ms; transition-timing-function: ease-in-out;">Forgot Password </div>
                            </div>
                        </h1>
                    </center>
                </div>
                <div class="login_result" id="login_result"></div>
                <div class="row form-group">
                    <div class="col-md-1 col-sm-1 "></div>
                    <div class="col-md-10 col-sm-10 col-xs-10">
                    </div>
                </div>
                <div class="row form-group" id="frmCheckUsername">
                    <div class="col-md-1 col-sm-1 "></div>
                    <div class="col-md-10 col-sm-10 col-xs-10 has-feedback">
                        <input data-fv-field="username" id="email_id" name="email" placeholder="Enter email" class="form-control" type="text"><i data-fv-icon-for="username" class="form-control-feedback fv-icon-no-label" style="display: none;"></i>
                        <span style="color:red"><?php echo form_error('email');?></span></div>
                </div>
               
                <div style="display: none;" class="row form-group" id="login-error-msg">
                    <div class="col-md-1 col-sm-1"></div>
                    <div class="col-md-10 col-sm-10 col-xs-10">
                        <label style="color:red;" class="danger">The user name or password provided is incorrect.</label>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-1 col-sm-1"></div>
                    <div class="col-md-2 col-sm-2 col-xs-2">
                        <input type="submit" name="send" id="send_id" class="btn btn-success btn-md as_button" value="Send">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8" style="margin-top:5px;">
                        <a class="popup-with-zoom-anim-cse pull-right" style="text-decoration:none;" href="#small-dialog2"> </a>
                    </div>
                </div>
            </div>
        </form>
        <button title="Close (Esc)" type="button" class="mfp-close">×</button>
    </div>
</div>
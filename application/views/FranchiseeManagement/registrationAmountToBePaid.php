<div class="row">
    <div class="col-md-12">
        <h1 class="page-header">Franchisee Payment Details</h1>
    </div>
</div>
<!-- /. ROW  -->
<label style="color:Green;font-size:28px;"></label>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div id="margin-top" class="panel-body">
                <form id="registrationAmountToBePaid" action="<?php echo base_url() ?>FranchiseeManagement/paymentGatewayPage" name="form2" class="form-horizontal" method="POST" ng-app="app" ng-controller="Ctrl" enctype="multipart/form-data">
                    <div class="row">
					<div class="col-lg-6">
                            <div class="form-group">
                                <label class="col-lg-5 col-lg-offset-1 control-label" style="text-align: left">Franchisee Name</label>
                                <div id="franchisee_name_id" class="col-lg-6"><?php echo $data[0]['first_name'].$data[0]['middle_name'].' '.$data[0]['last_name']?></div>
                                <input type="hidden" name="user_id" id="user_id" value="<?php echo $data[0]['id']?>">
                            </div>
                        </div>
					    <div class="col-lg-6">
                            <div class="form-group">
                                <label class="col-lg-5 col-lg-offset-1 control-label" style="text-align: left">Franchisee Email</label>
                                <div id="franchisee_email_id" class="col-lg-6"><?php echo $data[0]['email']?></div>
                                <input type="hidden" name="email" id="hid_franchisee_email_id" value="<?php echo $data[0]['email']?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="col-lg-5 col-lg-offset-1 control-label" style="text-align: left">License Amount</label>
                                <div id="franchisee_license_amount_id" class="col-lg-6"><?php echo $data[0]['lf_amount']?></div>
                                <input type="hidden" name="license_amount" id="hid_franchisee_license_amount_id" value="<?php echo $data[0]['lf_amount']?>">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="col-lg-5 col-lg-offset-1 control-label" style="text-align: left">Tax Amount</label>
                                <div id="franchisee_tax_amount_id" class="col-lg-6"><?php echo $data[0]['tax_amount']?></div>
                                <input type="hidden" name="tax_amount" id="hid_franchisee_tax_amount_id" value="<?php echo $data[0]['tax_amount']?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="col-lg-5 col-lg-offset-1 control-label" style="text-align: left">Total Amount</label>
                                <div id="franchisee_total_amount_id" class="col-lg-6"><?php echo $data[0]['lf_amount']+$data[0]['tax_amount']?></div>
                                <input type="hidden" name="total_amount" id="hid_franchisee_total_amount_id" value="<?php echo $data[0]['lf_amount']+$data[0]['tax_amount']?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <center>
                                <div>
                                    <button type="button" id="paynow" role="button" onclick="alert('Payment done successfully')" class="btn btn-primary" name="signup" value="Sign up" style="margin:10px;">
                                        Pay Now
                                    </button>
                                    <!--<button type="reset" class="btn btn-primary" name="cancel" style="margin:10px;">
                                        CANCEL
                                    </button>-->
                                </div>
                            </center>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <p id="message_from_server" class="text-success"></p>
                        </div>
                    </div>
                    <div class="modal fade" id="success" tabindex="-1" role="dialog"
                         aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <label style="color:Green;font-size:28px;"></label>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->
                    <!-- /Modal -->
                </form>
                <!-- /.col-lg-6 (nested) -->
            </div>
            <!-- /.row (nested) -->
        </div>
        <!-- /.panel-body -->
    </div>
    <!-- /.panel -->
</div>
<div class="modal fade" id="success" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" style="color:green"></h4>
            </div>
        </div>
    </div>
</div>
<!-- /.col-lg-12 -->
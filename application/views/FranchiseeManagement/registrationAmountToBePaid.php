<script type="application/javascript"
        src="<?php echo base_url() ?>scripts/admin/franchiseeRegistration/franchiseeRegistration.js"></script>
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-header">Franchisee Registration Amount Confirmation</h1>
            </div>
        </div>
        <!-- /. ROW  -->
        <label style="color:Green;font-size:28px;"></label>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div id="margin-top" class="panel-body">
                        <form id="registrationAmountToBePaid"
                              action="<?php echo base_url() ?>FranchiseeManagement/paymentGatewayPage" name="form2"
                              class="form-horizontal" method="POST" ng-app="app" ng-controller="Ctrl"
                              enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="col-lg-5 col-lg-offset-1 control-label" style="text-align: left">Select
                                            Franchisee *</label>
                                        <div class="col-lg-6">
                                            <select class="form-control" name="franchiseetypeId">
                                                <option value="">Select</option>
                                                <option value="2">State Master Franchisee</option>
                                                <option value="3">District Master Franchisee</option>
                                                <option value="4">Unit Franchisee</option>
                                                <option value="5">Consultant</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <center>
                                        <div>
                                            <button type="submit" id="signup" role="button" class="btn btn-primary"
                                                    name="signup" value="Sign up" style="margin:10px;"><span
                                                    class="glyphicon glyphicon-save" style="margin:3px;"></span>SUBMIT
                                            </button>
                                            <button type="reset" class="btn btn-primary" name="cancel"
                                                    style="margin:10px;"><span class="glyphicon glyphicon-remove"
                                                                               style="margin:3px;"></span>CANCEL
                                            </button>
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
                                            <button type="button" class="close" data-dismiss="modal"
                                                    aria-hidden="true">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            <label style="color:Green;font-size:28px;"></label>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close
                                            </button>
                                        </div>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->
                            <!-- /Modal -->
                            <script>
                                $('#btn').click(function () {
                                    //alert('clcikec');
                                    $(document).ready(function () {
                                        $("#datepicker-my").datepicker({
                                            //dateFormat: "dd-mm-yy".replace('T00:00:00', ''),
                                            changeMonth: true,
                                            altField: '#hiddenFieldID',
                                            altFormat: "mm/dd/yy",
                                            changeYear: true,
                                            yearRange: '1950:2017'
                                        }).focus();
                                    });
                                });
                            </script>

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
        <link href="Content/css/tjquery-ui.css" rel="stylesheet"/>
        <script src="Scripts/admin/validations/jquery-teacher.js"></script>
        <script src="Scripts/admin/jquery-ui.js"></script>

    </div>
    <footer><p>All right reserved by: <a href="#">LemonBridge</a></p></footer>
</div>
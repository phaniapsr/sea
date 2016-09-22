</div>
<script src="<?php echo base_url();?>scripts/admin/jquery.metisMenu.js"></script>
<!-- DATA TABLE SCRIPTS -->
<script src="<?php echo base_url();?>scripts/admin/dataTables/jquery.dataTables.js"></script>
<script src="<?php echo base_url();?>scripts/admin/dataTables/dataTables.bootstrap.js"></script>
<script>
    $(document).ready(function () {
        $('#dataTables-example').dataTable();
    });
</script>
<!-- Custom Js -->
<script src="<?php echo base_url();?>scripts/admin/custom-scripts.js"></script>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<div class="modal fade" id="composemail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title">Compose Mail</h4></center>
            </div>
            <div class="modal-body">
                <form role="form">
                    <div class="form-group">
                        <input class="form-control" id="inputdefault" type="text" placeholder="To">
                    </div>
                </form>
                <form role="form">
                    <div class="form-group">
                        <input class="form-control" id="inputdefault" type="text" placeholder="Subject">
                    </div>
                </form>
                <textarea class="form-control" rows="10" id="comment"></textarea>
                <div>
                    <input type="file" name="attachment" id="attachment" onchange="document.getElementById('moreUploadsLink').style.display = 'block';" />				<div id="moreUploads"></div>
                    <div id="moreUploadsLink" style="display:none;"><a href="javascript:addFileInput();">Attach another File</a></div>
                </div>
            </div>
            <div class="modal fade" id="certificate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
                        <div class="modal-body">
                            Hi
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
            <div class="modal-footer">
                <button type="button" class="btn pull-left">Send</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- Modal For Deactivate -->
<script src="<?php echo base_url();?>scripts/admin/jquery-ui.js"></script>
</body>
</html>
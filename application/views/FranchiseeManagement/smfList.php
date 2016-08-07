<!--<script type="application/javascript" src="<?php /*echo base_url()*/?>scripts/admin/franchiseeRegistration/franchiseeRegistration.js"></script>-->
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-header">State Master Franchise List</h1>
            </div>
        </div>
        <!-- /. ROW  -->
        <label style="color:Green;font-size:28px;"></label>
        <div class="row">
            <div class="col-lg-12">
                <table class="table table-striped table-bordered table-hover no-footer dataTable" id="dt-state-franchisee" style="font-size:14px;" aria-describedby="dt-state-franchisee_info">
                        <thead>
                            
                        <tr role="row">
						<th>ID</th>
						<th>USER NAME</th>
						<th>EMAIL</th>
						<th>FIRST NAME</th>
						<th>LAST NAME</th>
						<th>MIDDLE NAME</th>
						<th></th>
						<th></th>
						
						</tr></thead>
                        <tbody>
						<?php 
        $i=1;
		foreach ($data['smf'] as $row){ ?>
						<tr class="odd">
						<td><?php echo $row['id'];?></td>
						<td><?php echo $row['username'];?></td>
						<td><?php echo $row['email'];?></td>
						<td><?php echo $row['first_name'];?></td>
						<td><?php echo $row['last_name'];?></td>
						<td><?php echo $row['middle_name'];?></td>
						<td><input type="button" class="btn btn-info" value="Revinue configuration" /></td>
						<td><input type="button" class="btn btn-info" value="Active" /></td>
						
						</tr>
		<?php }?>				
						</tbody>
                    </table>
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
        <link href="Content/css/tjquery-ui.css" rel="stylesheet" />
        <script src="Scripts/admin/validations/jquery-teacher.js"></script>
        <script src="Scripts/admin/jquery-ui.js"></script>

    </div>
    <footer><p>All right reserved by: <a href="http://friendsfocus.in/">LemonBridge</a></p></footer>
</div>
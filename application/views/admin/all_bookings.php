   <link href="<?php echo base_url() ?>admin_assets/plugins/bower_components/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
    <!-- Menu CSS -->
  
  <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Data Table</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> 
					    <ol class="breadcrumb">
                            <li><a href="<?php echo site_url('Admin/manage_properties'); ?>">Dashboard</a></li>
                            
                            <li class="active">bookings</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /row -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title m-b-0">Bookings</h3>
                            <p class="text-muted m-b-30">All Bookings</p>
                            <div class="table-responsive">
                                <table id="myTable" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Property</th>
                                            <th>Check in</th>
                                            <th>Check out</th>
                                            <th>Email</th>
                                            <th>Date of Booking</th>
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
									
									<?php foreach($bookings as $b){ ?>
                                        <tr>
                                            <td><?php echo $b->prop_title; ?></td>
                                            <td><?php echo date ('M d, Y',strtotime($b->check_in)); ?></td>
                                            <td><?php echo date ('M d, Y',strtotime($b->check_out)); ?></td>
                                            <td><?php echo $b->email; ?></td>
                                            <td><?php echo date ('M d, Y',strtotime($b->timestamp)); ?></td>
                                          
                                        </tr>
									<?php } ?>
									   
									   
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                   </div>
                <!-- /.row -->
                <!-- .right-sidebar -->
               <!-- /.right-sidebar -->
            </div>
          
		   <script src="<?php echo base_url(); ?>admin_assets/plugins/bower_components/datatables/jquery.dataTables.min.js"></script>
    <!-- start - This is for export functionality only -->
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
	
	
	
	 <script>
        $(document).ready(function () {
            $('#myTable').DataTable();
            $(document).ready(function () {
                var table = $('#example').DataTable({
                    "columnDefs": [
                        {
                            "visible": false
                            , "targets": 2
                        }
          ]
                    , "order": [[2, 'asc']]
                    , "displayLength": 25
                    , "drawCallback": function (settings) {
                        var api = this.api();
                        var rows = api.rows({
                            page: 'current'
                        }).nodes();
                        var last = null;
                        api.column(2, {
                            page: 'current'
                        }).data().each(function (group, i) {
                            if (last !== group) {
                                $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
                                last = group;
                            }
                        });
                    }
                });
                // Order by the grouping
                $('#example tbody').on('click', 'tr.group', function () {
                    var currentOrder = table.order()[0];
                    if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                        table.order([2, 'desc']).draw();
                    }
                    else {
                        table.order([2, 'asc']).draw();
                    }
                });
            });
        });
        $('#example23').DataTable({
            dom: 'Bfrtip'
            , buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
        });
    </script>
<!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="{{url('/')}}/assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{url('/')}}/assets/plugins/bootstrap/js/popper.min.js"></script>
    <script src="{{url('/')}}/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{url('/')}}/assets/js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="{{url('/')}}/assets/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="{{url('/')}}/assets/js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="{{url('/')}}/assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="{{url('/')}}/assets/plugins/sparkline/jquery.sparkline.min.js"></script>
    <!--stickey kit -->
    <script src="{{url('/')}}/assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="{{url('/')}}/assets/plugins/sparkline/jquery.sparkline.min.js"></script>
    <script src="{{url('/')}}/assets/plugins/sparkline/jquery.sparkline.min.js"></script>
    <!--Custom JavaScript -->
    <script src="{{url('/')}}/assets/js/custom.min.js"></script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <!-- chartist chart -->
    <script src="{{url('/')}}/assets/plugins/chartist-js/dist/chartist.min.js"></script>
    <script src="{{url('/')}}/assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js"></script>
    <!--c3 JavaScript -->
    <script src="{{url('/')}}/assets/plugins/d3/d3.min.js"></script>
    <script src="{{url('/')}}/assets/plugins/c3-master/c3.min.js"></script>
    <!-- Vector map JavaScript -->
    <script src="{{url('/')}}/assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="{{url('/')}}/assets/plugins/vectormap/jquery-jvectormap-us-aea-en.js"></script>
    <script src="{{url('/')}}/assets/js/dashboard2.js"></script>
    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="{{url('/')}}/assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>

    <!-- This is data table -->
    <script src="{{url('/')}}/assets/plugins/datatables/jquery.dataTables.min.js"></script>

     <!-- end - This is for export functionality only -->
     <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
            $(document).ready(function() {
                var table = $('#example').DataTable({
                    "columnDefs": [{
                        "visible": false,
                        "targets": 2
                    }],
                    "order": [
                        [2, 'asc']
                    ],
                    "displayLength": 25,
                    "drawCallback": function(settings) {
                        var api = this.api();
                        var rows = api.rows({
                            page: 'current'
                        }).nodes();
                        var last = null;
                        api.column(2, {
                            page: 'current'
                        }).data().each(function(group, i) {
                            if (last !== group) {
                                $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
                                last = group;
                            }
                        });
                    }
                });
                // Order by the grouping
                $('#example tbody').on('click', 'tr.group', function() {
                    var currentOrder = table.order()[0];
                    if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                        table.order([2, 'desc']).draw();
                    } else {
                        table.order([2, 'asc']).draw();
                    }
                });
            });
        });
        $('#example23').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
        </script>

<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- All Jquery -->
<!-- ============================================================== -->
<script src="{{asset('res/assets/node_modules/jquery/jquery-3.2.1.min.js')}}"></script>
<!-- Bootstrap popper Core JavaScript -->
<script src="{{asset('res/assets/node_modules/popper/popper.min.js')}}"></script>
<script src="{{asset('res/assets/node_modules/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- slimscrollbar scrollbar JavaScript -->
<script src="{{asset('res/dist/js/perfect-scrollbar.jquery.min.js')}}"></script>
<!--Wave Effects -->
<script src="{{asset('res/dist/js/waves.js')}}"></script>
<!--Menu sidebar -->
<script src="{{asset('res/dist/js/sidebarmenu.js')}}"></script>
<!--Custom JavaScript -->
<script src="{{asset('res/dist/js/custom.min.js')}}"></script>
<script src="{{asset('res/dist/js/pages/jquery.PrintArea.js')}}" type="text/JavaScript"></script>
<!-- ============================================================== -->
<!-- This page plugins -->
<!-- ============================================================== -->
<!--morris JavaScript -->
<script src="{{asset('res/assets/node_modules/raphael/raphael-min.js')}}"></script>
<script src="{{asset('res/assets/node_modules/morrisjs/morris.min.js')}}"></script>
<script src="{{asset('res/assets/node_modules/jquery-sparkline/jquery.sparkline.min.js')}}"></script>
<!-- Popup message jquery -->
<script src="{{asset('res/assets/node_modules/toast-master/js/jquery.toast.js')}}"></script>
<!-- This is data table -->
<script src="{{asset('res/assets/node_modules/datatables/jquery.dataTables.min.js')}}"></script>
<script type="text/javascript" src="https://cdn.datatables.net/fixedcolumns/3.2.1/js/dataTables.fixedColumns.min.js"></script>

<!-- start - This is for export functionality only -->
<script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
<script src="{{asset('res/assets/node_modules/bootstrap-table/dist/bootstrap-table.min.js')}}"></script>
<script src="{{asset('res/assets/node_modules/bootstrap-table/dist/bootstrap-table.ints.js')}}"></script>
<!-- Sweet-Alert  -->
<script src="{{asset('res/assets/node_modules/sweetalert/sweetalert.min.js')}}"></script>
<script src="{{asset('res/assets/node_modules/sweetalert/jquery.sweet-alert.custom.js')}}"></script>

<!-- Chart JS -->
<!--<script src="{{asset('res/dist/js/dashboard1.js')}}"></script>-->
<script>
    @if($mensaje != "")


    $(function() {
        "use strict";
        //This is for the Notification top right
        $.toast({
            heading: 'Soleman - Inventario',
            text: '{{$mensaje}}',
            position: 'top-right',
            loaderBg: '#ff6849',
            icon: 'info',
            hideAfter: 3500,
            stack: 6
        })
        // Dashboard 1 Morris-chart
        Morris.Area({
            element: 'morris-area-chart',
            data: [{
                period: '2010',
                iphone: 50,
                ipad: 80,
                itouch: 20
            }, {
                period: '2011',
                iphone: 130,
                ipad: 100,
                itouch: 80
            }, {
                period: '2012',
                iphone: 80,
                ipad: 60,
                itouch: 70
            }, {
                period: '2013',
                iphone: 70,
                ipad: 200,
                itouch: 140
            }, {
                period: '2014',
                iphone: 180,
                ipad: 150,
                itouch: 140
            }, {
                period: '2015',
                iphone: 105,
                ipad: 100,
                itouch: 80
            }, {
                period: '2016',
                iphone: 250,
                ipad: 150,
                itouch: 200
            }],
            xkey: 'period',
            ykeys: ['iphone', 'ipad', 'itouch'],
            labels: ['iPhone', 'iPad', 'iPod Touch'],
            pointSize: 3,
            fillOpacity: 0,
            pointStrokeColors: ['#00bfc7', '#fb9678', '#9675ce'],
            behaveLikeLine: true,
            gridLineColor: '#e0e0e0',
            lineWidth: 3,
            hideHover: 'auto',
            lineColors: ['#00bfc7', '#fb9678', '#9675ce'],
            resize: true
        });
        Morris.Area({
            element: 'morris-area-chart2',
            data: [{
                period: '2010',
                SiteA: 0,
                SiteB: 0,
            }, {
                period: '2011',
                SiteA: 130,
                SiteB: 100,
            }, {
                period: '2012',
                SiteA: 80,
                SiteB: 60,
            }, {
                period: '2013',
                SiteA: 70,
                SiteB: 200,
            }, {
                period: '2014',
                SiteA: 180,
                SiteB: 150,
            }, {
                period: '2015',
                SiteA: 105,
                SiteB: 90,
            }, {
                period: '2016',
                SiteA: 250,
                SiteB: 150,
            }],
            xkey: 'period',
            ykeys: ['SiteA', 'SiteB'],
            labels: ['Site A', 'Site B'],
            pointSize: 0,
            fillOpacity: 0.4,
            pointStrokeColors: ['#b4becb', '#01c0c8'],
            behaveLikeLine: true,
            gridLineColor: '#e0e0e0',
            lineWidth: 0,
            smooth: false,
            hideHover: 'auto',
            lineColors: ['#b4becb', '#01c0c8'],
            resize: true
        });
    });
    // sparkline
    var sparklineLogin = function() {
        $('#sales1').sparkline([20, 40, 30], {
            type: 'pie',
            height: '90',
            resize: true,
            sliceColors: ['#01c0c8', '#7d5ab6', '#ffffff']
        });
        $('#sparkline2dash').sparkline([6, 10, 9, 11, 9, 10, 12], {
            type: 'bar',
            height: '154',
            barWidth: '4',
            resize: true,
            barSpacing: '10',
            barColor: '#25a6f7'
        });

    };
    var sparkResize;

    $(window).resize(function(e) {
        clearTimeout(sparkResize);
        sparkResize = setTimeout(sparklineLogin, 500);
    });
    sparklineLogin();
    @endif
</script>
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
</script>
<script>
    $('#example23').DataTable({
        dom: 'Bfrtip',
        "paging": false,
        "ordering": false,
        "info": false,
        "sScrollY": "500px",
        "scrollX": true,
        buttons: [
            'copy', 'excel',
            {
                extend: 'pdfHtml5',
                orientation: 'landscape',
                pageSize: 'LEGAL'
            },
            {
                extend: "print",
                className: "btn-sm",
                orientation: 'landscape',
                pageSize: 'LEGAL'
            }

        ],
        "columnDefs": [{
                "width": "10%",
                "targets": 0
            },
            {
                "width": "10%",
                "targets": 1
            }
        ],


    });
    /*$(document).ready(function() {
        $('#example23').DataTable().destroy();
        $('#example23').find('tbody').append("<tr><td></td><td></td><td></td><td></td><td></td><td></td></tr>");
      
    });*/
</script>
<script>
    $(document).ready(function() {
        $("#print").click(function() {
            var mode = 'iframe'; //popup
            var close = mode == "popup";
            var options = {
                mode: mode,
                popClose: close,
                overrideElementCSS: ['<%=Url.Content("~/Content/print.css")%>']
            };
            $("div.printableArea").printArea(options);
        });
    });
</script>

<script src="{{asset('res/assets/node_modules/toast-master/js/jquery.toast.js')}}"></script>
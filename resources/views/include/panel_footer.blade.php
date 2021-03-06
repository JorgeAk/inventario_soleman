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
<!-- Footable -->
<script src="{{asset('res/assets/node_modules/footable/js/footable.all.min.js')}}"></script>
<!--FooTable init-->
<script src="{{asset('res/dist/js/pages/footable-init.js')}}"></script>
<script src="{{asset('res/dist/js/pages/jasny-bootstrap.js')}}"></script>
<!-- Plugin JavaScript -->
<script src="{{asset('res/assets/node_modules/moment/moment.js')}}"></script>
<script src="{{asset('res/assets/node_modules/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js')}}"></script>
<!-- Clock Plugin JavaScript -->
<script src="{{asset('res/assets/node_modules/clockpicker/dist/jquery-clockpicker.min.js')}}"></script>
<!-- Color Picker Plugin JavaScript -->
<script src="{{asset('res/assets/node_modules/jquery-asColorPicker-master/libs/jquery-asColor.js')}}"></script>
<script src="{{asset('res/assets/node_modules/jquery-asColorPicker-master/libs/jquery-asGradient.js')}}"></script>
<script src="{{asset('res/assets/node_modules/jquery-asColorPicker-master/dist/jquery-asColorPicker.min.js')}}"></script>
<!-- Date Picker Plugin JavaScript -->
<script src="{{asset('res/assets/node_modules/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
<!-- Date range Plugin JavaScript -->
<script src="{{asset('res/assets/node_modules/timepicker/bootstrap-timepicker.min.js')}}"></script>
<script src="{{asset('res/assets/node_modules/bootstrap-daterangepicker/daterangepicker.js')}}"></script>

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
    $('#example24').DataTable({
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
                pageSize: 'TABLOID',
            }

        ],
        "aoColumnDefs": [{
                "sWidth": "100px",
                "aTargets": [0]
            },
            {
                "sWidth": "200px",
                "aTargets": [1]
            },
            {
                "sWidth": "70px",
                "aTargets": [2]
            }
        ]


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

    $('#example29').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
    $('#example45').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'excel'
        ],
        
       
    });

    $('#example30').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });

    $('#existen-table').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'excel'
        ]
    });
</script>
<script>
    // Date Picker
    jQuery('.mydatepicker, #datepicker').datepicker();
    jQuery('#datepicker-autoclose').datepicker({
        autoclose: true,
        todayHighlight: true
    });
    jQuery('#date-range').datepicker({
        toggleActive: true
    });
    jQuery('#datepicker-inline').datepicker({
        todayHighlight: true
    });
    // Daterange picker
    $('.input-daterange-datepicker').daterangepicker({
        buttonClasses: ['btn', 'btn-sm'],
        applyClass: 'btn-danger',
        cancelClass: 'btn-inverse'
    });
    $('.input-daterange-timepicker').daterangepicker({
        timePicker: true,
        format: 'MM/DD/YYYY h:mm A',
        timePickerIncrement: 30,
        timePicker12Hour: true,
        timePickerSeconds: false,
        buttonClasses: ['btn', 'btn-sm'],
        applyClass: 'btn-danger',
        cancelClass: 'btn-inverse'
    });
    $('.input-limit-datepicker').daterangepicker({
        format: 'MM/DD/YYYY',
        minDate: '06/01/2015',
        maxDate: '06/30/2015',
        buttonClasses: ['btn', 'btn-sm'],
        applyClass: 'btn-danger',
        cancelClass: 'btn-inverse',
        dateLimit: {
            days: 6
        }
    });
</script>
<script type = "text/javascript">
  $(document).ready(function(){
    
    $("#origen").change(function(){
       
        var productos = $("#productos");
        var op_origen = $(this);
        if($(this).val() != '')
        {
            $.ajax({
                data: { id : op_origen.val() },
                url:   '{{ route('admin/obtener/prod') }}',
                type:  'GET',
                dataType: 'json',
                beforeSend: function () 
                {
                    op_origen.prop('disabled', true);
                  productos.prop('disabled', true);
                  //alert('Espera unos segundos...');
                },
                success:  function (r) 
                {
                    op_origen.prop('disabled', false);
                    // Limpiamos el select
                    productos.find('option').remove();
                    productos.append('<option class="hidden"  selected disabled>Selecciona una opcion </option>');
                    $(r).each(function(i, v){ // indice, valor
                      productos.append('<option value="' + v.id_producto + '">' + v.nombre+ '</option>');
                    })
                    productos.prop('disabled', false);
                   
                },
                error: function()
                {
                    alert('Ocurrio un error en el servidor ..');
                    productos.prop('disabled', false);
                }
            });
        }
        else
        {
            cursos.find('option').remove();
            cursos.prop('disabled', true);
        }
    })
})
</script>

<script type = "text/javascript">
  $(document).ready(function(){
    
    $("#categoria-pr").change(function(){
       
        var sub_categorias = $("#sub_categorias");
        var cat_op_origen = $(this);
        if($(this).val() != '')
        {
            $.ajax({
                data: { id : cat_op_origen.val() },
                url:   '{{ route('admin/obtener/sub/cat') }}',
                type:  'GET',
                dataType: 'json',
                beforeSend: function () 
                {
                    cat_op_origen.prop('disabled', true);
                    sub_categorias .prop('disabled', true);
                  //alert('Espera unos segundos...');
                },
                success:  function (r) 
                {
                    cat_op_origen.prop('disabled', false);
                    // Limpiamos el select
                    sub_categorias.find('option').remove();
                    sub_categorias.append('<option class="hidden"  selected disabled>Selecciona una opcion </option>');
                    $(r).each(function(i, v){ // indice, valor
                        sub_categorias.append('<option value="' + v.id + '">' + v.nombre+ '</option>');
                    })
                    sub_categorias.prop('disabled', false);
                   
                },
                error: function()
                {
                    alert('Ocurrio un error en el servidor ..');
                    sub_categorias.prop('disabled', false);
                }
            });
        }
        else
        {
            cursos.find('option').remove();
            cursos.prop('disabled', true);
        }
    })
})
</script>

<script type = "text/javascript">
  $(document).ready(function(){
            $.ajax({
                data: {},
                url:   '{{ route('estadistico') }}',
                type:  'GET',
                dataType: 'json',
                success:  function (r) 
                {
                    $(r).each(function(i, v){ // indice, valor
                        document.getElementById("produc-id").innerHTML = v.productos;
                        document.getElementById("suc-id").innerHTML = v.sucursales;
                        document.getElementById("tras-id").innerHTML = v.traslados;
                        document.getElementById("diag-id").innerHTML = v.diagramas;
                        
                    })
                },
                error: function()
                {
                    alert('Ocurrio un error en el servidor ..');
                    sub_categorias.prop('disabled', false);
                }
            });
       
    
})
</script>


<script src="{{asset('res/assets/node_modules/toast-master/js/jquery.toast.js')}}"></script>
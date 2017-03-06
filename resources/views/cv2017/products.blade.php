<!-- Bread crumb is created dynamically -->
<!-- row -->
<div class="row">

    @include('layouts.bread-crumb-header', ['title' => 'Vacacionales', 'subtitle' => 'Productos'])

</div>
<!-- end row -->

<!-- MODAL PLACE HOLDER -->
<div class="modal fade" id="remoteModal" tabindex="-1" role="dialog" aria-labelledby="remoteModalLabel" aria-hidden="true"></div>
<!-- END MODAL -->

<!--
	The ID "widget-grid" will start to initialize all widgets below
	You do not need to use widgets if you dont want to. Simply remove
	the <section></section> and you can use wells or panels instead
	-->

<!-- widget grid -->
<section id="widget-grid" class="">

    <!-- row -->
    <div class="row">

        <!-- NEW WIDGET START -->
        <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

            <!-- Widget ID (each widget will need unique ID)-->
            <div class="jarviswidget jarviswidget-color-blueDark" id="wid-id-1" data-widget-editbutton="false" data-widget-colorbutton="false">
                <!-- widget options:
                usage: <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false">

                data-widget-colorbutton="false"
                data-widget-editbutton="false"
                data-widget-togglebutton="false"
                data-widget-deletebutton="false"
                data-widget-fullscreenbutton="false"
                data-widget-custombutton="false"
                data-widget-collapsed="true"
                data-widget-sortable="false"

                -->
                <header>
                    <span class="widget-icon"> <i class="fa fa-table"></i> </span>
                    <h2>LISTA DE PRODUCTOS </h2>
                </header>

                <!-- widget div-->
                <div>

                    <!-- widget edit box -->
                    <div class="jarviswidget-editbox">
                        <!-- This area used as dropdown edit box -->

                    </div>
                    <!-- end widget edit box -->

                    <!-- widget content -->
                    <div class="widget-body no-padding">
                        <table id="datatable_fixed_column" class="table table-striped table-bordered table-hover" width="100%">
                            <thead>
                            <tr>
                                <th data-class="expand">Cod</th>
                                <th >Deporte</th>
                                <th data-hide="phone, tablet">Detalle</th>
                                <th data-hide="phone, tablet">Edad Minima</th>
                                <th data-hide="phone,tablet">Edad Maxima</th>
                                <th data-hide="phone,tablet">Horarios</th>
                                <th data-hide="phone,tablet">Dias</th>
                                <th data-hide="phone,tablet">Cupos</th>
                                <th data-hide="phone,tablet">Precio</th>
                                <th>Estado</th>
                            </tr>
                            </thead>

                            <tbody>
                                <!-- table content -->
                            </tbody>

                        </table>

                    </div>
                    <!-- end widget content -->

                </div>
                <!-- end widget div -->

            </div>
            <!-- end widget -->

        </article>
        <!-- WIDGET END -->

    </div>

    <!-- end row -->

    <!-- row -->

    <div class="row">

        <!-- a blank row to get started -->
        <div class="col-sm-12">
            <!-- your contents here -->
        </div>

    </div>

    <!-- end row -->

</section>
<!-- end widget grid -->

<script type="text/javascript">


    /* DO NOT REMOVE : GLOBAL FUNCTIONS!
     *
     * pageSetUp(); WILL CALL THE FOLLOWING FUNCTIONS
     *
     * // activate tooltips
     * $("[rel=tooltip]").tooltip();
     *
     * // activate popovers
     * $("[rel=popover]").popover();
     *
     * // activate popovers with hover states
     * $("[rel=popover-hover]").popover({ trigger: "hover" });
     *
     * // activate inline charts
     * runAllCharts();
     *
     * // setup widgets
     * setup_widgets_desktop();
     *
     * // run form elements
     * runAllForms();
     *
     ********************************
     *
     * pageSetUp() is needed whenever you load a page.
     * It initializes and checks for all basic elements of the page
     * and makes rendering easier.
     *
     */

    pageSetUp();

    /*
     * ALL PAGE RELATED SCRIPTS CAN GO BELOW HERE
     * eg alert("my home function");
     *
     * var pagefunction = function() {
     *   ...
     * }
     * loadScript("js/plugin/_PLUGIN_NAME_.js", pagefunction);
     *
     */

    // PAGE RELATED SCRIPTS

    // pagefunction
    var pagefunction = function() {
        //console.log("cleared");

        /* // DOM Position key index //

         l - Length changing (dropdown)
         f - Filtering input (search)
         t - The Table! (datatable)
         i - Information (records)
         p - Pagination (paging)
         r - pRocessing
         < and > - div elements
         <"#id" and > - div with an id
         <"class" and > - div with a class
         <"#id.class" and > - div with an id and class

         Also see: http://legacy.datatables.net/usage/features
         */

        JS_armaTablaRgistros('datatable_fixed_column');

        // Basic DataTable
        var responsiveHelper_datatable_fixed_column = undefined;
        var breakpointDefinition = {
            tablet : 1024,
            phone : 480
        };

        // Column Filter
        var otable = $('#datatable_fixed_column').DataTable({
            "sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-12'<'toolbar'>>r>"+
            "t"+
            "<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-xs-12 col-sm-6'p>>",
            "autoWidth" : true,
            "oLanguage": {
                "sSearch": '<span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>'
            },
            "preDrawCallback" : function() {
                // Initialize the responsive datatables helper once.
                if (!responsiveHelper_datatable_fixed_column) {
                    responsiveHelper_datatable_fixed_column = new ResponsiveDatatablesHelper($('#datatable_fixed_column'), breakpointDefinition);
                }
            },
            "rowCallback" : function(nRow) {
                responsiveHelper_datatable_fixed_column.createExpandIcon(nRow);
            },
            "drawCallback" : function(oSettings) {
                responsiveHelper_datatable_fixed_column.respond();
            }
        });

        // custom toolbar
        $("div.toolbar").html('' +
                '<div class="text-right">' +
                '<button id="btnActionNewProduct" type="button" class="btn btn-primary"><i class="fa fa-plus"></i><span class="hidden-mobile">&nbsp;Nuevo Producto</span></button>' +
                '&nbsp;<button id="btnActionEditProduct" type="button" class="btn btn-warning"><i class="fa fa-file-text"></i><span class="hidden-mobile">&nbsp;Editar Producto</span></button></div>');

        // Apply the filter
        $("#datatable_fixed_column thead th input[type=text]").on( 'keyup change', function () {
            otable
                    .column( $(this).parent().index()+':visible' )
                    .search( this.value )
                    .draw();

        } );
        /* END COLUMN FILTER */

        $('#datatable_fixed_column tbody').on( 'click', 'tr', function () {
            if ( $(this).hasClass('selected') ) {
                $(this).removeClass('selected');
            }
            else {
                otable.$('tr.selected').removeClass('selected');
                $(this).addClass('selected');
            }
        });

        $('#btnActionNewProduct').click(function () {
            $.get('/products/create', function(data){
                $('#remoteModal').html($(data));
//                $('#agent_modal_identification').val(cedula);
//                $('#agent_modal_lname').focus();
                $('#remoteModal').modal();
            });
        });

        $('#btnActionEditFicha').click(function () {
            var id = otable.$('tr.selected').data('id');
            if(id != undefined) {
                window.location.href = 'home#/athlete/'+id+'/edit';
            } else {
                $.smallBox({
                    title : "Atención",
                    content : "<i class='fa fa-warning'></i> <i>Seleccione un Registro del Listado</i>",
                    color : "#296191",
                    iconSmall : "fa fa-close bounce animated",
                    timeout : 4000
                });
            }
        });
    };

    // load related plugins

    loadScript("js/plugin/datatables/jquery.dataTables.min.js", function(){
        loadScript("js/plugin/datatables/dataTables.colVis.min.js", function(){
            loadScript("js/plugin/datatables/dataTables.tableTools.min.js", function(){
                loadScript("js/plugin/datatables/dataTables.bootstrap.min.js", function(){
                    loadScript("js/plugin/datatable-responsive/datatables.responsive.min.js", pagefunction)
                });
            });
        });
    });

    function JS_armaTablaRgistros(nombre){
        $.ajax( {
            url: "/products/load",
            cache: false,
            async: false,
            type: "GET",
            contentType: "application/json; charset=utf-8",
            success: function(data) {
                var html="";
                for(var y=0;y<data.length;y++){
                    html+='<tr data-id="'+data[y].id+'">';
                    html+='<td>'+data[y].id+'</td>';
                    html+='<td>'+data[y].sport.name+'</td>';
                    html+='<td>'+data[y].detail+'</td>';
                    html+='<td>'+data[y].age_min+'</td>';
                    html+='<td>'+data[y].age_max+'</td>';
                    html+='<td>'+data[y].horarys+'</td>';
                    html+='<td>'+data[y].days+'</td>';
                    html+='<td>'+data[y].quotas+'</td>';
                    html+='<td>'+data[y].price+'</td>';
                    if(data[y].quotash < 15) {
                        html+='<td><span class="center-block padding-5 label label-danger">Pocas</span></td>';
                    }  else {
                        html+='<td><span class="center-block padding-5 label label-success">Normal</span></td>';
                    }
                    html+='</tr>';
                }
                $('#'+nombre+' tbody').html(html);
            },
            error: function(jqXHR) {
                $.smallBox({
                    title : jqXHR.status,
                    content : jqXHR.statusText,
                    color : "#A65858",
                    iconSmall : "fa fa-times",
                    timeout : 5000
                });
            }
        });
    }

</script>

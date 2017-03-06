<div class="row">
    @include('layouts.bread-crumb-header', ['title' => 'Vacacionales', 'subtitle' => 'Resumen CV'])
</div>

<!-- row -->
<div class="row">
    <!-- NEW WIDGET START -->
    <article class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
        <!-- Widget ID (each widget will need unique ID)-->
        <div class="jarviswidget jarviswidget-color-blue" id="wid-id-1" data-widget-editbutton="false">
            <header>
                <span class="widget-icon"> <i class="fa fa-bar-chart-o"></i> </span>
                <h2>Inscripciones</h2>
            </header>
            <div class="well well-sm well-light">
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th></th>
                        <th> Resultado</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th>Inscripciones Totales:</th>
                        <td>{{ (is_numeric($data['t_ins']) ? $data['t_ins'] : '0') }}</td>
                    </tr>
                    <tr>
                        <th>Gratis:</th>
                        <td>{{ (is_numeric($data['t_ins_free']) ? $data['t_ins_free'] : '0') }}</td>
                    </tr>
                    <tr>
                        <th>Pagadas:</th>
                        <td>{{ (is_numeric($data['t_ins_paid']) ? $data['t_ins_paid'] : '0') }}</td>
                    </tr>
                    <tr>
                        <th>Exoneradas::</th>
                        <td>{{ (is_numeric($data['t_ins_exo']) ? $data['t_ins_exo'] : '0') }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Widget ID (each widget will need unique ID)-->
        <div class="jarviswidget jarviswidget-color-pink" id="wid-id-1" data-widget-editbutton="false">
            <header>
                <span class="widget-icon"> <i class="fa fa-bar-chart-o"></i> </span>
                <h2>Inscripciones por Deporte</h2>
            </header>
            <div class="well well-sm well-light">
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Deporte</th>
                        <th>Detalle</th>
                        <th>Por Genero</th>
                        <th>Total</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data['summary_ins'] as $sport => $summary)
                        <tr>
                            <th>{{ $sport }}</th>
                            <td>
                                Pagadas: {{ $summary['ins_paid'] }}<br>
                                Gratis: {{ $summary['ins_free'] }}<br>
                                Exon.: {{ $summary['ins_exo'] }}
                            </td>
                            <td>
                                Varones: {{ $summary['total_ins_m'] }} <br>
                                Damas:   {{ $summary['total_ins_f'] }}
                            </td>
                            <td>{{ $summary['total_ins'] }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Widget ID (each widget will need unique ID)-->
        <div class="jarviswidget jarviswidget-color-purple" id="wid-id-1" data-widget-editbutton="false">
            <header>
                <span class="widget-icon"> <i class="fa fa-bar-chart-o"></i> </span>
                <h2>Tallas</h2>
            </header>
            <div class="well well-sm well-light">
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th> Tallas</th>
                        <th> Detalle</th>
                        <th> Total</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data['sizes']['sizes'] as $size => $value)
                        <tr>
                            <th>{{ $size }}</th>
                            <td>
                                Pagadas: {{ $value['P'] }} <br>
                                Gratis: {{ $value['G'] }} <br>
                                Exoneradas: {{ $value['E'] }}
                            </td>
                            <th>{{ $value['P'] + $value['G'] + $value['E'] }}</th>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </article>

    <!-- NEW WIDGET START -->
    <article class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
        <!-- Widget ID (each widget will need unique ID)-->
        <div class="jarviswidget jarviswidget-color-greenDark" id="wid-id-1" data-widget-editbutton="false">
            <header>
                <span class="widget-icon"> <i class="fa fa-bar-chart-o"></i> </span>
                <h2>Recaudación</h2>
            </header>
            <div class="well well-sm well-light">
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th></th>
                        <th> Resultado</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th>Total recaudado:</th>
                        <td>{{ (is_numeric($data['total_sale']) ? 'U$D '.$data['total_sale'] : 'U$D 0.00') }}</td>
                    </tr>
                    <tr>
                        <th>Sin descuento:</th>
                        <td>{{ (is_numeric($data['without_discount']) ? 'U$D '.$data['without_discount'] : 'U$D 0.00') }}</td>
                    </tr>
                    <tr>
                        <th>Descuento 30%:</th>
                        <td>{{ (is_numeric($data['discount_30']) ? 'U$D '.$data['discount_30'] : 'U$D 0.00') }}</td>
                    </tr>
                    <tr>
                        <th>Descuento 50%:</th>
                        <td>{{ (is_numeric($data['discount_50']) ? 'U$D '.$data['discount_50'] : 'U$D 0.00') }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Widget ID (each widget will need unique ID)-->
        <div class="jarviswidget jarviswidget-color-redLight" id="wid-id-1" data-widget-editbutton="false">
            <header>
                <span class="widget-icon"> <i class="fa fa-bar-chart-o"></i> </span>
                <h2>Recaudado por disciplina</h2>
            </header>
            <div class="well well-sm well-light">
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th></th>
                        <th> Resultado</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data['summary_ins'] as $sport => $summary)
                        <tr>
                            <th>{{ $sport }}</th>
                            <td>
                                Total: ${{ $summary['total_sale'] }} <br>
                                Sin descuento: ${{ $summary['discount_0'] }} <br>
                                30% descuento: ${{ $summary['discount_1'] }} <br>
                                50% descuento: ${{ $summary['discount_2'] }} <br>
                                Exonerados:   ${{ $summary['discount_3'] }}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </article>
</div>
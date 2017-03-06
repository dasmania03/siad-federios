<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimun-scale=1.0"/>
    <link rel="stylesheet" href="css/print.css"/>
    <title>Recibo de Caja</title>
</head>
<body class="comprobante">
<main class="ed-container">
    <div class="ed-item">
        @for($i = 1; $i <= 2; $i++)
            <div class="comprobante">
                <table class="bodycontainer">
                    <tr class="bodycontainer__row">
                        <td class="bodycontainer__col"><img src="img/logo.png"/></td>
                        <td class="bodycontainer__col bodycontainer--title">RECIBO DE CAJA</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td class="bodycontainer__serie"><p>N° {{ str_pad($data[0]->id, 6, "0", STR_PAD_LEFT) }}</p></td>
                    </tr>
                </table>
                <table class="maincontainer">
                    <tr>
                        <td class="maincontainer__title">FECHA:</td>
                        <td>{{ $data[0]->created_at }}</td>
                        <td class="maincontainer__title">VALOR:</td>
                        <td>U$D {{ $data[0]->price }}</td>
                    </tr>
                    <tr>
                        <td class="maincontainer__title">RECIBI DE:</td>
                        <td colspan="3">{{ $data[0]->inscription->athlete->agent->full_name }}</td>
                    </tr>
                    <tr>
                        <td class="maincontainer__title">LA CANTIDAD DE:</td>
                        <td colspan="3">{{ $data[0]->price }}</td>
                    </tr>
                    <tr>
                        <td colspan="4" class="maincontainer__title">POR CONCEPTO DE:</td>
                    </tr>
                    <tr>
                        <td colspan="4"><p>{{ $data[0]->inscription->product->detail }}</p></td>
                    </tr>
                </table>
                <table>
                    <tr>
                        <td>
                            <p class="observacion">* IMPORTANTE: La inauguración de los Cursos Vacacionales 2017 se realizara el día Jueves 02 de Marzo a partir de las 18h00 en el Coliseo Jaime Roldos Aguilera, se ruega puntual asistencia.</p>
                            <p class="observacion">* ATENCIÓN: Sr. Representante, se le comunica que la entrega del uniforme se realizara a partir del día Jueves 23 de Febrero, en el Auditorio Juan Ponce Herrera de la Federación Deportiva de Los Ríos, presentando este comprobante.</p>
                        <td>
                    </tr>
                </table>
                <table class="footercontainer">
                    <tr class="footercontainer__firma">
                        <td>Firma</td>
                        <td>Firma</td>
                    </tr>
                    <tr>
                        <td class="footercontainer__title">ENTREGUE CONFORME</td>
                        <td class="footercontainer__title">RECIBI CONFORME</td>
                    </tr>
                </table>
            </div>
        @endfor
    </div>
</main>
</body>
</html>
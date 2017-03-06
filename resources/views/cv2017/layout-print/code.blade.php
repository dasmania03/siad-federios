<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimun-scale=1.0"/>
    <title>Codigos de Exoneracion</title>
</head>
<body>
    @foreach($data as $code)
        <table style="border:1px solid #ccc; width: 100%; margin-bottom: 3px">
            <tr>
                <td style="text-align: center;padding: 2px">Codigo QR <br><img src="data:image/png;base64,{{DNS2D::getBarcodePNG($code->codes, 'QRCODE',4,4   )}}" alt="barcode" /></td>
                <td>
                    <ul style="list-style:none;">
                        <li><h3>Cursos Vacacionales Federios 2017</h3></li>
                        <li>Codigo de Exoneración</li>
                        <li>No. {{ $code->codes }}</li>
                    </ul>
                </td>
                <td style="vertical-align: bottom">
                    <ul style="list-style:none;">
                        <li>Firma de la Autoridad</li>
                        <li>Nombre:</li>
                    </ul>
                </td>
            </tr>
        </table>
    @endforeach
</body>
</html>
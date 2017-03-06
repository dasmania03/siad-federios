<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="css/print.css"/>
    <title>Inscripción Curso {{ $data[0]->product->detail }}</title>
</head>
<body>
<header class="main-header">
    <div class="logo"><img src="img/logo.png" /></div>
</header>
<main>
    <div>
        <h2>INSCRIPCIÓN - CURSOS VACACIONALES 2017</h2>
        <h3>Ficha de Inscripción N° {{ str_pad($data[0]->id, 5, "0", STR_PAD_LEFT) }}</h3>
        <h4>Fecha de Inscripción {{ $data[0]->created_at }}</h4>
        <table class="imprimir">
            <thead>
                <tr>
                    <th colspan="8">Datos Personales Registrados</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td colspan="2" class="title">Cédula Deportista</td>
                    <td colspan="2">{{ $data[0]->athlete->identification }}</td>
                    <td colspan="2" class="title">Nombre Deportista</td>
                    <td colspan="2">{{ $data[0]->athlete->full_name }}</td>
                </tr>
                <tr>
                    <td colspan="2" class="title">Cédula Representante</td>
                    <td colspan="2">{{ $data[0]->athlete->agent->identification }}</td>
                    <td colspan="2" class="title">Nombre Representante</td>
                    <td colspan="2">{{ $data[0]->athlete->agent->full_name }}</td>
                </tr>
                <tr>
                    <td class="title">Edad</td>
                    <td>{{ $data[0]->athlete->age }}</td>
                    <td class="title">Talla</td>
                    <td>{{ $data[0]->athlete->size }}</td>
                    <td class="title">Sexo</td>
                    <td>{{ $data[0]->athlete->gender }}</td>
                    <td class="title">Discapacidad</td>
                    <td>{{ $data[0]->athlete->type_disability }}</td>
                </tr>
                <tr>
                    <td colspan="2" class="title">Email</td>
                    <td colspan="2">{{ $data[0]->athlete->agent->email }}</td>
                    <td colspan="2" class="title">Responsable de Registro</td>
                    <td colspan="2">{{ $data[0]->user->username }}</td>
                </tr>
            </tbody>
        </table>
        <table class="imprimir">
            <thead>
                <tr>
                    <th colspan="6">Disciplina y Horario</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="title">Deporte</td>
                    <td>{{ $data[0]->product->detail }}</td>
                    <td class="title">Horario</td>
                    <td>{{ $data[0]->horario }}</td>
                    <td class="title">Dias</td>
                    <td>{{ $data[0]->dias }}</td>
                </tr>
            </tbody>
        </table>
        <table>
            <tr>
                <td>
                    <p class="observacion">* IMPORTANTE: La inauguración de los Cursos Vacacionales 2017 se realizara el día Jueves 02 de Marzo a partir de las 18h00 en el Coliseo Jaime Roldos Aguilera, se ruega puntual asistencia.</p>
                    @if ($data[0]->status == 1 || $data[0]->status == 4)
                        <p class="observacion">* ATENCIÓN: Sr. Representante, se le comunica que la entrega del uniforme se realizara a partir del Lunes 20 de Marzo, en el Auditorio Juan Ponce Herrera de la Federación Deportiva de Los Ríos, previa aprobación del requisito de asistencia.</p>
                    @endif
                    <p class="compromiso">* ACTA DE COMPROMISO:
                                Yo, como representante del inscrito, lo inscribo en los cursos Vacacionales de la Federación Deportiva de Los Ríos, para participar en la disciplina y horario establecidos en la presente ficha, comprometiéndome en dejarlo 15 minutos antes del horario asignado y de retirarlo hasta quince minutos después de finalizadas las clases.
                                Dejo como constancia además que mi representado está en buenas condiciones de salud física y psicológica para iniciar la práctica del deporte, para lo cual adjunto el certificado médico otorgado por un galeno de la localidad.
                                La Federación Deportiva de Los Ríos, brinda el soporte técnico con el equipo de instructores, escenarios deportivos y la implementación requerida para la práctica del deporte escogido; en caso de producirse algún tipo de accidente o imprevisto debido a la práctica del deporte por parte de mi representado, será atendido para que se le preste únicamente los primeros auxilios por parte de la Federación Deportiva de Los Ríos, siendo de mi entera responsabilidad el tratamiento médico posterior a los primeros auxilios que deba darse a mi representado y que resulte de dicho accidente o imprevisto.
                                Los cursos vacacionales ofrecidos por la Federación son gratuitos en las disciplinas de atletismo y lucha, por lo que mi representante deberá acudir con la vestimenta deportiva adecuada y exigida para la práctica del deporte escogido.Por su parte la Federación Deportiva de Los Ríos se compromete a entregar gratuitamente un kit de entrenamiento que incluirá: una camiseta y una pantaloneta, ademas un examen antropométrico, asesoría nutricional y un examen dental.
                                Firmando para constancia las partes intervinientes.-</p>
                <td>
            </tr>
        </table>
        <table class="firma">
            <tr><td>{{ $data[0]->athlete->agent->full_name }}</td></tr>
            <tr><td>CI: {{ $data[0]->athlete->agent->identification }}</td></tr>
        </table>
    </div>
</main>
<footer class="main-footer">
    <div>
        <p>&copy; Federacióon Deportiva de Los Ríos | Cursos Vacacionales 2017</p>
    </div>
</footer>
</body>
</html>
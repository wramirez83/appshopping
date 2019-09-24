<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <title>Solicitud Guardada y en Proceso</title>
</head>
<body>
<header>
<div style="float: left;"><img src="{{ url('/')}}/images/logoSenaN.png" width="80px" /></div>
<div style="float: left;">
<h1 style="text-align: center;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; SIC</h1>
</div>
</header>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>Hola! se ha enviado un solicitud de materiales del usuario:</p>
<hr />
<p>Estos son los datos de la solicitud:</p>
<ul>
<li><strong>Código de Solicitud</strong>: {{ $solicitud['solicitud'] }}</li>
<li><strong>Estado</strong>:{{ $solicitud['estado'] }}</li>
<li><strong>Fecha Creación o Actualización</strong>:{{ $solicitud['fecha'] }}</li>
</ul>
<p>
  Recuerda que puede consultar el estado de su solicitud en el sistema.
</p>
<h3>{{ url('/')}}</h3>
</body>
</html>
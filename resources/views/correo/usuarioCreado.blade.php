<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <title>Usuario Creado</title>
</head>
<body>
<header>
<div style="float: left;"><img src="http://www.sena.edu.co/Style%20Library/alayout/images/logoSena.png
" width="115px" /></div>
<div style="float: left;">
<h1 style="text-align: center;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; SIC</h1>
</div>
</header>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>Hola! <strong>SIC</strong> a detectado un nuevo Usuario:</p>
<hr />
<p>Estos son los datos del Nuevo Usuario:</p>
<ul>
<li><strong>Nombre</strong>: {{ $usuario['nombre'] }}</li>
<li><strong>Correo</strong>:{{ $usuario['correo'] }}</li>
<li><strong>Clave</strong>:{{ $usuario['clave'] }}</li>
<li><strong>Documento</strong>:&nbsp;{{ $usuario['documento'] }}</li>
</ul>
</body>
</html>
﻿<!DOCTYPE html>
	<html lang="es">
		<head>
			<meta charset="utf-8">
			<meta name="description" content="Ejercicio 1 de Programación web">
			<meta content="width=device-width, initial-scale=1, minimum-scale=1" name="viewport">
			<title>Ejercicio 1 de programación web</title>
			<link href="escritorio.css" rel="stylesheet">	
		</head>	
		<body>
			<section class="formulario">
<?php
	// Obtener los valores de las variables de HTML
		if (isset($_REQUEST['insertar']))
			{
				$insertar = $_REQUEST['insertar'];	
				$usuario = $_REQUEST['usuario'];
				$clave = $_REQUEST['clave'];
				$correo = $_REQUEST['correo'];
				$tipo_cliente = $_REQUEST['tipocliente'];
				$cedula_rif = $_REQUEST['cedularif'];
				$nombres = $_REQUEST['nombres'];
				$apellidos = $_REQUEST['apellidos'];
				$direccion = $_REQUEST['direccion'];
				$telefono = $_REQUEST['telefono'];
				// Conectar con la base de datos clientes
				$servername = "localhost";
				$username = "cursophp";
				$password = "";
				$dbname = "clientes";
				// Crear conexión
				$conn = mysqli_connect ($servername, $username, $password, $dbname);
				// Chequear la conexion
				If (!($conn))
					{
						die ("Conexión fallida: " . mysqli_connect_error());				
					}
				$sql = "INSERT INTO usuario (usuario, clave, correo, tipo_cliente, cedula_rif, nombres, apellidos, direccion, telefono) values ('$usuario', '$clave', '$correo', '$tipo_cliente', '$cedula_rif', '$nombres', '$apellidos', '$direccion', '$telefono')";
				if (mysqli_query($conn, $sql))
					{
						echo "Usuario creado satisfactoriamente";	
						print ("<p><a href='index.html'>Volver a inicio</a></p>\n"); 

					}
				else	
					{
						echo "Error: " . "<p>" . mysqli_error($conn) . "</p>";			
						print ("<p><a href='insertar_usuario2.php'>Volver al formulario</a></p>\n"); 

					}
				mysqli_close($conn);
			}
		else
			{
?>						
				<h1>Registrarse:</h1>
				<form action="insertar_usuario2.php" name="insertar" method="post">
					<p class="etiqueta">Usuario:*</p>
					<p class="campo"><input type="text" name="usuario" size="10" maxlenght="10" required></p>
					
					<p class="etiqueta">Clave:*</p>				
					<p class="campo"><input type="password" name="clave" id="miclave" size="10" maxlenght="10" required></p>
					<p class="etiqueta">Correo:*</p>
					<p class="campo"><input type="email" name="correo" id="micorreo" required></p>

					<p class="etiqueta">Cédula, RIF o pasaporte:
					<p class="campo">
						<select name="tipocliente">
							<option value="" select>&nbsp
							<option value="V">V
							<option value="E">E
							<option value="P">P
							<option value="J">J
							<option value="G">G
						</select>
						<input type="text" name="cedularif" id="micedularif" size="12" maxlenght="12"></p>
					
					<p class="etiqueta">Nombre(s):</p>
					<p class="campo"><input type="text" name="nombres" id="misnombres" size="20" maxlenght="100"></p>
												
					<p class="etiqueta">Apellido(s):</p>
					<p class="campo"><input type="text" name="apellidos" id="misapellidos" size="20" maxlenght="100"></p>

					<p class="etiqueta">Dirección:</p>
					<p class="campo"><input type="input" name="direccion" id="midireccion"></p>

					<p class="etiqueta">Teléfono:</p>
					<p class="campo"><input type="tel" name="telefono" id="mitelefono"></p>

					<p class="campo"><input type="submit" name="insertar" value="Registrarse"></p>
				</form>
				<p class="campo">Nota: Los datos marcados con (*) deben ser rellenados obligatoriamente.</p>
				<p class="campo"><a href="index.html">Volver al inicio</a></p>		
			</section>
<?php	
			}
?>
		</body>
	</html>					

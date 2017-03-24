<?php
	require_once "Personas.php";

	/*$unaPersona = new Persona();
	$unaPersona->SetId(16);
	$unaPersona->SetApellido("Delavega");
	$unaPersona->SetNombre("pepepepe");		
	Persona::ModificarPersona($unaPersona);*/

	/*$unaPersona = new Persona();
		$unaPersona->SetApellido("Delavega");
		$unaPersona->SetNombre("pepepepe");
		$unaPersona->SetDni(11223344);
		Persona::InsertarPersona($unaPersona);*/

	//Persona::BorrarPersona(13);

	use \Psr\Http\Message\ServerRequestInterface as Request;
	use \Psr\Http\Message\ResponseInterface as Response;

	require 'vendor/autoload.php';

	$app = new \Slim\App;

	$app->put('/persona/login', function ($request,$res) {
		$unaPersona = new Persona();		
		$unaPersona->SetApellido($request->getParam('apellido'));
		$unaPersona->SetDni($request->getParam('dni'));
		
		return $res    
           ->write(json_encode(Persona::consultarPersona($unaPersona))
		   );

	});

	$app->get('/', function (Request $request, Response $response) {
				 			
		$mbd = new PDO('mysql:host=mysql.hostinger.com.ar;dbname=u991289493_pps;charset=utf8', 'u991289493_joako', '29990032', 
            array(PDO::ATTR_EMULATE_PREPARES => false,PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));		
						
		//$tabla = '<table class="table"><thead style="background:rgb(14, 26, 112);color:#fff;"><tr><th>  ID </th>	<th>  NOMBRE  </th>	<th> APELLIDO </th>	<th>  DNI </th></tr> </thead>';
					
		$consulta = $mbd->query("SELECT * from persona");
						
        $envio = "";

		for($i=0 ; $i <$consulta->rowCount();$i++){

			$obj = $consulta->fetchObject("persona");    	
			$envio .= $obj->toString() . "<br>";
		}
		$mbd = null;                      
  
		$response->getBody()->write($envio);

		return $response;
	});

	$app->get('/persona/{id}', function (Request $request, Response $response) {
		$id = $request->getAttribute('id');
		$persona = Persona::TraerUnaPersona($id);
		$response->getBody()->write($persona->toString());

		return $response;
	});

	$app->delete('/persona/borrar/{id}', function ($request,$res) {
        return $res           
           ->write(Persona::BorrarPersona($request->getAttribute('id'))            
        );
    });

	$app->post('/persona/agregar', function ($request,$res) {
		$unaPersona = new Persona();
		$unaPersona->SetApellido($request->getParam('apellido'));
		$unaPersona->SetNombre($request->getParam('nombre'));
		$unaPersona->SetDni($request->getParam('dni'));
		return $res           
           ->write(Persona::InsertarPersona($unaPersona)           
        );
	});	

	$app->put('/persona/modificar', function ($request,$res) {
		$unaPersona = new Persona();
		$unaPersona->SetId($request->getParam('id'));
		$unaPersona->SetApellido($request->getParam('apellido'));
		$unaPersona->SetNombre($request->getParam('nombre'));
		
		return $res    
           ->write(Persona::ModificarPersona($unaPersona)
		   );


		          
        
	});

	$app->run();

?>

<html>
	<title>

	</title>
	<head>
		<script type="text/javascript" src="jquery.js"></script>
		<script type="text/javascript">			

		function Subir()
		{
			var unJSON = {"id" : document.getElementById("id").value,
						  "titulo" : document.getElementById("titulo").value,
						  "size" : document.getElementById("size").value,
						  "precio" : document.getElementById("precio").value
						  };
			
			alert(unJSON);

			$.ajax({
						type:"POST",
						dataType: "text",
						url:"administrarRemeras.php",
						data: {miJSON : unJSON}
					})
					.done(function(respuesta){
						
						if(respuesta.exito)
							alert("se agrego correctamente");

						console.log(respuesta);						

						

					})
					.fail(function(error){
						alert("hay un error");
						alert(error.errorThrown);

					});				


		}	

		function Mostrar()
		{			
			$.ajax({
						type:"POST",
						dataType: "text",
						url:"mostrar.php",
						data: {}
					})
					.done(function(respuesta){
						
						alert(respuesta);

					})
					.fail(function(error){
						alert("hay un error");
						alert(error.errorThrown);

					});		
					
		}

		function usoGet()
		{			
			
			/*$.ajax({
						type:"POST",
						dataType: "text",
						url:"get.php",
						data: {}
					})
					.done(function(respuesta){
						
						window.locationf="http://localhost/ABM-Login-PDO/index.php/hola/pedro";	

					})
					.fail(function(error){
						alert("hay un error");
						alert(error.errorThrown);

					});*/		
			
					
		}

		</script>
	</head>
	<body>
		
			<br><input type="button" value="Mostrar" onclick="Mostrar()" /> <br>
			<input type="button" value="get" onclick="usoGet()" /> <br>
			<input type="button" value="put" onclick="Put()" /> <br>
			<input type="button" value="delete" onclick="Delete()" /> <br>
			<input type="button" value="post" onclick="Post()" /> <br>

			<label for="id">ID</label>
			<input type="Text" id="id"/><br>

			<label for="nombre">NOMBRE</label>
			<input type="Text" id="nombre"/><br>

			<label for="apellido">APELLIDO</label>
			<input type="Text" id="apellido"/><br>

			<label for="dni">DNI</label>
			<input type="Text" id="dni"/><br>	



	</body>
</html>					
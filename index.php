<?php
	require_once "Personas.php";

	use \Psr\Http\Message\ServerRequestInterface as Request;
	use \Psr\Http\Message\ResponseInterface as Response;

	require 'vendor/autoload.php';

	$app = new \Slim\App;

	$app->post('/persona/login', function ($request,$res) {
		$unaPersona = new Persona();		
		$unaPersona->SetApellido($request->getParam('apellido'));
		$unaPersona->SetDni($request->getParam('dni'));
		
		   return $res
           ->withHeader('Content-type', 'application/json')
           ->getBody()
           ->write(
            json_encode(
                Persona::consultarPersona($unaPersona)
            )
        );

	});

	$app->get('/personas', function (Request $request, Response $response) {

		return $response
           ->withHeader('Content-type', 'application/json')
           ->getBody()
           ->write(
            json_encode(
                Persona::TraerTodasLasPersonas()
            )
		  ); 
	});

	$app->get('/persona'/*/{id}'*/, function (Request $request, Response $response) {
		
		return $response
           ->withHeader('Content-type', 'application/json')
           ->getBody()
           ->write(
            json_encode(
                Persona::TraerUnaPersona($request->getParam('id'))
            )
        );
	});

	$app->delete('/persona/borrar'/*/{id}'*/, function ($request,$res) {
		return $res
           ->withHeader('Content-type', 'application/json')
           ->getBody()
           ->write(
            json_encode(
                Persona::BorrarPersona($request->getParam('id'))
            )
        );
    });

	$app->post('/persona/agregar', function ($request,$res) {
		$unaPersona = new Persona();
		$unaPersona->SetApellido($request->getParam('apellido'));
		$unaPersona->SetNombre($request->getParam('nombre'));
		$unaPersona->SetDni($request->getParam('dni'));
		
		return $res
           ->withHeader('Content-type', 'application/json')
           ->getBody()
           ->write(
            json_encode(
                Persona::InsertarPersona($unaPersona)
            )
        );
	});	

	$app->put('/persona/modificar', function ($request,$res) {
		$unaPersona = new Persona();
		$unaPersona->SetId($request->getParam('id'));
		$unaPersona->SetApellido($request->getParam('apellido'));
		$unaPersona->SetNombre($request->getParam('nombre'));
	
		return $res
           ->withHeader('Content-type', 'application/json')
           ->getBody()
           ->write(
            json_encode(
                Persona::ModificarPersona($unaPersona)
            )
        );
	});

	$app->run();

?>
<html>
	<title></title>
	<head></head>
	<body>
			<input type="button" value="volver atrás" name="volver atrás2" onclick="history.back()" />
	</body>
</html>
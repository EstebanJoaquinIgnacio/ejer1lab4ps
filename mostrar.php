<?php
    require_once "Personas.php";
    try {			
						$mbd = new PDO('mysql:host=localhost;dbname=pps', 'root', '');		
						
						//$tabla = '<table class="table"><thead style="background:rgb(14, 26, 112);color:#fff;"><tr><th>  ID </th>	<th>  NOMBRE  </th>	<th> APELLIDO </th>	<th>  DNI </th></tr> </thead>';
						
						$consulta = $mbd->query("SELECT * from persona");
						
                        $envio = "";

						for($i=0 ; $i <$consulta->rowCount();$i++){

							$obj = $consulta->fetchObject("persona");    	
							echo $obj->toString() . "\n";
						}
						$mbd = null;
                        
					}
					catch (Exception $e)
					{
						print "¡Error!: " . $e->getMessage() . "<br/>";
					}    
?>
function agregar()
{
	$.ajax({
				type:"POST",
				dataType: "json",                
				url:"./index.php/persona/agregar",
                data: { "nombre" : document.getElementById("nombreDiv").value,
                        "apellido" : document.getElementById("apellidoDiv").value,
                        "dni" : document.getElementById("dniDiv").value
                }
			})
			.done(function(respuesta){

				alert("Se agrego correctamente");
				console.log(respuesta);				

			})
			.fail(function(error){
				alert("hay un error");
				alert(error.errorThrown);

			});	
}

function borrar()
{
	$.ajax({
				type:"DELETE",
				dataType: "json",	                			
                url:"./index.php/persona/borrar",
                data: {"id" : document.getElementById("idDiv").value}

			})
			.done(function(respuesta){

				alert("Se borro correctamente");
				console.log(respuesta);				

			})
			.fail(function(error){
				alert("hay un error");
				alert(error.errorThrown);

			});	
}

function modificar()
{
	$.ajax({
				type:"PUT",
				dataType: "json",                
				url:"./index.php/persona/modificar",               
				data: { "nombre" : document.getElementById("nombreDiv").value,
                        "apellido" : document.getElementById("apellidoDiv").value,
                        "id" : document.getElementById("idDiv").value
                     }
			})
			.done(function(respuesta){

				alert("Se modifico correctamente");
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
			
	$.ajax({
				type:"GET",
				dataType: "text",
				url:"http://localhost/Lab4PPS/ABM-Login-PDO-local/index.php/personas",
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
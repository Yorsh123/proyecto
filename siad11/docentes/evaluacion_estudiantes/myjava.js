$(document).ready(pagination(1));
$(function(){
	$('#nuevo-producto').on('click',function(){
		$('#formulario')[0].reset();
		$('#pro').val('Registro');
		$('#edi').hide();
		$('#reg').show();
		$('#registra-datos').modal({
			show:true,
			backdrop:'static'
		});
	});	
	$('#bs-prod').on('keyup',function(){
		var dato = $('#bs-prod').val();
		var url = 'evaluacion_estudiantes/busca_evaluacion.php';
		$.ajax({
		type:'POST',
		url:url,
		data:'dato='+dato,
		success: function(datos){
			$('#agrega-registros').html(datos);
		}
	});
	return false;
	});	
});
function agregarRegistro(){
	var url = 'evaluacion_estudiantes/agrega_evaluacion.php';
	$.ajax({
		type:'POST',
		url:url,
		data:$('#formulario').serialize(),
		success: function(registro){
			if ($('#pro').val() == 'Registro'){
			$('#formulario')[0].reset();
			$('#mensaje').addClass('bien').html('Registro completado con exito').show(200).delay(2500).hide(200);
			$('#agrega-registros').html(registro);
			return false;
			}else{
			$('#mensaje').addClass('bien').html('Edicion completada con exito').show(200).delay(2500).hide(200);
			$('#agrega-registros').html(registro);
			return false;
			}
		}
	});
	return false;
}
function eliminarRegistro(id){
	var url = 'evaluacion_estudiantes/elimina_evaluacion.php';
	var pregunta = confirm('¿Esta seguro de eliminar este Registro?');
	if(pregunta==true){
		$.ajax({
		type:'POST',
		url:url,
		data:'id='+id,
		success: function(registro){
			$('#agrega-registros').html(registro);
			return false;
		}
	});
	return false;
	}else{
		return false;
	}
}
function editarRegistro(id){
	$('#formulario')[0].reset();
	var url = 'evaluacion_estudiantes/edita_evaluacion.php';
		$.ajax({
		type:'POST',
		url:url,
		data:'id='+id,
		success: function(valores){
				var datos = eval(valores);
				$('#reg').hide();
				$('#edi').show();
				$('#pro').val('Edicion');
				$('#id-registro').val(id);
				$('#descripcion').val(datos[0]);
				$('#grupo').val(datos[1]);
				$('#estudiante').val(datos[2]);
				$('#asignatura').val(datos[3]);
				$('#unidad').val(datos[4]);
				$('#tarea').val(datos[5]);
				$('#puntaje').val(datos[6]);
				$('#registra-datos').modal({
					show:true,
					backdrop:'static'
				});
			return false;
		}
	});
	return false;
}

function pagination(partida){
	var url = 'evaluacion_estudiantes/paginar_evaluacion.php';
	$.ajax({
		type:'POST',
		url:url,
		data:'partida='+partida,
		success:function(data){
			var array = eval(data);
			$('#agrega-registros').html(array[0]);
			$('#pagination').html(array[1]);
		}
	});
	return false;
}
$(document).ready(function(){

$(document).on('focus','#fecha',function(e){
  e.preventDefault();

  $("#fecha").datepicker({
  changeMonth:true,
  changeYear:true,
  dateFormat:"dd/mm/yy",
  isRTL: false,
  });

});

$(document).on('focus','#fechaact',function(e){
  e.preventDefault();
  $("#fechaact").datepicker({
  changeMonth:true,
  changeYear:true,
  dateFormat:"dd/mm/yy",
  isRTL: false,
  });

});

$(".resgistro").on("submit",function(e){

  e.preventDefault();
  formulario = $("#opcion").val();

  if(formulario =="miembros")
  {
    $(".miembros").css("display","block");
    $(".actividades, .administrador").css("display","none");
  }
  else if(formulario=="actividad")
  {
    $(".actividades").css("display","block");
    $(".miembros, .administrador").css("display","none");
  }
  else if(formulario=="administrador")
  {
    $(".administrador").css("display","block");
    $(".miembros, .actividades").css("display","none");
  }
  else
  {
    $(".miembros, .actividades, .administrador").css("display","none");
  }

});

$(".miembros").on("submit",function(e){

  e.preventDefault();
  foto= document.querySelector("#fotomiembro");
     fotos=foto.files[0];
     nombre= $("#nombre").val();
     apellido = $("#apellido").val();
     cedula = $("#cedula").val();
     telefono = $("#telefono").val();
     fecha = $("#fecha").val();
     cargo = $("#cargo").val();
     direccion = $("#direccion").val();
     ministerios = $("#ministerios").val();
     estudios =$("#estudios").val();
     tiempo = $("#tiempo").val();



     dato = new FormData();
     dato.append('nombre',nombre);
     dato.append('apellido',apellido);
     dato.append('cedula',cedula);
     dato.append('telefono',telefono);
     dato.append('fecha',fecha);
     dato.append('cargo',cargo);
     dato.append('direccion',direccion);
     dato.append('fotos',fotos);
     dato.append('tiempo',tiempo);
     dato.append('estudios',estudios);
     dato.append('ministerios',ministerios);
  $.ajax({
    type:"post",
    contentType:false,
    url:"registrarmiembros.php",
    data: dato,
    processData:false,
    cache:false,
    beforeSend : function(){
      $("#mensajestodos").css('display',"block").html("<img src=../public/img/load.gif>");

    },
    success: function(respuesta){
      if(respuesta=="<h3>datos registrados con exito</h3>")
      {
        $("#mensajestodos").css({"display":"block","background-color":"green"}).html(respuesta).fadeOut(6000);
        $("#nombre, #apellido,#cedula,#telefono,#correo,#fecha,#cargo,#direccion,#fotomiembro,#ministerios,#tiempo,#estudios").val('');
      }
      else
      {

        $("#mensajestodos").css({"display":"block","background-color":"red"}).html(respuesta).fadeOut(6000);
      }

    }

  });
});

$(".actividades").on("submit",function(e){
  e.preventDefault();
  $.ajax({
    type:"post",
    url:"registraractividades.php",
    data : $(this).serialize(),
    beforeSend:function(){
      $("#mensajestodos").css('display',"block").html("<img src=../public/img/load.gif>");
    },
    success: function(respuesta){
      if(respuesta=="<h3>datos registrados con exito</h3>")
      {
        $("#mensajestodos").css({"display":"block","background-color":"green"}).html(respuesta).fadeOut(6000);
        $("#aopcion, #lugar,#cedula,#fechaact,#correo,#hora,#telefono").val('');
      }
      else
      {
        $("#mensajestodos").css({"display":"block","background-color":"red"}).html(respuesta).fadeOut(6000);
      }
    }
  });
});

  $(".administrador").on("submit",function(e){

    e.preventDefault();
    $.ajax({
      type:"post",
      url:"registraradministrador.php",
      data : $(this).serialize(),
      beforeSend :  function(){
        $("#mensajestodos").css('display',"block").html("<img src=../public/img/load.gif>");
      },
      success: function(respuesta){
        if(respuesta=="<h3>datos registrados con exito</h3>")
      {
        $("#mensajestodos").css({"display":"block","background-color":"green"}).html(respuesta).fadeOut(6000);
        $("#nombre, #apellido,#cedula,#usuario,#clave,#correo").val('');
      }
      else
      {
        $("#mensajestodos").css({"display":"block","background-color":"red"}).html(respuesta).fadeOut(6000);
      }
      }
    });
  });

});

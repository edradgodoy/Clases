$(document).ready(function(){
  $("#inicio").click(function(e){
    e.preventDefault();
    window.location.reload();
  });

  $("#buscar").click(function(e){
    e.preventDefault();
    $.ajax({
      type:"post",
      url:$(this).attr('href'),
      cache:false,
      beforeSend: function(){
        $("#section").html("<img src='../public/img/load.gif'>");
      },
      success: function(respuesta){
        $("#section").html(respuesta);
      }
    });
  });

  $("#registrar").click(function(e){
  e.preventDefault();
    $.ajax({
      type:"post",
      url:"registrar.php",
      beforeSend : function(){
        $("#section").html("<img src='../public/img/load.gif'>");
      },
      success :  function(respuesta){
        $("#section").html(respuesta);
      }
    });
  });

  $("#respaldarbase").click(function(e){
  e.preventDefault();
    window.location="respaldodatabase.php";
  });


  $("#no, #si").click(function(){
  var validar = $(this).val();
  if(validar=="si"){
    window.location="salirdesession.php";

  }else if(validar=="no"){
    $("#mensajesalirdesession").modal('hide');
  }
});

  $("#publicar").on("submit", function(e){
    e.preventDefault();
     titulo= $("#titulo").val();
     imagenes= document.querySelector("#imagenes");
     imagen=imagenes.files[0];
     dato = new FormData();
     dato.append('titulo',titulo);
     dato.append('imagen',imagen);

    $.ajax({
      type : "POST",
      contentType:false,
      url : "subirfotos.php",
      data : dato,
      processData:false,
      cache:false,

      beforeSend : function(){
        $("#mensajestodos").css("display","block").html("<img src='../public/img/load.gif'>");
      },
      success : function(respuesta){
        if(respuesta=="<h3>datos agregados con exito</h3>"){
          $("#mensajestodos").css("background-color","green").html(respuesta).fadeOut(6000);
          $("#titulo, #imagenes").val("");
          setInterval(function(){
            window.location.reload();
          },4000);
        }else{
          $("#mensajestodos").css("background-color", "red").html(respuesta).fadeOut(6000);
        }

      }
    });
  });


  $("#mensajesalirdesession").modal('hide');

  var valor=null;
  //editar todos los datos
  $(document).on("click","td.editable span",function(e){
  e.preventDefault();
    $("td:not(.id)").removeClass("editable");
    td=$(this).closest("td");
    campo=$(this).closest("td").data("campo");
    valor =$(this).text();
    id=$(this).closest("tr").find(".id").text();
    td.text("").html("<input type='text' name='"+campo+"' value='"+valor+"'><a class='enlace guardar' href='#'>Guardar</a>");/*<a class='enlace cancelar' href='#'>Cancelar</a>");*/
  });
  //guardar todos los datos
  $(document).on("click",".guardar",function(e)
  {
    e.preventDefault();
    $("#mensajestodos").css("display","block").html("<img src='../public/img/load.gif'>");
     td=$(this).closest("td");
     nuevovalor=$(this).closest("td").find("input").val();
         id =  $(this).closest("tr").find(".id").text();
     campo = $(this).closest("td").data("campo");
    if(nuevovalor.trim()!="")
    {
      $.ajax({
        type: "POST",
        url: "editardatofotos.php",
        data: { campo: campo, nuevovalor: nuevovalor, id : id }
      })
      .done(function( msg ) {

      if(msg=="<h3>datos actualizado con exito</h3>"){
        $("#mensajestodos").css("background","green").html(msg).fadeOut(6000);
        td.text("").html("<span>"+nuevovalor+"</span>");
        }else{
        $("#mensajestodos").css("background","red").html(msg).fadeOut(6000);
        td.text("").html("<span>"+valor+"</span>");

        }
        $("td:not(.id)").addClass("editable");
      });

    }else{
   $("#mensajestodos").css("background","red").html("<h3>error no puede enviar campos vacios</h3>").fadeOut(6000);
    }

  });
  // eliminar imagenes
  $(document).on("click","#eliminarimagenes",function(e){
    e.preventDefault();
   tr=$(this).closest("tr");
   id=$(this).closest("tr").find(".id").text();
  $("#mensajeeliminarfoto").modal('show');

   $("#sifoto, #nofoto").click(function(){
  dato = $(this).val();
  if(dato=="nofoto")
  {

  $("#mensajeeliminarfoto").modal('hide');
  }
  else if(dato=="sifoto")
  {
  $("#mensajeeliminarfoto").modal('hide');
  $.ajax({
  type:"POST",
  url:"eliminarfoto.php",
  data:{id:id},
  beforeSend:function(){
  $("#mensajestodos").fadeIn(300).css("display","block").html("<img src=../public/img/load.gif>");
  },
  success:function(respuesta){
  if(respuesta=="<h3>datos eliminado con exito</h3>"){
  $("#mensajestodos").css("background","green").html(respuesta).fadeOut(6000);
  tr.fadeOut(300).html("");
  }else{
  $("#mensajestodos").css("background","red").html(respuesta).fadeOut(6000);
  }
  }
  });
  }
  });

  });

  $("#mensajeeliminarfoto").modal('hide');

  $(document).on("click","#nombreusuario",function(e){
    e.preventDefault();
    $.ajax({
      type:"POST",
      url:"formularionombre.php",
      beforeSend:function(){
        $("#section").fadeIn(300).css("display","block").html("<img src=../public/img/load.gif>");
        },
      success:function(respuesta){
      $("#section").html(respuesta);
  }
  });
  });

  $(document).on("click","#claveusuario",function(e){
    e.preventDefault();
    $.ajax({
      type:"POST",
      url:"formularioclave.php",
      beforeSend:function(){
        $("#section").fadeIn(300).css("display","block").html("<img src=../public/img/load.gif>");
        },
      success:function(respuesta){
      $("#section").html(respuesta);
  }
  });

  });

  $(document).on('submit',".formnombre",function(e){

    e.preventDefault();

    $.ajax({
      type:"POST",
    url:"cambiarnombre.php",
    data:$(this).serialize(),
    beforeSend:function(){
    $("#mensajestodos").fadeIn(300).css("display","block").html("<img src=../public/img/load.gif>");
    },
    success:function(respuesta){
    if(respuesta=="<h3>datos actualizado con exito</h3>"){
    $("#mensajestodos").css("background","green").html(respuesta).fadeOut(6000);
    $("#nombre,#clave").val('');
    setInterval(
      function(){
      window.location.reload();
      },6000);
    }else{
    $("#mensajestodos").css("background","red").html(respuesta).fadeOut(6000);
    }
    }
  });
});

    $(document).on('submit',".formclave",function(e){
    e.preventDefault();
    $.ajax({
      type:"POST",
    url:"cambiarclave.php",
    data:$(this).serialize(),
    beforeSend:function(){
    $("#mensajestodos").fadeIn(300).css("display","block").html("<img src=../public/img/load.gif>");
    },
    success:function(respuesta){
    if(respuesta=="<h3>datos actualizado con exito</h3>"){
    $("#mensajestodos").css("background","green").html(respuesta).fadeOut(6000);
    $("#clave,#clave1,#clave2").val('');
    }else{
    $("#mensajestodos").css("background","red").html(respuesta).fadeOut(6000);
    }
    }
  });
});

$(document).on('mouseover','#eliminarimagenes',function(e){
  e.preventDefault();
  td = $(this).closest('tr').find('td');
  td.addClass('text-danger');
});

$(document).on('mouseout','#eliminarimagenes',function(e){
  e.preventDefault();
  td = $(this).closest('tr').find('td');
  td.removeClass('text-danger');
});

});

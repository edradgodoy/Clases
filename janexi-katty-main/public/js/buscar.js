$(document).ready(function(){
  $("#cedula").css("display","none");
  $("#iopcion").on("click",function(e){
    e.preventDefault();
    opcion = $(this).val()
    if(opcion=="miembros"){
      $("#iopcion1").html("<option value=''>Buscar por</option> <option value='cedula'>Cedula</option> <option value='todos'>Todos</option><option value='eliminado'>Historico de Miembros Eliminados</option>");
    }
    else if(opcion=="actividades"){
    $("#iopcion1").html("<option value=''>Buscar por</option> <option value='aniversarios'>Aniversarios</option> <option value='campañas'>Campañas masivas</option> <option value='cultos'>Cultos unidos</option><option value='congresos'>Congresos</option><option value='todas'>Todas las Actividades</option>");
    $("#cedula").css("display","none");

    }
    else if(opcion=="administrador"){
      $("#iopcion1").html("<option value=''>Buscar por</option> <option value='todos'>Todos</option>");
      $("#cedula").css("display","none");
    }

  });

  $("#iopcion1").on("click",function(e){
    e.preventDefault();
    opcion = $(this).val();
    if(opcion=="cedula"){
      $("#cedula").css("display","block");

    }
    else{
      $("#cedula").css("display","none");

    }

  $("#formulariodebusqueda").on("submit",function(e){
    e.preventDefault();
    opcion = $("#iopcion").val();
    opcion1 = $("#iopcion1").val();

    if(opcion=="actividades")
    {
      if(opcion1=="aniversarios")
      {
        $(document).ready(cargaractividad(0,'aniversarios.php'));

      }
      else if(opcion1=="campañas")
      {
        $(document).ready(cargaractividad(0,'campaña.php'));
      }
      else if(opcion1=="cultos")
      {
          $(document).ready(cargaractividad(0,'cultos.php'));

      }
      else if(opcion1=="congresos")
      {
        $(document).ready(cargaractividad(0,'congresos.php'));
      }
      else if(opcion1=="todas")
      {
        $.ajax({
          type:"post",
          url:"todasactividades.php",
          beforeSend: function(){
            $("#datosdebusqueda").css("display","block").html("<img src=../public/img/load.gif>");
          },
          success : function(respuesta){
            $("#datosdebusqueda").html(respuesta);
          }
        });
      }


    }
    else if(opcion=="miembros")
    {
      if(opcion1=="cedula")
      {
        cedula = $("#cedula").val();
        $.ajax({
          type:"post",
          url:"vermiembrosporcedula.php",
          data : {cedula:cedula},

          beforeSend: function(){
            $("#datosdebusqueda").css("display","block").html("<img src=../public/img/load.gif>");
          },
          success: function(respuesta){
            $("#datosdebusqueda").html(respuesta);
          }
        });
      }
      else if(opcion1=="todos")
      {
        //limite = 0;
        /*$.ajax({
          type:"post",
          url:"vertodoslosmiembros.php",
          data:{limite:limite},
          beforeSend : function(){
          $("#datosdebusqueda").css("display","block").html("<img src=../public/img/load.gif>");
          },
          success : function(respuesta){
            $("#datosdebusqueda").html(respuesta);
          }

        });*/
        $(document).ready(cargarmiembros(0));
      }
      else if(opcion1=="eliminado")
      {
        $.ajax({
          type:"post",
          url:"vermiembroseliminados.php",
          beforeSend : function(){
          $("#datosdebusqueda").css("display","block").html("<img src=../public/img/load.gif>");
          },
          success : function(respuesta){
            $("#datosdebusqueda").html(respuesta);
          }

        });
      }
    }
    else if(opcion=="administrador")
    {
      if(opcion1=="todos")
      {

        $.ajax({
          type:"post",
          url:"vertodosadministrador.php",
          beforeSend : function(){
            $("#datosdebusqueda").css("display","block").html("<img src=../public/img/load.gif>");
          },
          success :  function(respuesta){
            $("#datosdebusqueda").html(respuesta);
          }
        });
      }

    }


  });

  });



  //eliminar datos miembros
  $(document).on("click","#eliminardatosmiembros",function(e){
    e.preventDefault();
   ver=$(this).closest("table").find(".id").text();
   tabla = $(this).closest("table").find("#tablas").text();

  $("#modaleliminar").modal('show');

   $("#sieliminardatos, #noeliminardatos").click(function(){
  dato = $(this).val();
  if(dato=="cancelareliminar")
  {

  $("#modaleliminar").modal('hide');
  }
  else if(dato=="aceptareliminar")
  {
  $("#modaleliminar").modal('hide');
  $.ajax({
  type:"POST",
  url:"eliminardatos.php",
  data:{ver:ver,tabla:tabla},
  beforeSend:function(){
  $("#mensajestodos").fadeIn(300).css("display","block").html("<img src=../public/img/load.gif>");
  },
  success:function(respuesta){
  if(respuesta=="<h3>datos eliminado con exito</h3>"){
  $("#mensajestodos").css("background","green").html(respuesta).fadeOut(6000);
  $("#datosdebusqueda").fadeOut(300).html("");
  }else{
  $("#mensajestodos").css("background","red").html(respuesta).fadeOut(6000);
  }
  }
  });
  }
  });
  });

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
     nuevovalor=$(this).closest("td:not(#dat)").find("input").val();
         id =  $(this).closest("table").find(".id").text();
     campo = $(this).closest("td:not(#dat)").data("campo");
     tabla = $(this).closest("table").find("#tablas").text();

      if(campo=="fechax")
      {
      a = new Date();
      dia = a.getDate();
      mes= a.getMonth()+1;
      anno= a.getFullYear();
      fecha = nuevovalor.split('-');
      dia_nac = fecha[2];
      mes_nac = fecha[1];
      anno_nac = fecha[0];

      if(mes_nac > mes)
      {
        calc_edad = anno - anno_nac - 1;
      }
      else
      {
        if(mes == mes_nac && dia_nac > dia)
        {
          calc_edad= anno - anno_nac - 1;
        }
        else
        {
          calc_edad = anno - anno_nac;
        }
      }
     }

    if(nuevovalor.trim()!="")
    {
      $.ajax({
        type: "POST",
        url: "editardatos.php",
        data: { campo: campo, nuevovalor: nuevovalor, id : id, tabla:tabla }
      })
      .done(function( msg ) {

      if(msg=="<h3>datos actualizado con exito</h3>"){
        $("#mensajestodos").css("background","green").html(msg).fadeOut(6000);
        td.text("").html("<span>"+nuevovalor+"</span>");
          if(campo=="fechax")
          {
            $("td#edad").text("").html(calc_edad);
          }
        }else{
        $("#mensajestodos").css("background","red").html(msg).fadeOut(6000);
        td.text("").html("<span>"+valor+"</span>");

        }
        $("td:not(.id)").addClass("editable");
        $("td#edad").removeClass('editable');
      });

    }else{
   $("#mensajestodos").css("background","red").html("<h3>error no puede enviar campos vacios</h3>").fadeOut(6000);
    }

  });

  //elegir datos

  $(document).on("click","#elegirdatos",function(){
    id = $(this).closest("tr").find(".id").text();
    $.ajax({
      type:"post",
      url:"vermiembrosporid.php",
      data:{id:id},
      beforeSend : function(){
      $("#datosdebusqueda").css("display","block").html("<img src=../public/img/load.gif>");
      },
      success: function(respuesta){
        $("#datosdebusqueda").html(respuesta);
      }

    });
  });
  // eliminar datos
  $(document).on("click","#eliminardatos",function(){

   tr=$(this).closest("tr");
   ver=$(this).closest("tr").find(".id").text();
   tabla = $(this).closest("tr").find("#tablas").text();
   cantidad = $("#cantidad").text();
  $("#modaleliminar").modal('show');

   $("#sieliminardatos, #noeliminardatos").click(function(){
  dato = $(this).val();
  if(dato=="cancelareliminar")
  {

  $("#modaleliminar").modal('hide');
  }
  else if(dato=="aceptareliminar")
  {
  $("#modaleliminar").modal('hide');
  $.ajax({
  type:"POST",
  url:"eliminardatos.php",
  data:{ver:ver,tabla:tabla,cantidad:cantidad},
  beforeSend:function(){
  $("#mensajestodos").fadeIn(300).css("display","block").html("<img src=../public/img/load.gif>");
  },
  success:function(respuesta){
    json = JSON.parse(respuesta);
  if(json.respuesta=="exito"){
  $("#mensajestodos").css("background","green").html(json.exito).fadeOut(6000);
  tr.fadeOut(300).html("");
  $("#cantidad").html(json.cantidad);
  }else{
  $("#mensajestodos").css("background","red").html(json.error).fadeOut(6000);
  }
  }
  });
  }
  });

  });


  //restaurar miembros
  $(document).on("click","#restaurarm",function(e){

    e.preventDefault();
    tr=$(this).closest("tr");
    id=$(this).closest("tr").find(".id").text();
    tabla = $(this).closest("tr").find("#tablas").text();
    cantidad = $("#cantidad").text();

    $.ajax({
      type:"post",
      url:"restaurarmiembros.php",
      data:{id:id,cantidad:cantidad},
      beforeSend: function(){
        $("#mensajestodos").fadeIn(300).css("display","block").html("<img src=../public/img/load.gif>");
      },
      success: function(respuesta)
      {
        json = JSON.parse(respuesta)
        if(json.respuesta=="exito")
        {
          $("#mensajestodos").css("background","green").html(json.exito).fadeOut(6000);
          tr.fadeOut(300).html("");
          $("#cantidad").html(json.cantidad);
        }
        else
        {
          $("#mensajestodos").css("background","red").html(json.error).fadeOut(6000);
        }
      }
    });
  });

  $(document).on('mouseover','#restaurarm',function(e){
    e.preventDefault();
    td = $(this).closest('tr').find('td');
    td.addClass('text-primary');
  });

  $(document).on('mouseout','#restaurarm',function(e){
    e.preventDefault();
    td = $(this).closest('tr').find('td');
    td.removeClass('text-primary');
  });

  $(document).on('click','#generarpdfmiembros',function(){
  window.location="pdfmiembros.php";
  });

  $(document).on('click',"#generarpdfcongresos",function(){

    window.location="pdfcongresos.php";
  });

  $(document).on('click',"#generarpdfaniversarios",function(){
  window.location="pdfaniversarios.php";
  });

  $(document).on('click',"#generarpdfcultos",function(){
    window.location="pdfcultosunidos.php";
  });
  $(document).on('click',"#generarpdfcampañas",function(){
    window.location="pdfcampanamasiva.php";
  });
  $(document).on("click","#generarpdfnoactivo",function(){
    window.location="pdfmiembroseliminados.php";
  });
  $(document).on('click',"#generarpdftodasactividades",function(){

    window.location="pdftodasactividades.php";
  });

  $(document).on('click',"#generarpdfmiembrosporcedula",function(){
    pdf = $(this).val();
    window.location="pdfmiembrosporcedula.php?ver="+pdf;
  });

  //fotos miembros
  $(document).on('click',"#fotosm", function(){

     ver =  $(this).closest("table").find(".id").text();

    $("#cambiarfotos").modal("show");

    $("#sinuevafoto,#nonuevafoto").click(function(){
      opcion = $(this).val();
      if(opcion=="aceptar")
      {

        imagenes= document.querySelector("#nuevafoto");
        imagen=imagenes.files[0];
        $("#cambiarfotos").modal("hide");
        dato = new FormData();
        dato.append('imagen',imagen);
        dato.append('ver',ver);

        $.ajax({

          type : "POST",
          contentType:false,
          url:"cambiarimagedeusuario.php",
          data:dato,
          processData:false,
          cache:false,

      beforeSend : function(){
        $("#mensajestodos").css("display","block").html("<img src='../public/img/load.gif'>");
      },
      success : function(respuesta){
        if(respuesta=="<h3>foto actualizado con exito</h3>"){
          $("#mensajestodos").css("background-color","green").html(respuesta).fadeOut(6000);
          $("#fotosm").attr("src","/projen/modulos/fotomiembro/"+imagen.name);
          $("#nuevafoto").val("");
        }else{
          $("#mensajestodos").css("background-color", "red").html(respuesta).fadeOut(6000);
        }

      }
        });



      }
      else{
        $("#cambiarfotos").modal("hide");
      }
    });
  });
  //agregar informacion de actividades
  var cambio;
  var idglobal;
  $(document).on("click","#agregardatos",function(){
     ver =  $(this).closest("tr").find(".id").text();
     idglobal=ver;
     $("#fotoinforeg").val('');
     $("#inforeg").val('');
     $("#fotoinfo").val('');
     $("#info").val('');
      $.ajax({
        type : "POST",
        url:"verificarinfoactividades.php",
        data:{ver:ver},
        success : function(respuesta){

          json = JSON.parse(respuesta);

          if(json.respuesta=='editar')
          {
            cambio = json.respuesta;
            $("#info").val(json.informacion);
            urlimg= json.fotos;
            $("#imgactividad").attr('src',urlimg).css('display','block');
            $("#agregarinfo").modal("show");



          }
          else if(json.respuesta=='agregar')
          {
            cambio=json.respuesta;
            $("#registrarinfo").modal("show");
          }
          else
          {
            $("#mensajestodos").css("display","block").html("Error al capturar datos").fadeOut(6000);
          }


        }

          });
  });
  //si registrar info
  $("#sireginfo, #noreginfo").on('click',function()
  {
    opcion = $(this).val();
    if(opcion=="aceptar")
    {
      $("#registrarinfo").modal("hide");
      imagenes= document.querySelector("#fotoinforeg");
      imagen=imagenes.files[0];
      info = $("#inforeg").val();
      dato = new FormData();
      dato.append('imagen',imagen);
      dato.append('ver',idglobal);
      dato.append('info',info);
      dato.append('cambio',cambio);

      $.ajax({
        type : "POST",
        contentType:false,
        url:"registrarinformaciondeactividades.php",
        data: dato,
        processData:false,
        cache:false,

        beforeSend : function(){
          $("#mensajestodos").css("display","block").html("<img src='../public/img/load.gif'>");
        },
        success : function(respuesta){

          if(respuesta=="<h3>datos registrado con exito</h3>")
          {
            $("#mensajestodos").css("background-color","green").html(respuesta).fadeOut(6000);

          }
          else
          {
            $("#mensajestodos").css("background-color", "red").html(respuesta).fadeOut(6000);
          }

        }
      });
  }
  else
  {
      $("#registrarinfo").modal("hide");
  }

});
//editar info de activodades
  $("#siinfo, #noinfo").on('click', function()
  {

    opcion = $(this).val();
    if(opcion=="aceptar")
    {

      $("#agregarinfo").modal("hide");
      urlimg = $("#imgactividad").attr('src');

      imagenes= document.querySelector("#fotoinfo");
      imagen=imagenes.files[0];
      info = $("#info").val();
      dato = new FormData();
      dato.append('imagen',imagen);
      dato.append('ver',idglobal);
      dato.append('info',info);
      dato.append('urlimg',urlimg);
      dato.append('cambio',cambio);

      $.ajax({
        type : "POST",
        contentType:false,
        url:"registrarinformaciondeactividades.php",
        data: dato,
        processData:false,
        cache:false,

        beforeSend : function(){
          $("#mensajestodos").css("display","block").html("<img src='../public/img/load.gif'>");
        },
        success : function(respuesta){
          if(respuesta=="<h3>datos registrado con exito</h3>")
          {
            $("#mensajestodos").css("background-color","green").html(respuesta).fadeOut(6000);

          }
          else
          {
            $("#mensajestodos").css("background-color", "red").html(respuesta).fadeOut(6000);
          }

        }
      });
  }
  else
  {
      $("#agregarinfo").modal("hide");
  }


});
  //ver informaciion de actividades
  $(document).on("click","#verdatos",function(e){
    e.preventDefault();
    ver =  $(this).closest("tr").find(".id").text();
    $.ajax({

      type:"post",
      url:"verinfoactividad.php",
      data:{ver:ver},
      beforeSend : function(){
        $("#datosdebusqueda").css("display","block").html("<img src='../public/img/load.gif'>");
      },
      success : function(respuesta){

        $("#datosdebusqueda").html(respuesta);

      }

    });
  });

  $(document).on('mouseover',"#verdatos",function(e){
    e.preventDefault();
    td = $(this).closest('tr').find('td');
    td.addClass('text-success');
  });

  $(document).on('mouseout',"#verdatos",function(e){
    e.preventDefault();
    td = $(this).closest('tr').find('td');
    td.removeClass('text-success');
  });

  $(document).on('mouseover',"#agregardatos",function(e){
    e.preventDefault();
    td = $(this).closest('tr').find('td');
    td.addClass('text-info');
  });

  $(document).on('mouseout',"#agregardatos",function(e){
    e.preventDefault();
    td = $(this).closest('tr').find('td');
    td.removeClass('text-info');
  });

  $(document).on('mouseover',"#eliminardatos",function(e){
    e.preventDefault();
    td = $(this).closest('tr').find('td');
    td.addClass('text-danger');
  });

  $(document).on('mouseout',"#eliminardatos",function(e){
    e.preventDefault();
    td = $(this).closest('tr').find('td');
    td.removeClass('text-danger');
  });

  $(document).on('mouseover','#elegirdatos',function(e){
    e.preventDefault();
    td = $(this).closest('tr').find('td');
    td.addClass('text-success');
  });

  $(document).on('mouseout','#elegirdatos',function(e){
    e.preventDefault();
    td = $(this).closest('tr').find('td');
    td.removeClass('text-success');
  });

});

function cargarmiembros(limite){
var url="vertodoslosmiembros.php";
$.post(url,{limite:limite},function(responseText){
$("#datosdebusqueda").html(responseText);
});
}

function cargaractividad(limite,url)
{
  $.post(url,{limite:limite},function(responseText){
    $("#datosdebusqueda").html(responseText);
  });
}

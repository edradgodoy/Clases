<!DOCTYPE html>
<html>
  <head><title>iglesia DIOS CENTRAL</title>
  <meta charset="UTF-8"/>
 <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <link rel="stylesheet" type="text/css" href="lib/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="public/css/calendario.css">
  <style type="text/css">

html,body{
  margin: 0px;
  padding: 0px;
  background-color: white;
}

#banner{
  width: 100%;
  max-height:80px;
  min-height:80px;
  clear: both;
}

section{
background-color: white;
}


aside{
background-color: white;
text-align: center;
}

a{
 color:black;
}
nav{
  background-color:#B6F690;
}
#img{
max-width:100%;
height:100px;
margin-bottom:5px;
margin-top:5px;
border-bottom: 1px solid silver;
box-shadow: 0px 0px 5px rgba(0,0,0,0.5);
border-radius: 7px;
}

footer{
  background-color:#B6F690;
  padding:5px;
  width:100%;
  margin: 0px;
  border-radius: 5px 5px 0px 0px;
  font:bold 1em;
}
#acceso{
max-width:100%;
margin: 0px;
background-color: rgba(123,123,123,0.1);
padding:0px 5px 0px 5px;
border-radius: 7px;
box-shadow: 0px 0px 12px rgba(123,123,123,0.2);
padding: 3px;
min-width: 118px;
}
#mensajedeusuario{
  display: none;
}
#captcha{
    width:400px;
    height:50px;
  }
  #actividad{
    max-width: 80%;
    margin: auto;
    background-color:rgba(4, 192, 56, 0.3);
    padding:0px 5px 0px 5px;
    border-radius: 7px;
    box-shadow: 0px 0px 12px rgba(0,0,0,0.9);
    min-width: 192px;
  }
  #sectionactividad{
    display: none;
  }
  .table{
    border-radius: 7px;
    border:1px solid silver;
    box-shadow: 0px 0px 12px rgba(0,0,0,0.5);
    padding: 0px;
    width: 100%;
  }
  th{
    background-color:#B6F690;
    color: black;
  }
  td{
    vertical-align: middle;
    text-align: left;
  }

  #ancho {
max-width: 100%;
max-height: 440px;
margin: 0px;
padding: 0px;
}

  </style>
  <script src="lib/jquery/jquery.js"></script>
  <script src="public/js/index.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script src="public/js/calendario.js"></script>
  </head>
  <body style="background-color:white; padding-top:132px;">
<div class="container-fluid master" style="width:100%; background-color: white;">
  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="width:100%; background-color: white;">
      <header class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="row">
          <div class="col-lg-12">
            <img src="public/img/copia9.jpg" id="banner" class="img img-responsive">
          </div>
        </div>
        <nav>
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menup">
              <span class="sr-only"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <div class="navbar-brand"><p style="color:black; font-weght:bold; font-size:1.2em;">Manantial De Vida</p></div>
          </div>
          <div class="collapse navbar-collapse" id="menup">
            <ul class="nav nav-pills nav-justified ">
  	           <li><a class="btn btn-lg" href="#" id="inicio" title="Inicio">Inicio</a></li>
  	           <li><a class="btn btn-lg" href="#" id="actividades" title="Actividades">Actividades</a></li>
  	           <li><a class="btn btn-lg" href="#" id="galeria" title="Galerias de imagenes">Imagenes</a></li>
  	           <li class="dropdown"><a class="btn btn-lg" href="#" class="dropdown-toggle" data-toggle="dropdown" title="Informacion">Informacion <span class="caret"></span></a>
  	 							<ul class="dropdown-menu" style="box-shadow:0px 0px 12px rgba(0,0,0,0.5);">
  	 								<li><a href="#" id="mision" title="Mision">Mision</a></li>
  	 								<li><a href="#" id="vision" title="Vision">Vision</a></li>
  	 								<li><a href="#" id="quienes" title="Quienes Somos">Quienes Somos</a></li>
                    <li><a href="#" id="iglesias" title="Iglesias Asociadas">Iglesias Asociadas</a></li>
  	 							</ul>
                </li>

  	        </ul>
          </div>
        </nav>
      </header>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div id="slider" class="carousel slide">
          <ol class="carousel-indicators">
            <li data-target="#slider" data-slide-to="0" class="active"></li>
            <li data-target="#slider" data-slide-to="1"></li>
            <li data-target="#slider" data-slide-to="2"></li>
            <li data-target="#slider" data-slide-to="3"></li>
            <li data-target="#slider" data-slide-to="4"></li>
            <li data-target="#slider" data-slide-to="5"></li>
            <li data-target="#slider" data-slide-to="6"></li>
             <li data-target="#slider" data-slide-to="7"></li>
          </ol>
          <div class="carousel-inner">
            <div class="item active">
              <img src="public/img/img1.JPG" id="ancho">
            </div>
             <div class="item">
              <img src="public/img/img2.JPG" id="ancho">
            </div>
            <div class="item">
              <img src="public/img/img10.JPG" id="ancho">
            </div>
            <div class="item">
              <img src="public/img/img12.JPG" id="ancho">
            </div>
            <div class="item">
              <img src="public/img/img13.JPG" id="ancho">
            </div>
            <div class="item">
              <img src="public/img/img14.JPG" id="ancho">
            </div>
            <div class="item">
              <img src="public/img/img15.JPG" id="ancho">
            </div>
            <div class="item">
              <img src="public/img/img16.JPG" id="ancho">
            </div>
            <a class="carousel-control left" href="#slider" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
                  <a class="carousel-control right" href="#slider" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
          </div>
        </div>
        <div id="contenedor" style="background-color:white;">
          <div class="row">
            <div class="col-xs-4 col-sm-3 col-md-2 col-lg-2" style="padding:0px;border-right:1px solid rgba(123,123,123,0.2);">
              <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="paddign:0px;">
                  <aside>
                    <a id="cena" title="Santa Cena"><img src="public/img/Santa cena.jpg" id="img" class="img img-resposive center-block" style="margin-bottom:13px;"></a>
                    <a id="oracion" title="Oracion" ><img src="public/img/oracion.jpg" id="img" class="img img-resposive center-block" style="margin-bottom:13px;"></a>
                    <a id="historia" title="Historia de Nuestra Iglesia" ><img src="public/img/historias.jpg" id="img" class="img img-resposive center-block" style="margin-bottom:13px;"></a>
                  </aside><hr><br>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="padding:0px;">
                  <div id="formula" class="left-block" style="paddinf:0px;">
                      <div class="alert alert-danger text-center" role="alert" id="mensajedeusuario"></div>
                      <form id="acceso" action="#" method="#" role="form" class="text-center">
                        <p class="text-success">Ingresar al sistema</p>
                        <div class="form-group">
                          <input class="form-control input-sm" type="text" title="nombre" name="usuario" placeholder="nombre"  required/>
                        </div>
                        <div class="form-group">
                          <input class="form-control input-sm" type="password" title="clave" name="clave" placeholder="clave" required/>
                        </div>
                       <div class="form-group">
                          <img src="modulos/captcha.php" class="img img-responsive center-block" id="captcha">
                        </div>
                        <div class="form-group">
                          <input class="form-control input-sm" type="text" title="Digite datos de la imagen" placeholder="Digite Dato de la imagen" name="captcha" autocomplete="off"/>
                        </div>
                        <div class="form-group">

                              <button class="btn btn-success btn-xs" type="submit" title="Entrar"> Entrar</button>

                              <button class="btn btn-danger btn-xs" type="reset" title="Limpiar"> Limpiar</button>
                        </div>



                          <br>
                      </form>
                    </div><br><br>
                </div>
              </div>
            </div>
          </div>
            <div class="col-xs-8 col-sm-9 col-md-10 col-lg-10" style="padding:5px;">
              <section id="section" class="text-center">

                <h3>Les Damos Las Bienvenida A Nuestro Portar Web Iglesia Manantial De Vida</h3><hr><br>

              </section>
            </div>
          </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin:0px; padding:0px;">
  		<footer class="text-center">
        <p>
          
          <?php $salt = "iglesia";
      echo sha1($salt.md5('Edrad')); ?>

        </p>
        <p>Iglesia Evangelica Misionera Manantial de Vida.</p>
  		  <p>Dirección: Parroquia Marhuanta, sector San Valentin, calle Fuerzas Armadas, c/c Urdaneta, frente al Paseo Simon Bolivar.</p>
  		  <p>Telefonos: +58(285) 6178525. +58(412) 0840979.</p>
        <p>Pastor: Jose Ferrer</p>
  		</footer>
    </div>
  </div>
</div>
    <script>
    $('.carousel').carousel();
    </script>

  </body>


</html>

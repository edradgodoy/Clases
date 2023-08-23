<?php 
    	require("../../conexion/conex.php");
    	require("../../conexion/clasefotos.php");
    	$fotos = new Fotos();
    	$datos = $fotos->ObetenerTodasFotos();
    	?>
	<html>
    <head>
        <link rel="stylesheet" type="text/css" href="public/css/demo.css">
    	<link rel="stylesheet" type="text/css" href="public/css/elastislide.css">
    	<link rel="stylesheet" type="text/css" href="public/css/custom.css">
		<script src="public/js/modernizr.custom.17475.js"></script>
		<script type="text/javascript" src="public/js/jquerypp.custom.js"></script>
		<script type="text/javascript" src="public/js/jquery.elastislide.js"></script>
		
    </head>
    <body>


    	<?php
    	if(!is_array($datos))
    	{
    		echo "<h3>no hay imagen cargada en el sistema</h3>";
    	}
    	else
    	{
    	?>
		<div class="container demo-4">
			

            <div class="main">
				

				<div class="gallery">
					<!-- Elastislide Carousel -->
					<ul id="carou" class="elastislide-list">
						<?php 
						foreach($datos as $dat)
						{
						?>
						<li data-preview="<?=$dat['nombredfoto'];?>"><a href="#"><img src="<?=$dat['nombredfoto'];?>" data-titulo='<?= $dat['titulo'];?>'/></a></li>
						<?php
						}
						?>
					</ul>
					<!-- End Elastislide Carousel -->

					<div class="image-preview">
						<img id="preview" src="<?=$datos[0]['nombredfoto'];?>"/>
					</div>
				</div>

			</div>
		</div>
		<div id="titulo" class="text-center lead text-success">
			<?= $datos[0]['titulo'];?>
		</div>
		
		<br><br>
		<?php
		}
		?>
		<script type="text/javascript">
			
			// example how to integrate with a previewer
			

			var current = 0;
				$preview = $('#preview');
				$carouselEl = $('#carou');
				$carouselItems = $carouselEl.children();
				carousel = $carouselEl.elastislide({
					current : current,
					minItems : 4,

				
					onReady : function() {
						changeImage( $carouselItems.eq( current ), current );
						
					},
					onClick : function( el,pos,evt){
						evt.preventDefault();
						changeImage(el, pos);
						

					}
				});


			function changeImage(el,pos) {


				$preview.attr('src', el.data('preview'));
				$carouselItems.removeClass('current-img');
				el.addClass('current-img');
				carousel.setCurrent(pos);

			}
			$(document).ready(function(){
			$(document).on("click","img",function(){

				a = $(this).closest("a").find("img").attr("data-titulo");
				$("#titulo").text(a);
				
			});
		});

		</script>
    </body>
</html>

<?php
session_start();
if(isset($_SESSION['tipo']) && $_SESSION['tipo']=="Administrador")
{
	if(isset($_GET['ver']) && !empty($_GET['ver']))
	{
		$cedula = intval($_GET['ver']);

		require("../lib/fpdf/fpdf.php");
		require("../conexion/clasemiembros.php");
		class PDF extends FPDF
		{



			function Header()
			{
				$Fecha = Date("d-m-Y");
				$this->SetFont('Arial','B',16);
				$this->SetDrawColor(10, 162, 83);
				$this->SetLineWidth(0,8);
				$this->Line(5,40.5,210,40.5);
				$this->Cell(0,5,'',0,1,$this->Image('../public/img/9.jpg',5,8,205,25));
				$this->Ln(27);
				$this->SetTextColor(10, 162, 83);
				$this->Cell(0,5,'Miembro Activo',0,1,'C');
				$this->Ln(3);
				$this->SetFont('Arial','I',12);
				$this->SetTextColor(0,0,0);
				$this->Cell(0,1,'Fecha : '.$Fecha,0,0,'R');
				$this->Ln(12);
			}

			function cabeceraHorizontal($cabecera)
		    {
		        $this->SetXY(50, 71);
		        $this->SetFont('Arial','I',22);
		        $this->SetFillColor(255, 255, 255);//Fondo verde de celda
		        $this->SetTextColor(10, 162, 83); //Letra color blanco
		 				$this->CellFitSpace(151,28, utf8_decode("Datos Personales del Miembro"),1, 1 , 'C', true);
		 				$this->Ln(12);


		        $this->SetFont('Arial','B',11);
		        $this->SetFillColor(10, 162, 83);//Fondo verde de celda
		        $this->SetTextColor(255, 255, 255); //Letra color blanco

		        $this->SetXY(10,100);
		        $this->CellFitSpace(40,8, utf8_decode($cabecera[0]),1,1,'',true);
		        $this->SetXY(10,108);
		        $this->CellFitSpace(40,8,utf8_decode($cabecera[1]),1,1,'',true);
		        $this->SetXY(10,116);
		        $this->CellFitSpace(40,8,utf8_decode($cabecera[2]),1,1,'',true);
		        $this->SetXY(10,124);
		        $this->CellFitSpace(40,8,utf8_decode($cabecera[3]),1,1,'',true);
		        $this->SetXY(10,132);
		        $this->CellFitSpace(40,8,utf8_decode($cabecera[4]),1,1,'',true);
		        $this->SetXY(10,140);
		        $this->CellFitSpace(40,8,utf8_decode($cabecera[5]),1,1,'',true);
		        $this->SetXY(10,148);
		        $this->CellFitSpace(40,8,utf8_decode($cabecera[6]),1,1,'',true);
		        $this->SetXY(10,156);
		        $this->CellFitSpace(40,8,utf8_decode($cabecera[7]),1,1,'',true);
		        $this->SetXY(10,164);
		        $this->CellFitSpace(40,8,utf8_decode($cabecera[8]),1,1,'',true);
						$this->SetXY(10,172);
		        $this->CellFitSpace(40,8,utf8_decode($cabecera[9]),1,1,'',true);
						$this->SetXY(10,180);
		        $this->CellFitSpace(40,8,utf8_decode($cabecera[10]),1,1,'',true);

		    }

		    function datosHorizontal($fila)
		    {
		        //Color del texto: Negro


		        	$this->SetFont('Arial','I',11);
		        	$this->SetFillColor(255, 255, 255); //blanco de cada fila
		        	$this->SetTextColor(0, 0, 0);


		            $this->Cell(51,0,'',0,1,$this->Image("".$fila["foto"]."",15,71,28,28));
		            $this->Ln();
		            //Usaremos CellFitSpace en lugar de Cell
		            $this->SetXY(51,100);
		            $this->CellFitSpace(150,8, utf8_decode($fila['nombres']),1,1,'',true);
		            $this->SetXY(51,108);
		            $this->CellFitSpace(150,8, utf8_decode($fila['apellidos']),1,1,'',true);
		            $this->SetXY(51,116);
		            $this->CellFitSpace(150,8, utf8_decode($fila['cedula']),1,1,'',true);
		            $this->SetXY(51,124);
		            $this->CellFitSpace(150,8, utf8_decode($fila['telefono']),1,1,'',true);
		            $this->SetXY(51,132);
		            $this->CellFitSpace(150,8, utf8_decode($fila['fechax']),1,1,'',true);
		            $this->SetXY(51,140);
		            $this->CellFitSpace(150,8, utf8_decode($fila['edad']),1,1,'',true);
		            $this->SetXY(51,148);
		            $this->CellFitSpace(150,8, utf8_decode($fila['direccion']),1,1,'',true);
		            $this->SetXY(51,156);
		            $this->CellFitSpace(150,8, utf8_decode($fila['cargo']),1,1,'',true);
		            $this->SetXY(51,164);
		            $this->CellFitSpace(150,8, utf8_decode($fila['ano_servicio']),1,1,'',true);
								$this->SetXY(51,172);
								$this->CellFitSpace(150,8, utf8_decode($fila['estudios']),1,1,'',true);
								$this->SetXY(51,180);
								$this->CellFitSpace(150,8, utf8_decode($fila['ministerios']),1,1,'',true);


		            //$this->Ln();//Salto de lÃ­nea para generar otra fila
		            //$bandera = !$bandera;//Alterna el valor de la bandera

		    }
		    function Footer()
		    {
		        $this->SetY(-22);
		        $this->SetDrawColor(10, 162, 83);
		        $this->SetLineWidth(0,8);
		        $this->SetFont('Arial','I',8);
		        $this->Cell(0,10,'Pagina '.$this->PageNo(),0,1,'I');
		        $this->Cell(0,10,'Iglesia Evangelica Misionera Manantial de Vida','T',0,'C');
		    }

		    function tablaHorizontal($cabeceraHorizontal, $datosHorizontal)
		    {
		        $this->cabeceraHorizontal($cabeceraHorizontal);
		        $this->datosHorizontal($datosHorizontal);
		    }

    //***** AquÃ­ comienza cÃ³digo para ajustar texto *************
    //***********************************************************
		    function CellFit($w, $h=0, $txt='', $border=0, $ln=0, $align='', $fill=false, $link='', $scale=false, $force=true)
		    {
		        //Get string width
		        $str_width=$this->GetStringWidth($txt);

		        //Calculate ratio to fit cell
		        if($w==0)
		            $w = $this->w-$this->rMargin-$this->x;
		        $ratio = ($w-$this->cMargin*2)/$str_width;

		        $fit = ($ratio < 1 || ($ratio > 1 && $force));
		        if ($fit)
		        {
		            if ($scale)
		            {
		                //Calculate horizontal scaling
		                $horiz_scale=$ratio*100.0;
		                //Set horizontal scaling
		                $this->_out(sprintf('BT %.2F Tz ET',$horiz_scale));
		            }
		            else
		            {
		                //Calculate character spacing in points
		                $char_space=($w-$this->cMargin*2-$str_width)/max($this->MBGetStringLength($txt)-1,1)*$this->k;
		                //Set character spacing
		                $this->_out(sprintf('BT %.2F Tc ET',$char_space));
		            }
		            //Override user alignment (since text will fill up cell)
		            $align='';
		        }

		        //Pass on to Cell method
		        $this->Cell($w,$h,$txt,$border,$ln,$align,$fill,$link);

		        //Reset character spacing/horizontal scaling
		        if ($fit)
		            $this->_out('BT '.($scale ? '100 Tz' : '0 Tc').' ET');
		    }


		    function CellFitSpace($w, $h=0, $txt='', $border=0, $ln=0, $align='', $fill=false, $link='')
		    {
		        $this->CellFit($w,$h,$txt,$border,$ln,$align,$fill,$link,false,false);
		    }


    //Patch to also work with CJK double-byte text
		    function MBGetStringLength($s)
		    {
		        if($this->CurrentFont['type']=='Type0')
		        {
		            $len = 0;
		            $nbbytes = strlen($s);
		            for ($i = 0; $i < $nbbytes; $i++)
		            {
		                if (ord($s[$i])<128)
		                    $len++;
		                else
		                {
		                    $len++;
		                    $i++;
		                }
		            }
		            return $len;
		        }
		        else
		            return strlen($s);
		    }
//************** Fin del cÃ³digo para ajustar texto *****************
//******************************************************************
 // FIN Class PDF


};

$pdf= new PDF('P','mm','letter');
$pdf->SetFont('Arial','B',16);

$pdf->SetTextColor(219,32,32);
$pdf->AddPage();
$pdf->SetLineWidth(0,8);
$base = new Miembros();
$misDatos = $base->ExtraerPorCedula($cedula);

$pdf->Ln();
$pdf->SetDrawColor(230,230,230);

$miCabecera= array('Nombre :','Apellido :','Cedula :','Telefono :','Fecha Nacimiento :','Edad :','Direccion :','Cargo :','Años en el Señor :','Estudios Teologico :','Ministerios :');

$pdf->tablaHorizontal($miCabecera,$misDatos);


$pdf->Output("Registros de ".$misDatos['nombres']." ".$misDatos['apellidos'].".pdf","D");





	}
	else
	{
		echo "<h3>Error al recibir datos</h3>";
	}

}
else
{
		?>
		<script>
		window.location="../";
		</script>
		<?php
}


?>

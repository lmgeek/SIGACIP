
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="css/MenuPrincipal.css" rel="stylesheet" type="text/css"/>	
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="shortcut icon" href="img/favicon.ico" />
<link rel="stylesheet"  href="css/layout.css" type="text/css"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" media="all" type="text/css" href="menu-h.css" />
 <!--Texto en Marquesina para Tittle-->
    <script LANGUAGE="JavaScript">
		var txt="    SIGACIP - Sistema de Gestion Academica para la Coordinacion Local de Investigacion y Postgrado - UPEL-IMPM - Falcon |     ";
		var espera=90;
		var refresco=null;
		function rotulo_title() {
		document.title=txt;
		txt=txt.substring(1,txt.length)+txt.charAt(0);
		refresco=setTimeout("rotulo_title()",espera);}
		rotulo_title();
	</script>
	<style>
		.letras{
		 	color:#ffffff;
		}

		/*
			I C O N O    D E   C O P Y L E F T  
		*/

		.copy-left {
			display: inline-block;
			text-align: right;
			margin: 0px;
			-moz-transform: scaleX(-1);
			-o-transform: scaleX(-1);
			-webkit-transform: scaleX(-1);
			transform: scaleX(-1);
			filter: FlipH;
			-ms-filter: "FlipH";
		}

		a{
			color: #ffffff;
		}

		

		/*
		   F I N 
		*/
	</style>
	<!--Script para el tamaño del iframe donde se cargan las imagenes-->
	<script type='text/javascript'>

		function setIframeHeight( iframeId ) 
		{
			var ifDoc, ifRef = document.getElementById( iframeId );
			
			try
			{   
				ifDoc = ifRef.contentWindow.document.documentElement;  
			}
			catch( e )
			{ 
				try
				{ 
					ifDoc = ifRef.contentDocument.documentElement;  
				}
				catch(ee)
				{   
				}  
			}
			
			if( ifDoc )
			{
			ifRef.height = 1;  
			ifRef.height = ifDoc.scrollHeight;
			}
		}
	</script>
</head>
<body><CENTER/>
	
    
		
    		<img src="img/banner.png" width="100%">
    	
                        <div class="contentLayout">
                            <div id="content" >
                               
                                    <div class="box tabs themed_box">

                                        <div class="box-content">  
										
<div class="menu" style="z-index: 2;">
<ul>
<li><a href="index.php" title="Título">INICIO</a></li>

<!--[if lte IE 6]>
	</td></tr></table>
    </a>
    <![endif]-->

<li><a class="hide" href="#">ADMISI&OacuteN</a>

<!--[if lte IE 6]>
<a href="#">ADMISI&OacuteN
<table><tr><td>
<![endif]-->

	<ul>
	<li><a href="registraralumno.php" target="destino" title="Título">Registrar</a></li>
	<li><a href="editaralumno.php" target="destino" title="Título">Editar</a></li>
	<li><a href="listalumnos.php" target="destino" title="Título">Listar</a></li>
	<li><a href="constancia_admision.php" target="destino" title="Título">Constancia Admisi&oacuten</a></li>

	</ul>

<!--[if lte IE 6]>
</td></tr></table>
</a>
<![endif]-->

</li>

<!--[if lte IE 6]>
	</td></tr></table>
    </a>
    <![endif]-->

<li><a class="hide" href="#">INSCRIPCI&OacuteN</a>

<!--[if lte IE 6]>
<a href="#">ADMISI&OacuteN
<table><tr><td>
<![endif]-->

	<ul>
	<li><a href="listalumnoscurso.php" target="destino" title="Título">Inscribir Alumno</a></li>
	<li><a href="pagos.php" target="destino" title="Título">Registro Pago</a></li>
	

	</ul>

<!--[if lte IE 6]>
</td></tr></table>
</a>
<![endif]-->

</li>



<li><a class="hide" href="#">CONSTANCIAS</a>

<!--[if lte IE 6]>
<a href="#">DEMOS
<table><tr><td>
<![endif]-->

	<ul>
	<li><a href="admision.php" title="Título" target="destino">Listar Admitidos</a></li>

	<li><a class="hide" href="#" target="destino" title="Título">Listar Regulares &gt;</a>

    <!--[if lte IE 6]>
    <a class="sub" href="#" title="Título">DESPLEGAR &gt;
    <table><tr><td>
    <![endif]-->

		<ul>
			<li><a href="estudiante.php" target="destino" title="Título">Planilla Inscripci&oacuten</a></li>
			<li><a href="grupo.php" target="destino" title="Título">Lista por Grupo</a></li>

		</ul>

	<!--[if lte IE 6]>
	</td></tr></table>
    </a>
    <![endif]-->

	</li>

	<li><a href="constancia_estudios.php" target="destino" title="Título">Estudios</a></li>

	</ul>

<!--[if lte IE 6]>
</td></tr></table>
</a>
<![endif]-->

</li>



<li><a class="hide" href="#">OPERADOR</a>

<!--[if lte IE 6]>
<a href="#">LAYOUTS
<table><tr><td>
<![endif]-->

	<ul>
	<li><a class="hide" href="#" target="destino" title="Título">Materias &gt;</a>

    <!--[if lte IE 6]>
    <a class="sub" href="#" title="Título">DESPLEGAR &gt;
    <table><tr><td>
    <![endif]-->

		<ul>
			<li><a href="nuevocurso.php" target="destino" title="Título">Registrar</a></li>
			<li><a href="listacurso.php" target="destino" title="Título">Listar</a></li>

		</ul>

	<!--[if lte IE 6]>
	</td></tr></table>
    </a>
    <![endif]-->

	<li><a href="operador.php" target="destino" title="Título">Cohorte y U.T</a></li>
	<li><a href="auditar.php" target="destino" title="Título">Auditorias</a></li>
	

	</ul>

<!--[if lte IE 6]>
</td></tr></table>
</a>
<![endif]-->

</li>

<li><a class="hide" href="#">ADMINISTRATIVO</a>

<!--[if lte IE 6]>
<a href="#">BOXES
<table><tr><td>
<![endif]-->

	<ul>
	<li><a href="planilladministrativa.php" target="destino" title="Título">Listado de Pago</a></li>
	</ul>

<!--[if lte IE 6]>
</td></tr></table>
</a>
<![endif]-->

</li>


<li><a href="#" class="hide">ACERCA</a>

	<ul>
	<li><a class="hide" href="acercade.php" target="destino">Desarrolladores</a></li>
	<li><a href="video.php" target="_blank" title="Título">Video</a></li>

<!--[if lte IE 6]>
<a href="#">EXPLORER
<table><tr><td>
<![endif]-->

<!--[if lte IE 6]>
</td></tr></table>
</a>
<![endif]-->
	</ul>
	
</li>

</li>
</ul>

</div>

										<!--
										<iframe src="Menu.php?Nivel=0" allowtransparency="yes" height="50px"  width="100%"  frameborder="0"></iframe>-->
										
                                        <iframe src="Contenido.php" id="destino" name="destino" scrolling="no" width="100%" height="100%"  frameborder="0"  onload = "setIframeHeight(this.id)"></iframe>
                                            </div>
                                    </div>
                                      
                            </div>
                        </div>
</CENTER>
		 <footer><br><br>
	        <div class="container" style="margin-button:-50px;">
	        	
	            <div class="row">
                    <div class="footer wow bounceIn" data-wow-delay="2.3s">

                    	<p><a rel="license" href="http://creativecommons.org/licenses/by/4.0/"><img alt="Licencia de Creative Commons" style="border-width:0" src="img/cc.png" /></a><br />Este obra está bajo una <a rel="license" href="http://creativecommons.org/licenses/by/4.0/">licencia de Creative Commons Reconocimiento 4.0 Internacional</a></br> UPEL-IMPM Falc&oacuten | Proyecto Socio-Tecnol&oacutegico UPTAG<br>Realizado por: Brs. Hely Arteaga, Dimas Delmoral, Jose Hiquera, Juan Higuera, Martin Reyes</p>

                    </div>
                </div>
	        </div>
        </footer>
</body>
</html>
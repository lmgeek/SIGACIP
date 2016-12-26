
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="css/MenuPrincipal.css" rel="stylesheet" type="text/css"/>	
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="shortcut icon" href="img/favicon.ico" />
    <link href="css/bootstrap.css" rel="stylesheet">
<link rel="stylesheet"  href="css/layout.css" type="text/css"/>
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
										
										<iframe src="Menu.php?Nivel=0" allowtransparency="yes" height="50px"  width="100%"  frameborder="0"></iframe>
										
                                        <iframe src="Contenido.php" id="admin" name="admin" scrolling="no" width="100%" height="100%"  frameborder="0"  onload = "setIframeHeight(this.id)"></iframe>
                                            </div>
                                    </div>
                                      
                            </div>
                        </div>
</CENTER>
		<!--footer
		<div class="footer" >
		  <div class="container" align="center">
		    <div style="float:center;">
		      <img src="../images/logo_web.png"><br>
		      <p>&copyCopyright 2016 - Todos los Derechos Reservados | Proyecto Socio-Tecnol&oacutegico UPTAG</p>
		    </div>
		  </div>
		</div>
		//footer-->

		 <footer><br><br>
	        <div class="container" style="margin-button:-50px;">
	        	
	            <div class="row">
                    <div class="footer wow bounceIn" data-wow-delay="2.3s">

                    	<p><span class="copy-left">©</span>Copyleft - GPL-V3.0 | UPEL-IMPM Falc&oacuten | Proyecto Socio-Tecnol&oacutegico UPTAG<br>Realizado por: Brs. Hely Arteaga, Dimas Delmoral, Jose Hiquera, Juan Higuera, Martin Reyes</p>
                    </div>
                </div>
	        </div>
        </footer>
</body>
</html>
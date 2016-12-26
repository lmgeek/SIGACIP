
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">


	

		<center>
		<div class="col-lg-3" style="margin:20px;">
			<form action="BD/respaldo.php">
				<button type="submit" class="btn btn-lg btn-primary btn-block" name="Submit">
                 	 <span lass="glyphicon glyphicon-search" aria-hidden="true"></span> Respaldar Base de Datos
             	</button>
			</form>
		</div>

		<div class="col-lg-3" style="margin:20px;">
			<form action="BD/restore.php">
				<button type="submit" class="btn btn-lg btn-primary btn-block btn-success" name="Submit">
                  	<span lass="glyphicon glyphicon-search" aria-hidden="true"></span> Restaurar Base de Datos
             	</button>
			</form>
		</div>
		</center>

		<div class="col-lg-3" style="margin:20px;">
			
				<button type="submit" onclick="myFunction()" class="btn btn-lg btn-primary btn-block btn-danger" name="Submit">
                  	<span lass="glyphicon glyphicon-search" aria-hidden="true"></span> Eliminar Base de Datos
             	</button>
			
		</div>
		</center>




<script>
function myFunction() {
    var r = confirm("¿Esta segudo que desea Eliminar la Base de Datos?");
    if (r == true) {
        window.location="BD/delete.php";
    } else {
        window.location="#";
    }
}
</script>


</div>







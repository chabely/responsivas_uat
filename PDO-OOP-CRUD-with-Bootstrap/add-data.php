<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

include_once 'dbconfig.php';
include_once 'header.php';

if(isset($_POST['btn-save']))
{
	$empresa = $_POST['empresa'];
	$nombre = $_POST['nombre'];
	$aPaterno = $_POST['aPaterno'];
	$aMaterno = $_POST['aMaterno'];
	$direccion = $_POST['direccion'];
	$telefono = $_POST['telefono'];
	
	if($crud->create($empresa,$nombre,$aPaterno,$aMaterno,$direccion,$telefono))
	{
		header("Location: add-data.php?inserted");
	}
	else
	{
		header("Location: add-data.php?failure");
	}
}
?>
<?php include_once 'header.php'; ?>
<div class="clearfix"></div>

<?php
if(isset($_GET['inserted']))
{
	?>
    <div class="container">
	<div class="alert alert-info">
    <strong>WOW!</strong> El resgistro fue guardado exitosamente <a href="index.php">Inicio</a>!
	</div>
	</div>
    <?php
}
else if(isset($_GET['failure']))
{
	?>
    <div class="container">
	<div class="alert alert-warning">
    <strong>Lo sentimos!</strong> ocurrio un error al insertar el registro !
	</div>
	</div>
    <?php
}
?>

<br />
<br />
<br />
<br />
<br />
<div class="clearfix"></div><br />

<div class="container">

 	
	 <form method='post'>
 
    <table class='table table-bordered'>
 
		<tr>
            <td>Empresa:</td>
            <td><input type='text' name='empresa' class='form-control' required></td>
        </tr>
               
        <tr>
            <td>Nombre:</td>
            <td><input type='text' name='nombre' class='form-control' required></td>
        </tr>
 
        <tr>
            <td>Apellido paterno:</td>
            <td><input type='text' name='aPaterno' class='form-control' required></td>
        </tr>
 
        <tr>
            <td>Apellido materno: </td>
            <td><input type='text' name='aMaterno' class='form-control' required></td>
        </tr>
 
        <tr>
            <td>Dirección: </td>
            <td><input type='text' name='direccion' class='form-control' required></td>
        </tr>
 
         <tr>
            <td>Telefono: </td>
            <td><input type='text' name='telefono' class='form-control' required></td>
        </tr>
        
        <tr>
            <td colspan="2">
            <button type="submit" class="btn btn-primary" name="btn-save">
    		<span class="glyphicon glyphicon-plus"></span> Crear nuevo registro
			</button>  
            <a href="index.php" class="btn btn-large btn-success"><i class="glyphicon glyphicon-backward"></i> &nbsp;Cancelar</a>
            </td>
        </tr>
 
    </table>
</form>
     
     
</div>

<?php include_once 'footer.php'; ?>
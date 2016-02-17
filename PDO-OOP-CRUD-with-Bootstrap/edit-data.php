<?php
include_once 'dbconfig.php';
include_once 'header.php';

if(isset($_POST['btn-update']))
{
	$id = $_POST['id'];
	$empresa = $_POST['empresa'];
	$nombre = $_POST['nombre'];
	$aPaterno = $_POST['aPaterno'];
	$aMaterno = $_POST['aMaterno'];
	$telefono = $_POST['telefono'];
	$direccion = $_POST['direccion'];	
	
	if($crud->update($id,$empresa,$nombre,$aPaterno,$aMaterno,$direccion,$telefono))
	{
		$msg = "<div class='alert alert-info'>
				<strong>WOW!</strong> El registro fue actualizado correctamente <a href='index.php'>HOME</a>!
				</div>";
	}
	else
	{
		$msg = "<div class='alert alert-warning'>
				<strong>Lo sentimos!</strong> Ocurrio un error mientras se actualizaba el registro. !
				</div>";
	}
}

if(isset($_GET['edit_id']))
{
	$id = $_GET['edit_id'];
	extract($crud->getID($id));	
}

?>
<?php include_once 'header.php'; ?>

<div class="clearfix"></div>

<div class="container">
<?php
if(isset($msg))
{
	echo $msg;
}
?>
</div>

<div class="clearfix"></div><br />

<div class="container">
	 
     <form method='post'>
 <br />
 <br />
 <br />
    <table class='table table-bordered'>
	    <tr>
            <td>Id</td>
            <td><input type='text' name='id' class='form-control' value="<?php echo $id; ?>" required readonly ></td>
        </tr>
 
        <tr>
            <td>Empresa</td>
            <td><input type='text' name='empresa' class='form-control' value="<?php echo $empresa; ?>" required></td>
        </tr>
 
        <tr>
            <td>Nombre</td>
            <td><input type='text' name='nombre' class='form-control' value="<?php echo $nombre; ?>" required></td>
        </tr>
 
        <tr>
            <td>Apellido paterno:</td>
            <td><input type='text' name='aPaterno' class='form-control' value="<?php echo $aPaterno; ?>" required></td>
        </tr>
 
        <tr>
            <td>Apellido paterno:</td>
            <td><input type='text' name='aMaterno' class='form-control' value="<?php echo $aMaterno; ?>" required></td>
        </tr>
 
         <tr>
            <td>Dirección:</td>
            <td><input type='text' name='direccion' class='form-control' value="<?php echo $direccion; ?>" required></td>
        </tr>

        <tr>
            <td>Telefono:</td>
            <td><input type='text' name='telefono' class='form-control' value="<?php echo $telefono; ?>" required></td>
        </tr>
 
        <tr>
            <td colspan="2">
                <button type="submit" class="btn btn-primary" name="btn-update">
    			<span class="glyphicon glyphicon-edit"></span>  Actualizar
				</button>
                <a href="index.php" class="btn btn-large btn-success"><i class="glyphicon glyphicon-backward"></i> &nbsp; Cancelar</a>
            </td>
        </tr>
 
    </table>
</form>
     
     
</div>

<?php include_once 'footer.php'; ?>
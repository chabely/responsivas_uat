<?php
include_once 'dbconfig.php';
include_once 'header.php';

if(isset($_POST['btn-del']))
{
	$id = $_GET['delete_id'];
	$crud->delete($id);
	header("Location: delete.php?deleted");	
}

?>

<?php include_once 'header.php'; ?>

<div class="clearfix"></div>

<div class="container">

	<?php
	if(isset($_GET['deleted']))
	{
		?>
        <div class="alert alert-success">
    	<strong>Éxito!</strong> el registro fue eliminado... 
		</div>
        <?php
	}
	else
	{
		?>
        <div class="alert alert-danger">
    	<strong>Estas seguro </strong> de eliminar el registro ? 
		</div>
        <?php
	}
	?>	
</div>

<div class="clearfix"></div>

<div class="container">
 	
	 <?php
	 if(isset($_GET['delete_id']))
	 {
		 ?>
         <table class='table table-bordered'>
         <tr>
         <th>#</th>
         <th>Empresa</th>
         <th>Nombre del representante</th>
         <th>Apellido paterno</th>
         <th>Apellido materno</th>
         <th>Telefono</th>         
         <th>Direccion</th>         
         </tr>
         <?php
         $stmt = $DB_con->prepare("SELECT * FROM clientes WHERE idCliente=:id");
         $stmt->execute(array(":id"=>$_GET['delete_id']));
         while($row=$stmt->fetch(PDO::FETCH_BOTH))
         {
             ?>
             <tr>
             <td><?php print($row['idCliente']); ?></td>
             <td><?php print($row['empresa']); ?></td>
             <td><?php print($row['nombre']); ?></td>
             <td><?php print($row['aPaterno']); ?></td>
         	 <td><?php print($row['aMaterno']); ?></td>
         	 <td><?php print($row['telefono']); ?></td>             
         	 <td><?php print($row['direccion']); ?></td>             
             </tr>
             <?php
         }
         ?>
         </table>
         <?php
	 }
	 ?>
</div>

<div class="container">
<p>
<?php
if(isset($_GET['delete_id']))
{
	?>
  	<form method="post">
    <input type="hidden" name="id" value="<?php echo $row['id']; ?>" />
    <button class="btn btn-large btn-primary" type="submit" name="btn-del"><i class="glyphicon glyphicon-trash"></i> &nbsp; YES</button>
    <a href="index.php" class="btn btn-large btn-success"><i class="glyphicon glyphicon-backward"></i> &nbsp; NO</a>
    </form>  
	<?php
}
else
{
	?>
    <a href="index.php" class="btn btn-large btn-success"><i class="glyphicon glyphicon-backward"></i> &nbsp; Back to index</a>
    <?php
}
?>
</p>
</div>	
<?php include_once 'footer.php'; ?>
<?php
include_once 'dbconfig.php';
?>
<?php include_once 'header.php'; ?>

<div ></div>
<br />
<br />
<br />
<div class="container">
<a href="add-data.php" class="btn btn-large btn-info"><i class="glyphicon glyphicon-plus"></i> &nbsp; Agregar</a> 
</div>

<div class="clearfix"></div><br />

<div class="container">
	 <table class='table table-bordered table-responsive'>
     <tr>
     <th>#</th>
     <th>Empresa</th>
     <th>Nombre del representante</th>
     <th>Apellido paterno</th>
     <th>Apellido materno</th>
     <th>Dirección</th>
     <th>Telefono</th>
     <th colspan="2" align="center">Operación</th>
     </tr>
 
    <?php
		$query = "SELECT * FROM clientes";       
		$records_per_page=10;
		$newquery = $crud->paging($query,$records_per_page);
		$crud->dataview($newquery);
	 ?>
    <tr>
        <td colspan="7" align="center">
 			<div class="pagination-wrap">
            <?php $crud->paginglink($query,$records_per_page); ?>
        	</div>
        </td>
    </tr>

 
</table>
   
       
</div>

<?php include_once 'footer.php'; ?>

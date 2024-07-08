<?php require_once "controller/read_controller.php"; ?>
<?php require_once "includes/header.php"; ?>

<h1>Ver Empleado</h1>
</div>
<div class="form-group">
    <label>Nombre</label>
    <p class="form-control-static"><?php echo $row["name"]; ?></p>
</div>
<div class="form-group">
    <label>Dirección</label>
    <p class="form-control-static"><?php echo $row["address"]; ?></p>
</div>
<div class="form-group">
    <label>Sueldo</label>
    <p class="form-control-static"><?php echo $row["salary"]; ?></p>
</div>
<p><a href="index.php" class="btn btn-primary">Volver</a></p>

<?php require_once "includes/footer.php"; ?>

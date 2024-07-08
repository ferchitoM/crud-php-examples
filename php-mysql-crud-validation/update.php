<?php require_once "controller/update_controller.php"; ?>
<?php require_once "includes/header.php"; ?>

<h2>Actualizar Registro</h2>
</div>
<p>Edite los valores de entrada y envíe para actualizar el registro.</p>
<form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
    <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
        <label>Nombre</label>
        <input type="text" name="name" class="form-control" value="<?php echo $name; ?>">
        <span class="help-block"><?php echo $name_err;?></span>
    </div>
    <div class="form-group <?php echo (!empty($address_err)) ? 'has-error' : ''; ?>">
        <label>Direccion</label>
        <textarea name="address" class="form-control"><?php echo $address; ?></textarea>
        <span class="help-block"><?php echo $address_err;?></span>
    </div>
    <div class="form-group <?php echo (!empty($salary_err)) ? 'has-error' : ''; ?>">
        <label>Sueldo</label>
        <input type="text" name="salary" class="form-control" value="<?php echo $salary; ?>">
        <span class="help-block"><?php echo $salary_err;?></span>
    </div>
    <input type="hidden" name="id" value="<?php echo $id; ?>"/>
    <input type="submit" class="btn btn-primary" value="Enviar">
    <a href="index.php" class="btn btn-default">Cancelar</a>
</form>

<?php require_once "includes/footer.php"; ?>

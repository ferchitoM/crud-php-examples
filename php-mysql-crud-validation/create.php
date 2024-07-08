<?php require_once "controller/create_controller.php"; ?>
<?php require_once "includes/header.php"; ?>

<h2>Agregar Empleado</h2>
</div>
<p>Favor diligenciar el siguiente formulario, para agregar el empleado.</p>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
        <label>Nombre</label>
        <input type="text" name="name" class="form-control" value="<?php echo $name; ?>">
        <span class="help-block"><?php echo $name_err;?></span>
    </div>
    <div class="form-group <?php echo (!empty($address_err)) ? 'has-error' : ''; ?>">
        <label>Dirección</label>
        <textarea name="address" class="form-control"><?php echo $address; ?></textarea>
        <span class="help-block"><?php echo $address_err;?></span>
    </div>
    <div class="form-group <?php echo (!empty($salary_err)) ? 'has-error' : ''; ?>">
        <label>Sueldo</label>
        <input type="text" name="salary" class="form-control" value="<?php echo $salary; ?>">
        <span class="help-block"><?php echo $salary_err;?></span>
    </div>
    <input type="submit" class="btn btn-primary" value="Submit">
    <a href="index.php" class="btn btn-default">Cancelar</a>
</form>

<?php require_once "includes/footer.php"; ?>

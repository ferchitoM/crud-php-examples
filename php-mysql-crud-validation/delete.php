<?php require_once "controller/delete_controller.php"; ?>
<?php require_once "includes/header.php"; ?>

<h1>Borrar Registro</h1>
</div>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <div class="alert alert-danger fade in">
        <input type="hidden" name="id" value="<?php echo trim($_GET["id"]); ?>"/>
        <p>Está seguro que deseas borrar el registro</p><br>
        <p>
            <input type="submit" value="Si" class="btn btn-danger">
            <a href="index.php" class="btn btn-default">No</a>
        </p>
    </div>
</form>

<?php require_once "includes/footer.php"; ?>

<?php require_once "includes/header.php"; ?>

<h2 class="pull-left">Empleados</h2>
<a href="create.php" class="btn btn-success pull-right">Agregar nuevo empleado</a>
</div>
<?php
    // Include config file
    require_once "config/connection.php";

    // Attempt select query execution
    $sql = "SELECT * FROM employees";
    if($result = mysqli_query($link, $sql)){
        if(mysqli_num_rows($result) > 0){
            echo "<table class='table table-bordered table-striped'>";
                echo "<thead>";
                    echo "<tr>";
                        echo "<th>#</th>";
                        echo "<th>Nombre</th>";
                        echo "<th>Dirección</th>";
                        echo "<th>Sueldo</th>";
                        echo "<th>Acción</th>";
                    echo "</tr>";
                echo "</thead>";
                echo "<tbody>";
                while($row = mysqli_fetch_array($result)){
                    echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['name'] . "</td>";
                        echo "<td>" . $row['address'] . "</td>";
                        echo "<td>" . $row['salary'] . "</td>";
                        echo "<td>";
                            echo "<a href='read.php?id=". $row['id'] ."' title='Ver' data-toggle='tooltip'><span class='glyphicon glyphicon-eye-open'></span></a>";
                            echo "<a href='update.php?id=". $row['id'] ."' title='Actualizar' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>";
                            echo "<a href='delete.php?id=". $row['id'] ."' title='Borrar' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>";
                        echo "</td>";
                    echo "</tr>";
                }
                echo "</tbody>";                            
            echo "</table>";
            
            // Free result set
            mysqli_free_result($result);
        } else {
            echo "<p class='lead'><em>No records were found.</em></p>";
        }
    } else {
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }

    // Close connection
    mysqli_close($link);
?>

<?php require_once "includes/footer.php"; ?>

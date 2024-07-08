<?php
    function listar_platillos($conn) {
        $consulta = "
            SELECT 
                productos.codigo, 
                productos.descripcion, 
                productos.imagen, 
                productos.precio_venta 
            FROM productos 
            INNER JOIN categorias 
            WHERE productos.id_categoria = categorias.id";
        $lista = mysqli_query($conn, $consulta);
        
        return $lista;

    }

    function listar_tabla($conn) {
        $consulta = "
            SELECT 
                categorias.categoria, 
                productos.descripcion, 
                productos.codigo  
            FROM productos 
            INNER JOIN categorias
            WHERE productos.id_categoria = categorias.id";

        $lista_tabla = mysqli_query($conn, $consulta);

        return $lista_tabla;
    }
?>
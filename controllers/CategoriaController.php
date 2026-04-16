<?php

include_once("models/Categoria.php");

class CategoriaController{
    public function listar_cat(){
        // die("El controlador de categorías responde");
        $catObj = new Categoria();

        $todasCategorias = $catObj->listar_categoria();

        include_once("views/categorias/index_cat.php");
    }
    
}

?>
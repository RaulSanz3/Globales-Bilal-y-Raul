<?php

include_once("models/Departamento.php");

class DepartamentoController{
    //método principal para mostar la lista
    public function listar(){
        //instanciamos el modelo
        $depObj = new Departamento();

        //guardamos el resultado en una variable
        $todosDepartamentos = $depObj->listar();

        include_once("views/departamentos/index.php");
    }
}



?>
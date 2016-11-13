<?php

error_reporting("E_ERROR");

include("../model/dao-search.php");
include("../functions-aux.php");

error_reporting(0);
$option = $_POST["option"];
$_SESSION["genes"] = array();
$_SESSION["ncrna"] = array();
$term =$_POST["term"];
session_start();
$_SESSION["genes"] = SearchbyAllOptions($conexao, $term);
$_SESSION["ncrna"] = SearchbyAllncRNA($conexao, $term);
if(count($_SESSION["genes"])>0 or count($_SESSION["ncrna"])>0){
    redireciona("search.php");
}else{
    echo ("<script>alert('We not fount registers relationed the your search. Try again !');</script>");
    redireciona("Leishdb.php");
}

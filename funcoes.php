<?php
  //converte formato Brasileiro para Americano
  function dateBRToUSA($data) {
    $troca = str_replace("/","-",$data);
    return date("Y-m-d",strtotime($troca));
  }

  //converte formato Americano para Brasileiro
  function dateUSAToBR($data) {
    return date("d/m/Y",strtotime($data));
  }

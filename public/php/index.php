<?php 
namespace People ;
spl_autoload_register(function($classname) {
    include __DIR__ .'/' . $classname . '.php' ;
  echo $classname;
});
$person= new Person();

<?php
Abstract class baseController {
    protected $registry;
    //w konstruktorze przekazujemy rejestr, aby mieć dostęp do zmiennych w nim zawartych
    function __construct($registry) {
        $this->registry = $registry;
    }
    //wszystkie kontrollery dziedziczące kontroller bazowy muszą posiadać metodę index
    abstract function index();
    
   
}
?>
<?php
    class Manufacturer extends DataMapper{
        var $has_many = array('products');
        

        function __construct($id = NULL){
            parent::__construct($id);
        }
    }
?>
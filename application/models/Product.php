<?php
    class Product extends DataMapper{
        var $validation = array(
            "manufacturer" => array(
                "label" => "manufacturer",
                "rules" => array("required"),
            ),
            "name" => array(
                "label" => "name",
                "rules" => array("required", "min_length" => 8),
            ),
            "description" => array(
                "label" => "description",
                "rules" => array("required", "max_length" => 50),
            ),
            "price" => array(
                "label" => "price",
                "rules" => array("required", "numeric", "greater_than" => 0),
            )
        );

        function __construct($id = NULL){
            parent::__construct($id);
        }
    }
?>
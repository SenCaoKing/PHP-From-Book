﻿<?php
$db = new PDO('mysql:host=127.0.0.1;dbname=laravel_test;charset=utf8', 'root', 'root');

// Make your model available
include 'models/FooModel.php';

// Create an instance
$fooModel = new FooModel($db);
// Get the list of Foos
$fooList = $fooModel->getAllFoos();

// Show the view
include 'views/foo-list.php';
?>
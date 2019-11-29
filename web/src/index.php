<?php

require_once "router.php";

route('/', function () {
    return "Project Carteirb Home page";
});

route('/login', function () {
    return "Welcome to Login page";
});

$action = $_SERVER['REQUEST_URI'];
dispatch($action);
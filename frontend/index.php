<?php

require_once "./src/router.php";

route('/', function () {
    readfile('src/route/login.html');
});


route('/login', function () {
    return "Welcome to Login page";
});


$action = $_SERVER['REQUEST_URI'];
dispatch($action);
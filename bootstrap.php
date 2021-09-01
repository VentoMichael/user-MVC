<?php

require('Models/Model.php');
require('Models/User.php');
require('controllers/UserController.php');

$route = require('utils/router.php');
$controllerName = 'Controllers\\'.$route['controller'];
$controller = new $controllerName();
$data = call_user_func([$controller, $route['callback']]);

extract($data, EXTR_OVERWRITE);

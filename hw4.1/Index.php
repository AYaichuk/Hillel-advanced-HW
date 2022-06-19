<?php

function myAutoloader($class)
{
    $name = '/' . str_replace('\\', '/', $class);
    $file = __DIR__ . $name . '.php';
    if (file_exists($file)) {
        require_once($file);

    } else {
        throw new Exception('Файл ' . $class . '.php не существует');
    }
}

spl_autoload_register('myAutoloader');

use App\Http\Controllers\MainController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OrdersController;
use App\Http\Helpers\ImageHelper;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;

try {
    new MainController();
    new DashboardController();
    new OrdersController();
    new ImageHelper();
    new Order();
    new Product();
    new User();
    new MainController1();
} catch (Exception $exception) {
    echo $exception->getMessage();
}

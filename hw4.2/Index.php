<?php

require_once '../vendor/autoload.php';

use App\Http\Controllers\MainController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OrdersController;
use App\Http\Helpers\ImageHelper;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;


new MainController();
new DashboardController();
new OrdersController();
new ImageHelper();
new Order();
new Product();
new User();
new MainController1();

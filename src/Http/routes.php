<?php

use Zhy\Sku\Http\Controllers;
use Illuminate\Support\Facades\Route;

Route::get('dcat-admin-sku', Controllers\DcatAdminSkuController::class.'@index');
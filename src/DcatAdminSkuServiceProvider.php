<?php

namespace Zhy\Sku;

use Dcat\Admin\Extend\ServiceProvider;
use Dcat\Admin\Admin;
use Dcat\Admin\Form;
use Zhy\Sku\Extensions\Form\SkuField;
use Zhy\Sku\Http\Controllers\DcatAdminSkuController;

class DcatAdminSkuServiceProvider extends ServiceProvider
{
	protected $js = [
        'js/index.js',
    ];
	protected $css = [
		'css/index.css',
	];

	public function register()
	{
		//
	}

	public function init()
	{
	    if (!Admin::extension()->enabled('zhy.dcat-admin-sku')){
	        return false;
        }

		parent::init();

        $attributes = [
            'prefix'     => config('admin.route.prefix'),
            'middleware' => config('admin.route.middleware'),
        ];

        app('router')->group($attributes, function ($router) {
            $router->post('sku/upload', [DcatAdminSkuController::class,'uploadFile'])->name('dcat-admin-sku.file-upload');
        });

        app('view')->prependNamespace('admin',$this->getViewPath());

        Form::extend('sku',SkuField::class);
	}

	public function settingForm()
	{
		return new Setting($this);
	}
}

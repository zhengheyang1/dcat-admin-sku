<?php

namespace Zhy\Sku\Extensions\Form;

use Dcat\Admin\Form\Field;

class SkuField extends Field
{
    protected $view = 'admin::sku_field';

    protected static $js = [
        'vendor/dcat-admin-extensions/zhy/dcat-admin-sku/js/sku.js'
    ];

    protected static $css = [
        'vendor/dcat-admin-extensions/zhy/dcat-admin-sku/css/sku.css'
    ];

    public function render()
    {
        $this->script = <<< EOF
window.Sku = new ZhySKU('{$this->getElementClassSelector()}')
EOF;
        return parent::render();
    }

}

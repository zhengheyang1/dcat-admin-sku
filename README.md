dcat-admin-sku 商品SKU
======

![预览](https://github.com/jade-kun/sku/blob/master/1.png?raw=true)

## 安装
```bash
composer require zhy/dcat-admin-sku
```

## 配置


### 数据库字段配置
- 数据类型json


### 使用方法
```php
$form->sku('skuField','商品SKU');
```

### 其他说明
本扩展只会将SKU数据写指定的字段中，如需个性化处理数据，请在【表单回调】中处理

图片上传与`config/admin.php中upload.disk`一致

默认数据格式
```json
{
    "type": "many",// many多规格；single单规格
    "attrs": {
        "CPU": ["两核","四核"],
        "内存": ["4G","8G","16G"]
    },
    "sku": [
        {
            "CPU": "两核",
            "内存": "4G",
            "pic": "http://ladmin.test/storage/363a08c4d0841f61f79ef5466ff31f9662021a831f001.png",
            "price": "800",
            "stock": "999"
        },
        {
            "CPU": "两核",
            "内存": "8G",
            "pic": "",
            "price": "1000",
            "stock": "999"
        },
        {
            "CPU": "两核",
            "内存": "16G",
            "pic": "http://ladmin.test/storage/363a08c4d0841f61f79ef5466ff31f9662021a8881537.png",
            "price": "0",
            "stock": "999"
        },
        {
            "CPU": "四核",
            "内存": "4G",
            "pic": "",
            "price": "0",
            "stock": "999"
        },
        {
            "CPU": "四核",
            "内存": "8G",
            "pic": "",
            "price": "0",
            "stock": "999"
        },
        {
            "CPU": "四核",
            "内存": "16G",
            "pic": "",
            "price": "0",
            "stock": "999"
        }
    ]
}
```

```php
// 处理数据
$form->saving(function($form) {
    dd($form->skuField);
});
```

## 开源协议

Dcat Admin Sku 遵循 MIT 开源协议。

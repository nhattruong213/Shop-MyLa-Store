<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    
    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function brand(){
        return $this->belongsTo(related: brand::class, foreignKey: 'brand_id', ownerKey:'id');
    }

    public function productCategory(){
        return $this->belongsTo(related: productCategory::class, foreignKey: 'product_category_id', ownerKey:'id');
    }
    public function productImages(){
        return $this->hasMany(related: ProductImage::class, foreignKey: 'product_id', localKey:'id');
    }
    public function productDetails(){
        return $this->hasMany(related: ProductDetail::class, foreignKey: 'product_id', localKey:'id');
    }
    public function productComments(){
        return $this->hasMany(related: ProductComment::class, foreignKey: 'product_id', localKey:'id');
    }
    public function orderDetails(){
        return $this->hasMany(related: OrderDetail::class, foreignKey: 'product_id', localKey:'id');
    }
}

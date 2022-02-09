<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;
    
    protected $table = 'product_categories';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function products(){
        return $this->hasMany(related: Product::class, foreignKey: 'product_category_id', localKey:'id');
    }
}

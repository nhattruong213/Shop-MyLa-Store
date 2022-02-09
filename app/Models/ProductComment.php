<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductComment extends Model
{
    use HasFactory;
  
    protected $table = 'product_comments';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function products(){
        return $this->belongsTo(related: Product::class, foreignKey: 'product_id', ownerKey:'id');
    }
    public function user(){
        return $this->belongsTo(related: User::class, foreignKey: 'user_id', ownerKey:'id');
    }
}

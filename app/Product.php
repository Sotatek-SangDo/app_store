<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Extensions\HasManySyncable;
use App\ImageProduct;

class Product extends Model
{
    public $table = 'products';

    public $fillable = ['id', 'pro_name', 'pro_price', 'pro_desc', 'pro_thumbnail', 'cat_id', 'pro_sub_desc', 'imageProducts'];
    
    public function imageProducts()
    {
        return $this->hasMany(ImageProduct::class, 'pro_id', 'id');
    }
}

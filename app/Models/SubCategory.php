<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $table = 'sub_categories';

    protected $fillable = [
        'name','slug','status','category_id','created_by','updated_by'
    ];

    public function prd_brand_relation()
    {
        return $this->belongsTo('App\Models\Brand','brand_id')->withDefault();
    }

    public function prd_category_relation()
    {
        return $this->belongsTo('App\Models\Category','category_id')->withDefault();
    }

    public function prd_supplier_relation()
    {
        return $this->belongsTo('App\Models\Supplier','category_id')->withDefault();
    }

    public function prd_unit_relation()
    {
        return $this->belongsTo('App\Models\Unit','unit_id')->withDefault();
    }


}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $table = 'purchases';



    public function prd_brand_relation()
    {
        return $this->belongsTo('App\Models\Brand','brand_id')->withDefault();
    }

    public function prd_category_relation()
    {
        return $this->belongsTo('App\Models\Category','category_id')->withDefault();
    }
    public function sub_category_relation()
    {
        return $this->belongsTo('App\Models\SubCategory','sub_category_id')->withDefault();
    }

    public function prd_supplier_relation()
    {
        return $this->belongsTo('App\Models\Supplier','supplier_id')->withDefault();
    }

    public function prd_unit_relation()
    {
        return $this->belongsTo('App\Models\Unit','unit_id')->withDefault();
    }


}

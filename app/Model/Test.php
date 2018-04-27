<?php

namespace App\Model;

use App\Model\Test;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    protected $fillable = [
        'name', 'address', 'mobile', 'description'
    ];

    public function getTestData() {
        return Test::select('id', 'name', 'mobile', 'address')->get();
    }

}

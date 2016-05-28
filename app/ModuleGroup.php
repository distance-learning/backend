<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModuleGroup extends Model
{
    public $fillable = [
        ''
    ];

    public $timestamps = false;

    public function modules()
    {
        return $this->hasMany(Module::class);
    }
}

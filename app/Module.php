<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    public $fillable = [
        'name',
        'content',
        'type',
        'module_group_id',
        'test_id'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function moduleGroup()
    {
        return $this->belongsTo(ModuleGroup::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function test()
    {
        return $this->belongsTo(Test::class);
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\ModuleGroup
 *
 * @property integer $id
 * @property string $name
 * @property integer $teacher_id
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Module[] $modules
 * @method static \Illuminate\Database\Query\Builder|\App\ModuleGroup whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ModuleGroup whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ModuleGroup whereTeacherId($value)
 * @mixin \Eloquent
 */
class ModuleGroup extends Model
{
    public $fillable = [
        'name',
    ];

    public $timestamps = false;

    public function modules()
    {
        return $this->hasMany(Module::class);
    }
}

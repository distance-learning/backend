<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Module
 *
 * @property integer $id
 * @property string $name
 * @property string $content
 * @property string $type
 * @property integer $module_group_id
 * @property integer $test_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\ModuleGroup $moduleGroup
 * @property-read \App\Test $test
 * @method static \Illuminate\Database\Query\Builder|\App\Module whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Module whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Module whereContent($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Module whereType($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Module whereModuleGroupId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Module whereTestId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Module whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Module whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Task[] $tasks
 */
class Module extends Model
{
    public $fillable = [
        'name',
        'content',
        'type',
        'module_group_id',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function moduleGroup()
    {
        return $this->belongsTo(ModuleGroup::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function tasks()
    {
        return $this->morphMany(Task::class, 'module');
    }
}

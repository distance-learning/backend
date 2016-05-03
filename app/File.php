<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class File
 *
 * @package App
 * @property integer $id
 * @property string $filename
 * @property string $path
 * @property integer $author_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\User $author
 * @method static \Illuminate\Database\Query\Builder|\App\File whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\File whereFilename($value)
 * @method static \Illuminate\Database\Query\Builder|\App\File wherePath($value)
 * @method static \Illuminate\Database\Query\Builder|\App\File whereAuthorId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\File whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\File whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class File extends Model
{
    /**
     * @var array
     */
    public $fillable = [
        'filename',
        'path',
        'author_id'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }
}

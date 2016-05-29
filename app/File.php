<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

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
 * @property string $content_type
 * @method static \Illuminate\Database\Query\Builder|\App\File whereContentType($value)
 * @method static \Illuminate\Database\Query\Builder|\App\File getNotImages()
 * @method static \Illuminate\Database\Query\Builder|\App\File getImages()
 */
class File extends Model
{
    /**
     * @var array
     */
    public $fillable = [
        'filename',
        'path',
        'author_id',
        'content_type'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    /**
     * @param $query
     * @return mixed
     */
    public function scopeGetNotImages($query)
    {
        return $query->where('content_type', '<>', 'image/jpeg')->where('content_type', '<>', 'image/gif')->where('content_type', '<>', 'image/png');
    }

    /**
     * @param $query
     * @return mixed
     */
    public function scopeGetImages($query)
    {
        return $query->where('content_type', 'image/jpeg')->orWhere('content_type', 'image/gif')->orWhere('content_type', 'image/png');
    }

    /**
     * @param $value
     * @return string
     */
    public function setPathAttribute($value)
    {
        $this->attributes['path'] = Request::root() . $value;
    }
}

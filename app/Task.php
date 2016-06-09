<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Task
 *
 * @package App
 * @property integer $id
 * @property integer $attachment_id
 * @property string $attachment_type
 * @property integer $sender_id
 * @property integer $recipient_id
 * @property string $deadline
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $attachment
 * @property-read \App\User $sender
 * @property-read \App\User $recipient
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Event[] $events
 * @method static \Illuminate\Database\Query\Builder|\App\Task whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Task whereAttachmentId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Task whereAttachmentType($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Task whereSenderId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Task whereRecipientId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Task whereDeadline($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Task whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Task whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Task extends Model
{
    /**
     * @var array
     */
    public $fillable = [
        'attachment_id',
        'attachment_type',
        'sender_id',
        'recipient_id',
        'deadline',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function attachment()
    {
        return $this->morphTo();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function recipient()
    {
        return $this->belongsTo(User::class, 'recipient_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function events()
    {
        return $this->morphMany(Event::class, 'attachment');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Event
 *
 * @package App
 * @property integer $id
 * @property integer $sender_id
 * @property integer $recipient_id
 * @property string $attachment_type
 * @property integer $attachment_id
 * @property \Carbon\Carbon $deadline
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $attachment
 * @property-read \App\User $recipient
 * @property-read \App\User $sender
 * @method static \Illuminate\Database\Query\Builder|\App\Event whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Event whereSenderId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Event whereRecipientId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Event whereAttachmentType($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Event whereAttachmentId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Event whereDeadline($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Event whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Event whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Event extends Model
{
    /**
     * @var array
     */
    public $fillable = [
        'sender_id',
        'recipient_id',
        'attachment_type',
        'attachment_id',
        'deadline'
    ];

    /**
     * @var array
     */
    public $dates = [
        'deadline'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function attachment()
    {
        return $this->morphTo();
    }

    /**
     * @return mixed
     */
    public function object()
    {
        if ($this->attachment) {
            return $this->attachment->attachment;
        }

        return null;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function recipient()
    {
        return $this->belongsTo(User::class, 'recipient_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }
}

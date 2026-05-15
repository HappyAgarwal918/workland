<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    protected $fillable = ['employer_id', 'guide_id', 'booking_id', 'last_message_at'];

    protected $casts = [
        'last_message_at' => 'datetime',
    ];

    public function employer()
    {
        return $this->belongsTo(User::class, 'employer_id');
    }

    public function guide()
    {
        return $this->belongsTo(User::class, 'guide_id');
    }

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }

    public function messages()
    {
        return $this->hasMany(Message::class)->orderBy('created_at');
    }

    public function lastMessage()
    {
        return $this->hasOne(Message::class)->latestOfMany();
    }

    public function otherUser(User $user): User
    {
        return $user->id === $this->employer_id ? $this->guide : $this->employer;
    }

    public function unreadCount(User $user): int
    {
        return $this->messages()
            ->where('sender_id', '!=', $user->id)
            ->where('is_read', false)
            ->count();
    }
}

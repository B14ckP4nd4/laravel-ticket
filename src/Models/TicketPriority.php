<?php

namespace BlackPanda\Ticket\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TicketPriority extends Model
{
    protected $table = 'ticket_priorities';
    protected $fillable = ['name','color'];

    public $timestamps = false;

    /**
     * Get related tickets.
     *
     * @return HasMany
     */
    public function tickets()
    {
        return $this->hasMany(Ticket::class, 'priority_id');
    }



}

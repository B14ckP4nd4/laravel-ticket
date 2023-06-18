<?php

namespace BlackPanda\Ticket\Models;

use Illuminate\Database\Eloquent\Model;

class TicketStatus extends Model
{
    protected $table = 'ticket_statuses';
    protected $fillable = ['name','color'];
    public $timestamps = false;

    /**
     * Get related tickets.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tickets()
    {
        return $this->hasMany(Ticket::class , 'status_id');
    }

}

<?php

namespace BlackPanda\Ticket\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TicketAudit extends Model
{
    protected $table = 'ticket_audits';
    protected $fillable = [
        'operation',
        'user_id',
        'ticket_id',
    ];

    /**
     * this return the Ticket Model
     * @return BelongsTo
     */
    public function ticket()
    {
        return $this->belongsTo(Ticket::class,'ticket_id','id');
    }

    /**
     * this return the user Model
     * @returns BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

}

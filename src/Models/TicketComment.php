<?php

namespace BlackPanda\Ticket\Models;

use App\Models\User;
use BlackPanda\Ticket\Trait\ContentEllipse;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TicketComment extends Model
{
    use ContentEllipse;

    protected $table = 'ticket_comments';


    /**
     * Get related ticket.
     *
     * @return BelongsTo
     */
    public function ticket()
    {
        return $this->belongsTo(Ticket::class, 'ticket_id');
    }

    /**
     * Get comment owner.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }


}

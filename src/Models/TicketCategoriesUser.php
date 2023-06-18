<?php

namespace BlackPanda\Ticket\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TicketCategoriesUser extends Model
{
    protected $table = 'ticket_categories_users';
    protected $fillable = ['category_id','user_id'];

    public $timestamps = false;

    /**
     * this will return related user Model
     * @returns BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

    /**
     *  this will return related Category Model
     * @returns BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(TicketCategory::class,'category_id','id');
    }

}

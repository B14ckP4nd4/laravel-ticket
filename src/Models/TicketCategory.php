<?php

namespace BlackPanda\Ticket\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TicketCategory extends Model
{
    protected $table = 'ticket_categories';

    protected $fillable = ['name','color'];

    public $timestamps = false;


    /**
     * this will user Models that related to this from ticket categories users table
     * @return BelongsToMany
     */
    public function agents(){
        return $this->belongsToMany(
            User::class,
            'ticket_categories_users',
            'category_id',
            'user_id'
        );
    }

    /**
     * Get related tickets.
     *
     * @return HasMany
     */
    public function tickets()
    {
        return $this->hasMany(Ticket::class, 'category_id');
    }

    /**
     * This will give model's Parent
     * @return BelongsTo
     */
    public function parent(): BelongsTo
    {
        return $this->belongsTo(self::class, 'parent_id');
    }

    /**
     * This will give model's Parent, Parent's parent, and so on until root.
     * @return BelongsTo
     */
    public function parentRecursive(): BelongsTo
    {
        return $this->parent()->with('parentRecursive');
    }

    /**
     * Get current model's all recursive parents in a collection in flat structure.
     */
    public function parentRecursiveFlatten()
    {
        $result = collect();
        $item = $this->parentRecursive;
        if ($item instanceof TicketCategory) {
            $result->push($item);
            $result = $result->merge($item->parentRecursiveFlatten());
        }
        return $result;
    }

    /**
     * This will give model's Children
     * @return HasMany
     */
    public function children(): HasMany
    {
        return $this->hasMany(self::class, 'parent_id');
    }

    /**
     * This will give model's Children, Children's Children and so on until last node.
     * @return HasMany
     */
    public function childrenRecursive(): HasMany
    {
        return $this->children()->with('childrenRecursive');
    }



}

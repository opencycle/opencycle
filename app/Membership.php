<?php

namespace Opencycle;

use Illuminate\Database\Eloquent\Relations\Pivot;

class Membership extends Pivot
{
    /**
     * None apart from Admin
     */
    const NOTIFY_NONE = 1;

    /**
     * One for each Post
     */
    const NOTIFY_EACH = 2;

    /**
     * Daily digest
     */
    const NOTIFY_DAILY = 2;

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_prefs' => 'int',
    ];

    /**
     * Check if this User has this Role in this Group.
     *
     * @param Role $role
     * @return bool
     */
    public function hasRole(Role $role): bool
    {
        return $this->role ? $this->role->is($role) : false;
    }

    /**
     * The User in this Membership.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * The Group in this Membership.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    /**
     * The Role this User has in this Group.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}

<?php

namespace Opencycle;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Check if this User has this Role.
     *
     * @param Role $role
     * @return bool
     */
    public function hasRole(Role $role): bool
    {
        return $this->role && $this->role->is($role);
    }

    /**
     * Check if this user is a member of this Group.
     *
     * @param Group $group
     * @return bool
     */
    public function isMemberOf(Group $group): bool
    {
        return $this->groups->contains($group);
    }

    /**
     * Return the membership pivot model for this Group.
     *
     * @param Group $group
     * @return Membership
     */
    public function getMembership(Group $group): Membership
    {
        return $this->groups->find($group->id)->membership;
    }

    /**
     * The global Role this User has.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    /**
     * This Users Posts.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    /**
     * The Groups that this User belongs to.
     */
    public function groups()
    {
        return $this->belongsToMany(Group::class, 'memberships')
            ->as('membership')
            ->withPivot('role_id', 'email_prefs')
            ->using(Membership::class);
    }
}

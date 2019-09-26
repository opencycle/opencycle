<?php

namespace Opencycle\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Opencycle\Group;
use Opencycle\Policies\GroupPolicy;
use Opencycle\Post;
use Opencycle\Policies\PostPolicy;
use Opencycle\Policies\UserPolicy;
use Opencycle\User;
use Opencycle\Policies\MembershipPolicy;
use Opencycle\Membership;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Post::class => PostPolicy::class,
        User::class => UserPolicy::class,
        Group::class => GroupPolicy::class,
        Membership::class => MembershipPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
    }
}

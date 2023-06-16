<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // Only Admin can access is gate
        // Gate::define(['all-project','add-project'], function($user){
        //     return $user->hasRole(['Admin']);
        // });

        // Only Admin & Manager can access is gate
        // Gate::define(['project', 'all-project', 'add-project', 'edit-project', 'delete-project'], function($user){
        //     return $user->hasAnyRole(['Admin', 'Manager']);
        // });
        Gate::define('admin', function($user){
            return $user->hasRole('Admin');
        });

        Gate::define('admin-dashboard', function($user){
            return $user->hasRole('Admin');
        });

        Gate::define('employee-dashboard', function($user){
            return $user->hasRole('Employee');
        });

        Gate::define('loan', function($user){
            return $user->hasRole('admin','HR');
        });

        Gate::define('manager-dashboard', function($user){
            return $user->hasRole('Manager');
        });

        Gate::define('hr-dashboard', function($user){
            return $user->hasRole('HR');
        });

        Gate::define('client', function($user){
            return $user->hasAnyRole(['Admin', 'Manager']);
        });

        Gate::define('project', function($user){
            return $user->hasAnyRole(['Admin', 'Manager']);
        });

        Gate::define('tasktracker', function($user){
            return $user->hasAnyRole(['Admin', 'Manager']);
        });
      
 		Gate::define('blogs', function($user){
            return $user->hasAnyRole(['Admin', 'Manager']);
        });
      
      	Gate::define('contacts', function($user){
            return $user->hasAnyRole(['Admin', 'Manager']);
        });

        Gate::define('company', function($user){
            return $user->hasAnyRole(['Admin']);
        });

        Gate::define('branches', function($user){
            return $user->hasAnyRole(['Admin']);
        });

        Gate::define('departments', function($user){
            return $user->hasAnyRole(['Admin']);
        });

        Gate::define('nationality', function($user){
            return $user->hasAnyRole(['Admin']);
        });

        Gate::define('religion', function($user){
            return $user->hasAnyRole(['Admin']);
        });

        Gate::define('qualification', function($user){
            return $user->hasAnyRole(['Admin']);
        });

        Gate::define('position', function($user){
            return $user->hasAnyRole(['Admin']);
        });

        Gate::define('professions', function($user){
            return $user->hasAnyRole(['Admin']);
        });

        Gate::define('category', function($user){
            return $user->hasAnyRole(['Admin']);
        });

        Gate::define('sponsortype', function($user){
            return $user->hasAnyRole(['Admin']);
        });




        Gate::define('insurance', function($user){
            return $user->hasAnyRole(['Admin']);
        });

        Gate::define('service', function($user){
            return $user->hasAnyRole(['Admin']);
        });

        Gate::define('ticket', function($user){
            return $user->hasAnyRole(['Admin']);
        });

        Gate::define('overtime', function($user){
            return $user->hasAnyRole(['Admin']);
        });


      
        Gate::define('employee', function($user){
            return $user->hasAnyRole(['Admin', 'HR']);
        });

        Gate::define('government', function($user){
            return $user->hasAnyRole(['Admin', 'HR']);
        });

        Gate::define('vacation', function($user){
            return $user->hasAnyRole(['Admin', 'HR']);
        });

        Gate::define('timetracker', function($user){
            return $user->hasAnyRole(['Admin', 'HR']);
        });

        Gate::define('leave-list', function($user){
            return $user->hasAnyRole(['Admin', 'HR']);
        });

        Gate::define('payslip', function($user){
            return $user->hasAnyRole(['Admin', 'HR']);
        });

        Gate::define('department', function($user){
            return $user->hasAnyRole(['Admin', 'HR']);
        });

        Gate::define('training', function($user){
            return $user->hasAnyRole(['Admin', 'HR']);
        });

        Gate::define('report', function($user){
            return $user->hasAnyRole(['Admin', 'HR']);
        });

        Gate::define('users', function($user){
            return $user->hasAnyRole(['Admin', 'HR']);
        });

        Gate::define('task', function($user){
            return $user->hasAnyRole(['Manager', 'HR', 'Employee']);
        });

        Gate::define('leave', function($user){
            return $user->hasAnyRole(['Manager', 'HR', 'Employee']);
        });



    }
}

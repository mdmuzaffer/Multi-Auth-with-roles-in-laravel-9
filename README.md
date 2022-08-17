
All steps for create multiple auth role base
This project in laravel 9 so should be PHP version 8
================================================

1. First create project
composer create-project laravel/laravel multiauth

Make database and add in .ENV file 

2. Add the role field in user migration table


 public function up()
    {
        Schema::create('users', function (Blueprint $table) {
			$table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->integer('role');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->integer('status_id')->nullable();
            $table->rememberToken();
            $table->timestamps();
			
        });
    }

3. them migrate with command
------------------------
php artisan migrate

composer require laravel/ui 

php artisan ui bootstrap --auth 

npm install

npm run dev

4. I have created seeder and added dummy data with all roles
-------------------------------------------------------------

php artisan make:seeder CreateUsersSeeder

    public function run()
    {
        $user = [
            [
                'name' => 'Super Admin',
                'email' => 'superadmin@yopmail.com',
                'role' => '1',
                'password' => bcrypt('123456'),
            ],
            [
                'name' => 'Admin',
                'email' => 'admin@yopmail.com',
                'role' => '2',
                'password' => bcrypt('123456'),
            ],
			[
                'name' => 'Player',
                'email' => 'player@yopmail.com',
                'role' => '3',
                'password' => bcrypt('123456'),
            ],
			[
                'name' => 'Team',
                'email' => 'team@yopmail.com',
                'role' => '4',
                'password' => bcrypt('123456'),
            ],
			[
                'name' => 'Academy',
                'email' => 'academy@yopmail.com',
                'role' => '5',
                'password' => bcrypt('123456'),
            ],
			[
                'name' => 'Scout',
                'email' => 'scout@yopmail.com',
                'role' => '6',
                'password' => bcrypt('123456'),
            ],
        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }

Note use the User model at top of seeder file and then run below command for seeding

php artisan db:seed --class=CreateUsersSeeder



5. Here is the following roles according to role name, I have created contoller and middleware

1. Super Admin
2. Admin
3. Player
4. Team
5. Academic
6. Scout


6. Controller create command 
-------------------------------

php artisan make:controller SuperadminController

php artisan make:controller AdminController

php artisan make:controller PlayerController

php artisan make:controller TeamController

php artisan make:controller AcademicController

php artisan make:controller ScoutController

In all controller make a function and return view as name ,So make view file in view folder like:-
a. superadmin.blade.php
b. admin.blade.php
b. player.blade.php
b. team.blade.php
etc

Here is the view file content for admin
----------------------------------


@extends('layouts.app')

@section('content')
<div class="container">
    
    <div class="row justify-content-center">
        <div class="col-md-8">
            
            <div class="card">
                <div class="card-header">Dashboard</div>
                <div class="card-body">
                    
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    You are in ADMIN Dashboard!
                    
                </div>
            </div>
            
        </div>
    </div>
    
</div>

@endsection



=========================================

public function __construct()
    {
        $this->middleware('auth');
    }
	
public function index()
    {
        return view('admin');
    }


7. Middleware create command 
-------------------------------

php artisan make:middleware Superadmin

php artisan make:middleware Admin

php artisan make:middleware Player

php artisan make:middleware Team

php artisan make:middleware Academic

php artisan make:middleware Scout

In all middleware to check the users role and direct with following code
------------------------------------------------------------------------
if(Auth::check() && Auth::user()->role == 1){
        return $next($request);
   }
  	return redirect()->route('login');


8. Now all middleware register in kernel.php (App\Http\kernel) file in $routeMiddleware array 


'player' => \App\Http\Middleware\Player::class,
'admin' => \App\Http\Middleware\Admin::class,
'superadmin' => \App\Http\Middleware\SuperAdmin::class,
'scout' => \App\Http\Middleware\Scout::class,
'team' => \App\Http\Middleware\Team::class,
'academy' => \App\Http\Middleware\Academic::class,

9. Now make the route in web.php file
----------------------------------------------

Route::get('/player', [App\Http\Controllers\PlayerController::class,'index'])->name('player')->middleware('player');

Route::get('/admin', [App\Http\Controllers\AdminController::class,'index'])->name('admin')->middleware('admin');

Route::get('/superadmin', [App\Http\Controllers\SuperadminController::class, 'index'])->name('superadmin')->middleware('superadmin');

Route::get('/scout', [App\Http\Controllers\ScoutController::class, 'index'])->name('scout')->middleware('scout');

Route::get('/team', [App\Http\Controllers\TeamController::class, 'index'])->name('team')->middleware('team');

Route::get('/academy', [App\Http\Controllers\AcademicController::class, 'index'])->name('academy')->middleware('academy');


Note :- Login and Register url is default as auth default.
-----------------------------------------------------
/login
/register

If you want to see database check the db folder.

Thank you show mutch


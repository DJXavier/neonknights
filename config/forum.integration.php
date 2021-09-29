<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Policies
    |--------------------------------------------------------------------------
    |
    | Here we specify the policy classes to use. Change these if you want to
    | extend the provided classes and use your own instead.
    |
    */

    'policies' => [
        'forum' => App\Policies\UserForumPolicy::class,
        'model' => [
            TeamTeaTime\Forum\Models\Category::class => App\Policies\UserCategoryPolicy::class,
            TeamTeaTime\Forum\Models\Thread::class => App\Policies\UserThreadPolicy::class,
            TeamTeaTime\Forum\Models\Post::class => App\Policies\UserPostPolicy::class,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Application user model
    |--------------------------------------------------------------------------
    |
    | Your application's user model.
    |
    */

    'user_model' => App\Models\SQLUser::class,

    /*
    |--------------------------------------------------------------------------
    | Application user name
    |--------------------------------------------------------------------------
    |
    | The user model attribute to use for displaying usernames.
    |
    */

    'user_name' => 'name',

];

<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use TeamTeaTime\Forum\Policies\ForumPolicy;

class UserForumPolicy extends ForumPolicy
{
    public function moveCategories($user): bool
    {
        return false;
    }

    public function renameCategories($user): bool
    {
        return false;
    }

    public function viewTrashedThreads($user): bool
    {
        return false;
    }

    public function viewTrashedPosts($user): bool
    {
        return false;
    }
}

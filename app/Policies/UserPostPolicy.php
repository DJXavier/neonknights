<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Gate;
use TeamTeaTime\Forum\Models\Post;
use TeamTeaTime\Forum\Policies\Traits\ChecksCategoryVisibility;

class UserPostPolicy
{
    use ChecksCategoryVisibility;

    public function edit($user, Post $post): bool
    {
        return $this->canUserViewCategory($user, $post->thread->category) && $user->getKey() === $post->author_id;
    }

    public function delete($user, Post $post): bool
    {
        return $this->canUserViewCategory($user, $post->thread->category)
            && Gate::forUser($user)->allows('deletePosts', $post->thread) || $user->getKey() === $post->author_id;
    }

    public function restore($user, Post $post): bool
    {
        return $this->canUserViewCategory($user, $post->thread->category)
            && Gate::forUser($user)->allows('restorePosts', $post->thread) || $user->getKey() === $post->author_id;
    }
}

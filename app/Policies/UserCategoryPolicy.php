<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use TeamTeaTime\Forum\Models\Category;
use Illuminate\Support\Facades\Http;

class UserCategoryPolicy
{
    public function createThreads($user, Category $category): bool
    {
        return $this->view($user, $category);
    }

    public function manageThreads($user, Category $category): bool
    {
        return $this->deleteThreads($user, $category) ||
               $this->enableThreads($user, $category) ||
               $this->moveThreadsFrom($user, $category) ||
               $this->lockThreads($user, $category) ||
               $this->pinThreads($user, $category);
    }

    public function deleteThreads($user, Category $category): bool
    {
        return $this->view($user, $category);
    }

    public function restoreThreads($user, Category $category): bool
    {
        return $this->view($user, $category);
    }

    public function enableThreads($user, Category $category): bool
    {
        return $this->view($user, $category);
    }

    public function moveThreadsFrom($user, Category $category): bool
    {
        return $this->view($user, $category);
    }

    public function moveThreadsTo($user, Category $category): bool
    {
        return $this->view($user, $category);
    }

    public function lockThreads($user, Category $category): bool
    {
        return $this->view($user, $category);
    }

    public function pinThreads($user, Category $category): bool
    {
        return $this->view($user, $category);
    }

    public function markThreadsAsRead($user, Category $category): bool
    {
        return $this->view($user, $category);
    }

    public function view($user, Category $category): bool
    {
        if ($user != null) {
            $gameIds = $user->game_ids;
            $user->games()->get();
            $games = [];
            for($i = 0; $i < count($gameIds); $i++) {
                $found = \App\Models\Game::Find($gameIds[$i]);
                if ($found != null) {
                    array_push($games, $found);
                }
            }

            $check = false;
            for ($i = 0; $i < count($games); $i++) {
                if($category->id == $games[$i]->forumId) {
                    $check = true;
                }
            }
            
            return $check;
        } else {
            return false;
        }
    }

    public function delete($user, Category $category): bool
    {
        return $this->view($user, $category);
    }

    public function restore($user, Category $category): bool
    {
        return $this->view($user, $category);
    }
}

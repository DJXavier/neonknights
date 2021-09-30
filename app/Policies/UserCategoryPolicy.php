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
        //dd(Http::get(URL::to('/')));
        $gameIds = $user->game_ids;
        $user->games()->get();
        $games = [];
        for($i = 0; $i < count($gameIds); $i++) {
            array_push($games, \App\Models\Game::Find($gameIds[$i]));
        }

        $check = false;
        $diff = [];
        $categoryTitle = $category->title;
        for ($i = 0; $i < count($games); $i++) {
            $gameNameEx = explode(' ', $games[$i]->name);
            $categoryNameEx = explode(' ', $categoryTitle);
            if (!$check) {
                $diff = array_diff($gameNameEx, $categoryNameEx);
            }
            if (count(array_diff($diff, ['Forum', 'For'])) == 0) {
                $check = true;
            }
        }

        if (count(array_diff($diff, ['Forum', 'For'])) == 0) {
            return true;
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

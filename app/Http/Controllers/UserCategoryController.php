<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use TeamTeaTime\Forum\Models\Category;
use TeamTeaTime\Forum\Http\Requests\CreateCategory;

class UserCategoryController extends Controller
{
    public function store(CreateCategory $request) {
        $category = $request->fulfill();
        $responseCode = 403;
        $responseVar = ['Forbidden', 'Did not actvate'];

        if ($category != null) {
            $responseCode = 200;
            $responseVar = ['Success' => 'Forum created'];
        }

        $check = $category->id;
        return response()->json($responseVar, $responseCode);
    }
}

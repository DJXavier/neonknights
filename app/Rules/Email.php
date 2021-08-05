<?php

namespace App\Rules

use Illuminate\Contracts\Validation\Rule;

class Email implements Rule
{
    /**
     * Create a new rule instance.
     * 
     * @return void
     */
    public function __construct()
    {
     
    }
    public function passes($attribute, $value)
    {
        Str::contains($value, '@');
    }
    public function message()
    {
        return 'The Email is not correct.';
    }
}

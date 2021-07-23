<?php

namespace App\Rules;

use Illuminate\Support\Str;
use Illuminate\Contracts\Validation\Rule;

class IsValidPassword implements Rule
{
    /**
     * Determine if the Length Validation Rule passes.
     *
     * @var boolean
     */
    public $lengthPasses = true;

    /**
     * Determine if the Numeric Validation Rule passes.
     *
     * @var boolean
     */
    public $numericPasses = true;

    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $this->lengthPasses = (Str::length($value) >= 8);
        $this->numericPasses = ((bool)preg_match('/[0-9]/', $value));

        return ($this->lengthPasses && $this->numericPasses);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        $message = 'The :attribute must ';

        if (!$this->lengthPasses)
            $message .= 'must be at least 8 characters';
        if (!$this->lengthPasses && !$this->numericPasses)
            $message .= ' and ';
        if (!$this->lengthPasses && !$this->numericPasses)
            $message .= 'contain at least 1 number';

        $message .= '.';

        return $message;
    }
} 
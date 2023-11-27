<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ValidFullName implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $pattern = '/^[a-zA-Z]+(?:-[a-zA-Z]+)*(?:\s[a-zA-Z]+(?:-[a-zA-Z]+)*)*$/';

        return preg_match($pattern, $value);

    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The attribute must be a valid full name with at least two words, and each word should not contain special characters.';
    }
}

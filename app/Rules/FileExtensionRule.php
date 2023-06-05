<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class FileExtensionRule implements Rule
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
        $extension = strtolower($value->getClientOriginalExtension());
        return in_array($extension, ['ppt', 'pptx', 'mp4']);
    }
    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The :attribute must be a PPT or MP4 file.';
    }
}

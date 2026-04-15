<?php

namespace App\Http\Controllers;

use App\Rules\Uppercase;
use Illuminate\Http\Request;

class ValidationController extends Controller
{
    //
    public function intro(Request $request)
    {
        $request->validate([
            'title' => [
                'required',
                'string',
                function($attribute, $value, $fail) {
                    if ($value === 'test') {
                        $fail('Заголовок не может быть test');
                    }
                },
                new Uppercase()
            ],
        ]);
    }
}

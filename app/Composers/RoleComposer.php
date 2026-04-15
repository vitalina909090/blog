<?php

namespace App\Composers;
use Auth;
use Illuminate\View\View;


class RoleComposer
{
    public function compose(View $view)
    {
        $view->with('userRole', Auth::check() ? Auth::user()->role : null);
    }
}

<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (!$request->expectsJson()) {
            switch ($this->guards[0]) {
                case 'admin':
                    //dd('ADMIN GUARD');
                    return route('cms.login', [$this->guards[0]]);

                case 'doctor':
                    //dd('DOCTOR GUARD');
                    return route('cms.login', [$this->guards[0]]);

                case 'patient':
                    //dd('PATIENT GUARD');
                    return route('cms.login', [$this->guards[0]]);
            }
        }
    }
}

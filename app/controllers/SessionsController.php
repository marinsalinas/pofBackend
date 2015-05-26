<?php

class SessionsController extends BaseController
{
    public function create()
    {
        if (Auth::admin()->check()) {

            return Redirect::to('dashboard');
        }

        return View::make('sessions.login');

    }

    public function store()
    {
        if (Auth::admin()->attempt(Input::only('username', 'password'))) {
            return Redirect::back()->withInput();
        }
        return Redirect::to('login');

    }

    public function destroy()
    {
        Auth::admin()->logout();

        return Redirect::to('login');
    }

}

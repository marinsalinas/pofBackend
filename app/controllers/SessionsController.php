<?php

class SessionsController extends BaseController
{


    public function create()
    {
        if (Auth::user()->check()) {

            return Redirect::to('users');
        }

        return View::make('sessions.login');

    }

    public function store()
    {
        if (Auth::user()->attempt(Input::only('username', 'password'))) {
            return Redirect::back()->withInput();
        }
        return Redirect::to('login');

    }

    public function destroy()
    {
        Auth::logout();

        return Redirect::to('login');
    }

}

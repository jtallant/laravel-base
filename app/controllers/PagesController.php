<?php
/*
 |--------------------------------------------------------------------------
 | Static Pages Controller
 |--------------------------------------------------------------------------
 |
 | This controller is for static pages. Static pages aren't necessarily
 | 100% static but they don't have their own database table. This controller
 | should only be used for returning views of basic pages like home, about,
 | contact. It shouldn't be used for create/update/delete actions.
 |
 |
 */

class PagesController extends BaseController {

	public function home()
	{
        // pages.home
	}


    public function login()
    {
        // pages.login
    }


    public function forgotPassword()
    {
        $this->layout->content = View::make('pages.forgot-password');
        $this->layout->title = 'Reminder';
    }


    public function postForgotPassword()
    {
        $credentials = array('email' => Input::get('email'));
        return Password::remind($credentials);
    }


    public function resetPassword($token)
    {
        $this->layout->content = View::make('pages.reset-password')->with('token', $token);
        $this->layout->title = 'Reset Password';
    }


    public function postResetPassword($token)
    {
        $credentials = array('email' => Input::get('email'));

        return Password::reset($credentials, function($user, $password)
        {
            $user->password = Hash::make($password);

            $user->save();

            return Redirect::route('login');
        });
    }

}
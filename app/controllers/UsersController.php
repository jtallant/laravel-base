<?php

class UsersController extends BaseController {


    public function __construct()
    {
        $this->beforeFilter('auth', array('except' => array('authenticate')));
    }


    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $this->layout->content = View::make('users.index');
        $this->layout->title = 'User - Index';
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $this->layout->content = View::make('users.create');
        $this->layout->title = 'User - Create';
    }


    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $input = Input::all();

        if ($validation = MyHelpers::inputIsInvalid($input, User::$create_rules)) {
            return Redirect::route('users.create')->withInput()->withErrors($validation);
        }

        $user = new User;
        $user->email = $input['email'];
        $user->password = Hash::make($input['password']);
        $user->first_name = $input['first_name'];
        $user->last_name = $input['last_name'];
        $user->save();
        return Redirect::route('users.show', $user->id);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        // users.show
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        // users.edit
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        // users.update
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        // users.destroy
    }


    public function logout()
    {
        Auth::logout();
        return Redirect::route('root');
    }


    public function authenticate()
    {
        $input = Input::all();

        if (Auth::attempt($input)) {
            return Redirect::to('root');
        }

        return Redirect::route('login')->with('message', 'Login failed. Check your email address and password.');
    }

}
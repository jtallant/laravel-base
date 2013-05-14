{{ Form::open(array('url' => 'users/authenticate', 'class' => 'form-signin')) }}
	@if (Session::has('message'))
		{{ MyHelpers::alertBox(Session::get('message'), 'error') }}
		{{ Session::forget('message') }}
	@endif
    <h2>Please sign in</h2>
    <input type="email" class="input-block-level" name="email" placeholder="email" required>
    <input type="password" class="input-block-level" placeholder="password" name="password" required>
    <input type="submit" class="btn btn-large btn-primary" value="Submit" />
{{ Form::close() }}
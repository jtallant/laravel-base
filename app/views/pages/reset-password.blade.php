<h1>Password Reset</h1>
@if (Session::has('error'))
    {{ MyHelpers::alertBox(trans(Session::get('reason')), 'error') }}
@endif

{{ Form::open(array('url' => 'password/reset/' . $token, 'class' => 'form-password-reset')) }}
	<input type="hidden" name="token" value="{{ $token }}" />
	<label for="email">Email</label>
	<input type="email" name="email" id="email" required>
	<label for="password">New Password</label>
	<input type="password" name="password" id="password" required>
	<label for="password_confirm">Password Confirmation</label>
	<input type="password" name="password_confirmation" id="password_confirmation" required>
	<br />
	<input type="submit" class="btn" value="Submit" />
{{ Form::close() }}
<h1>Forgot Password</h1>
<p>Submit the form below and we will send you an email with a link to reset your password.</p>
@if (Session::has('error'))
    {{ MyHelpers::alertBox(trans(Session::get('reason')), 'error') }}
@endif

{{ Form::open(array('url' => 'password/remind', 'class' => 'form-password-remind')) }}
	<label for="email">Email Address</label>
	<input type="email" name="email" id="email" placeholder="you@domain.com" />
	<br />
	<input type="submit" value="Send Reminder" class="btn" />
{{ Form::close() }}
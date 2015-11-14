@extends('layouts/default')
@section('content')
<section class="row">
	<div class="col-sm-6 col-sm-offset-3">
		<form method="POST" action="/auth/login">
			{!! csrf_field() !!}
			<div>
				Email
				<input type="email" name="email" value="{{ old('email') }}">
			</div>
			<div>
				Password
				<input type="password" name="password" id="password">
			</div>
			<div>
				<input type="checkbox" name="remember"> Remember Me
			</div>
			<div>
				<button type="submit">Login</button>
			</div>
		</form>
	</div>
</section>
@endsection
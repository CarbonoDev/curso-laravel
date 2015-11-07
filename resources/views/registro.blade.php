@extends('layouts/default')

@section('content')
<h1>Bienvenido al registro!</h1>
<div class="container">
	@if (count($errors) > 0)
	    <!-- Form Error List -->
	    <div class="alert alert-danger">
	        <ul>
	            @foreach ($errors->all() as $error)
	                <li>{{ $error }}</li>
	            @endforeach
	        </ul>
	    </div>
	@endif
	<div class="row">
		<form class="form-horizontal" action='/registro' method="POST">
			<fieldset>
				<div id="legend">
					<legend class="">Registrate</legend>
				</div>
				<div class="control-group">
					<!-- Username -->
					<label class="control-label"  for="name">Nombre</label>
					<div class="controls">
						<input type="text" id="name" name="name" value="{{ old('name') }}" placeholder="" class="input-xlarge">
						<p class="help-block">Ingresa tu nombre</p>
					</div>
				</div>

				<div class="control-group">
					<!-- E-mail -->
					<label class="control-label" for="email">Correo</label>
					<div class="controls">
						<input type="text" id="email" name="email" value="{{ old('email') }}" placeholder="" class="input-xlarge">
						<p class="help-block">Ingresa tu correo</p>
					</div>
				</div>

				<div class="control-group">
					<!-- Button -->
					<div class="controls">
						<button class="btn btn-success">Registrarte</button>
					</div>
				</div>
			</fieldset>
		</form>
	</div>
</div>
@endsection
@endsection
@extends('layouts/default')

@section('content')
<h1>Bienvenido al registro!</h1>
<div class="container">
<div class="row">
	<ul>
		@foreach($attendants as $attendant)
			<li><b>{{ $attendant->name }}</b> - {{ $attendant->email }}</li>
		@endforeach
	</ul>
</div>
</div>
@endsection
@endsection
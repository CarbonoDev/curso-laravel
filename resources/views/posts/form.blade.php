@extends('layouts/default')
@section('content')
<section class="row">
	<div class="col-sm-6 col-sm-offset-3">
		<form action="{{ route('posts.store') }}" method="POST" class="form-horizontal">
			<h2>Crear nuevo Post</h2>
			{{ csrf_field() }}
			<div class="form-group">
				<input type="text" class="form-control" id="post_title" name="title" placeholder="Título" required>
			</div>

			<div class="form-group">
				<textarea class="form-control" type="textarea" id="message" placeholder="Message" rows="7"></textarea>
			</div>
			
			<button type="submit" id="submit" name="submit" class="btn btn-primary pull-right">
				<i class="fa fa-save"></i> Crear Publicación
			</button>
		</form>
	</div>
</section>
@endsection
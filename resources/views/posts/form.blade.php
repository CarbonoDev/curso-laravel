@extends('layouts/default')
@section('content')
<section class="row">
	<div class="col-sm-6 col-sm-offset-3">

		@if (count($errors) > 0)
		    <div class="alert alert-danger">
		        <ul>
		            @foreach ($errors->all() as $error)
		                <li>{{ $error }}</li>
		            @endforeach
		        </ul>
		    </div>
		@endif
		<form action="{{ route('posts.process', [$post->id]) }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
			<h2>Crear nuevo Post</h2>
			{{ csrf_field() }}
			<div class="form-group">
				<input type="text" class="form-control" id="post_title" name="title" placeholder="Título" value="{{ $post->title }}" required>
			</div>

			<div class="form-group">
				<input type="file" class="form-control" id="post_image" name="image">
			</div>

			<div class="form-group">
				<textarea class="form-control" type="textarea" id="content" name="content" placeholder="Post content" rows="7">{{ $post->content }}</textarea>
			</div>

			<div class="form-group">
			<label for="is_public"><input type="checkbox" id="is_public" name="is_public" {{ $post->is_public? "checked" : "" }} value="1"> Publicado</label>
				
			</div>
			
			<button type="submit" id="submit" name="submit" class="btn btn-primary pull-right">
				<i class="fa fa-save"></i> Crear Publicación
			</button>
		</form>
	</div>
</section>
@endsection
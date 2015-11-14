@extends('layouts/default')

@section('content')
<div class="row">
	<a href="{{ route('posts.create') }}" class="btn btn-success"><i class="fa fa-plus"></i> Crear nueva publicación</a>
</div>
<section class="row">
	@foreach($posts as $post)
	<article class="col-sm-6 col-sm-offset-3">
		<h1><a href="{{ route('posts.show', [$post->slug?: $post->id]) }}">{{ $post->title }}</a> - <small>{{ $post->author->name }}</small></h1>
		@if($post->image)
			<img src="{{ $post->image }}" alt="">
		@endif
		<div>{!! Markdown::text($post->abstract) !!}</div>
		<div class="post-info">
			<span class="date">{{ $post->created_at }}</span>
			@if($post->is_public)
			<span class="badge badge-info">Publico</span>
			@endif
		</div>
		<div class="action-buttons">
			@can('update', $post)
			<a href="{{ route('posts.edit', [$post->slug?: $post->id]) }}" 
				class="edit-button btn btn-info">
					<i class="fa fa-pencil"></i> 
					Editar
			</a>
			@endcan
			@can('destroy', $post)
			<form action="{{ route('posts.destroy', [$post->slug?: $post->id]) }}" method="POST">
				{{ csrf_field() }}
				{{ method_field('DELETE') }}
				<button type="submit" class="delete-button btn btn-danger">
					<i class="fa fa-trash"></i> 
					Borrar
				</button>
			</form>
			@endcan
		</div>
	</article>
	@endforeach
	<div>{!! $posts->render() !!}</div>
</section>
@endsection
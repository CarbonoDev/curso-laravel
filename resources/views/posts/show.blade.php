@extends('layouts/default')

@section('content')
<section class="row">
	<article class="col-sm-6 col-sm-offset-3">
		<h1>{{ $post->title }}</h1>
		@if($post->image)
			<img src="{{ $post->image }}" alt="">
		@endif
		<div>
			{!! Markdown::text($post->content) !!}
		</div>
		<span class="date">{{ $post->created_at }}</span>
		<span class="action-buttons">
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
		</span>
	</article>
</section>
@endsection
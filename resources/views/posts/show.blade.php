@extends('layouts/default')

@section('content')
<section class="row">
	<article class="col-sm-6 col-sm-offset-3">
		<h1>Título 1</h1>
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nulla sed accusamus dolorum animi doloremque. Voluptates ducimus qui, vitae officia est ipsum molestias enim velit, quos, perferendis aperiam rerum, tenetur dicta?</p>
		<span class="date">07/11/2015</span>
		<span class="action-buttons">
			<a href="{{ route('posts.edit', [1]) }}" 
				class="edit-button btn btn-info">
					<i class="fa fa-pencil"></i> 
					Editar
			</a>
			<form action="{{ route('posts.destroy', [1]) }}" method="POST">
				{{ csrf_field() }}
				{{ method_field('DELETE') }}
				<button type="submit" class="delete-button btn btn-danger">
					<i class="fa fa-trash"></i> 
					Borrar
				</button>
			</form>
		</span>
	</article>
</section>
@endsection
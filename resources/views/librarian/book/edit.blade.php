@extends('layouts.librarian')

@section('title', 'Update Book Data')

@section('content')

<div class="container mt-4 px-4">
	<h1 class="mt-4">Update Book Data</h1>
	<ol class="breadcrumb mb-4">
		<li class="breadcrumb-item active"><a href="{{ route('book.index') }}">Books</a></li>
		<li class="breadcrumb-item active">Update New Books</li>
	</ol>
	<form action="{{ route('book.update', ['book' => $book->id ]) }}" method="POST">
		@method('PUT')
		@csrf
		<div class="form-group">
			<label for="title">Title</label>
			<input type="text" class="form-control" id="title" name="title" value="{{ $book->title }}">
			<input type="hidden" id="old_title" name="old_title" value="{{ $book->title }}">
		</div>
		<div class="form-group">
			<label for="author">Author</label>
			<input type="text" class="form-control" id="author" name="author" value="{{ $book->author }}">
		</div>
		<div class="form-group">
			<label for="published_at">Published at</label>
			<input type="date" class="form-control" id="published_at" name="published_at" value="{{ $book->published_at }}">
		</div>
		<div class="form-group">
			<label for="update_option">Update Option</label>
			<select name="update_option" id="update_option" class="form-control">
				<option value="this">Only this book</option>
				<option value="all">All book with same title</option>
			</select>
		</div>
		<button type="submit" class="btn btn-primary">Update</button>
	</form>
</div>

@endsection
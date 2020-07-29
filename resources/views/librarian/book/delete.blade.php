@extends('layouts.librarian')

@section('title', 'Delete Book Data')

@section('content')

<div class="container mt-4 px-4">
	<h1 class="mt-4">Delete Book Data</h1>
	<ol class="breadcrumb mb-4">
		<li class="breadcrumb-item active"><a href="{{ route('book.index') }}">Books</a></li>
		<li class="breadcrumb-item active">Delete Book</li>
	</ol>
	<form action="{{ route('book.destroy', ['book' => $book->id ]) }}" method="POST">
		@method('DELETE')
		@csrf
		<div class="form-group">
			<label for="delete_option">Delete Option</label>
			<select name="delete_option" id="delete_option" class="form-control">
				<option value="this">Only this book</option>
				<option value="all">All book with same title</option>
			</select>
		</div>
		<button type="submit" class="btn btn-danger">Delete</button>
	</form>
</div>

@endsection
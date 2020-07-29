@extends('layouts.librarian')

@section('title', $book->title)

@section('content')

<div class="container mt-4">
	<a href="{{ route('book.index') }}" class="btn btn-primary my-3">Back</a>
	<div class="card">
		<div class="card-body">
			<h4>{{ $book->title }}</h4>
			<hr>
			<h6>Book ID : {{ $book->id }}</h6>
			<h6>Author : {{ $book->author }}</h6>
			<h6>Published at : {{ $book->published_at }}</h6>
		</div>
	</div>
</div>

@endsection
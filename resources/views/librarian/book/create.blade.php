@extends('layouts.librarian')

@section('title', 'Insert New Books')

@section('content')

<div class="container mt-4 px-4">
	<h1 class="mt-4">Insert New Books</h1>
	<ol class="breadcrumb mb-4">
		<li class="breadcrumb-item active"><a href="#">Books</a></li>
		<li class="breadcrumb-item active">Create New Books</li>
	</ol>
	<form action="{{ route('book.store') }}" method="POST">
		@csrf
		<div class="form-group">
			<label for="title">Title</label>
			<input type="text" class="form-control" id="title" name="title" >
		</div>
		<div class="form-group">
			<label for="author">Author</label>
			<input type="text" class="form-control" id="author" name="author">
		</div>
		<div class="form-group">
			<label for="published_at">Published at</label>
			<input type="date" class="form-control" id="published_at" name="published_at">
		</div>
		<div class="form-group">
			<label for="total">Total</label>
			<input type="number" class="form-control" id="total" name="total" style="width:100px;">
		</div>
		<button type="submit" class="btn btn-primary">Insert</button>
	</form>
</div>

@endsection
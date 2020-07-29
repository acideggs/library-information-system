@extends('layouts.librarian')

@section('title', 'Borrow a Book')

@section('content')

<div class="container mt-4">
	<h1 class="mt-4">Borrow a book</h1>
	<ol class="breadcrumb mb-4">
		<li class="breadcrumb-item"><a href="{{ route('borrow.index') }}">Index</a></li>
		<li class="breadcrumb-item active">borrow a book</li>
	</ol>
	<form action="{{ route('borrow.store') }}" method="POST">
		@csrf
		<div class="form-group">
			<label for="user_id">User ID</label>
			<input type="text" class="form-control" style="width:200px;" name="user_id" id="user_id">
		</div>
		<div class="form-group">
			<label for="book_id">Book ID</label>
			<input type="text" class="form-control" style="width:200px;" name="book_id" id="book_id">
		</div>
		<button type="submit" class="btn btn-primary">Borrow</button>
	</form>
	@if ($errors->any())
	<div class="alert alert-danger mt-3">
		<ul>
			@foreach ($errors->all() as $error)
			<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
	@endif
</div>

@endsection
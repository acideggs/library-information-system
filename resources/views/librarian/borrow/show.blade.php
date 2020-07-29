@extends('layouts.librarian')

@section('title', "$borrow->user->username | $borrow->book->title")

@section('content')

<div class="container mt-4">
	<h1 class="mt-4">Borrowed Book Data</h1>
	<ol class="breadcrumb mb-4">
		<li class="breadcrumb-item"><a href="{{ route('borrow.index') }}">Index</a></li>
		<li class="breadcrumb-item active">Details</li>
	</ol>
	<div class="card">
		<div class="card-body">
			<h4>Borrow ID : {{ $borrow->id }}</h4>
			<h6>Username : {{ $borrow->user->username }} | User ID : {{ $borrow->user->id }}</h6>
			<p>Borrowed at : {{ $borrow->borrow_at }} | Returned at : @if($borrow->return_at == "") Not returned yet @else {{ $borrow->return_at }} @endif</p>
			<hr>
			<h4>Book Details</h4>
			<p>
				<ul>
					<li>Book ID : {{ $borrow->book->id }}</li>
					<li>Book Title : {{ $borrow->book->title }}</li>
					<li>Book Author : {{ $borrow->book->author }}</li>
					<li>Published at : {{ $borrow->book->published_at }}</li>
				</ul>
			</p>
			<form action="{{ route('borrow.return', ['borrow' => $borrow->id]) }}" method="POST">
				@method('PATCH')
				@csrf
				@if($borrow->return_at == "")
				<button type="submit" class="btn btn-primary">Return</button>
				@else 
				<button type="submit" class="btn btn-success" disabled>Book has returned</button>
				@endif
			</form>
		</div>
	</div>
</div>

@endsection
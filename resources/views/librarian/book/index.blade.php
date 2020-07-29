@extends('layouts.librarian')

@section('title', 'Books Indexes')

@section('content')

<div class="container-fluid">
	<h1 class="mt-4">Books Indexes</h1>
	<ol class="breadcrumb mb-4">
		<li class="breadcrumb-item active">Books</li>
	</ol>
	<div class="card mb-4">
		<div class="card-body">
			This table contain data about books in library
		</div>
	</div>
	<div class="card mb-4">
		<div class="card-header">
			<i class="fas fa-table mr-1"></i>
			Books list
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>Book ID</th>
							<th>Title</th>
							<th>Author</th>
							<th>Published at</th>
							<th>Action</th>
						</tr>
					</thead>
					<tfoot>
						<tr>
							<th>Book ID</th>
							<th>Title</th>
							<th>Author</th>
							<th>Published at</th>
							<th>Action</th>
						</tr>
					</tfoot>
					<tbody>
						@foreach($books as $book)
						<tr>
							<td>{{ $book->id }}</td>
							<td>{{ $book->title }}</td>
							<td>{{ $book->author }}</td>
							<td>{{ $book->published_at }}</td>
							<td>
								<form action="{{ route('book.show', ['book' => $book->id ]) }}" class="m-1" style="float: left;" method="GET">
									<button class="btn btn-success">Show</button>
								</form>
								<form action="{{ route('book.edit', ['book' => $book->id ]) }}" class="m-1" style="float: left;" method="GET">
									<button class="btn btn-warning">Edit</button>
								</form>
								<form action="{{ route('book.delete', ['book' => $book->id ]) }}" class="m-1" style="float: left;" method="GET">
									<button class="btn btn-danger">Delete</button>
								</form>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

@endsection
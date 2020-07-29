@extends('layouts.librarian')

@section('title', 'Borrowed Book Data')

@section('content')
<div class="container-fluid">
	<h1 class="mt-4">Borrowed Book Data</h1>
	<ol class="breadcrumb mb-4">
		<li class="breadcrumb-item active">index</li>
	</ol>
	<div class="card mb-4">
		<div class="card-body">
			This table contain data about people who borrow the books
		</div>
	</div>
	<div class="card mb-4">
		<div class="card-header">
			<i class="fas fa-table mr-1"></i>
			Borrowed Books
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>Borrow ID</th>
							<th>User</th>
							<th>Book's Title</th>
							<th>Borrowed at</th>
							<th>Returned at</th>
							<th>Deadline</th>
							<th>Action</th>
						</tr>
					</thead>
					<tfoot>
						<tr>
							<th>Borrow ID</th>
							<th>User</th>
							<th>Book's Title</th>
							<th>Borrowed at</th>
							<th>Returned at</th>
							<th>Deadline</th>
							<th>Action</th>
						</tr>
					</tfoot>
					<tbody>
						@foreach($data as $borrow)
						<tr>
							<td>{{ $borrow->id }}</td>
							<td>{{ $borrow->user->username }}</td>
							<td>{{ $borrow->book->title }}</td>
							<td>{{ $borrow->borrow_at }}</td>
							<td>
								@if($borrow->return_at == '')
								Not returned yet
								@else
								{{ $borrow->return_at }}
								@endif
							</td>
							<td>{{ $borrow->deadline }}</td>
							<td>
								<form action="{{ route('borrow.show', ['borrow' => $borrow->id ]) }}" class="m-1" style="float: left;" method="GET">
									<button class="btn btn-success">Show</button>
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
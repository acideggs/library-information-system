@extends('layouts.librarian')

@section('title', 'Dashboard')

@section('content')
<div class="container-fluid">
	<h1 class="mt-4">Dashboard</h1>
	<ol class="breadcrumb mb-4">
		<li class="breadcrumb-item active">Dashboard</li>
	</ol>
	<div class="card mb-4">
		<div class="card-body">
			You're logged in as admin/ librarian. You can manage the book stocks here, and you can handle people borrowing book in library
		</div>
	</div>
	<div class="card mb-4">
		<div class="card-header">
			<i class="fas fa-chart-area mr-1"></i>
			People was borrowed
		</div>
		
		<div class="card-body"><canvas id="myAreaChart" width="100%" height="30"></canvas></div>
		<div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
	</div>
</div>
@endsection
@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-12">

			@if(session()->has('success'))

			<div class="alert alert-success">
				{{ session()->get('success') }}
			</div>

			@endif

			<h1>La liste de mes CVs</h1>
			<div class="float-right" >
				<a href="{{ url('cvs/create') }}" class="btn btn-outline-success">Nouveau CV</a>
			</div>
			<table class="table">
				<head>
				    <tr>
						<th>Titre</th>
						<th>Présentation</th>
						<th>Date</th>
						<th>Actions</th>
					</tr>
		     	</head>

		     	<body>

		     		@foreach($cvs as $cv)
		     		<tr>
		     			<td>{{ $cv->titre  }} <br> {{ $cv->user->name }}</td>
		     			<td>{{ $cv->presentation  }}</td>
		     			<td>{{ $cv->created_at }}</td>
		     			<td>
		     				
		     				<form action="{{ url('cvs/'.$cv->id) }}" method="post">
		     					
								{{ csrf_field() }}
								{{ method_field('DELETE') }}
								<a href="" class="btn btn-primary">détails</a>
		     					<a href="{{ url('cvs/'.$cv->id.'/edit') }}" class="btn btn-warning">editer</a>
								<button type="submit" class="btn btn-danger">supprimer</button>

		     				</form>
		     				
		     			</td>
		     		</tr>
		     		@endforeach
		     	</body>
			</table>

		</div>
	</div>
</div>

@endsection
@extends('layouts.app')

<!--Un bon exemple pour apprendre l'affichage des erreurs( All errors )-->
<!--
@if(count($errors))
<div class="alert alert-danger" role="alert">
  <ul>
  	@foreach($errors->all() as $message)
  	<li>{{ $message }}</li>
  	@endforeach
  </ul>
</div>
@endif
-->

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<form action="{{ url('cvs/'.$cv->id) }}" method="post">
				<input type="hidden" name="_method" value="put">

                {{ csrf_field() }}

				<div class="form-group @if($errors->get('titre')) has-error @endif">
					<label for="">Titre</label>
					<input type="text" name="titre" class="form-control" value="{{ $cv->titre }}">
					@if($errors->get('titre'))
						@foreach($errors->get('titre') as $message)
							<li>{{ $message }}</li>
						@endforeach
					@endif
				</div>

				<div class="form-group @if($errors->get('presentation')) has-error @endif">
					<label for="">Présentation</label>
					<textarea name="presentation" class="form-control">{{ $cv->presentation }}
					</textarea>
					@if($errors->get('titre'))
						@foreach($errors->get('titre') as $message)
							<li>{{ $message }}</li>
						@endforeach
					@endif
				</div>
				<div class="form-group">
					<input type="submit" class="form-control btn btn-warning" value="Modifier">
				</div>
			</form>
		</div>
	</div>
</div>
@endsection


<!DOCTYPE html>
<html>
<head>
	<title>Ajure OpenDictionary</title>
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
	<div class="container" style="padding-top:20px;">
		<nav class="navbar navbar-inverse">
			<div class="navbar-header">
				<a class="navbar-brand" href="{{ URL::to('listwords') }}">Ajure OpenDictionary ::</a>
			</div>
			<ul class="nav navbar-nav ">
				<li><a href="{{ URL::to('listwords/usershow') }}" > View-All</a></li>
			</ul>
			<ul class="nav navbar-nav pull-right">
				<li><a href="{{ URL::to('listwords/show') }}" class="glyphicon glyphicon-cog ">Administration</a></li>
			</ul>
		</nav>
		<div class="container">
			<h1>Search word:</h1>
			<div class="row">
				<div class="col-md-4 span-12">
					{{ Form::open(array('action' => 'ListwordController@index', 'method' => 'GET')) }}
					<div class="form-group">
						{{ Form::label('word', 'Enter word here') }}
						{{ Form::text('word', Input::old('word'), array('class' => 'form-control')) }}
					</div>
					{{ Form::submit('Find', array('class' => 'btn btn-primary')) }}
					{{ Form::close() }}
				</div>
			</div>
			<div style="padding-top:35px;" class="col-md-8">

				@if(!empty($_GET['word']))
				<!-- Show not found message -->
				@if (Session::has('message'))
				<p>
					<div class="alert alert-info">{{ Session::get('message') }}</div>
				</p>
				@endif
				<!--Search result-->
				@if(!empty($wordresult))
				<div  class="container well well-lg">
					@foreach($wordresult as $word)
					<h3>
						{{$count++}}.
						<span class="label label-primary">
							{{ $word->words }}
						</span>
					</h3>
					<div>
						<strong>{{ $word->parts_of_speech}}</strong>
					</div>
					<div class="alert alert-info">
						{{ $word->definition }}
					</div>
					@endforeach
				</div>
				@endif
				@endif
			</div>
		</div>

		

		
		

		



		
		










		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
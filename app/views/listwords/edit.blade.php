<!DOCTYPE html>
<html>
<head>
	<title>Ajure OpenDictionary</title>
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
	<div  class="container" > 
		<h1>Administration</h1>
		<nav class="navbar navbar-inverse">
			<div class="navbar-header">
				<a class="navbar-brand" href="{{ URL::to('listwords') }}">Ajure OpenDictionary |</a>
			</div>
			<ul class="nav navbar-nav">
				<li><a href="{{ URL::to('listwords/show') }}" >View-all</a></li>
				<li><a href="{{ URL::to('listwords/create') }}">Add new word</a></li>
			</ul>
		</nav>

		<h1>Edit {{ $word->words }}</h1>
		<div style="padding-top:35px;" class="row">
			<div class="col-md-7 ">
				<!-- errors -->
				{{ HTML::ul($errors->all()) }}

				{{ Form::model($word, array('route' => array('listwords.update', $word->id), 'method' => 'PUT')) }}

				<div class="form-group">
					{{ Form::label('word', 'Enter new word') }}
					{{ Form::text('words', null, array('class' => 'form-control')) }}
				</div>
				@foreach($word->wordinfo as $wi)
				<div class="form-group">
					{{ Form::label('definition', 'Enter word definition') }}
					{{ Form::textarea('definition', $wi->definition, array('class' => 'form-control')) }}
				</div>

				<div class="form-group">
					{{ Form::label('parts_of_speech', 'Part of speech') }} 
					{{ Form::select('parts_of_speech', array($wi->parts_of_speech=>'chosen', 
					'Noun'=>'Noun', 'Verb'=>'Verb', 'Adjective'=>'Adjective','Pronoun'=>'Pronoun',
					'Adverb'=>'Adverb', 'Conjunction'=>'Conjunction',  'Preposition'=>'Preposition',
					'Interjection'=>'Interjection', 'Article'=>'Article'),null,
					array('class' => 'form-control')) }}
				</div>
				@endforeach
				{{ Form::submit('Update', array('class' => 'btn btn-primary')) }}
				{{ Form::close() }}
			</div>
		</div>
	</div>
</body>
</html>



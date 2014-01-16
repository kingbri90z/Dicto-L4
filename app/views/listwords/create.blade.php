<!DOCTYPE html>
<html>
<head>
	<title>Ajure OpenDictionary</title>
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
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
		<h1>Add new word</h1>

		<!-- Errors displayed here-->
		<div style="padding-top:35px;" class="row">
			<div class="col-md-7 ">
				{{ HTML::ul($errors->all()) }}
				{{ Form::open(array('url' => 'listwords')) }}

				<div class="form-group">
					{{ Form::label('word', 'Enter new word') }}
					{{ Form::text('word', Input::old('word'), array('class' => 'form-control')) }}
				</div>

				<div class="form-group">
					{{ Form::label('definition', 'Enter word definition') }}
					{{ Form::textarea('definition', Input::old('definition'), array('class' => 'form-control')) }}
				</div>

				<div class="form-group">
					{{ Form::label('part_of_speech', 'Part of speech') }} 
					{{ Form::select('part_of_speech', array('Select part of speech', 'Noun'=>'Noun', 'Verb'=>'Verb', 
					'Adjective'=>'Adjective','Pronoun'=>'Pronoun',  'Adverb'=>'Adverb', 'Conjunction'=>'Conjunction',
					'Preposition'=>'Preposition', 'Interjection'=>'Interjection', 'Article'=>'Article'),
					Input::old('part_of_speech'), array('class' => 'form-control')) }}
				</div>

				{{ Form::submit('Add word', array('class' => 'btn btn-primary')) }}
				{{ Form::close() }}
			</div>
		</div>
	</div>
</body>
</html>



<!DOCTYPE html>
<html>
<head>
	<title>Ajure OpenDictionary</title>
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<h1>List of all words</h1>
		<nav class="navbar navbar-inverse">
			<div class="navbar-header">
				<a class="navbar-brand" href="{{ URL::to('listwords') }}">Ajure OpenDictionary |</a>
			</div>
			<ul class="nav navbar-nav">

				<li><a href="{{ URL::to('listwords/usershow') }}" >View-all</a></li>
			</ul>
		</nav>

		<h1>List of all words</h1>
		<table class="table table-striped table-bordered">
			<thead>
				<tr>
					<td>ID</td>
					<td>Word</td>
					<td>Definition</td>
					<td>Part of Speech</td>
					<td>Date Added</td>
				</tr>
			</thead>
			<tbody>
				@foreach($value as $val)
				<tr>
					<td>{{ $val->id }}</td>
					<td><strong>{{ $val->words }}</strong></td>
					@if(count($val->wordinfo)>0)
					@foreach($val->wordinfo as $info)
					<td>{{$info->definition}} </td>
					<td>{{$info->parts_of_speech}}</td>
					@endforeach
					@endif
				</td>
				<td>{{ $val->created_at }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
</body>
</html>



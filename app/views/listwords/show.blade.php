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
				<li><a href="{{ URL::to('listwords/show') }}">View all words</a></li>
				<li><a href="{{ URL::to('listwords/create') }}">Add new word</a></li>
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
					<td>Edit</td>
					<td>Delete</td>
				</tr>
			</thead>
			<tbody>
				@foreach($value as $val)
				<tr>
					<td>{{ $val->id }}</td>
					<td><strong>{{ $val->words }}<strong></td>
					@if(count($val->wordinfo)>0)
					
					@foreach($val->wordinfo as $info)
					<td>{{$info->definition}} </td>
					<td>{{$info->parts_of_speech}}</td>
					@endforeach
					@endif
				</td>
				<td>{{ $val->created_at }}</td>
				<td><a class="glyphicon glyphicon-edit"   href="{{ URL::to('listwords/' . $val->id . '/edit') }}"></a></td>
				<td><a  href="#" data-delete="%s" >

					{{ Form::open(array('route' => array('listwords.destroy', $val->id), 'method' => 'delete')) }}
					<button type="submit"  href="{{ URL::route('listwords.destroy', $val->id) }}" 
						class="glyphicon glyphicon-remove btn btn-danger btn-mini">Delete</button>
						{{ Form::close() }}
					</a> </td>
				</tr>
				@endforeach
			</tbody>
		</table>

	</div>
</body>
</html>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script>
	$('[data-delete]').click(function(e){  
    // If the user dont confirm the delete
    if (!confirm('Do you really want to delete the element ?')) {
    	e.preventDefault();
    }
});
</script>

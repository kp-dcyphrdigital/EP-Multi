<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h1>Entries</h1>
	<ul>
		@foreach ($entries as $entry)
		<li>{{ $entry->firstname }}</li>
		@endforeach
	</ul>
</body>
</html>
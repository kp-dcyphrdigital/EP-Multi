<!doctype html>
<html lang="{{ app()->getLocale() }}" style="height: 100%;">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ENTREZO Promotions V2</title>
    <!-- CSS -->
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet" type="text/css">
    <link rel="icon" href="/favicon.ico">
</head>
<body style="height: 100%; display: flex; align-items: center; justify-content: center;">
	<div style="width: 800px; text-align: center;">
	    <h1>Sorry that entry is not available, please click below to go to the promotion you are looking for</h1>
	    @foreach ($competitions as $competition)
	        <p><a href="/{{ $competition->slug }}">{{ $competition->name }}</a></p>
	    @endforeach
	</div>
</body>
</html>
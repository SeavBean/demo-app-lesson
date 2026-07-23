<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
</head>
<body>

<h1>This is a Heading</h1>
<p>This is a paragraph.</p>
<ul>
    @foreach ($tags as $tags)
        <li>{{ $tags }}</li>
        
    @endforeach
</ul>
</body>
</html>
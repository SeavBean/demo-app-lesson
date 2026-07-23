<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
</head>
<body>

<h1>This is a Heading of category</h1>
<p>This is a paragraph category</p>
<ul>
    @foreach ($categories as $categories)
        <li>{{ $categories }}</li>
        
    @endforeach
</ul>
</body>
</html>
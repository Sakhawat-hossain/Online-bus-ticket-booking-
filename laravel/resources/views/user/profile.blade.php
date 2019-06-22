<!DOCTYPE>
<html>
<head>

</head>
    <body>

    <h1>All Information About Users</h1>

    @if(isset($user))
        <h3>var user set</h3>
            <ul>
                @foreach($user as $var)
                    {{ $var }}
                @endforeach
            </ul>
    @endif

    </body>
</html>

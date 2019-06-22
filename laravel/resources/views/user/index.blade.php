<!DOCTYPE>
<html>
    <head>

    </head>
    <body>

         <h1>All Information About Users</h1>

         @if(isset($users))
              <h3>var users set</h3>
              @foreach ($users as $user)
               <ul>
                    <li>
                     @foreach($user as $var)
                      {{ $var }}
                     @endforeach
                    </li>
               </ul>
              @endforeach
          @endif

    </body>
</html>
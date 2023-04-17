<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="description" content="Travel companion project made in Laravel-PHP">
      <meta name="robots" content="noindex, nofollow">
      <meta name="author" content="Jakub Klonowski">
      <title>Envoy Travel Companion</title>
      <link rel="stylesheet" href="app.css">
   </head>
   <body>
      <nav>
         <a href="/">Home</a>
         @if (isset($_SESSION['mode']) && ($_SESSION['mode'] == 'user' || $_SESSION['mode'] == 'admin'))
            <a href="/envoy">Envoys</a>
            <a href="/account">Account</a>
            @if ($_SESSION['mode'] == 'admin')
               <a href="/admin">Admin</a> 
            @endif
            <a href="/logout">Logout</a>
         @else
            <a href="/login">Login/Register</a>
         @endif
      </nav>
      @yield('content', 'Loading...')
   </body>
</html>
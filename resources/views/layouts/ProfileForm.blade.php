<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pinder</title>
  <style>
    body {
      font-family: 'Arial', sans-serif;
      margin: 0;
      padding: 0;
    }

    header {
      background-color: #333;
      color: #fff;
      padding: 10px 20px;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    header h1 {
      margin: 0;
    }

    nav {
      display: flex;
      gap: 20px;
    }

    nav a {
      color: #fff;
      text-decoration: none;
    }

    footer {
      background-color: #333;
      color: #fff;
      text-align: center;
      padding: 10px 0;
      position: fixed;
      bottom: 0;
      width: 100%;
    }
  </style>
</head>
<body>

<header>
  <h1>Pinder</h1>
  <nav>
    <a href="{{route('home')}}">My Posts</a>
    <a href="{{route('profile')}}">Profile</a>
    <a href="{{route('post')}}">Add Posts</a>
    <a href="{{route('find.post')}}">Find Posts</a>
    <a href="{{route('liked.post')}}">Liked Posts</a>
    <a href="{{route('Follower')}}">Followers</a>
    <a href="{{url('/chatify')}}">Chat</a>




    <a href="{{route('logout')}}" onclick="return confirm('Logout?')">LogOut</a>

    <!-- Add more navigation links as needed -->
  </nav>
</header>

<!-- Your content goes here -->
@yield('content')

<footer>
  &copy; 2024 Your Site. All rights reserved.
</footer>

</body>
</html>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta http-equiv="Content-Type" content="text/html"; charset="UTF-8">
    <link rel="stylesheet" href="css/general.css">
    <link rel="stylesheet" href=@yield('style')>
    <title>@yield('title')</title>
    <script src="https://kit.fontawesome.com/e469d29140.js" crossorigin="anonymous"></script>
</head>
<body>
@yield('header')
<div id="content">
    @yield('content')
</div>
</body>
</html>
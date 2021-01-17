<!DOCTYPE html>
<html lang="ja">
<head>
    <meta http-equiv="Content-Type" content="text/html"; charset="UTF-8">
    <link rel="stylesheet" href="css/general.css">
    <link rel="stylesheet" href=@yield('style')>
    <title>@yield('title')</title>
    <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
    <script src="https://kit.fontawesome.com/e469d29140.js" crossorigin="anonymous"></script>
    <script src="view/js/template.js"></script>
</head>
<body>
@yield('header')
<div id="content">
    @yield('content')
</div>
</body>
</html>
<!doctype html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="description" content="{{ isset($meta->description) ? $meta->description : 'Perusahaan IT pembuatan website dan aplikasi, Pelatihan IT, dan Audit IT yang berbasis di Surabaya.' }}">
  <meta name="keywords" content="pembuatan website, pembuatan aplikasi, pelatihan it">
  <meta name="author" content="Adeardo Dora Harnanda">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta property="og:title" content="{{ (isset($meta->title) ? $meta->title : 'Pelatihan IT dan Pembuatan Aplikasi') .' | '. $global_info->name }}" />
  <meta property="og:description" content="{{ isset($meta->description) ? $meta->description : 'Perusahaan IT pembuatan website dan aplikasi, Pelatihan IT, dan Audit IT yang berbasis di Surabaya.' }}">
  <meta property="og:type" content="website" />
  <meta property="og:url" content="{{ (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]" }}" />
  <meta property="og:image" content="{{ isset($meta->image) ? $meta->image : '/media/dark.jpg' }}" />

  <title>{{ (isset($meta->title) ? $meta->title : 'Pelatihan IT dan Pembuatan Aplikasi') .' | '. $global_info->name }}</title>
  <link rel=stylesheet href=https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css>
  <link href="/main.css" rel="stylesheet">
</head>

<body>
  @include('_includes.navbarTop')
  @include('_includes.navbarMain')
  
  @yield('body')

  @include('_includes.footer')

  <script type="text/javascript" src="/runtime.js"></script>
  <script type="text/javascript" src="/vendors.js"></script>
  <script type="text/javascript" src="/main.js"></script>
</body>

</html>
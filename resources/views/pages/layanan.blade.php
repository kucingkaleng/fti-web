@php
$http = new \GuzzleHttp\Client();
$services = $http->get(config('app.api') . '/items/services?fields=name,slug,image.data')->getBody()->getContents();
$services = json_decode($services)->data;
@endphp

@extends('layouts.main')

@section('body')
<div class="jumbotron jumbotron-fluid jumbotron-secondary" style="background-image:linear-gradient(to bottom,rgba(255,255,255,0),rgba(0,0,0,1)),url(media/semi.jpg)">
  <div class=container>
    <h1 class=text-light>#Services</h1>
    <p class=text-light>Let's discover what we offer</p>
  </div>
</div>
<div class="container mt-5">
  <div class="row align-items-center">
    @foreach ($services as $item)    
    <div class="col-12 col-md-6 col-lg-4 mb-4">
      <a class=text-dark href={{ '/layanan/'.$item->slug }}>
        <div class="card card-service" style="background-image:url('{{ $item->image->data->full_url }}')">
          <div class=card-body>
            <div class=card-title>{{ $item->name }}</div>
          </div>
        </div>
      </a>
    </div>
    @endforeach
  </div>
</div>
@endsection
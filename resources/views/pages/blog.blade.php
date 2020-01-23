@php
$http = new \GuzzleHttp\Client();
$page = request()->query('page');
if (in_array($page, [null,'',0])) {
  $page = 1;
}
$offset = ($page - 1) * 4;

// Posts
$posts = $http->get(config('app.api') . '/items/posts?status=published&fields=title,summary,slug,featured_image.data&limit=4&offset='.$offset)->getBody()->getContents();
$posts = json_decode($posts)->data;

// Posts Categories
$categories = $http->get(config('app.api') .
'/items/post_categories?status=published')->getBody()->getContents();
$categories = json_decode($categories)->data;

@endphp

@extends('layouts.main')

@section('body')
<div class="jumbotron jumbotron-fluid jumbotron-secondary" style="background-image:linear-gradient(to bottom,rgba(255,255,255,0),rgba(0,0,0,1)),url(media/semi.jpg)">
  <div class=container>
    <h1 class=text-light>#Blog</h1>
    <p class=text-light>Up to date informations for you</p>
  </div>
</div>
<div class=container-fluid>
  <div class=row>
    <div class="col-12 col-lg-6">
      <div class=row>
        @foreach ($posts as $item)    
        <div class="col-12 col-md-12 mb-3">
          <div class=card>
            <div class=media><img class=mr-3 src="{{ $item->featured_image ? $item->featured_image->data->thumbnails[2]->url : 'https://via.placeholder.com/150x150' }}" alt="{{ $item->title }}">
              <div class="media-body py-2">
                <a href={{ '/blog/'.$item->slug }}><h5 class=mt-0><strong>{{ $item->title }}</strong></h5></a>
                <p>{{ $item->summary }}</p>
              </div>
            </div>
          </div>
        </div>
        @endforeach
        <div class=col-12>
          <nav>
            <ul class="pagination justify-content-end">
              <li class=page-item><a class=page-link href=#>Previous</a></li>
              <li class=page-item><a class=page-link href=#>1</a></li>
              <li class=page-item><a class=page-link href=#>2</a></li>
              <li class=page-item><a class=page-link href=#>3</a></li>
              <li class=page-item><a class=page-link href=#>Next</a></li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
    <div class="col-12 col-lg-6 mb-3">
      <div class="card p-3">
        <div class=row>
          <div class="col-12 col-lg-6">
            <h4><strong>#Category</strong></h4>
            <ul class="beauty pl-3">
              @foreach ($categories as $item)
              <li><a class=text-dark href=#!>{{ $item->category }}</a></li>
              @endforeach
            </ul>
          </div>
          <div class="col-12 col-lg-6">
            <h4><strong>#Archive</strong></h4>
            <ul class="beauty pl-3">
              <li><a class=text-dark href=#!>Comming Soon</a> </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="col-12 col-lg-6">
      <div class=row>
        <div class="col-12 text-center mb-3">
          <h3><strong>#Instagram</strong></h3><span><a href='https://www.instagram.com/fittechinova/' target=_blank>@fittechinova</a></span></div>
        {{-- <div class="col-12 col-md-4 mb-3 d-flex justify-content-center align-items-center">
          <img class=instagram src=media/apps.jpg alt=alt>
        </div> --}}
      </div>
    </div>
    {{-- <div class="col-12 col-lg-6">
      <div class=row>
        <div class="col-12 text-center mb-3">
          <h3><strong>#Youtube</strong></h3>
          <span><a href=#! target=_blank>@fittechinova</a></span></div>
        <div class="col-12 col-md-6 mb-3">
          <iframe width=300 height=200 src=https://www.youtube.com/embed/gW5-1Swx4dU frameborder=0 allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
          <h4 class="text-center">Comming Soon</h4>
        </div>
      </div>
    </div> --}}
  </div>
</div>
@endsection
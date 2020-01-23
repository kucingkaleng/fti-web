@php
$http = new \GuzzleHttp\Client();

$post = $http->get(config('app.api') . '/items/posts?status=published&fields=*,owner.first_name,owner.last_name,featured_image.data&filter[slug][eq]='.request()->route('slug'))->getBody()->getContents();
$post = json_decode($post)->data[0];

$meta->title = $post->title;
$meta->description = $post->summary;
$meta->image = $post->featured_image->data->thumbnails[5]->url;
@endphp

@extends('layouts.main')

@section('body')
<div class="container mt-3 post">
  <div class="row justify-content-center">
    <div class="col-12 col-lg-9"><img class=featured src={{ $post->featured_image->data->thumbnails[5]->url }} alt=alt>
      <h1 class=title>{{ $post->title }}</h1>
      <span><strong>Created on:</strong> {{ $post->created_on }}</span><br>
      <span><strong>Posted by:</strong> {{ $post->owner->first_name .' '. $post->owner->last_name }}</span>
      <hr>
      <div class=content>
        {!! $post->body !!}
      </div>
      <div class=card>
        <div class=card-body>
          <div class=card-text><a class="btn btn-sm btn-primary" href=#!>Share</a></div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
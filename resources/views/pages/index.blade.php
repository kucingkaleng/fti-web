@php
$http = new \GuzzleHttp\Client();
$certifications = $http->get(config('app.api') . '/items/certification?status=published&fields=title,logo.data')->getBody()->getContents();
$certifications = json_decode($certifications)->data;

$partnership = $http->get(config('app.api') . '/items/partnership?status=published&fields=company_name,company_logo.data')->getBody()->getContents();
$partnership = json_decode($partnership)->data;

$boards = $http->get(config('app.api') . '/items/boards?status=published&fields=title,image.data')->getBody()->getContents();
$boards = json_decode($boards)->data;
@endphp

@extends('layouts.main')

@section('body')
<div class="jumbotron jumbotron-fluid" style="background-image:linear-gradient(to bottom,rgba(255,255,255,0),rgba(0,0,0,1)),url(media/dark.jpg)">
  <div class=container>
    <div class=row>
      <div class="col-12 col-md-6 headline">
        <div class=container>
          <h3>{{ $page_info->banner_config->title }}</h3>
          <p>{{ $page_info->banner_config->text }}.</p><a class="{{ $page_info->banner_config->action_button->bootstrap_class }}" href={{ $page_info->banner_config->action_button->url }}>{{ $page_info->banner_config->action_button->text }}</a>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="container section mt-5">
  <div class="row justify-content-center align-items-center">
    <div class=col-12>
      <h1><strong>#Boards</strong></h1>
      <p class=lead>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo consectetur, minima laboriosam magnam
        cumque blanditiis asperiores cupiditate! Sapiente, nam numquam?</p>
    </div>
    @foreach ($boards as $item)   
    <div class="col-12 col-md-4 my-3 my-md-0">
      <a href=javascript:void(0) onclick='alert("Comming Soon")'>
        <div class="card card-board"><img class=card-img src={{ $item->image->data->full_url }} alt="{{ $item->title }}"></div>
      </a>
    </div>
    @endforeach
  </div>
</div>
<div class="section bg-dark text-light py-5">
  <div class=container>
    <div class=row>
      <div class=col-12>
        <blockquote class="blockquote text-center">
          <p class=mb-0>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
          <footer class=blockquote-footer>Someone famous in <cite title="Source Title">Source Title</cite></footer>
        </blockquote>
      </div>
    </div>
  </div>
</div>
<div class="section container mt-5">
  <div class=row>
    <div class="col-12 col-md-6">
      <div class="row justify-content-center align-items-center">
        <div class=col-12>
          <h1><strong>#Partnership</strong></h1>
          <p class=lead>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos veniam reprehenderit nulla
            provident totam est animi optio! Autem, excepturi quibusdam.</p>
        </div>
        @foreach ($partnership as $item)    
        <div class="col-6 col-lg-4 my-3 my-md-0">
          <a href=#! title="{{ $item->company_name }}">
            <img class=img-partner src={{ $item->company_logo->data->full_url }} alt="{{ $item->company_name }}"></a>
        </div>
        @endforeach
      </div>
    </div>
    <div class="col-12 col-md-6">
      <div class="row justify-content-center align-items-center">
        <div class=col-12>
          <h1><strong>#Certification</strong></h1>
          <p class=lead>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Commodi doloremque delectus culpa quos
            iste possimus eius harum molestias vel ducimus.</p>
        </div>
        @foreach ($certifications as $item)    
        <div class="col-6 col-lg-4 my-3 my-md-0">
          <a href=#! title="{{ $item->title }}">
            <img class=img-partner src={{ $item->logo->data->full_url }} alt="{{ $item->title }}"></a>
        </div>
        @endforeach
      </div>
    </div>
  </div>
</div>
@endsection
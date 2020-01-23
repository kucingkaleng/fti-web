@extends('layouts.main')

@section('body')    
<div class="jumbotron jumbotron-fluid jumbotron-secondary" style="background-image:linear-gradient(to bottom,rgba(255,255,255,0),rgba(0,0,0,1)),url(media/semi.jpg)">
  <div class=container>
    <h1 class=text-light>#About Us</h1>
    <p class=text-light>Get to know FTI further</p>
  </div>
</div>
<div class="container mt-5">
  <div class="row">
    <div class=col-12>
      <h2><strong>#FTI</strong></h2>
      <p> {{ $global_info->description }}</p>
    </div>
    <div class="col-12">
      <h2><strong>#Visi</strong></h2>
      <p>{{ $global_info->visi[0]->Input }}</p>
    </div>
    <div class="col-12">
      <h2><strong>#Misi</strong></h2>
      @foreach ($global_info->misi as $x => $item)    
      <p>{{ $x+1 .'. '. $item->Input }}</p>
      @endforeach
    </div>
  </div>
</div>
@endsection

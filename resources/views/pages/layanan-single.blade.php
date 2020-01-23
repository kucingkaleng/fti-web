@php
$http = new \GuzzleHttp\Client();
$service = $http->get(config('app.api') . '/items/services?filter[slug][eq]='.request()->route('slug').'&fields=*,image.data')->getBody()->getContents();
$service = json_decode($service)->data[0];
@endphp

@extends('layouts.main')

@section('body')
<div class=container>
  <div class="row my-3">
    <div class="col-12 col-lg-8 mb-3">
      <h1>{{ $service->name }}</h1>
      <p>{{ $service->description }}</p>
      <div class=card>
        <div class=card-body>
          <h4 class=card-title>Contact Us (Under Construction)</h4>
          <form action=#! method=method></form>
          <div class=form-group>
            <label for=nama>Nama Lengkap*</label>
            <input class="form-control mb-3" id=nama type=text name=nama placeholder=Clarisa required disabled>
            <label for=email>Email*</label>
            <input class="form-control mb-3" id=email type=email name=email placeholder=clarisa@gmail.com required disabled>
            <label for=instansi>Instansi</label>
            <input class="form-control mb-3" id=instansi type=text name=instansi placeholder="Fit Tech Inova" disabled>
            <label for=pertanyaan>Pertanyaan</label>
            <textarea class="form-control mb-3" id=pertanyaan name=pertanyaan placeholder="Berapa harga untuk sistem absensi berbasis web?" required disabled></textarea>
          </div>
          <button class="btn btn-primary" type=submit>SEND</button>
        </div>
      </div>
    </div>
    <div class="col-12 col-lg-4">
      <div class=card>
        <div class=card-body>
          <img src="{{ $service->image->data->full_url }}" width="100%" />
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
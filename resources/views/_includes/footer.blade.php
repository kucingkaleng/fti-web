<div class="footer text-light mt-5">
  <div class=container>
    <div class=row>
      <div class="col-12 col-lg-4">
        <h4 class=mt-3>#Links</h4>
        <ul class=beauty>
          @foreach ($pages as $item)
          <li><a href={{ $item->url }}>{{ $item->name }}</a></li>
          @endforeach
        </ul>
      </div>
      <div class="col-12 col-lg-4">
        <h4 class=mt-3>#Contacts</h4>
        <ul class=beauty>
          <li>admin@fittechinova.com</li>
          <li>+62 8223 123 0003</li>
        </ul>
      </div>
      <div class="col-12 text-center pt-4 pb-lg-0 pb-4">
        {{-- <span>Created by <a href=#!>Adeardo</a></span> --}}
        <br><span>Copyright &copy; 2019 <a href=https://fittechinova.com>Fit Tech Inova</a> All Rights Reserved.</span>
      </div>
    </div>
  </div>
</div>
<nav class="navbar navbar-expand-lg navbar-light bg-light" id=navbarMain>
  <div class=container>
    <a class="navbar-brand d-block d-lg-none" href=#><img src=.media/logo.svg alt="" srcset="">
      <div class="text d-block d-lg-none">Fit Tech Inova <span>Global</span></div>
    </a>
    <button class="navbar-toggler ml-auto" type=button data-toggle=collapse data-target=#navbarMainMenu><i
        class="fa fa-bars text-light">&nbsp;</i></button>
    <div class="collapse navbar-collapse" id=navbarMainMenu>
      <ul class="navbar-nav mr-auto">
        @foreach ($pages as $item)
        <li class="nav-item"><a class=nav-link href={{ $item->url }}>#{{ $item->name }}</a></li>
        @endforeach
      </ul>
      {{-- <form action=#! method=method>
        <select class=form-control name=languages>
          <option value=empty>Languages</option>
          <option value=id>Indonesia</option>
          <option value=en>English</option>
        </select>
      </form> --}}
    </div>
  </div>
</nav>
<div id=navbarOffsetter></div>
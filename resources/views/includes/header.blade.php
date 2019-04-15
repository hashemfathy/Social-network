<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="{{route('dashboard')}}" style="font-size:30px;color:#F2D900"><b>El-Tawfek</b></a>
            @if(Auth::check())
            <a class="nav-link "style="position:absolute;right:80px;" href="{{route('account')}}"> Account </a>
            <a class="nav-link "style="position:absolute;right:10px;" href="{{route('logout')}}"> Logout </a>
          @endif
</nav>
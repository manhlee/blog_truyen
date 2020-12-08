  <div class="menu">
        <nav class="navbar navbar-expand-lg container">
          <a class="navbar-brand tieude" href="#">Admin</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
            <ul class="navbar-nav">
              <li class="nav-item active">
                <a class="nav-link" href="{{route('logout')}}"><i class="fas fa-sign-out-alt"></i> 
                  @if(Session::has('admin'))
                    {{session('admin')['name']}}
                  @endif
                  <span class="sr-only">(current)</span></a>
              </li>
            </ul>
          </div>
      </nav>
      </div>
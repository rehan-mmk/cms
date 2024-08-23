

<ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a class="nav-link"> @lang('index.Courier Management System') </a>
    </li>
</ul>





<ul class="navbar-nav ml-auto"> 


  <li class="nav-item mr-4 d-none d-lg-inline">
    <a class="nav-link" data-widget="fullscreen" role="button">
        <i class="fas fa-expand-arrows-alt"></i>
    </a>
  </li>  


  <li class="nav-item mr-4">
    <div class="input-group">
      <div class="input-group-prepend">
        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
          Language
        </button>
        <div class="dropdown-menu" style="min-width: 6.8rem;">
          <a class="dropdown-item" href="locale/en">English</a>
          <a class="dropdown-item" href="locale/my">Myanmar</a>
        </div>
      </div>
    </div>
  </li>

  <li class="nav-item dropdown">

    <a class="nav-link" data-toggle="dropdown" style="padding: 0 !important; cursor: pointer">
        <img src="{{ asset('images/ProfileImages/' . Auth::user()->picture)  }}" class="img-circle admin_picture" 
          style="width: 40px; height: 40px; margin-right: 20px;" alt="Admin Image">
    </a>


 
    <div class="dropdown-menu dropdown-menu-right" 
      style="margin-right: 28px; margin-top: 8px; border-radius: 0;">

      <a href="{{ route('profile') }}" class="dropdown-item text-center">
        <i class="fas fa-user mr-2"></i> @lang('index.Manage Account')
      </a>
      <div class="dropdown-divider"></div>
      <a href="{{ route('logout') }}" class="dropdown-item dropdown-footer"> 
        <i class="fa fa-power-off mr-2"></i> @lang('index.Logout') 
      </a>
    </div>
  
  </li>
    
</ul>
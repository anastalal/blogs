{{-- <header class="p-3 bg-dark text-white">
  <div class="container">
    <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
      <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
        <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"/></svg>
      </a>

      <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
        <li><a href="/" class="nav-link px-2 text-secondary">الرئيسية</a></li> 
        @auth
        <li><a href="#" class="nav-link px-2 text-white">التقارير</a></li>
        <li><a href="{{  url('officers/create') }}" class="nav-link px-2 text-white">اضافة مكتب</a></li>
       <li><a href="{{  url('reports/create') }}" class="nav-link px-2 text-white">اضافة تقرير</a> </li>  
       @if(Auth::user()->isAdministrator())
       <li><a href="{{  url('users') }}" class="nav-link px-2 text-white">المستخدمين</a></li>
       <li><a href="{{  url('admin') }}" class="nav-link px-2 text-white">لوحة التحكم</a> </li>
       @endif
      </ul>

        {{auth()->user()->name}}
        <div class="text-end">
          <a href="{{ route('logout.perform') }}" class="btn btn-outline-light me-2">Logout</a> 
        </div>
      @endauth

      @guest
        <div class="text-end">
          <a href="{{ route('login.perform') }}" class="btn btn-outline-light me-2">Login</a>
          <a href="{{ route('register.perform') }}" class="btn btn-warning">Sign-up</a>
        </div>
      @endguest
    </div>
  </div>
</header>  --}}
      
<header class="hero-anime" dir="ltr">	

	<div class="navigation-wrap bg-light start-header start-style">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<nav class="navbar navbar-expand-md navbar-light">
					
						<a class="navbar-brand" href="#"><img src="{{URL::asset('images/Derhem-logo.png') ;}}" alt=""></a>	
            {{-- <p  class="navbar-brand"> {{auth()->user()->name}}</p> --}}
          
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
							<span class="navbar-toggler-icon"></span>
						</button>
						
						<div class="collapse navbar-collapse" id="navbarSupportedContent">
							<ul class="navbar-nav ml-auto py-4 py-md-0">
                <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4 active">
                  <a href="/" class="nav-link">الرئيسية</a>
                </li>
                @auth
								<li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
									<a href="{{  url('officers/create') }}" class="nav-link ">اضافة مكتب</a>
                  {{-- <div class="dropdown-menu">
										<a class="dropdown-item" href="#">Action</a>
										<a class="dropdown-item" href="#">Another action</a>
										<a class="dropdown-item" href="#">Something else here</a>
										<a class="dropdown-item" href="#">Another action</a>
									</div> --}}
								</li> 
								<li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
                  <li><a href="{{  url('reports/create') }}" class="nav-link">اضافة تقرير</a> </li>
								</li> 
                @if(Auth::user()->isAdministrator())
                <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
                  <a href="{{  url('users') }}" class="nav-link">المستخدمين</a>
                </li>
                <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
                  <a href="{{  url('admin') }}" class="nav-link">لوحة التحكم</a> 
                </li>
                @endif 
                  <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
                    <a href="{{ route('logout.perform') }}" class="nav-link btn btn-outline-light me-2">Logout</a> 
                  </li>
                  {{auth()->user()->name}}
              @endauth
        
              @guest
                <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
                  <a href="{{ route('login.perform') }}" class="nav-link">Login</a>
                </li>
                <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
                  <a href="{{ route('register.perform') }}" class=" nav-link">Sign-up</a>
                </li>
              @endguest
								{{-- <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
									<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Services</a>
									<div class="dropdown-menu">
										<a class="dropdown-item" href="#">Action</a>
										<a class="dropdown-item" href="#">Another action</a>
										<a class="dropdown-item" href="#">Something else here</a>
										<a class="dropdown-item" href="#">Another action</a>
									</div>
								</li>
								<li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
									<a class="nav-link" href="#">Journal</a>
								</li>
								<li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
									<a class="nav-link" href="#">Contact</a>
								</li> --}}
							</ul>
						</div>
						
					</nav>		
				</div>
			</div>
		</div>
	</div>
	<div class="section full-height">
		
	</div>


</header>
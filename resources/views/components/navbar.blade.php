<header class="">
        <nav class="navbar navbar-expand-lg bg-body-tertiary ">
            <div class="container-fluid bg-danger text-white">
                <a class="navbar-brand" href="{{ route('home') }}">Navbar</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Home</a>
                        </li>
                        @foreach ($navbar_categories as $navbar_category)  {{-- show categories --}}
                            <li class="nav-item">                                                       {{-- show categories_id --}}
                                <a class="nav-link active" aria-current="page" href="{{ route('home', ['category_id'=>$navbar_category->id]) }}">{{ $navbar_category->name }}</a>
                            </li>
                        @endforeach
                        
                        <li class="nav-item">
                            <a class="nav-link" href="#">Features</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Pricing</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Dropdown
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('admin.category.index') }}">Category</a></li>
                                <li><a class="dropdown-item" href="{{ route('admin.tag.index') }}">Tag</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="{{ route('admin.post.index') }}">Post</a></li>
                            </ul>
                        </li>
                        
                        @if (auth()->check())
                            <li class="nav-item">
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                        <button
                                        class="btn btn-danger btn-sm"
                                        href=""
                                        role="button"
                                        >Logout 
                                        </button>
                                </form>
                                {{-- <a class="nav-link" href="{{ route('logout') }}">Logout</a> --}}
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">Login</a>
                            </li>

                        @endif


                            
                        
                       
                    </ul>
                </div>
            </div>
        </nav>            
    </header>
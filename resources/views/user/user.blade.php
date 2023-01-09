<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Shop Homepage - Start Bootstrap Template</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{asset('admin/css/styles.css')}}" rel="stylesheet" />
    </head>
    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">

            <div class="container px-lg-5">
                <h2 class=" px-4">Customer Dashboard</h2>
                <div>
                    @guest
                    <a href="{{route('login')}}" class="btn btn-dark text-light">Login</a>
                    <a href="{{route('register')}}" class="btn btn-dark text-light">Register</a>
                @endguest
                </div>
                 <form class="d-flex">
                            @auth
                           @cannot('cus_view',$admin)
                           <a class=" btn btn-dark text-light mx-4"  href="{{route('admin_profile.index')}}"> Add Proudcts</a>
                           @endcannot
                           @endauth
                    </form>

                    @auth
                    <ul class="navbar-nav ms-auto">
                          <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                     <i class="bi bi-person-fill text-dark fs-4 my-1 mx-2"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                     <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                          </li>

                    </ul>
                      @endauth
                </div>
            </div>
        </nav>

        <section class="py-5">

        <div class="container px-4 px-lg-5 mt-5">
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">

             @foreach ($admin as  $admin)
               <div class=" col mb-5">

                <div class="card">

                            <!-- Product image-->
                            <img class="card-img-top" width="100px" height="100px" src="{{asset('uploads/'.$admin->image)}}" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h6 class="fw-bolder">Product Name : {{$admin->product_name}}</h6>
                                    <!-- Product price-->
                                    <h6 class="">Price : {{$admin->price}}</h6>
                                    <h6 class="">Quantity : {{$admin->quantity}}</h6>

                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                   <div class="text-center">

                                    @cannot('admin_view',$admin)
                                    <a class="btn btn-outline-dark mt-auto" href="#">Add to cart</a>
                                    @endcannot
                                </div>
                                    <div class="d-flex">
                                        <form action="{{route('admin_profile.destroy',$admin->id)}}" method ="post">
                                            @csrf
                                            @method('DELETE')
                                           @auth
                                                @cannot('cus_view',$admin)
                                                    <button type="submit" class="btn btn-danger m-2"><i class="bi bi-trash"></i></button>
                                                @endcannot
                                            @endauth
                                        </form>
                                        @auth
                                            @cannot('cus_view',$admin)
                                                <a href="{{route('admin_profile.edit',$admin->id)}}" class = "btn btn-warning m-2"><i class="bi bi-pencil-square"></i></a>
                                            @endcannot
                                        @endauth
                                    </div>

                                </div>

                            </div>
                        </div>
            @endforeach
        </div>
        </div>

        </section>
        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2022</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="{{asset('admin/js/scripts.js')}}"></script>
    </body>
</html>

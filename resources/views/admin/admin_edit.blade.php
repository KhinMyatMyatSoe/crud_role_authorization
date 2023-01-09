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
            <div class="container px-4 ">
                <h3>Admin Update Dashboard </h3>
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
                </div>
            </div>
        </nav>
        <!-- Form-->
          <div class="col col-md-6 mt-5 container">
                <form method="post" enctype="multipart/form-data" action="{{route('admin_profile.update',$admin->id)}}" >
                    @csrf
                    @method('PUT')

                <div class="input-group mb-4">
                        <input type="text" class="form-control" placeholder="Product Name" aria-label="Product Name" aria-describedby="basic-addon1" name="product_name" value="{{$admin_edit->product_name}}">
                </div>
                <div class="file form-control mb-4">
                    <img src="{{asset('uploads/'.$admin_edit->image)}}" alt="Product image" width="100px" height="100px">
                </div>
                <div class="input-group mb-4">
                        <input type="text" class="form-control" placeholder="Enter Price" aria-label="Username" aria-describedby="basic-addon1" name="price" value="{{$admin_edit->price}}">
                </div>
                <div class="input-group mb-4">
                        <input type="text" class="form-control" placeholder="Enter quantity" aria-label="quantity" aria-describedby="basic-addon1" name="quantity" value="{{$admin_edit->quantity}} ">
                </div>
                <input type="submit" class="btn btn-dark text-light" value="Update Product">
                </form>
                <a href="{{route('customer_profile.index')}}" class="btn btn-success my-3">View Products</a>

            </div>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="{{asset('admin/js/scripts.js')}}"></script>
    </body>
</html>

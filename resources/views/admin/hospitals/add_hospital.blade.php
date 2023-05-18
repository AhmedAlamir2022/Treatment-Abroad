<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add New Hospital - Treatment Abroad</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Webmin - Bootstrap 4 & Angular 5 Admin Dashboard Template" />
    <meta name="author" content="potenzaglobalsolutions.com" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    @include('admin.body.head')
</head>
<body style="font-family: 'Cairo', sans-serif">
    <div class="wrapper">

        <!--=================================
 preloader -->
 

        
        <!--=================================
 preloader -->

 @include('admin.body.main-header')
 @include('admin.body.main-sidebar')

        <!--=================================
 Main content -->
        <!-- main-content -->
        
        <div class="content-wrapper">
            <div class="page-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h4 class="mb-0" style="font-family: 'Cairo', sans-serif;">  Add New Hospital</h4>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" class="default-color">Dashboard</a></li>
                            <li class="breadcrumb-item active">  Add New Hospital</li>
                        </ol>
                    </div>
                </div>
            </div>
           <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="post" action="{{ route('Hospitals.store') }}" autocomplete="off" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Title</label>
                                    <input  class="form-control" name="title" type="text" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Hospital Email </label>
                                    <input  class="form-control" name="email"  type="email" required>
                                </div>
                            </div>
                        </div><br>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Short Description</label>
                                    <textarea class="form-control" name="short_desc" rows="2" required></textarea>
                                </div>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Hospital Contact Number</label>
                                    <input  class="form-control" name="contact" type="number" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Hospital Country </label>
                                    <input  class="form-control" name="country"  type="text" required>
                                </div>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Long Description</label>
                                    <textarea class="form-control" name="long_desc" rows="4" required></textarea>
                                </div>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Hospital City</label>
                                    <input  class="form-control" name="city" type="text" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Address</label>
                                    <textarea class="form-control" name="address" rows="1" required></textarea>
                                </div>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Image 1</label>
                                    <input  class="form-control" name="image1" type="file" required>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Image 2 </label>
                                    <input  class="form-control" name="image2"  type="file" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Image 3 </label>
                                    <input  class="form-control" name="image3"  type="file" required>
                                </div>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Image 4</label>
                                    <input  class="form-control" name="image4" type="file" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Image 5</label>
                                    <input  class="form-control" name="image5"  type="file" required>
                                </div>
                            </div>
                        </div><br><hr>
                        <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">Add New Hospital</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
            <!--=================================
 wrapper -->

            <!--=================================
 footer -->

 @include('admin.body.footer')

        </div><!-- main content wrapper end-->
    </div>
    </div>
    </div>

    <!--=================================
 footer -->

 @include('admin.body.footer-scripts')
    
</body>

</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Contact Info - Treatment Abroad</title>
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
                        <h4 class="mb-0" style="font-family: 'Cairo', sans-serif;">Contact Info</h4>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" class="default-color">Dashboard</a></li>
                            <li class="breadcrumb-item active">Contact Info</li>
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
                    @foreach ($quires as $quiry)
                    <form method="post" action="{{ route('Query.update', 'test') }}">
                    @method('PUT')
                     @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
									<label>Email</label>
									<input class="form-control" type="hidden" name="id" value="{{ $quiry->id }}">
                                    <input class="form-control" type="email" name="email" value="{{ $quiry->email }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
									<label>Phone</label>
                                    <input class="form-control" type="tel" name="phone" value="{{ $quiry->phone }}" required>
                                </div>
                            </div>
                        </div><br><br>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
									<label>Address</label>
									<textarea class="form-control" name="address" required rows="5">{{ $quiry->address }}</textarea>
                                </div>
                            </div>
                        </div><br><br>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
									<label>Details</label>
									<textarea class="form-control" name="details" required rows="5">{{ $quiry->details }}</textarea>
                                </div>
                            </div>
                        </div><br><br><hr>
                        <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">Update Query</button>
                    </form>
                    @endforeach
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

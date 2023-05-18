<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Profile Information - Treatment Abroad</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="keywords" content="HTML5 Template" />
        <meta name="description" content="Webmin - Bootstrap 4 & Angular 5 Admin Dashboard Template" />
        <meta name="author" content="potenzaglobalsolutions.com" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        @include('ndoctor.body.head')
    </head>
    <body style="font-family: 'Cairo', sans-serif">
        <div class="wrapper">
            @include('ndoctor.body.main-header')
            @include('ndoctor.body.main-sidebar')
            <!-- main-content -->
            <div class="content-wrapper">
                <div class="page-title">
                    <div class="row">
                        <div class="col-sm-6">
                            <h4 class="mb-0" style="font-family: 'Cairo', sans-serif;">Profile Information</h4>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                                <li class="breadcrumb-item"><a href="{{ route('ndoctor.dashboard') }}" class="default-color">Dashboard</a></li>
                                <li class="breadcrumb-item active">Profile Information</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- row -->
                <div class="row">
                    <div class="col-md-12 mb-30">
                        <div class="card card-statistics h-100">
                            <div class="card-body">
                                @if(session()->has('error'))
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <strong>{{ session()->get('error') }}</strong>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif
                                <div class="col-xs-12">
                                    <div class="col-md-12"><br>
                                        <form action="{{ route('store.ndprofile') }}" enctype="multipart/form-data" method="post" autocomplete="off">
                                            @csrf
                                            <div class="form-row">
                                                <div class="col">
                                                    <label for="title">Name</label>
                                                    <input type="text" name="name" value="{{ $userData->name }}" class="form-control" required>
                                                </div>
                                                <div class="col">
                                                    <label for="title">Email Address</label>
                                                    <input type="email" readonly value="{{ $userData->email }}" name="email" class="form-control">
                                                </div>
                                            </div><br>
                                            <div class="form-row">
                                                <div class="col">
                                                    <label for="title">User Name</label>
                                                    <input type="text" value="{{ $userData->username }}" name="username" class="form-control" >
                                                </div>
                                                <div class="col">
                                                    <label for="title">Mobile Number</label>
                                                    <input type="number" value="{{ $userData->contact }}" name="contact" class="form-control" >
                                                </div>
                                            </div><br>
											<div class="form-row">
                                                <div class="col">
                                                    <label for="title">Gender</label>
                                                    <select class="form-control select" name="gender">
														<option selected value="{{ $userData->gender }}">{{ $userData->gender }}</option>
                                                        @foreach($genders as $gender)
                                                            <option value="{{ $gender->Name }}">{{ $gender->Name }}</option>
                                                        @endforeach
													</select>
                                                </div>
                                                <div class="col">
                                                    <label for="title">Nationality</label>
                                                    <select class="form-control select" name="nationality">
														<option selected value="{{ $userData->nationality }}">{{ $userData->nationality }}</option>
                                                        @foreach($nationalites as $nationalite)
                                                            <option value="{{ $nationalite->Name }}">{{ $nationalite->Name }}</option>
                                                        @endforeach
													</select>
                                                </div>
                                            </div><br>
											<div class="form-row">
                                                <div class="col">
                                                    <label for="title">Blood Type</label>
                                                    <select class="form-control select" name="bloodtype">
														<option selected value="{{ $userData->bloodtype }}">{{ $userData->bloodtype }}</option>
                                                        @foreach($type_bloods as $type_blood)
                                                            <option value="{{ $type_blood->Name }}">{{ $type_blood->Name }}</option>
                                                        @endforeach
													</select>
                                                </div>
                                                <div class="col">
                                                    <label for="title">Religion</label>
                                                    <select class="form-control select" name="religion">
														<option selected value="{{ $userData->religion }}">{{ $userData->religion }}</option>
                                                        @foreach($religions as $religion)
                                                            <option value="{{ $religion->Name }}">{{ $religion->Name }}</option>
                                                        @endforeach
													</select>
                                                </div>
                                            </div><br>
                                            <div class="form-row">
                                                <div class="col">
                                                    <label for="title">Address</label>
                                                    <textarea class="form-control" rows="5" name="address">{{ $userData->address }}</textarea>
                                                </div>
                                            </div><br>
                                            <div class="form-row">
                                                <div class="col">
                                                    <label for="title">Country</label>
                                                    <input type="text" value="{{ $userData->country }}" name="country" class="form-control">
                                                </div>
                                                <div class="col">
                                                    <label for="title">City</label>
                                                    <input type="text" value="{{ $userData->city }}" name="city" class="form-control">
                                                </div>
                                            </div><br>
											<div class="form-row">
                                                <div class="col">
                                                    <label for="title">Doctor Image</label>
                                                    <img src="{{ (!empty($userData->doctor_image))? url('upload/NationalDr/'.$userData->doctor_image):url('upload/no_image.jpg') }}" alt="National Dr Image" style="width: 60px; height: 50px;"></td>
													<input type="file" name="doctor_image" class="form-control" >
                                                </div>
                                            </div><br>
                                            <div class="form-row">
                                                <div class="col">
                                                    <label for="title">Added Date</label>
                                                    <input type="text" value="{{ $userData->created_at }}" readonly class="form-control" >
                                                </div>
                                            </div><br><hr>
                                            <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">Edit Profile Info</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--================================= footer -->
                @include('ndoctor.body.footer')
            </div><!-- main content wrapper end-->
        </div>
        @include('ndoctor.body.footer-scripts')
    </body>
</html>

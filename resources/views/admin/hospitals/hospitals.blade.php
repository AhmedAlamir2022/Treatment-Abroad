<!DOCTYPE html>
<html>
    <head>
        <title>Hospitals - Treatment Abroad</title>
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
            @include('admin.body.main-header')
            @include('admin.body.main-sidebar')
            <!-- main-content -->
            <div class="content-wrapper">
                <div class="page-title">
                    <div class="row">
                        <div class="col-sm-6">
                            <h4 class="mb-0" style="font-family: 'Cairo', sans-serif;"> Hospitals List</h4>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" class="default-color">Dashboard</a></li>
                                <li class="breadcrumb-item active">Hospitals List</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @if ($errors->any()) <div class="error">{{ $errors->first('Name') }}</div> @endif
                    <div class="col-xl-12 mb-30">
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
                                <a href="{{ route('Hospitals.create') }}"><button type="button" class="button x-small">
                                    Add New Hospital</button></a><br><br>
                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                                        style="text-align: center">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>image1</th>
                                                <th>Title</th>
                                                <th>Contact</th>
                                                <th>Added Date</th>
                                                <th>Processes</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 0; ?>
                                            @foreach ($hospitals as $hospital)
                                                <tr>
                                                    <?php $i++; ?>
                                                    <td>{{ $i }}</td>
                                                    <td><img src="{{ asset($hospital->image1) }}" style="width: 60px; height: 50px;"></td>
                                                    <td>{{ $hospital->title }}</td>
                                                    <td>{{ $hospital->contact }}</td>
                                                    <td>{{ Carbon\Carbon::parse($hospital->created_at)->diffForHumans() }}</td>
                                                    <td>
                                                        <a href="{{route('Hospitals.edit',$hospital->id)}}" class="btn btn-info btn-sm" role="button" aria-pressed="true"><i class="fa fa-edit"></i></a>
                                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                            data-target="#delete{{ $hospital->id }}"
                                                            title="Delete"><i
                                                                class="fa fa-trash"></i></button>
                                                            <button type="button" class="btn btn-warning btn-sm" data-toggle="modal"
                                                            data-target="#view{{ $hospital->id }}"
                                                            title="View"><i
                                                                class="fa fa-book"></i></button>
                                                    </td>
                                                </tr>

                                                <!-- delete_modal_hospital -->
                                                <div class="modal fade" id="delete{{ $hospital->id }}" tabindex="-1" role="dialog"
                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                                    id="exampleModalLabel">
                                                                    Delete hospital
                                                                </h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="{{ route('Hospitals.destroy', 'test') }}" method="post">
                                                                    {{ method_field('Delete') }}
                                                                    @csrf
                                                                    Are You Sure You Want To Delete This Hospital?
                                                                    <input id="id" type="hidden" name="id" class="form-control"
                                                                        value="{{ $hospital->id }}">
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-dismiss="modal">Close</button>
                                                                        <button type="submit"
                                                                            class="btn btn-danger">Delete</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- View_modal_hospital -->
                                                <div class="modal fade" id="view{{ $hospital->id }}" tabindex="-1" role="dialog"
                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                                    id="exampleModalLabel">
                                                                    View Hospital Details
                                                                </h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form>
                                                                    <div class="form-row">
                                                                        <div class="col">
                                                                            <label>Title</label>
                                                                            <input type="text" value="{{ $hospital->title }}" class="form-control" readonly>
                                                                        </div>
                                                                        <div class="col">
                                                                                <label>Email </label>
                                                                                <input type="email" value="{{ $hospital->email }}" class="form-control" readonly>
                                                                            </div>
                                                                        </div>
                                                                        <br>
                                                                        <div class="form-row">
                                                                            <div class="col">
                                                                                <label for="title">Short Description</label>
                                                                                <textarea class="form-control" rows="2" readonly>{{ $hospital->short_desc }}</textarea>
                                                                            </div>
                                                                        </div><br>
                                                                        <div class="form-row">
                                                                            <div class="form-group col">
                                                                                <label for="inputState">Contact</label>
                                                                                <input type="text" value="{{ $hospital->contact }}" class="form-control" readonly>
                                                                            </div>
                                                                            <div class="form-group col">
                                                                                <label for="inputState">Country</label>
                                                                                <input type="text" value="{{ $hospital->country }}" class="form-control" readonly>
                                                                            </div>
                                                                        </div><br>
                                                                        <div class="form-row">
                                                                            <div class="col">
                                                                                <label for="title">Long Description</label>
                                                                                <textarea class="form-control" rows="6" readonly>{{ $hospital->long_desc }}</textarea>
                                                                            </div>
                                                                        </div><br>
                                                                        <div class="form-row">
                                                                            <div class="col">
                                                                                <label for="title">Address</label>
                                                                                <textarea class="form-control" rows="1" readonly>{{ $hospital->address }}</textarea>
                                                                            </div>
                                                                            <div class="col">
                                                                                <label for="title">City</label>
                                                                                <input type="text" value="{{ $hospital->city }}" class="form-control" readonly>
                                                                            </div>
                                                                        </div><br>
                                                                        <div class="form-row">
                                                                            <div class="col">
                                                                                <label for="title">Image1</label>
                                                                                <img class="form-control" readonly src="{{ asset($hospital->image1) }}" style="width: 100px; height: 100px;">
                                                                            </div>
                                                                            <div class="col">
                                                                                <label for="title">Image2</label>
                                                                                <img class="form-control" readonly src="{{ asset($hospital->image2) }}" style="width: 100px; height: 100px;">
                                                                            </div>
                                                                        </div><br>
                                                                        <div class="form-row">
                                                                            <div class="col">
                                                                                <label for="title">Image3</label>
                                                                                <img class="form-control" readonly src="{{ asset($hospital->image3) }}" style="width: 100px; height: 100px;">
                                                                            </div>
                                                                            <div class="col">
                                                                                <label for="title">Image4</label>
                                                                                <img class="form-control" readonly src="{{ asset($hospital->image4) }}" style="width: 100px; height: 100px;">
                                                                            </div>
                                                                        </div><br>
                                                                        <div class="form-row">
                                                                            <div class="col">
                                                                                <label for="title">Image5</label>
                                                                                <img class="form-control" readonly src="{{ asset($hospital->image5) }}" style="width: 100px; height: 100px;">
                                                                            </div>
                                                                        </div><br>
                                                                        <div class="form-row">
                                                                            <div class="col">
                                                                                <label for="title">Added Date</label>
                                                                                <input type="text" value="{{ $hospital->created_at }}" class="form-control" readonly>
                                                                            </div>
                                                                        </div><br>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-dismiss="modal">Close</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- add_modal_Grade -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                                        Add New Specilization
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <!-- add_form -->
                                    <form action="{{route('Specilization.store')}}"  method="post" autocomplete="off" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-row">
                                            <div class="col">
                                                <label for="title">Name</label>
                                                <input type="text" name="name" class="form-control" required>
                                            </div>
                                        </div> <br>
                                        <div class="form-row">
                                            <div class="col">
                                                <label for="title">Image</label>
                                                <input type="file" name="image" class="form-control" required>
                                            </div>
                                        </div> <br><hr>
                                        <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">Add New</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--================================footer -->
                @include('admin.body.footer')
            </div><!-- main content wrapper end-->
        </div>
        <!--=================================footer -->
        @include('admin.body.footer-scripts')
    </body>
</html>
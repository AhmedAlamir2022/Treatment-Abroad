<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Features List - Treatment Abroad</title>
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
                            <h4 class="mb-0" style="font-family: 'Cairo', sans-serif;"> Features  List</h4>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" class="default-color">Dashboard</a></li>
                                <li class="breadcrumb-item active">Features  List</li>
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
                                <button type="button" class="button x-small" data-toggle="modal" data-target="#exampleModal">
                                    Add New Feature</button><br><br>
                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                                        style="text-align: center">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>image</th>
                                                <th>Name</th>
                                                <th>Details</th>
                                                <th>Added Date</th>
                                                <th>Processes</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 0; ?>
                                            @foreach ($features as $feature)
                                                <tr>
                                                    <?php $i++; ?>
                                                    <td>{{ $i }}</td>
                                                    <td><img src="{{ asset($feature->image) }}" style="width: 60px; height: 50px;"></td>
                                                    <td>{{ $feature->name }}</td>
                                                    <td>{{ $feature->details }}</td>
                                                    <td>{{ Carbon\Carbon::parse($feature->created_at)->diffForHumans() }}</td>
                                                    <td>
                                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                            data-target="#delete{{ $feature->id }}"
                                                            title="Delete"><i
                                                                class="fa fa-trash"></i></button>
                                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                                            data-target="#edit{{ $feature->id }}"
                                                            title="Edit"><i class="fa fa-edit"></i></button>
                                                    </td>
                                                </tr>

                                                <!-- delete_modal_feature -->
                                                <div class="modal fade" id="delete{{ $feature->id }}" tabindex="-1" role="dialog"
                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                                    id="exampleModalLabel">
                                                                    Delete Feature
                                                                </h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="{{ route('Features.destroy', 'test') }}" method="post">
                                                                    {{ method_field('Delete') }}
                                                                    @csrf
                                                                    Are You Sure You Want To Delete This Feature?
                                                                    <input id="id" type="hidden" name="id" class="form-control"
                                                                        value="{{ $feature->id }}">
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
                                                <!-- Edit_modal_feature -->
                                                <div class="modal fade" id="edit{{ $feature->id }}" tabindex="-1" role="dialog"
                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                                    id="exampleModalLabel">
                                                                    Edit Feature Details
                                                                </h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="{{ route('Features.update', 'test') }}" method="post" autocomplete="off" enctype="multipart/form-data">
                                                                    {{ method_field('patch') }}
                                                                    @csrf
                                                                        <input type="hidden" name="id" value="{{ $feature->id }}">
                                                                        <div class="form-row">
                                                                            <div class="col">
                                                                                <label for="title">Name</label>
                                                                                <input type="text" name="name" value="{{ $feature->name }}" class="form-control" required>
                                                                            </div>
                                                                        </div><br>
                                                                        <div class="form-row">
                                                                            <div class="col">
                                                                                <label for="title">Details</label>
                                                                                <textarea name="details" required rows="5" class="form-control">{{ $feature->details }}</textarea>
                                                                            </div>
                                                                        </div> <br>
                                                                        <div class="form-row">
                                                                            <div class="col">
                                                                                <label for="title">Image</label><br>
                                                                                <img src="{{ asset($feature->image) }}" style="width: 60px; height: 50px;"></td>
                                                                                <input type="file" name="image" class="form-control">
                                                                            </div>
                                                                        </div><br><hr>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-dismiss="modal">Close</button>
                                                                        <button type="submit"
                                                                            class="btn btn-info">Edit</button>
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
                                        Add New Feature
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <!-- add_form -->
                                    <form action="{{route('Features.store')}}"  method="post" autocomplete="off" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-row">
                                            <div class="col">
                                                <label for="title">Name</label>
                                                <input type="text" name="name" class="form-control" required>
                                            </div>
                                        </div> <br>
                                        <div class="form-row">
                                            <div class="col">
                                                <label for="title">Details</label>
                                                <textarea name="details" required rows="5" class="form-control"></textarea>
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
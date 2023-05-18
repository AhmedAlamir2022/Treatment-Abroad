<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Testimonials List - Treatment Abroad</title>
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
                            <h4 class="mb-0" style="font-family: 'Cairo', sans-serif;"> Testimonials List</h4>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" class="default-color">Dashboard</a></li>
                                <li class="breadcrumb-item active">Testimonials List</li>
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
                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                                        style="text-align: center">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                            <th>Name</th>
                            <th>Testimoinal</th>
                            <th>Status</th>
                            <th>Added Time</th>
                            <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 0; ?>
                            @foreach ($testimonials as $testimonial)
                                <?php $i++; ?>
																<tr>
																	<td>{{ $i }}</td>
                                                                    <td>{{ $testimonial->name }}</td>
                            <td>{{ $testimonial->testimonial }}</td>
																	<td>@if ($testimonial->status == 0)
																		<button class="btn btn-warning btn-sm">Under Review</button>
                                                                    @elseif ($testimonial->status == 2)
																		<button class="btn btn-danger btn-sm">Rejected</button>
                                                                    @else 
                                                                    <button class="btn btn-success btn-sm"> Accepted</button>
                                                                    @endif</td>
                                                                    <td>{{ Carbon\Carbon::parse($testimonial->created_at)->diffForHumans() }}</td>
                                                                    <td>
																		
                                                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                                        data-target="#delete{{ $testimonial->id }}"
                                                                        title="Delete"><i
                                                                            class="fa fa-trash"></i></button>
                                                                            <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                                                                data-target="#edit{{ $testimonial->id }}"
                                                                                title="Edit"><i class="fa fa-edit"></i></button>
																	</td>
																</tr>
                                                                <!-- delete_modal_specilization -->
                                                <div class="modal fade" id="delete{{ $testimonial->id }}" tabindex="-1" role="dialog"
                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                                    id="exampleModalLabel">
                                                                    Delete Testimonial
                                                                </h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="{{ route('delete.testimonial',$testimonial->id) }}" method="post">
                                                                    @csrf
                                                                    Are You Sure You Want To Delete This Testimonial?
                                                                    <input id="id" type="hidden" name="id" class="form-control"
                                                                        value="{{ $testimonial->id }}">
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

                                                <!-- Edit_modal_specilization -->
                                                <div class="modal fade" id="edit{{ $testimonial->id }}" tabindex="-1" role="dialog"
                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                                    id="exampleModalLabel">
                                                                    Edit Testimonial Status
                                                                </h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="{{ route('edit.testimonial', $testimonial->id) }}" method="post" autocomplete="off">
                                                                    @csrf
                                                                        <div class="form-row">
                                                                            <div class="col">
                                                                                <label for="title">Status</label>
                                                                                <select class="form-control" name="status" required>
                                                                                    <option value="">Choose ...</option>
                                                                                    <option value="1">Accepted</option>
                                                                                    <option value="2">Rejected</option>
                                                                                </select>
                                                                            </div>
                                                                        </div><hr>
                                                                        
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
                </div>
                <!--================================footer -->
                @include('admin.body.footer')
            </div><!-- main content wrapper end-->
        </div>
        <!--=================================footer -->
        @include('admin.body.footer-scripts')
    </body>
</html>


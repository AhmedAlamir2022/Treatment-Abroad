<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Requests List - Treatment Abroad</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="keywords" content="HTML5 Template" />
        <meta name="description" content="Webmin - Bootstrap 4 & Angular 5 Admin Dashboard Template" />
        <meta name="author" content="potenzaglobalsolutions.com" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        @include('fdoctor.body.head')
    </head>
    <body style="font-family: 'Cairo', sans-serif">
        <div class="wrapper">
            @include('fdoctor.body.main-header')
            @include('fdoctor.body.main-sidebar')
            <!-- main-content -->
            <div class="content-wrapper">
                <div class="page-title">
                    <div class="row">
                        <div class="col-sm-6">
                            <h4 class="mb-0" style="font-family: 'Cairo', sans-serif;"> Requests List</h4>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                                <li class="breadcrumb-item"><a href="{{ route('fdoctor.dashboard') }}" class="default-color">Dashboard</a></li>
                                <li class="breadcrumb-item active">Requests List</li>
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
                                                <th>SL</th>
                                                                    <th>Patient</th>
																	<th>N Doctor</th>
																	<th>Test Results</th>
																	<th>NDoctor Details</th>
                                                                    <th>My Approvement</th>
																	<th>My Details</th>
                                                                    <th>Added Date</th>
                                                                    <th>Processes</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 0; ?>
                                                                @foreach ($requests as $request)
                                                                @if($request->fdoctor_id   == Auth::guard('fdoctor')->user()->id)
                                                                    <?php $i++; ?>
																<tr>
																	<td>{{ $i }}</td>
                                                                    <td>{{ $request->users->name }}</td>
                                                                    <td>{{ $request->ndoctors->name }}</td>
                                                                    <td>{{ $request->test_result }}</td>
                                                                    <td>{{ $request->ndoctor_details }}</td>
																	<td>@if ($request->status == NULL)
																		<button class="btn btn-warning btn-sm">You Didn't Approve it Yet</button>
                                                                    @elseif ($request->status == 1)
																		<button class="btn btn-success btn-sm"> Approved</button>
                                                                    @else 
																		<button class="btn btn-danger btn-sm">Rejected</button>
                                                                    @endif</td>
                                                                    <td>{{ $request->fdoctor_details }}</td>
																	<td> {{ Carbon\Carbon::parse($request->created_at)->diffForHumans() }} </td>
                                                                    <td>
                                                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                                                        data-target="#edit{{ $request->id }}"
                                                                        title="Edit"><i class="fa fa-edit"></i></button>
                                                                        
																	</td>
																</tr>
                                                                <!-- Edit_modal_specilization -->
                                                <div class="modal fade" id="edit{{ $request->id }}" tabindex="-1" role="dialog"
                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                                    id="exampleModalLabel">
                                                                    Edit Request
                                                                </h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form method="post" action="{{ route('update.request', $request->id) }}">
                                                                    @csrf
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label>Patient</label>
                                                                                <input class="form-control" type="hidden" name="id" value="{{$request->id}}">
                                                                                <input class="form-control" type="text"  value="{{ $request->users->name }}" readonly>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label>N Doctor</label>
                                                                                <input class="form-control" type="text" value="{{ $request->ndoctors->name }}" readonly>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <div class="form-row">
                                                                                <div class="col">
                                                                                    <label for="title">Test Results</label>
                                                                                    <textarea class="form-control" rows="5" readonly>{{ $request->test_result }}</textarea>
                                                                                </div>
                                                                            </div> 
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <div class="form-row">
                                                                                <div class="col">
                                                                                    <label for="title">N Doctor Details</label>
                                                                                    <textarea class="form-control" rows="5" readonly>{{ $request->ndoctor_details }}</textarea>
                                                                                </div>
                                                                            </div> 
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <div class="form-group">
                                                                                <label>Approvment</label>
                                                                                <select class="form-control select" name="status" required>
                                                                                    <option >Choose ..</option>
                                                                                    <option value="1">Approve</option>
                                                                                    <option value="2">Reject</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <div class="form-group">
                                                                                <label>My Details</label>
                                                                                <textarea class="form-control" rows="5" name="fdoctor_details" required>{{ $request->fdoctor_details }}</textarea>
                                                                            </div>
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

                                                                @endif
                                                            @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--================================footer -->
                @include('fdoctor.body.footer')
            </div><!-- main content wrapper end-->
        </div>
        <!--=================================footer -->
        @include('fdoctor.body.footer-scripts')
    </body>
</html>


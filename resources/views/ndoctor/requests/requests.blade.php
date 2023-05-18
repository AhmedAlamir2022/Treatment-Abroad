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
                            <h4 class="mb-0" style="font-family: 'Cairo', sans-serif;"> Requests List</h4>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                                <li class="breadcrumb-item"><a href="{{ route('ndoctor.dashboard') }}" class="default-color">Dashboard</a></li>
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
                                <button type="button" class="button x-small" data-toggle="modal" data-target="#exampleModal">
                                    Add New Requests</button><br><br>
                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                                        style="text-align: center">
                                        <thead>
                                            <tr>
                                                <th>SL</th>
                                                                    <th>Patient</th>
																	<th>F Doctor</th>
																	<th>Test Results</th>
																	<th>My Details</th>
                                                                    <th>FDoctor Approvement</th>
																	<th>FDoctor Details</th>
                                                                    <th>Added Date</th>
                                                                    <th>Processes</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 0; ?>
                                                                @foreach ($requests as $request)
                                                                @if($request->ndoctor_id  == Auth::guard('ndoctor')->user()->id)
                                                                    <?php $i++; ?>
																<tr>
																	<td>{{ $i }}</td>
                                                                    <td>{{ $request->users->name }}</td>
                                                                    <td>{{ $request->fdoctors->name }}</td>
                                                                    <td>{{ $request->test_result }}</td>
                                                                    <td>{{ $request->ndoctor_details }}</td>
																	<td>@if ($request->status == NULL)
																		<button class="btn btn-warning btn-sm">F Doctor Didn't Respond Yet</button>
                                                                    @elseif ($request->status == 1)
																		<button class="btn btn-success btn-sm"> Approved</button>
                                                                    @else 
																		<button class="btn btn-danger btn-sm">Rejected</button>
                                                                    @endif</td>
                                                                    <td>{{ $request->fdoctor_details }}</td>
																	<td> {{ Carbon\Carbon::parse($request->created_at)->diffForHumans() }} </td>
                                                                    <td>
                                                                        <a href="{{ route('delete.request',$request->id) }}" title="Delete" class="btn btn-danger btn-sm" role="button" aria-pressed="true">Delete</a>
																	</td>
																</tr>
                                                                @endif
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
                                        Add New Request
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <!-- add_form -->
                                    <form action="{{ route('store.request') }}"  method="post" autocomplete="off">
                                        @csrf
                                        <div class="form-row">
                                            <div class="col">
                                                <label for="title">Patient Name</label>
                                                <select class="form-control select" name="user_id" required>
                                                    <option >Choose ..</option>
                                                    @foreach ($users as $user)
                                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div> <br>
                                        <div class="form-row">
                                            <div class="col">
                                                <label for="title">F Doctor Name</label>
                                                <select class="form-control select" name="fdoctor_id" required>
                                                    <option >Choose ..</option>
                                                    @foreach ($fdoctors as $fdoctor)
                                                        <option value="{{ $fdoctor->id }}">{{ $fdoctor->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div> <br>
                                        <div class="form-row">
                                            <div class="col">
                                                <label for="title">Test Results</label>
                                                <textarea class="form-control" rows="5" name="test_result" required></textarea>
                                            </div>
                                        </div> <br>
                                        <div class="form-row">
                                            <div class="col">
                                                <label for="title">My Details</label>
                                                <textarea class="form-control" rows="5" name="ndoctor_details" required></textarea>
                                            </div>
                                        </div> <br><hr>
                                        <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">Add New Request</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--================================footer -->
                @include('ndoctor.body.footer')
            </div><!-- main content wrapper end-->
        </div>
        <!--=================================footer -->
        @include('ndoctor.body.footer-scripts')
    </body>
</html>


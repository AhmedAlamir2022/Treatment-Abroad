<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Tests List - Treatment Abroad</title>
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
                            <h4 class="mb-0" style="font-family: 'Cairo', sans-serif;"> Tests List</h4>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                                <li class="breadcrumb-item"><a href="{{ route('ndoctor.dashboard') }}" class="default-color">Dashboard</a></li>
                                <li class="breadcrumb-item active">Tests List</li>
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
                                    Add New Test</button><br><br>
                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                                        style="text-align: center">
                                        <thead>
                                            <tr>
                                                <th>SL</th>
                                                                    <th>Patient</th>
																	<th>Test Date</th>
																	<th>Approvment</th>
																	<th>Doctor Remark</th>
                                                                    <th>Added Date</th>
                                                                    <th>Processes</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 0; ?>
                                                                @foreach ($tests as $test)
                                                                @if($test->doctor_id == Auth::guard('ndoctor')->user()->id)
                                                                    <?php $i++; ?>
																<tr>
																	<td>{{ $i }}</td>
                                                                    <td>{{ $test->users->name }}</td>
																	<td>{{ $test->date }}</td>
																	<td>@if ($test->approvment == NULL)
																		<button class="btn btn-warning btn-sm">Patient Didn't Test Yet</button>
                                                                    @elseif ($test->approvment == 1)
																		<button class="btn btn-success btn-sm"> Approved</button>
                                                                    @else 
																		<button class="btn btn-danger btn-sm">Rejected</button>
                                                                    @endif</td>
                                                                    <td>{{ $test->details }}</td>
																	<td> {{ Carbon\Carbon::parse($test->created_at)->diffForHumans() }} </td>
                                                                    <td>
																		
																		<button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                                                        data-target="#edit{{ $test->id }}"
                                                                        title="Edit"><i class="fa fa-edit"></i></button>
																		
                                                                        <a href="{{ route('delete.test',$test->id) }}" title="Delete" class="btn btn-danger btn-sm" role="button" aria-pressed="true">Delete</a>
																	</td>
																</tr>
                                                                <!-- Edit_modal_specilization -->
                                                <div class="modal fade" id="edit{{ $test->id }}" tabindex="-1" role="dialog"
                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                                    id="exampleModalLabel">
                                                                    Edit Test Info
                                                                </h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="{{ route('update.test', $test->id) }}" method="post" autocomplete="off">
                                                                    @csrf
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label>Patient</label>
                                                                                <input class="form-control" type="hidden" name="id" value="{{$test->id}}">
                                                                                <input class="form-control" type="text"  value="{{ $test->users->name }}" readonly>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label>Date</label>
                                                                                <input class="form-control" type="date" value="{{ $test->date }}" readonly>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <div class="form-group">
                                                                                <label>Approvment</label>
                                                                                <select class="form-control select" name="approvment" required>
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
                                                                                <label>Details</label>
                                                                                <textarea class="form-control" rows="5" name="details" required>{{ $test->details }}</textarea>
                                                                            </div>
                                                                        </div>
                                                                    </div><br><br><hr>
                                                                        
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
                    <!-- add_modal_Grade -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                                        Add New Test
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <!-- add_form -->
                                    <form action="{{ route('store.test') }}"  method="post" autocomplete="off">
                                        @csrf
                                        <div class="form-row">
                                            <div class="col">
                                                <label for="title">Name</label>
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
                                                <label for="title">Date</label>
                                                <input type="date" name="date" class="form-control" required>
                                            </div>
                                        </div> <br><hr>
                                        <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">Add New Test</button>
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


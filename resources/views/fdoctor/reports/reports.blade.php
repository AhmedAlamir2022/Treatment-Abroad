<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Reports List - Treatment Abroad</title>
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
                            <h4 class="mb-0" style="font-family: 'Cairo', sans-serif;"> Reports List</h4>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                                <li class="breadcrumb-item"><a href="{{ route('fdoctor.dashboard') }}" class="default-color">Dashboard</a></li>
                                <li class="breadcrumb-item active">Reports List</li>
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
                                    Add New Report</button><br><br>
                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                                        style="text-align: center">
                                        <thead>
                                            <tr>
                                                <th>SL</th>
                                                                    <th>Patient</th>
																	<th>N Doctor</th>
                                                                    <th>Processes</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 0; ?>
                                                                @foreach ($reports as $report)
                                                                @if($report->fdoctor_id   == Auth::guard('fdoctor')->user()->id)
                                                                    <?php $i++; ?>
																<tr>
																	<td>{{ $i }}</td>
                                                                    <td>{{ $report->users->name }}</td>
                                                                    <td>{{ $report->ndoctors->name }}</td>
                                                                    <td>
                                                                        <a href="{{ route('delete.report',$report->id) }}" title="Delete" class="btn btn-danger btn-sm" role="button" aria-pressed="true">Delete</a>
                                                                        <a href="{{ route('print.report2',$report->id) }}" target="_blank"><button type="button" class="btn btn-warning btn-sm" title="View"><i class="fa fa-print"></i></button> </a>
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
                                        Add New Report
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <!-- add_form -->
                                    <form action="{{ route('store.report') }}"  method="post" autocomplete="off">
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
                                                <label for="title">N Doctor Name</label>
                                                <select class="form-control select" name="ndoctor_id" required>
                                                    <option >Choose ..</option>
                                                    @foreach ($ndoctors as $ndoctor)
                                                        <option value="{{ $ndoctor->id }}">{{ $ndoctor->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div> <br>
                                        <div class="form-row">
                                            <div class="col">
                                                <label for="title">Start Date</label>
                                                <input type="date" class="form-control" name="start_date" required>
                                            </div>
                                        </div> <br>
                                        <div class="form-row">
                                            <div class="col">
                                                <label for="title">End Date</label>
                                                <input type="date" class="form-control" name="end_date" required>
                                            </div>
                                        </div> <br>
                                        <div class="form-row">
                                            <div class="col">
                                                <label for="title">My Details</label>
                                                <textarea class="form-control" rows="5" name="details" required></textarea>
                                            </div>
                                        </div> <br><hr>
                                        <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">Add New Report</button>
                                    </form>
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


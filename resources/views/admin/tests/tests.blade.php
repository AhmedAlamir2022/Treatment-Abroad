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
                            <h4 class="mb-0" style="font-family: 'Cairo', sans-serif;"> Tests List</h4>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" class="default-color">Dashboard</a></li>
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
                                
                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                                        style="text-align: center">
                                        <thead>
                                            <tr>
                                                <th>SL</th>
                                                                    <th>Patient</th>
                                                                    <th>Doctor</th>
																	<th>Test Date</th>
																	<th>Doctor Approvment</th>
																	<th>Doctor Remark</th>
                                                                    <th>Added Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 0; ?>
                                                                @foreach ($tests as $test)
                                                                    <?php $i++; ?>
																<tr>
																	<td>{{ $i }}</td>
                                                                    <td>{{ $test->users->name }}</td>
                                                                    <td>{{ $test->ndoctors->name }}</td>
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
                                                                    
																</tr>
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


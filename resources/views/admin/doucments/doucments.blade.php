<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Doucments List - Treatment Abroad</title>
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
                            <h4 class="mb-0" style="font-family: 'Cairo', sans-serif;"> Doucments List</h4>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" class="default-color">Dashboard</a></li>
                                <li class="breadcrumb-item active">Doucments List</li>
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
                                                                    
																	<th>Doucment</th>
																	<th>Doctor Agreement</th>
																	<th>Admin Agreement</th>
                                                                    <th>Added Date</th>
                                                                    <th>Processes</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 0; ?>
                                                                @foreach ($doucments as $doucmentss)
                                                                    <?php $i++; ?>
																<tr>
																	<td>{{ $i }}</td>
                                                                    
																	<td>{{ $doucmentss->doucment }}</</td>
																	<td>@if ($doucmentss->dr_agreement == NULL)
																		<button class="btn btn-warning btn-sm">Doctor Didn't Agree Yet</button>
                                                                    @elseif ($doucmentss->dr_agreement == 1)
																		<button class="btn btn-success btn-sm"> Approved</button>
                                                                    @else 
																		<button class="btn btn-danger btn-sm">Rejected</button>
                                                                    @endif</td>
                                                                    <td>@if ($doucmentss->admin_agreement == NULL)
																		<button class="btn btn-warning btn-sm">You Didn't Agree Yet</button>
                                                                    @elseif ($doucmentss->admin_agreement == 1)
																		<button class="btn btn-success btn-sm"> Approved</button>
                                                                    @else 
																		<button class="btn btn-danger btn-sm">Rejected</button>
                                                                    @endif</td>
																	<td> {{ Carbon\Carbon::parse($doucmentss->created_at)->diffForHumans() }} </td>
                                                                    <td>
																		
                                                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                                                        data-target="#edit{{ $doucmentss->id }}"
                                                                        title="Edit"><i class="fa fa-edit"></i></button>
																		
                                                                        <a href="{{route('downloadAttachment1',$doucmentss->doucment)}}" title="Downlod" class="btn btn-warning btn-sm" role="button" aria-pressed="true"><i class="ti-download"></i></a>
																	</td>
																</tr>
                                                                <!-- Edit_modal_specilization -->
                                                <div class="modal fade" id="edit{{ $doucmentss->id }}" tabindex="-1" role="dialog"
                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                                    id="exampleModalLabel">
                                                                    Edit Doucment Status
                                                                </h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="{{ route('update.doucment', $doucmentss->id) }}" method="post" autocomplete="off">
                                                                    @csrf
                                                                        <div class="form-row">
                                                                            <div class="col">
                                                                                <label for="title">Status</label>
                                                                                <input class="form-control" type="hidden" name="id" value="{{$doucmentss->id}}">
                                                                                <select class="form-control select" name="admin_agreement" required>
                                                                                    <option >Choose ..</option>
                                                                                    <option value="1">Approve</option>
                                                                                    <option value="2">Reject</option>
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


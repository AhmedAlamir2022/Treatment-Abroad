<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Complaints List - Treatment Abroad</title>
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
                            <h4 class="mb-0" style="font-family: 'Cairo', sans-serif;"> Complaints List</h4>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                                <li class="breadcrumb-item"><a href="{{ route('ndoctor.dashboard') }}" class="default-color">Dashboard</a></li>
                                <li class="breadcrumb-item active">Complaints List</li>
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
																	<th>Complaint</th>
																	<th>Remark</th>
																	<th>Added Date</th>
                                                                    <th>Processes</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php($i = 1)
                                                                @foreach($complaints as $key => $item)
                                                                    @if($item->doctor_id == Auth::guard('ndoctor')->user()->id)
																<tr>
                                                                    <td> {{ $i++}} </td>
                                                                    <td>{{ $item->users->name }}</td>
																	<td>{{ $item->complaint }}</td>
																	<td>@if ($item->respond == NULL)
																		<button class="btn btn-danger btn-sm">You Didn't Respond Yet</button>
                                                                    @else
                                                                        <p>{{ $item->respond }} </p>
                                                                    @endif</td>
																	<td> {{ Carbon\Carbon::parse($item->created_at)->diffForHumans() }} </td>
																	<td>
																		
                                                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                                                        data-target="#edit{{ $item->id }}"
                                                                        title="Edit"><i class="fa fa-edit"></i></button>
																	</td>
                                                    
                                                </tr>
                                                <!-- Edit_modal_specilization -->
                                                <div class="modal fade" id="edit{{ $item->id }}" tabindex="-1" role="dialog"
                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                                    id="exampleModalLabel">
                                                                    Edit Complaint
                                                                </h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="{{route('Complaints.update','test')}}" method="post" autocomplete="off">
                                                                    {{ method_field('patch') }}
                                                                    @csrf
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <div class="form-group">
                                                                                <label>Complaint</label>
                                                                                <input class="form-control" type="hidden" name="id" value="{{$item->id}}">
                                                                                <textarea class="form-control" rows="3" readonly>{{$item->complaint}}</textarea>
                                                                            </div>
                                                                        </div>
                                                                    </div><br>
                                            
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <div class="form-group">
                                                                                <label>Doctor Respond</label>
                                                                                <textarea class="form-control" name="respond" rows="5" required>{{$item->respond}}</textarea>
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
                @include('ndoctor.body.footer')
            </div><!-- main content wrapper end-->
        </div>
        <!--=================================footer -->
        @include('ndoctor.body.footer-scripts')
    </body>
</html>
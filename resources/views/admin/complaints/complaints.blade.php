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
                            <h4 class="mb-0" style="font-family: 'Cairo', sans-serif;"> Complaints List</h4>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" class="default-color">Dashboard</a></li>
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
                                                <th>#</th>
                                                <th>Patient</th>
                                                <th>Doctor</th>
                                                <th>Patient Complaint</th>
                                                <th>Doctor Respond</th>
                                                <th>Added Date</th>
                                                <th>Processes</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 0; ?>
                                            @foreach ($complaints as $complaint)
                                                <tr>
                                                    <?php $i++; ?>
                                                    <td>{{ $i }}</td>
                                                    <td>{{ $complaint->users->name }}</td>
                                                    <td>{{ $complaint->ndoctors->name }}</td>
                                                    <td>{{ $complaint->complaint }}</td>
                                                    <td>@if ($complaint->respond == NULL)
                                                        <p>Dr Didn't Respond Yet </p>
                                                    @else
                                                        <p>{{ $complaint->respond }} </p>
                                                    @endif</td>
                                                    <td>{{ Carbon\Carbon::parse($complaint->created_at)->diffForHumans() }}</td>
                                                    <td>
                                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                            data-target="#delete{{ $complaint->id }}"
                                                            title="Delete"><i
                                                                class="fa fa-trash"></i></button>
                                                    </td>
                                                </tr>

                                                <!-- delete_modal_rate -->
                                                <div class="modal fade" id="delete{{ $complaint->id }}" tabindex="-1" role="dialog"
                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                                    id="exampleModalLabel">
                                                                    Delete Complaint
                                                                </h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="{{ route('Complaints.destroy', 'test') }}" method="post">
                                                                    {{ method_field('Delete') }}
                                                                    @csrf
                                                                    Are You Sure You Want To Delete This Complaint?
                                                                    <input id="id" type="hidden" name="id" class="form-control"
                                                                        value="{{ $complaint->id }}">
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
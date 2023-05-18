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
        @include('patient.body.head')
    </head>
    <body style="font-family: 'Cairo', sans-serif">
        <div class="wrapper">
            @include('patient.body.main-header')
            @include('patient.body.main-sidebar')
            <!-- main-content -->
            <div class="content-wrapper">
                <div class="page-title">
                    <div class="row">
                        <div class="col-sm-6">
                            <h4 class="mb-0" style="font-family: 'Cairo', sans-serif;"> Testimonials List</h4>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="default-color">Dashboard</a></li>
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
								<button type="button" class="button x-small" data-toggle="modal" data-target="#exampleModal">
                                    Add New Testimonial</button><br><br>
                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                                        style="text-align: center">
                                        <thead>
                                            <tr>
                                                <th>SL</th>
												<th>Testimonial</th>
												<th>Status</th>
												<th>ADded Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 0; ?>
                                            @foreach($testimonials as $key => $item)
                                            @if($item->user_id == Auth::user()->id)
                                                                    <?php $i++; ?>
                                                <tr>
                                                    <td>{{ $i }}</td>
																	<td>{{ $item->testimonial }}</</td>
																	<td>@if ($item->status == 0)
																		<button class="btn btn-warning btn-sm">Under Review</button>
                                                                    @elseif ($item->status == 2)
																		
                                                                        <button class="btn btn-danger btn-sm">Rejected</button>
                                                                    @else 
                                                                    <button class="btn btn-success btn-sm">Accepted</button>
                                                                    @endif</td>
																	<td> {{ Carbon\Carbon::parse($item->created_at)->diffForHumans() }} </td>
																	
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
                                        Add New Testimonial
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <!-- add_form -->
                                    <form action="{{ route('store.testimonial') }}"  method="post" autocomplete="off">
                                        @csrf
                                        <div class="form-row">
                                            <div class="col">
                                                <label for="title">Testimonial</label>
                                                <textarea rows="6" class="form-control" name="testimonial" required></textarea>
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
                @include('patient.body.footer')
            </div><!-- main content wrapper end-->
        </div>
        <!--=================================footer -->
        @include('patient.body.footer-scripts')
    </body>
</html>
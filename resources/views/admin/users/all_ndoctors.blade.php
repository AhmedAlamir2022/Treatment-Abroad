<!DOCTYPE html>
<html lang="en">
    <head>
        <title>National Drs List - Treatment Abroad</title>
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
                            <h4 class="mb-0" style="font-family: 'Cairo', sans-serif;"> National Drs List</h4>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" class="default-color">Dashboard</a></li>
                                <li class="breadcrumb-item active">National Drs List</li>
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
                                    Add New National Dr</button><br><br>
                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                                        style="text-align: center">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Hospital</th>
                                                <th>Specialization</th>
                                                <th>Added Date</th>
                                                <th>Processes</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 0; ?>
                                            @foreach ($ndoctors as $user)
                                                <tr>
                                                    <?php $i++; ?>
                                                    <td>{{ $i }}</td>
                                                    <td>{{ $user->name }}</td>
                                                    <td>{{ $user->hospitals->title }}</td>
                                                    <td>{{ $user->specializations->name  }}</td>
                                                    <td>{{ Carbon\Carbon::parse($user->created_at)->diffForHumans() }}</td>
                                                    <td>
                                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                                            data-target="#edit{{ $user->id }}"
                                                            title="Edit"><i class="fa fa-edit"></i></button>
                                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                            data-target="#delete{{ $user->id }}"
                                                            title="Delete"><i
                                                                class="fa fa-trash"></i></button>
                                                                <button type="button" class="btn btn-warning btn-sm" data-toggle="modal"
                                                            data-target="#view{{ $user->id }}"
                                                            title="View"><i
                                                                class="fa fa-book"></i></button>
                                                    </td>
                                                </tr>

                                                <!-- delete_modal_user -->
                                                <div class="modal fade" id="delete{{ $user->id }}" tabindex="-1" role="dialog"
                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                                    id="exampleModalLabel">
                                                                    Delete National Dr
                                                                </h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="{{ route('delete.nationaldr',$user->id) }}" method="post">
                                                                    @csrf
                                                                    Are You Sure You Want To Delete This National Dr?
                                                                    <input id="id" type="hidden" name="id" class="form-control"
                                                                        value="{{ $user->id }}">
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
                                                <!-- Edit_modal_user -->
                                                <div class="modal fade" id="edit{{ $user->id }}" tabindex="-1" role="dialog"
                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                                    id="exampleModalLabel">
                                                                    Edit National DR Details
                                                                </h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="{{ route('edit.nationaldr',$user->id) }}" method="post" autocomplete="off" enctype="multipart/form-data">
                                                                    @csrf
                                                                        <div class="form-row">
                                                                            <div class="col">
                                                                                <input type="hidden" name="id" value="{{ $user->id }}">
                                                                                <label for="title">Name</label>
                                                                                <input type="text" name="name" value="{{ $user->name }}" class="form-control" required>
                                                                            </div>
                                                                            <div class="col">
                                                                                <label for="title">Email Address</label>
                                                                                <input type="email" name="email" value="{{ $user->email }}" class="form-control" required>
                                                                            </div>
                                                                        </div><br>
                                                                        <div class="form-row">
                                                                            <div class="col">
                                                                                <label for="title">Password</label>
                                                                                <input type="password" name="password" value="{{ $user->password }}" class="form-control" required>
                                                                            </div>
                                                                        </div><br>
                                                                        <div class="form-row">
                                                                            <div class="col">
                                                                                <label for="title">User Name</label>
                                                                                <input type="text" name="username" value="{{ $user->username }}" class="form-control" required>
                                                                            </div>
                                                                            <div class="col">
                                                                                <label for="title">Mobile Number</label>
                                                                                <input type="number" name="contact" value="{{ $user->contact }}" class="form-control" required>
                                                                            </div>
                                                                        </div><br>
                                                                        <div class="form-row">
                                                                            <div class="col">
                                                                                <label for="title">Hospital</label>
                                                                                <select class="form-control select" name="hospital_id" required>
                                                                                    <option value="{{ $user->hospital_id }}">{{ $user->hospitals->title }}</option>
                                                                                    @foreach ($hospitals as $hospital)
                                                                                        <option value="{{ $hospital->id }}">{{ $hospital->title }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                            <div class="col">
                                                                                <label for="title">Specialization</label>
                                                                                <select class="form-control select" name="specialization_id" required>
                                                                                    <option value="{{ $user->specialization_id }}">{{ $user->specializations->name  }}</option>
                                                                                    @foreach ($specializationss as $specialization)
                                                                                        <option value="{{ $specialization->id }}">{{ $specialization->name }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                        </div><br>
                                                                        <div class="form-row">
                                                                            <div class="form-group col">
                                                                                <label for="inputState">Gender</label>
                                                                                <select class="custom-select mr-sm-2" name="gender" >
                                                                                    <option selected value="{{ $user->gender }}">{{ $user->gender }}</option>
                                                                                    @foreach($genders as $gender)
                                                                                        <option value="{{ $gender->Name }}">{{ $gender->Name }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group col">
                                                                                <label for="inputState">Nationality</label>
                                                                                <select class="custom-select mr-sm-2" name="nationality" >
                                                                                    <option selected value="{{ $user->nationality }}">{{ $user->nationality }}</option>
                                                                                    @foreach($nationalites as $nationalite)
                                                                                        <option value="{{ $nationalite->Name }}">{{ $nationalite->Name }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div><br>
                                                                        </div>
                                                                        <div class="form-row">
                                                                            <div class="form-group col">
                                                                                <label for="inputState">Blood Type</label>
                                                                                <select class="custom-select mr-sm-2" name="bloodtype" >
                                                                                    <option selected value="{{ $user->bloodtype }}">{{ $user->bloodtype }}.</option>
                                                                                    @foreach($type_bloods as $type_blood)
                                                                                        <option value="{{ $type_blood->Name }}">{{ $type_blood->Name }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group col">
                                                                                <label for="inputState">Religion</label>
                                                                                <select class="custom-select mr-sm-2" name="religion" >
                                                                                    <option selected value="{{ $user->religion }}">{{ $user->religion }}.</option>
                                                                                    @foreach($religions as $religion)
                                                                                        <option value="{{ $religion->Name }}">{{ $religion->Name }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                        </div><br>
                                                                        <div class="form-row">
                                                                            <div class="col">
                                                                                <label for="title">Address</label>
                                                                                <textarea class="form-control" rows="3" name="address" >{{ $user->address }}</textarea>
                                                                            </div>
                                                                        </div><br>
                                                                        <div class="form-row">
                                                                            <div class="col">
                                                                                <label for="title">Country</label>
                                                                                <input type="text" name="country" value="{{ $user->country }}" class="form-control" >
                                                                            </div>
                                                                            <div class="col">
                                                                                <label for="title">City</label>
                                                                                <input type="text" name="city" value="{{ $user->city }}" class="form-control" >
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-row">
                                                                            <div class="col">
                                                                                <label for="title">Doctor Image</label>
                                                                                <img class="form-control" readonly src="{{ asset($user->doctor_image) }}" style="width: 100px; height: 100px;">
                                                                                <input type="file" name="doctor_image" class="form-control" >
                                                                            </div>
                                                                        </div>
                                                                        <br><hr>
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

                                                <!-- View_modal_user -->
                                                <div class="modal fade" id="view{{ $user->id }}" tabindex="-1" role="dialog"
                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                                    id="exampleModalLabel">
                                                                    View National Dr Details
                                                                </h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form>
                                                                    <div class="form-row">
                                                                        <div class="col">
                                                                            <label for="title">Name</label>
                                                                            <input type="text" value="{{ $user->name }}" class="form-control" readonly>
                                                                        </div>
                                                                        <div class="col">
                                                                                <label for="title">Email Address</label>
                                                                                <input type="email" value="{{ $user->email }}" class="form-control" readonly>
                                                                        </div>
                                                                    </div><br>
                                                                    <div class="form-row">
                                                                        <div class="col">
                                                                            <label for="title">Hospital</label>
                                                                            <input type="text" value="{{ $user->hospitals->title }}" class="form-control" readonly>
                                                                        </div>
                                                                        <div class="col">
                                                                            <label for="title">Specialization</label>
                                                                            <input type="text" value="{{ $user->specializations->name  }}" class="form-control" readonly>
                                                                        </div>
                                                                    </div><br>
                                                                        <div class="form-row">
                                                                            <div class="col">
                                                                                <label for="title">User Name</label>
                                                                                <input type="text" value="{{ $user->username }}" class="form-control" readonly>
                                                                            </div>
                                                                            <div class="col">
                                                                                <label for="title">Mobile Number</label>
                                                                                <input type="number" value="{{ $user->contact }}" class="form-control" readonly>
                                                                            </div>
                                                                            <div class="form-group col">
                                                                                <label for="inputState">Religion</label>
                                                                                <input type="text" value="{{ $user->religion }}" class="form-control" readonly>
                                                                            </div>
                                                                        </div><br>
                                                                        <div class="form-row">
                                                                            <div class="form-group col">
                                                                                <label for="inputState">Gender</label>
                                                                                <input type="text" value="{{ $user->gender }}" class="form-control" readonly>
                                                                            </div>
                                                                            <div class="form-group col">
                                                                                <label for="inputState">Nationality</label>
                                                                                <input type="text" value="{{ $user->nationality }}" class="form-control" readonly>
                                                                            </div>
                                                                            <div class="form-group col">
                                                                                <label for="inputState">Blood Type</label>
                                                                                <input type="text" value="{{ $user->bloodtype }}" class="form-control" readonly>
                                                                            </div>
                                                                        </div><br>
                                                                        <div class="form-row">
                                                                            <div class="col">
                                                                                <label for="title">Address</label>
                                                                                <textarea class="form-control" rows="3" readonly>{{ $user->address }}</textarea>
                                                                            </div>
                                                                        </div><br>
                                                                        <div class="form-row">
                                                                            <div class="col">
                                                                                <label for="title">Country</label>
                                                                                <input type="text" value="{{ $user->country }}" class="form-control" readonly>
                                                                            </div>
                                                                            <div class="col">
                                                                                <label for="title">City</label>
                                                                                <input type="text" value="{{ $user->city }}" class="form-control" readonly>
                                                                            </div>
                                                                        </div><br>
                                                                        <div class="form-row">
                                                                            <div class="col">
                                                                                <label for="title">Image</label>
                                                                                <img class="form-control" readonly src="{{ asset($user->doctor_image) }}" style="width: 100px; height: 100px;">
                                                                            </div>
                                                                        </div><br><hr>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-dismiss="modal">Close</button>
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
                    <!-- add_modal_Grade -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                                        Add New National Dr
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <!-- add_form -->
                                    <form action="{{ route('add.nationaldr') }}"  method="post" autocomplete="off" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-row">
                                            <div class="col">
                                                <label for="title">Name</label>
                                                <input type="text" name="name" class="form-control" required>
                                            </div>
                                            <div class="col">
                                                <label for="title">Email Address</label>
                                                <input type="email" name="email" class="form-control" required>
                                            </div>
                                        </div> <br>
                                        <div class="form-row">
                                            <div class="col">
                                                <label for="title">Password</label>
                                                <input type="password" name="password" class="form-control" required>
                                            </div>
                                        </div> <br>
                                        <div class="form-row">
                                            <div class="col">
                                                <label for="title">Hospital</label>
                                                <select class="form-control select" name="hospital_id" required>
                                                    <option value="">Choose ......</option>
                                                    @foreach ($hospitals as $hospital)
                                                        <option value="{{ $hospital->id }}">{{ $hospital->title }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col">
                                                <label for="title">Specialization</label>
                                                <select class="form-control select" name="specialization_id" required>
                                                    <option value="">Choose ......</option>
                                                    @foreach ($specializationss as $specialization)
                                                        <option value="{{ $specialization->id }}">{{ $specialization->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div><br>
                                        <div class="form-row">
                                            <div class="col">
                                                <label for="title">User Name</label>
                                                <input type="text" name="username" class="form-control" required>
                                            </div>
                                            <div class="col">
                                                <label for="title">Mobile Number</label>
                                                <input type="number" name="contact" class="form-control" required>
                                            </div>
                                        </div><br>
                                        <div class="form-row">
                                            <div class="form-group col">
                                                <label for="inputState">Gender</label>
                                                <select class="custom-select mr-sm-2" name="gender" required>
                                                    <option selected disabled>Choose ...</option>
                                                    @foreach($genders as $gender)
                                                        <option value="{{ $gender->Name }}">{{ $gender->Name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group col">
                                                <label for="inputState">Nationality</label>
                                                <select class="custom-select mr-sm-2" name="nationality" required>
                                                    <option selected disabled>Choose ...</option>
                                                    @foreach($nationalites as $nationalite)
                                                        <option value="{{ $nationalite->Name }}">{{ $nationalite->Name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div><br>
                                        <div class="form-row">
                                            <div class="form-group col">
                                                <label for="inputState">Blood Type</label>
                                                <select class="custom-select mr-sm-2" name="bloodtype" required>
                                                    <option selected disabled>Choose ...</option>
                                                    @foreach($type_bloods as $type_blood)
                                                        <option value="{{ $type_blood->Name }}">{{ $type_blood->Name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group col">
                                                <label for="inputState">Religion</label>
                                                <select class="custom-select mr-sm-2" name="religion" required>
                                                    <option selected disabled>Choose ...</option>
                                                    @foreach($religions as $religion)
                                                        <option value="{{ $religion->Name }}">{{ $religion->Name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div><br>
                                        <div class="form-row">
                                            <div class="col">
                                                <label for="title">Address</label>
                                                <textarea class="form-control" rows="3" name="address" required></textarea>
                                            </div>
                                        </div><br>
                                        <div class="form-row">
                                            <div class="col">
                                                <label for="title">Country</label>
                                                <input type="text" name="country" class="form-control" required>
                                            </div>
                                            <div class="col">
                                                <label for="title">City</label>
                                                <input type="text" name="city" class="form-control" required>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="form-row">
                                            <div class="col">
                                                <label for="title">Doctor Image</label>
                                                <input type="file" name="doctor_image" class="form-control" required>
                                            </div>
                                        </div>
                                        <br><hr>
                                        <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">Add New</button>
                                    </form>
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
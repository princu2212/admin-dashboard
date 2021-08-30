@extends('layouts.base')
@section('user-table')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>User Table</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="/home">Home</a>
                </li>
                <li class="active">
                    <strong>User Table</strong>
                </li>
            </ol>
        </div>
        <div class="col-lg-2">

        </div>
    </div>
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Users Information</h5>
                    </div>
                    <div class="ibox-content">
                        <div class="text-right">
                            <a href="#modal-form" data-toggle="modal" class="btn btn-primary"><i class="fa fa-plus"></i> Add
                                User</a>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-hover table-bordered dataTables-example">
                                <thead class="text-center">
                                    <tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Contact No.</th>
                                        <th>Gender</th>
                                        <th>Image</th>
                                        <th>Class</th>
                                        <th>Status</th>
                                        <th>Created_by</th>
                                        <th>Created_at</th>
                                        <th>Modified_By</th>
                                        <th>Modified_By</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $user->id }}</td>
                                            <td><strong>{{ $user->name }}</strong></td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->contact_no }}</td>
                                            <td>{{ $user->gender }}</td>
                                            <td><img src="{{ asset('user-uploads/users/' . $user->profile_photo) }}"
                                                    alt="" style="width: 5rem; height:3rem"></td>
                                            <td>{{ $user->class }}</td>
                                            <td>
                                                <span
                                                    class="badge badge-{{ $user->status == 'active' ? 'primary' : 'danger' }}">{{ $user->status }}</span>
                                            </td>
                                            <td><strong>{{ $user->created_by }}</strong></td>
                                            <td>{{ $user->created_at }}</td>
                                            <td><strong>{{ $user->modified_by }}</strong></td>
                                            <td>{{ $user->modified_at }}</td>
                                            <td>
                                                <a href="{{ route('edit', $user->id) }}"
                                                    class="btn btn-outline btn-warning"><i class="fa fa-edit"></i></a>
                                                <form action="{{ route('destroy', $user->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-outline btn-danger"><i
                                                            class="fa fa-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    {{-- Modal --}}
                    <div id="modal-form" class="modal fade" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h3 class="modal-title" id="staticBackdropLabel">Add New User</h3>
                                </div>

                                <div class="modal-body">
                                    <form class="form-horizontal mx-auto" action="{{ route('store') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group mb-3">
                                            <label class="control-label col-sm-2" for="name">Name:</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="name" placeholder="Enter name"
                                                    name="name">
                                            </div>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label class="control-label col-sm-2" for="email">Email:</label>
                                            <div class="col-sm-10">
                                                <input type="email" class="form-control" id="email"
                                                    placeholder="Enter email" name="email">
                                            </div>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label class="control-label col-sm-2" for="password">Password:</label>
                                            <div class="col-sm-10">
                                                <input type="password" class="form-control" id="password"
                                                    placeholder="Enter password" name="password">
                                            </div>
                                        </div>
                                        <div class="form-group mb-3">
                                            <div class="d-flex">
                                                <label class="control-label col-sm-2" for="gender">Gender:</label>
                                                <div class="col-sm-10">
                                                    <div class="d-flex">
                                                        <div class="radio px-3">
                                                            <input type="radio" name="gender" value="male" checked>Male
                                                        </div>
                                                        <div class="radio px-3">
                                                            <input type="radio" name="gender" value="female">Female
                                                        </div>
                                                        <div class="radio">
                                                            <input type="radio" name="gender" value="other">Other
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2">Contact No:</label>
                                            <div class="col-sm-10">
                                                <input type="number" class="form-control" id="contact_no"
                                                    placeholder="Enter contact number" name="contact_no">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2">Image:</label>
                                            <div class="col-sm-10">
                                                <input type="file" name="profile_photo" id="profile_photo">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-2">Class:</label>
                                            <div class="col-sm-10">
                                                <select class="form-control" name="class">
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2">Status:</label>
                                            <div class="col-sm-10">
                                                <select class="form-control" name="status">
                                                    <option value="1">Active</option>
                                                    <option value="2">In Active</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group mb-3">
                                            <label class="control-label col-sm-2">Created_By:</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="created_by"
                                                    placeholder="Enter name" name="created_by">
                                            </div>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label class="control-label col-sm-2">Modified_By:</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="modified_by"
                                                    placeholder="Enter name" name="modified_by">
                                            </div>
                                        </div>
                                </div>
                                <div class="modal-footer">
                                    <div class="text-center">
                                        <button class="btn btn-primary m-t-n-xs"
                                            type="submit"><strong>Submit</strong></button>
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    {{-- Modal --}}
                </div>
            </div>
        </div>
    </div>
@endsection

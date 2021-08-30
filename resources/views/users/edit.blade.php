@extends('layouts.base')
@section('user-edit')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Edit User Information</h5>
                    </div>
                    <div class="ibox-content">
                        <div class="card mt-3 mx-auto shadow rounded-3">
                            <div class="card-body">
                                <form class="form-horizontal mx-auto" action="{{ route('update', $user->id) }}"
                                    method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group mb-3">
                                        <label class="control-label col-sm-2" for="name">Name:</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="name" placeholder="Enter name"
                                                name="name" value="{{ $user->name }}">
                                        </div>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label class="control-label col-sm-2" for="email">Email:</label>
                                        <div class="col-sm-10">
                                            <input type="email" class="form-control" id="email" placeholder="Enter email"
                                                name="email" value="{{ $user->email }}">
                                        </div>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label class="control-label col-sm-2" for="password">Password:</label>
                                        <div class="col-sm-10">
                                            <input type="password" class="form-control" id="password"
                                                placeholder="Enter password" name="password"
                                                value="{{ $user->password }}">
                                        </div>
                                    </div>
                                    <div class="form-group mb-3">
                                        <div class="d-flex">
                                            <label class="control-label col-sm-2" for="gender">Gender:</label>
                                            <div class="col-sm-10">
                                                <div class="d-flex">
                                                    <div class="radio px-3">
                                                        <input type="radio" name="gender" value="male"
                                                            {{ $user->gender == 'male' ? 'checked' : '' }}>Male
                                                    </div>
                                                    <div class="radio px-3">
                                                        <input type="radio" name="gender" value="female"
                                                            {{ $user->gender == 'female' ? 'checked' : '' }}>Female
                                                    </div>
                                                    <div class="radio">
                                                        <input type="radio" name="gender" value="other"
                                                            {{ $user->gender == 'other' ? 'checked' : '' }}>Other
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-2">Contact No:</label>
                                        <div class="col-sm-10">
                                            <input type="number" class="form-control" id="contact_no"
                                                placeholder="Enter contact number" name="contact_no"
                                                value="{{ $user->contact_no }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-2">Image:</label>
                                        <div class="col-sm-10">
                                            <input type="file" name="profile_photo" id="profile_photo"
                                                value="{{ $user->profile_photo }}">
                                        </div>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label class="control-label col-sm-2" for="gender">Class:</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" name="class">
                                                <option value="1" {{ $user->class == 1 ? 'selected' : '' }}>1
                                                </option>
                                                <option value="2" {{ $user->class == 2 ? 'selected' : '' }}>2
                                                </option>
                                                <option value="3" {{ $user->class == 3 ? 'selected' : '' }}>3
                                                </option>
                                                <option value="4" {{ $user->class == 4 ? 'selected' : '' }}>4
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-2">Status</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" name="status">
                                                <option value="1" {{ $user->status == 'active' ? 'selected' : '' }}>
                                                    Active
                                                </option>
                                                <option value="2" {{ $user->status == 'inactive' ? 'selected' : '' }}>In
                                                    Active
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label class="control-label col-sm-2">Created_By:</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="created_by" placeholder="Enter name"
                                                name="created_by" value="{{ $user->created_by }}">
                                        </div>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label class="control-label col-sm-2">Modified_By:</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="modified_by"
                                                placeholder="Enter name" name="modified_by"
                                                value="{{ $user->modified_by }}">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <div class="text-center">
                                            <button class="btn btn-primary" type="submit"><strong>Update</strong></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

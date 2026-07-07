@extends('layouts.admin')
@section('content')
    <div class="container-fluid px-4">
        <div class="my-3">
            <h1 class="my-4 d-inline">User Edit</h1>
            <a href="{{ route('backend.users.index') }}" class="btn btn-danger float-end">Cancel</a>
        </div>

        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('backend.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('backend.users.index') }}">Users</a></li>
            <li class="breadcrumb-item"User Create></li>
        </ol>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                User Edit
            </div>
            <div class="card-body">
                <form action="{{ route('backend.users.update',$user->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ $user->name }}">

                    </div>
                    <div class="mb-3">
                        <label for="phone">Phone No</label>
                        <input type="text" name="phone" id="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ $user->phone }}">
                    </div>
                    <div class="mb-3">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="true">Profile</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="new_profile-tab" data-bs-toggle="tab" data-bs-target="#new_profile-tab-pane" type="button" role="tab" aria-controls="new_profile-tab-pane" aria-selected="false">New Profile</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                                <img src="{{ $user->profile }}" alt="" class="w-25 h-25 my-3">
                                <input type="hidden" name="old_profile" value="{{ $user->profile }}">
                            </div>
                            <div class="tab-pane fade" id="new_profile-tab-pane" role="tabpanel" aria-labelledby="new_profile-tab" tabindex="0">
                                <input type="file" accept="image/.jpg,jpeg,.png,.webp" name="profile" id="profile" class="form-control my-3 @error('profile') is-invalid
                                @enderror" value="{{ old('profile') }}">
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ $user->email }}">
                    </div>
                    <div class="mb-3">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" value="{{ $user->password }}">
                    </div>
                    <div class="mb-3">
                        <label for="role">Role</label>
                        <select name="role" id="role" class="form-control @error('role') is-invalid @enderror" value="{{ $user->role }}">
                            <option value="">Choose...</option>
                            <option value="User" {{ $user->role == "User" ? 'selected':''}}>User</option>
                            <option value="Admin" {{ $user->role == "Admin" ? 'selected':''}}>Admin</option>
                            <option value="Super Admin" {{ $user->role == "Super Admin" ? 'selected':''}}>Super Admin</option>
                        </select>
                    </div>
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-warning">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
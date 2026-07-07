@extends('layouts.admin')
@section('content')
    <div class="container-fluid px-4">
        <div class="my-3">
            <h3 class="my-4 d-inline">Edit Payment</h3>
            <a href="{{ route('backend.payments.index') }}" class="btn btn-danger float-end">Cancel</a>
        </div>

        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('backend.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('backend.payments.index') }}">Payments</a></li>
            <li class="breadcrumb-item">Payment</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Edit Payment
            </div>
            <div class="card-body">
                <form action="{{ route('backend.payments.update',$payment->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid
                        @enderror" value="{{ $payment->name }}">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="logo-tab" data-bs-toggle="tab" data-bs-target="#logo-tab-pane" type="button" role="tab" aria-controls="logo-tab-pane" aria-selected="true">Logo</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="new_logo-tab" data-bs-toggle="tab" data-bs-target="#new_logo-tab-pane" type="button" role="tab" aria-controls="new_logo-tab-pane" aria-selected="false">New Logo</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="logo-tab-pane" role="tabpanel" aria-labelledby="logo-tab" tabindex="0">
                                <img src="{{ $payment->logo }}" class="w-5 h-5 my-3" alt="">
                                <input type="hidden" name="old_logo" value="{{ $payment->logo }}">
                            </div>
                            <div class="tab-pane fade" id="new_logo-tab-pane" role="tabpanel" aria-labelledby="new_logo-tab" tabindex="0">
                                 <input type="file" accept="image/.jpg,jpeg,.png,.webp" name="logo" id="logo" class="form-control my-3 @error('name') is-invalid
                                @enderror" value="{{ old('image') }}"> 
                                @error('logo')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-warning">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
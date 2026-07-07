@extends('layouts.admin')
@section('content')
    <div class="container-fluid px-4">
        <div class="my-3">
            <h3 class="my-4 d-inline">Items Create</h3>
        </div>

        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('backend.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('backend.items.index') }}">Items</a></li>
            <li class="breadcrumb-item active">Item Create</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Posts List
            </div>
            <div class="card-body">
                <form action="{{route('backend.items.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="code_no">Code No</label>
                        <input type="text" name="code_no" id="code_no" class="form-control @error('code_no') is-invalid @enderror" value="{{ old('code_no') }}">
                        @error('code_no')
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                        @error('name')
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="image">Image</label>
                        <input type="file" accept="image/.jpg,.jpeg,.png,.webp" name="image" id="image" class="form-control @error('image') is-invalid
                        @enderror" value="{{ old('image') }}">
                        @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="price">Price</label>
                        <input type="text" name="price" id="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price') }}">
                        @error('price')
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="discount">Discount</label>
                        <input type="text" name="discount" id="discount" class="form-control @error('discount') is-invalid @enderror" value="{{ old('discount') }}">
                        @error('discount')
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="in_stock">In Stock</label>
                        <select name="in_stock" id="in_stock" class="form-select @error('in_stock') is-invalid @enderror" value="{{ old('in_stock') }}">
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                        @error('in_stock')
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="category_id">Category</label>
                        <select class="form-select @error('category_id') is-invalid @enderror" id="category_id" name="category_id">
                                <option value="">Choose....</option>
                                @foreach ($categories as $category)
                                    <option value="{{$category->id}}" {{ old('category_id') == $category->id?'selected':''}}>{{$category->name}}</option>
                                @endforeach
                        </select>
                        @error('category_id')
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
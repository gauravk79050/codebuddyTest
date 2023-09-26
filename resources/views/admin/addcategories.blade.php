@extends('Layout/admin/main')

@section('content')

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

<form action="{{url('admin/storeCategory')}}" method="POST">
    @csrf
    <div class="form-group">
        <label for="category_name">Category Name:</label>
        <input type="text" name="name" class="form-control" id="category_name">
        @error('name')
            <div style="color: red;">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group mb-2">
        <label for="parent_category">Parent Category:</label>
        <select name="parent_id" class="form-control" id="parent_category">
            <option value="">None</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Create Category</button>
</form>
@endsection
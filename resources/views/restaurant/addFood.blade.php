@extends('layouts.restaurantLayouts')
@section('title','Add food')
@section('content')
<br><br><br>
<div class="container">
    <div class="row justify-content-center ">
      <div class="col-xl-5 col-md-8">
<form action="" method="post" enctype="multipart/form-data">
  @csrf
    <!-- 2 column grid layout with text inputs for the first and last names -->
    <div class="row mb-4">
      <div class="col">
        Food name
        @error('name')
            <br><span class="text-danger">{{$message}}</span><br>
        @enderror
        <div class="form-outline form-new-border">
          <input type="text" id="form6Example1" class="form-control" name="name" value="{{old('name')}}"/>
        </div>
      </div>
      <div class="col">
        Category
        @error('category')
        <br><span class="text-danger">{{$message}}</span><br>
        @enderror
        <div class="form-outline form-new-border">
          <input list="categories" id="form6Example2" class="form-control" name="category" value="{{old('category')}}"/>
          <datalist id="categories">
            @if ($categories)
              @foreach ($categories as $item)
                <option value="{{$item->category}}">
              @endforeach
            @endif
              
          </datalist>  
        </div>
      </div>
    </div>
  
    <!-- Text input -->
    Price
        @error('price')
        <br><span class="text-danger">{{$message}}</span><br>
        @enderror
    <div class="form-outline mb-4 form-new-border">
      <input type="number" id="form6Example3" class="form-control" name="price" value="{{old('price')}}"/>
    </div>
  
    <!-- Text input -->
    Image
    @error('image')
        <br><span class="text-danger">{{$message}}</span><br>
        @enderror
    <div class="form-outline mb-4 form-new-border">
      <input type="file" id="form6Example4" class="form-control" name="image" value="{{old('image')}}"/>
    </div>
  
    Description
    @error('description')
        <br><span class="text-danger">{{$message}}</span><br>
        @enderror
    <div class="form-outline mb-4 form-new-border">
      <textarea class="form-control" id="form6Example7" rows="4" name="description">{{old('description')}}</textarea>
    </div>
  
  
    <!-- Submit button -->
    <button type="submit" class="btn btn-primary btn-block mb-4">Add</button>
  </form>
      </div>
    </div>
</div>
@endsection
@extends('layout.navbar')
@section('content')
    
<script src="1.js"></script>

<form method="POST" action="{{ route('crud.store') }}" enctype="multipart/form-data" onsubmit="return handleData()">
@csrf

{{-- Showing validation error --}}

@if($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif





    <div class="form-group my-4">
      <label for="fname">First name: -</label>
      <input type="text" name="fname" class="form-control" id="fname"  placeholder="Enter first name" value="{{old('fname')}}" required>
    </div>

    <div class="form-group my-4">
      <label for="lname">Last name: -</label>
      <input type="text" name="lname" class="form-control" id="lname"  placeholder="Enter last name" value="{{old('lname')}}" required>
    </div>

    <div class="form-group my-4">
      <label for="email">Email address</label>
      <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email"  required>
    </div>


    <div class="form-group my-4">
      <label for="address">Address</label>
      <textarea name="address"  id="address" style="resize:none;width:100%;height:80px;" required value="{{old('address')}}"></textarea>
    </div>

    <div class="form-group my-4" >
      <label for="gender">Gender</label>
      <br>
      Male <input type="radio" name="gender" id="gender" value="Male" required>  Female <input type="radio" name="gender" id="gender" value="Female" required>
    </div>


    <div class="form-group my-4">
      <label for="gender">Hobbies</label>
      <br>
      
      <div class="col" id="chk_option_error">
        <label for="hobbies" class="form-label" required>Hobbies</label><br>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="inlineCheckbox1"
                   name="hobbies[]" value="Travelling" >
            <label class="form-check-label" for="inlineCheckbox1">Travelling</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="inlineCheckbox2"
                   name="hobbies[]" value="Music" >
            <label class="form-check-label" for="inlineCheckbox2">Music</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="inlineCheckbox3"
                   name="hobbies[]" value="Reading" >
            <label class="form-check-label" for="inlineCheckbox3">Reading</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="inlineCheckbox3"
                   name="hobbies[]" value="Cycling" >
            <label class="form-check-label" for="inlineCheckbox3">Cycling</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="inlineCheckbox3"
                   name="hobbies[]" value="Others" >
            <label class="form-check-label" for="inlineCheckbox3">Others</label>
        </div>
    </div>
</div>





    <div class="form-group my-4">
        <label for="inputCountry" class="form-label">Country</label>
        <select class="form-select" name="country" id="inputCountry" aria-label="Default select example"
                required="">
            <option selected disabled required>Select</option>
            @foreach($countries as $country)
                <option value="{{ $country->id }}" required>{{ $country->name }}</option>
            @endforeach
            <option value="India">India</option>

        </select>
      </div>
  



      <div class="form-group my-4">
        <label for="profiles">Photo</label>
        <br>
        <div class="row mb-3">
            <div class="col">
                <input type="file" class="form-control-file" name="profiles" id="profiles" required>
            </div>
        </div>
      </div>

      
 



    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection


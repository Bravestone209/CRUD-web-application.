<style>
  .name{
    user-select: none;
  }
</style>

@extends('layout.navbar')
@section('content')
    
<a class="btn btn-success" href="{{route('crud.index')}}">Home</a>



<form method="POST" action="{{ route('crud.store') }}" enctype="multipart/form-data">
@csrf
    <div class="form-group my-4">
      <label for="name" style="user-select: none;">Name: -</label>
      <input style="user-select: none;" type="text" name="name" class="form-control name" id="name"  value="{{$crud->name}}" disabled>
    </div>


    <div class="form-group my-4">
      <label for="email">Email address</label>
      <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email" value="{{$crud->email}}" disabled>
    </div>


    <div class="form-group my-4">
      <label for="address">Address</label>
      <textarea name="address"  id="address" cols="30" rows="10" style="resize:none;width:100%;" disabled> {{$crud->address}}</textarea>
    </div>

    <div class="form-group my-4">
      <label for="gender">Gender</label>
      <br>
      Male <input type="radio" name="gender" id="gender" value="Male" @if($crud->gender=='Male') checked @endif disabled>  
      Female <input type="radio" name="gender" id="gender" value="Female" @if ($crud->gender=='Female') checked @endif disabled>
    </div>


    <div class="form-group my-4">
      <label for="gender">Hobbies</label>
      <br>
      
      <div class="col">
        <label for="hobbies" class="form-label">Hobbies</label><br>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="inlineCheckbox1"
                   name="hobbies[]" value="Travelling" 
                   @if (in_array('Travelling',$crud->hobbies_arr)) checked   @endif disabled>
            <label class="form-check-label" for="inlineCheckbox1">Travelling</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="inlineCheckbox2"
                   name="hobbies[]" value="Music"
                   @if (in_array('Music',$crud->hobbies_arr)) checked   @endif disabled
                   >
            <label class="form-check-label" for="inlineCheckbox2">Music</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="inlineCheckbox3"
                   name="hobbies[]" value="Coding"
                   @if (in_array('Coding',$crud->hobbies_arr)) checked   @endif disabled
                   >
            <label class="form-check-label" for="inlineCheckbox3">Coding</label>
        </div>
    </div>
</div>





    <div class="form-group my-4">
        <label for="inputCountry" class="form-label">Country</label>
        <select class="form-select" name="country" id="inputCountry" aria-label="Default select example"
                required="" disabled>
            <option selected disabled>Select</option>
            @foreach($countries as $country)
                <option value="{{ $country->id }}" @if ($crud->country==$country->id) selected @endif>{{ $country->name }}</option>
            @endforeach
            <option value="India">India</option>

        </select>
      </div>
  



      <div class="form-group my-4">
        <label for="profiles">Photo</label>
        <br>
        <div class="row mb-3">
            <div class="col">
                {{-- <input type="file" class="form-control-file" name="profiles" id="profiles"> --}}
                <img src="{{url('profile/').'/'.$crud->profile}}" alt="Profile picture not found" height="200px">
            </div>
        </div>
      </div>

      
 



    {{-- <button type="submit" class="btn btn-primary">Submit</button> --}}
  </form>
@endsection



{{-- $faker = Faker::create();
foreach(range(1, 20) as $value){
    Product::create([
        'name' => $faker->randomElement(['Watch','Smartphone','Laptop','PC','TV','Ipad','Spekers','Wifi router']),
        'email' => str_random().'@mailinator.com',
        'address' => $faker->randomElement(['Automatic','Semi-automatic','AI based','Fuzzy logic']),
        'gender' => $faker->randomElement(['male', 'female', 'children', 'unisex']),
        'hobbies' => $faker->randomElement(['Automatic','Semi-automatic','AI based','Fuzzy logic']),
        'countries' => $faker->numberBetween($min = 1, $max = 246),
        'profile' => $faker->image(storage_path('profile/'),width:50,height:50,category:null),


    ]); --}}
@extends('layout.navbar')
@section('content')
<div class="row">
    <div class="col-sm-12 col-md-7 col-lg-12 mx-auto">
        <div class="card my-5">
            <div class="card-body">
                <h4 class="card-title text-center">All Users</h4>
                <a class="btn btn-success" href="{{route('crud.create')}}">Registration</a>
                <hr>
                @include('flash_data')
                <table class="table table-bordered mt-4">
                    <thead>
                    <tr>
                        <td>Sr.no</td>
                        <td>Name</td>
                        <td>Email</td>
                        <td>Address</td>
                        <td>Gender</td>
                        <td>Hobbies</td>
                        <td>Country</td>
                        <td>Action</td>
                    </tr>
                    </thead>

                    <tbody>
                    @forelse ($data as $item )
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->email}}</td>
                            <td>{{$item->address}}</td>
                            <td>{{$item->gender}}</td>
                            <td>{{$item->hobbies}}</td>
                            <td>{{$item->getcountry->name}}</td>
                            <td>

                                <a href="{{route("crud.show",['crud'=>$item->id])}}"><button class="btn btn-primary">Show</button></a>
                                <a href="{{route('crud.edit',['crud'=>$item->id])}}"><button class="btn btn-warning">Edit</button></a>
                                <a href="#" onclick="deleteEmployee({{ $item->id }})"><button class="btn btn-danger">Delete</button></a>

                                <form id="employee-edit-action-{{ $item->id }}" method="POST" action="{{ route('crud.destroy', ['crud' => $item->id]) }}">
                                    @csrf
                                    @method('DELETE')
                                    {{-- <input type="submit" class="btn btn-danger" value="Delete" onclick="confirm()"> --}}
                                </form>  


                                {{-- <form action="{{route('crud.destroy',['crud'=>$data->id])}}" id="employee-edit-action-'">

                                </form> --}}
       
                                

                                

                            </td>
                        </tr>
                        @empty
                            
                        @endforelse
                    </tbody>                    


                </table>
                {!! $data->links() !!}
            </div>
        </div>
    </div>
</div>
@endsection


<script>
    function deleteEmployee(id) {
        if (confirm("Are you sure you want to delete?")) {
            document.getElementById('employee-edit-action-'+id).submit();
        }
    }
</script>
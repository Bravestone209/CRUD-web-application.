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
                        <td>First Name</td>
                        <td>Last Name</td>
                        <td>Email</td>
                        <td>Gender</td>
                        <td>Hobbies</td>
                        <td>Address</td>
                        <td>Country</td>
                        <td>Action</td>
                    </tr>

                    
                    </thead>
                    <tbody>
                        @forelse ($datas as $data) 
                        <tr>
                            <td >{{$loop->iteration}}</td>
                            <td>{{$data->fname ?? 'Hi'}}</td>
                            <td>{{$data->lname}}</td>
                            <td>{{$data->email}}</td>
                            <td>{{$data->gender}}</td>
                            <td>{{$data->hobbies}}</td>
                            <td>{{$data->address}}</td>
                            <td>{{$data->getcountry->name}}</td>
                            <td>
                                <a href="{{route('crud.show',['crud'=>$data->id])}}" ><button class="btn btn-success btn-sm">Show</button></a>
                                <a href="{{route('crud.edit',['crud'=>$data->id])}}" ><button class="btn btn-primary btn-sm">Edit</button></a>

                                <a href="#" onclick="deleteEmployee({{ $data->id }})" class="btn btn-danger btn-sm">Delete</a>

                                <form id="employee-edit-action-{{ $data->id }}" method="POST" action="{{ route('crud.destroy', ['crud' => $data->id]) }}">
                                    @csrf
                                    @method('DELETE')
                                    {{-- <input type="submit" class="btn btn-danger" value="Delete" onclick="confirm()"> --}}
                                </form>                            
                            </td>
                        </tr>

                        @empty
                        <tr>
                            <h4>Data not found</h4>
                            
                        </tr>
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
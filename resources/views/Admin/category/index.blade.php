@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            @if (Session::has('message'))
                <div class="alert alert-success alert-dismissable">
                    <button type='button' class="close" data-dismiss aria-hidden="true">x</button>
                    {{session('message')}}
                </div>
            @endif
            @if (Session::has('delete'))
            <div class="alert alert-success alert-dismissable">
                <button type='button' class="close" data-dismiss aria-hidden="true">x</button>
                {{session('delete')}}
            </div>
        @endif
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Category list
                    <a href="{{route('categories.create')}}" class="btn btn-sm btn-primary float-right">Add New</a>
                </div>

                <div class="card-body">
                   <table class="table table-bordered mb-0">
                       <thead>
                          <tr>
                              <th scope='col' width='60'>#</th>
                              <th scope='col'>Name</th>
                              <th scope='col' width='200'>Created By</th>
                              <th scope='col' width='129'>Action</th>
                          </tr>
                       </thead>
                       <tbody>
                           @foreach ($categories as $cat)
                               <tr>
                                   <td>{{$cat->id}}</td>
                                   <td>{{$cat->name}}</td>
                                   <td>{{$cat->users->name}}</td>
                                   <td>
                                       <a href="{{route('categories.edit',$cat->id)}}" class="btn btn-sm btn-primary">Edit</a>
                                       {!! Form::open(['route' => ['categories.destroy',$cat->id], 'method' => 'delete', 'style' => 'display:inline']) !!}
                                       {!! Form::submit('Delete',['class' => 'btn btn-sm btn-danger']) !!}
                                       {!! Form::close() !!}
                                    </td>
                               </tr>
                           @endforeach
                       </tbody>
                   </table>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection

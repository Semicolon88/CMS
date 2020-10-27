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
                    galleryegory list
                    <a href="{{route('galleries.create')}}" class="btn btn-sm btn-primary float-right">Add New</a>
                </div>

                <div class="card-body">
                   <table class="table table-bordered mb-0">
                       <thead>
                          <tr>
                              <th scope='col' width='60'>#</th>
                              <th scope='col'>Title</th>
                              <th scope='col' width='200'>Created By</th>
                              <th scope='col' width='129'>Action</th>
                          </tr>
                       </thead>
                       <tbody>
                           @foreach ($galleries as $gallery)
                               <tr>
                                   <td>{{$gallery->id}}</td>
                                   <td>{{$gallery->image_url}}</td>
                                   <td>{{$gallery->users->name}}</td>
                                   <td>
                                       <a href="{{route('galleries.edit',$gallery->id)}}" class="btn btn-sm btn-primary">Edit</a>
                                       {!! Form::open(['route' => ['galleries.destroy',$gallery->id], 'method' => 'delete', 'style' => 'display:inline']) !!}
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

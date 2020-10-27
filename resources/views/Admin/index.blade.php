@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            @if (Session::has('message'))
                <div class="alert alert-success alert-dismissable">
                    <button type='button' class="close" data-dismiss aria-hidden="">x</button>
                    {{session('message')}}
                </div>
            @endif
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Latest Categories</div>

                <div class="card-body">
                   <table class="table table-bordered mb-0">
                       <thead>
                          <tr>
                              <td scope='col' width='60'>#</td>
                              <td scope='col' width='60'>Name</td>
                              <td scope='col' width='200'>Created By</td>
                          </tr>
                       </thead>
                       <tbody>
                           @foreach ($category as $cat)
                               <tr>
                                   <th>{{$cat->id}}</th>
                                   <th>{{$cat->name}}</th>
                                   <th>{{$cat->users->name}}</th>
                               </tr>
                           @endforeach
                       </tbody>
                   </table>
                </div>
            </div>

            <div class="card mt-4">
                <div class="card-header">Latest Post</div>

                <div class="card-body">
                   <table class="table table-bordered mb-0">
                       <thead>
                          <tr>
                              <td scope='col' width='60'>#</td>
                              <td scope='col' width='60'>Name</td>
                              <td scope='col' width='200'>Created By</td>
                          </tr>
                       </thead>
                       <tbody>
                           @foreach ($posts as $post)
                               <tr>
                                   <th>{{$post->id}}</th>
                                   <th>{{$post->title}}</th>
                                   <th>{{$post->users->name}}</th>
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

@extends('layouts.app')

@section('stylesheet')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Post Create
                </div>

                <div class="card-body">
                  {!! Form::open(['route' => 'galleries.store', 'enctype' => 'multipart/form-data']) !!}
                    <div class="form-group @if($errors->has('image_url')) has-error @endif">
                        {!! Form::label('image_url', 'Image Url', ['style' => 'display: block;']) !!}
                        {!! Form::file('image_url[]',['multiple','multiple']) !!}
                        @if ($errors->has('image_url'))
                            <span class="help-block">{!! $errors->first('image_url') !!}</span>
                        @endif
                    </div>
                    {!! Form::submit('Create',['class' => 'btn btn-sm btn-primary']) !!}
                  {!! Form::close() !!}
                </div>
            </div>

        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Category Update
                </div>

                <div class="card-body">
                  {!! Form::open(['route' => ['categories.update', $category->id], 'method' => 'put']) !!}
                    <div class="form-group @if($errors->has('thumbnail')) has-error @endif">
                        {!! Form::label('Thumbnail') !!}
                        {!! Form::text('thumbnail',$category->thumbnail,['class' =>'form-control','placeholder' => 'Thumbnail']) !!}
                        @if ($errors->has('thumbnail'))
                            <span class="help-block">{!! $errors->first('thumbnail') !!}</span>
                        @endif
                    </div>
                    <div class="form-group @if($errors->has('thumbnail')) has-error @endif">
                        {!! Form::label('Name') !!}
                        {!! Form::text('name',$category->name,['class' =>'form-control','placeholder' => 'Name']) !!}
                        @if ($errors->has('name'))
                            <span class="help-block">{!! $errors->first('name') !!}</span>
                        @endif
                    </div>
                    <div class="form-group @if($errors->has('publish')) has-error @endif">
                        {!! Form::label('Publish') !!}
                        {!! Form::text('publish',isset($category),['class' =>'form-control','placeholder' => 'Publish']) !!}
                        @if ($errors->has('publish'))
                            <span class="help-block">{!! $errors->first('publish') !!}</span>
                        @endif
                    </div>
                    {!! Form::submit('Update',['class' => 'btn btn-sm btn-primary']) !!}
                  {!! Form::close() !!}
                </div>
            </div>

        </div>
    </div>
</div>
@endsection

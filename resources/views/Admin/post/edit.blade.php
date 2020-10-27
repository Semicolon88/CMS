@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Post Create
                </div>

                <div class="card-body">
                  {!! Form::open(['route' => ['post.update',$post->id], 'method' => 'put']) !!}
                    <div class="form-group @if($errors->has('thumbnail')) has-error @endif">
                        {!! Form::label('Thumbnail') !!}
                        {!! Form::text('thumbnail',$post->thumbnail,['class' =>'form-control','placeholder' => 'Thumbnail']) !!}
                        @if ($errors->has('thumbnail'))
                            <span class="help-block">{!! $errors->first('thumbnail') !!}</span>
                        @endif
                    </div>
                    <div class="form-group @if($errors->has('title')) has-error @endif">
                        {!! Form::label('Title') !!}
                        {!! Form::text('title',$post->title,['class' =>'form-control','placeholder' => 'Post Title']) !!}
                        @if ($errors->has('title'))
                            <span class="help-block">{!! $errors->first('title') !!}</span>
                        @endif
                    </div>
                    <div class="form-group @if($errors->has('publish')) has-error @endif">
                        {!! Form::label('Publish') !!}
                        {!! Form::text('publish',isset($post),['class' =>'form-control','placeholder' => 'Publish']) !!}
                        @if ($errors->has('publish'))
                            <span class="help-block">{!! $errors->first('publish') !!}</span>
                        @endif
                    </div>
                    <div class="form-group @if($errors->has('sub_title')) has-error @endif">
                        {!! Form::label('Sub Title') !!}
                        {!! Form::text('sub_title',$post->sub_title,['class' =>'form-control','placeholder' => 'Sub-Title']) !!}
                        @if ($errors->has('publish'))
                            <span class="help-block">{!! $errors->first('sub_title') !!}</span>
                        @endif
                    </div>
                    <div class="form-group @if($errors->has('publish')) has-error @endif">
                        {!! Form::label('Details') !!}
                        {!! Form::textarea('details',$post->details,['class' =>'form-control','placeholder' => 'Post details']) !!}
                        @if ($errors->has('details'))
                            <span class="help-block">{!! $errors->first('details') !!}</span>
                        @endif
                    </div>
                    <div class="form-group @if($errors->has('post_type')) has-error @endif">
                        {!! Form::label('Post Type') !!}
                        {!! Form::text('post_type',$post->post_type,['class' =>'form-control','placeholder' => 'Post Type']) !!}
                        @if ($errors->has('post_type'))
                            <span class="help-block">{!! $errors->first('post_type') !!}</span>
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

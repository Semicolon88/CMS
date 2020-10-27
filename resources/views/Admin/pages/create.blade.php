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
                    Page Create
                </div>

                <div class="card-body">
                  {!! Form::open(['route' => 'pages.store']) !!}
                    <div class="form-group @if($errors->has('thumbnail')) has-error @endif">
                        {!! Form::label('Thumbnail') !!}
                        {!! Form::text('thumbnail',null,['class' =>'form-control','placeholder' => 'Thumbnail']) !!}
                        @if ($errors->has('thumbnail'))
                            <span class="help-block">{!! $errors->first('thumbnail') !!}</span>
                        @endif
                    </div>
                    <div class="form-group @if($errors->has('title')) has-error @endif">
                        {!! Form::label('Title') !!}
                        {!! Form::text('title',null,['class' =>'form-control','placeholder' => 'Post Title']) !!}
                        @if ($errors->has('title'))
                            <span class="help-block">{!! $errors->first('title') !!}</span>
                        @endif
                    </div>
                    <div class="form-group @if($errors->has('publish')) has-error @endif">
                        {!! Form::label('Publish') !!}
                        {!! Form::text('publish',null,['class' =>'form-control','placeholder' => 'Publish']) !!}
                        @if ($errors->has('publish'))
                            <span class="help-block">{!! $errors->first('publish') !!}</span>
                        @endif
                    </div>
                    <div class="form-group @if($errors->has('sub_title')) has-error @endif">
                        {!! Form::label('Sub Title') !!}
                        {!! Form::text('sub_title',null,['class' =>'form-control','placeholder' => 'Sub-Title']) !!}
                        @if ($errors->has('publish'))
                            <span class="help-block">{!! $errors->first('sub_title') !!}</span>
                        @endif
                    </div>
                    <div class="form-group @if($errors->has('publish')) has-error @endif">
                        {!! Form::label('Details') !!}
                        {!! Form::textarea('details',null,['class' =>'form-control','placeholder' => 'Post details']) !!}
                        @if ($errors->has('details'))
                            <span class="help-block">{!! $errors->first('details') !!}</span>
                        @endif
                    </div>
                    
                    <div class="form-group @if($errors->has('post_type')) has-error @endif">
                        {!! Form::label('Post Type') !!}
                        {!! Form::text('post_type',null,['class' =>'form-control','placeholder' => 'Post Type']) !!}
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

@section('javascript')
<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>    
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
<script src="https://cdn.ckeditor.com/4.15.0/standard/ckeditor.js"></script>

    <script>
            $(document).ready(function() {
                CKEDITOR.replace('details');
                $('#category_id').select2(
                    
                );
            });
    </script>
@endsection

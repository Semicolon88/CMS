@extends('website.template.master')
@section('content')
    <!-- Page Header -->
<header class="masthead" style="background-image: url({{asset('website/img/home-bg.jpg')}})">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="site-heading">
            <h1>Clean Blog</h1>
            <span class="subheading">A Blog Theme by Start Bootstrap</span>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Main Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-8 mx-auto">
        @foreach ($posts as $post)
          <div class="post-preview">
            <a href="{{url('post/'.$post->slug)}}">
              <h2 class="post-title">
                {{$post->title}}
              </h2>
              <h3 class="post-subtitle">
                {{$post->sub_title}}
              </h3>
            </a>
            <p class="post-meta">Posted by
              <a href="#"></a>
              {{date('M d, Y',strtotime($post->created_at))}}
             
                <span class="post-category">
                  Category : @foreach ($categories as $cat)
                                <a href="{{url('category/'. $cat->slug)}}">{{$cat->name}}</a>
                              @endforeach
                </span>
            
            </p>
          </div>
          <hr> 
        @endforeach
        <!-- Pager -->
        <div class="clearfix mt-4">
        
        </div>
      </div>
      <div class="col-lg-4 col-md-4">
        <div class="category">
          <h2 class="category-title">Category</h2>
          <ul class="category-list">
            @foreach ($categories as $cat)
          <li><a href="{{url('category/'.$cat->slug)}}">{{$cat->name}}</a></li>
            @endforeach
          </ul>
        </div>
      </div>
    </div>
  </div>
@endsection
@extends('home.master')
@section('title','Du lịch bốn phương')
@section('css')
<link href="{{asset('css/home/blog.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('content')

<div>
  <div class="wrap-container">
    <div class="wrap-information">
      <h1>Blog</h1>
      <code>
            You have found yet another learning space 
            in this universe where you got a chance to 
            learn something useful along with me. 
            ome let learn & explore the world together 😇
          </code>
    </div>
    <div class="social">
      <button class="btn btn-info btn-sm fb" type="button">
        <i class="fab fa-facebook "></i>
        &#160;Follow
      </button>
      <a class="followers" href="https://www.facebook.com/">40k</a>
      <button class="btn btn-secondary btn-sm " type="button">
        <i class="fab fa-twitter"></i>
        &#160;Follow
      </button>
      <a class="followers" href="https://www.facebook.com/">30k</a>
      <button class="btn btn-danger btn-sm" type="button">
        <i class="fab fa-youtube"></i>
        &#160;Youtube
      </button>
      <a class="followers" href="https://www.facebook.com/">20k</a>
    </div>
  </div>

  <div class="container-fluid">
    <div class="row wrap-cards">
      @foreach ($post as $val)
      @foreach ($imgpost as $val1)
      @foreach ($val1 as $val2)
      @if ($val2->post_id === $val->id)
      <div class="col-sm card-items">
        <div class="card" style="width: 20rem;">
          <img class="card-img-top" style="height: 200px" src="{{asset('uploads/imgpost/'.$val2->link_img)}}" alt="">
          <div class="card-body" 
          style="display: flex;
          flex-direction: column;
          align-items: start;
          padding: 20px;">
            <h3 class="card-text">{{$val->title}}</h3>
            <p class="card-text">{{$val->sub_title}}</p>
            
            <a href="{{route('home.get.blogdetail',['id'=>$val->id,'title'=>$val->title])}}"><small>Xem thêm</small></a>

          </div>
        </div>
      </div>


      @endif
      @endforeach
      @endforeach
      @endforeach
    </div>
  </div>
</div>
<div>{{ $post->links() }}</div>
@endsection
@section('script')

@endsection
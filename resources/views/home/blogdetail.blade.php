@extends('home.master')

@section('css')
<meta name="csrf-token" content="{{ csrf_token() }}">
<link type="text/css" href="{{asset('css/home/blogdetail.css')}}" rel="stylesheet">

@endsection

@section('title',$post->title)
@section('content')
<div>
  <div class="wrap-container">
    <div class="row">
      <div class="col-8">
        <hr />
        <div class="wrap-image">
          <img @foreach ($imgavt as $valimgavt) src="{{asset('uploads/imgpost/'.$valimgavt->link_img)}}" @endforeach
            alt="detail-blog" />
        </div>
        <div class="wrap-title">
          <span class="icon-title">
            <strong>#{{$post->id}}</strong>
            <p>Travel</p>
          </span>
          <div class="text-title">
            <h2>{{$post->sub_title}}</h2>
            <h5>By<a href="">{{$post->author}}</a>/<a href="">{{$post->created_at}}</a></h5>
          </div>
        </div>
        <div class="title-blog-detail">
          <h2><span>{{$post->title}}</span></h2>
        </div>
        <div class="tile-content">
          {{--  <strong> # </strong> {{$post->title}}  --}}
        </div>
        <hr class="hr-content" />
        <div class="wrap-content">
          <p>
            {{$post->content}}
          </p>
          <hr class="hr-content" />

          @foreach ($imgpost as $valimgpost)
          @if ($valimgpost->post_id === $post->id)
          {{--  <div class="image-content">
          </div>  --}}
          <div style="display: flex; justify-content: center">
            <div class="gallery">
              <a target="_blank" href="{{asset('uploads/imgpost/'.$valimgpost->link_img)}}">
                <img src="{{asset('uploads/imgpost/'.$valimgpost->link_img)}}" alt="image content">
              </a>
            </div>
          </div>
          @endif
          @endforeach
          <nav class="long-nav">
            <form action="" method="POST">
              @csrf
              @if (Auth::check())
              @if (!empty($likepost))
              <span class="like" data-id="{{$post->id}}"><i id="like" style="color:red;" class="fa fa-heart">
                  @if($sllike !=0)
                  {{$sllike}}
                  @endif
                </i></span>
              @else
              <span class="like" data-id="{{$post->id}}"><i id="like" style="color:blue ;" class="fa fa-heart">
                  @if($sllike !=0)
                  {{$sllike}}
                  @endif
                </i></span>
              @endif
              {{-- <span><i style="color: orange;" class="fa fa-bookmark"></i></span> --}}
              <span class="fb-share-button" data-href="{{$urlshare}}" data-layout="button" data-size="small"><i
                  style="color: blue;" class="fa fa-share"></i></span>
              @else
              <h3 style="color: blue">Đăng nhập để like và chia sẽ bài viết</h3>
              @endif
            </form>
          </nav>
          <hr class="hr-content" />
        </div>

        {{-- comment  --}}

        <div class="u-shadow-v18 g-bg-secondary g-pa-30">
          <img class="d-flex g-width-50 g-height-50 rounded-circle" @if(Auth::check())
            src="{{asset('/uploads/imguser/'.$info->avatar)}}" @else src="{{asset('/uploads/imguser/login.jpg')}}"
            @endif alt="Image Description">
          <div class="g-mb-15">
            <h5 class="h5 g-color-gray-dark-v1 mb-0">
              @if(Auth::check()){{$info->name}}@endif
            </h5>
          </div>
          <form action="" id="comment" data-id="{{$post->id}}" method="POST">
            @csrf
            <div style="margin-top: 15px;">
              <textarea id="content" name="content" required style="height: 100px;"
                class="form-control u-shadow-v18 g-bg-secondary" placeholder="Comment"></textarea>
              <div style="margin-top: 15px;">
                <div class="row">
                  <div class="col-md-4">
                    <button style="margin-left: 10px;" type="submit" class="btn btn-primary">Comment</button>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
        <div class="wrap-comment">
          @if ($sumcmt !== 0)
          <h2>{{$sumcmt}} Bình luận</h2>
          @endif

          <!-- comment -->
          @foreach($cmt as $key => $valcmt)
          @foreach($infocmt as $valinfocmt)
          @if($valcmt->user_id === $valinfocmt->user_id)
          <div class="row">
            <div class="col-md-12">
              <div class="media g-mb-30 media-comment" style="padding: 30px 0">
                <img class="d-flex g-width-50 g-height-50 rounded-circle g-mt-3 g-mr-15"
                  src="{{asset('/uploads/imguser/'.$valinfocmt->avatar)}}" alt="Image Description">
                <div class="media-body u-shadow-v18 g-bg-secondary g-pa-30">
                  <div class="g-mb-15">
                    <h5 style="font-size: 20px; font-weight: bold;" class="h5 g-color-gray-dark-v1 mb-0">
                      {{$valinfocmt->name}}</h5>
                    <span class="g-color-gray-dark-v4 g-font-size-12">{{($valcmt->created_at)}}</span>
                  </div>

                  <p>{{$valcmt->content}}</p>

                  <ul class="list-inline d-sm-flex my-0">
                    {{--  <li class="list-inline-item g-mr-20">
                      <a class="u-link-v5 g-color-gray-dark-v4 g-color-primary--hover" href="#!">
                        <i class="fa fa-thumbs-up g-pos-rel g-top-1 g-mr-3"></i>
                        178
                      </a>
                    </li>
                    <li class="list-inline-item g-mr-20">
                      <a class="u-link-v5 g-color-gray-dark-v4 g-color-primary--hover" href="#!">
                        <i class="fa fa-thumbs-down g-pos-rel g-top-1 g-mr-3"></i>
                        34
                      </a>
                    </li>  --}}
                    <li class="list-inline-item ml-auto">
                      <a class="u-link-v5 g-color-gray-dark-v4 g-color-primary--hover" href="#!">
                        <i class="fa fa-reply g-pos-rel g-top-1 g-mr-3"></i>
                        <button type="button" class="btn btn-link" onclick="reply({{$valcmt->id}})" data-id="">Trả
                          lời</button>
                      </a>
                    </li>
                    <form action="" method="POST">
                      @csrf
                    <li class="list-inline-item ml-auto">
                      <a class="u-link-v5 g-color-gray-dark-v4 g-color-primary--hover" href="#!">
                        <i class="fa fa-reply g-pos-rel g-top-1 g-mr-3"></i>
                        <button type="button" class="btn btn-link" onclick="repost('comment',{{$valcmt->id}})" data-id="">Repost</button>
                      </a>
                    </li>
                  </form>
                  </ul>
                </div>
              </div>
              <!-- reply comment -->

              <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-10">
                  <div class="media g-mb-30 media-comment" id="reply{{$valcmt->id}}" style="display: none">
                    <div class="u-shadow-v18 g-bg-secondary g-pa-30">
                      <img class="d-flex g-width-50 g-height-50 rounded-circle g-mt-3 g-mr-15" @if(Auth::check())
                        src="{{asset('/uploads/imguser/'.$info->avatar)}}" @else
                        src="{{asset('/uploads/imguser/login.jpg')}}" @endif alt="Image Description">
                      <div class="text-right"><i style="position: relative;
                        top: -50px;
                        font-size: 20px;
                        cursor: pointer;" onclick="reply({{$valcmt->id}})"
                          class="fa fa-times-circle comment-icon-x"></i>
                      </div>
                      <div class="g-mb-15">
                        <h5 class="h5 g-color-gray-dark-v1 mb-0">@if(Auth::check())
                          {{$info->name}}
                          @endif</h5>
                      </div>
                      <form action="" method="POST">
                        {{--  {{route('user.post.replycomment',$valcmt->id)}} --}}
                        @csrf
                        <div style="margin-top: 15px;">
                          <textarea style="height: 130px; width: 555px" id="content{{$key}}" name="content{{$key}}"
                            required class="form-control u-shadow-v18 g-bg-secondary" placeholder="comment"></textarea>
                          <div style="margin-top: 15px;">
                            <div class="row">
                              <div class="col-md-8">
                              </div>
                              <div class="col-md-4">
                                <button onclick="replycomment({{$valcmt->id}},{{$key}})" type="button"
                                  style="margin-left: 40px;" class="btn btn-primary">Comment</button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                  @foreach ($replycmt as $valreplycmt)
                  @foreach ($infocmt as $valinfocmt1)
                  @if ($valreplycmt->comment_id === $valcmt->id)
                  @if ($valreplycmt->user_id === $valinfocmt1->user_id)
                  <div class="media g-mb-30 media-comment" style="padding: 30px 0">
                    <img class="d-flex g-width-50 g-height-50 rounded-circle g-mt-3 g-mr-15"
                      src="{{asset('/uploads/imguser/'.$valinfocmt1->avatar)}}" alt="Image Description">
                    <div class="media-body u-shadow-v18 g-bg-secondary g-pa-30">
                      <div class="g-mb-15">
                        <h5 style="font-size: 20px; font-weight: bold;" class="h5 g-color-gray-dark-v1 mb-0">
                          {{$valinfocmt1->name}}</h5>
                        <span class="g-color-gray-dark-v4 g-font-size-12">{{($valreplycmt->created_at)}}</span>
                      </div>

                      <p>{{$valreplycmt->content}}</p>

                      <ul class="list-inline d-sm-flex my-0">
                        <li class="list-inline-item g-mr-20">
                          <a class="u-link-v5 g-color-gray-dark-v4 g-color-primary--hover" href="#!">
                            <i class="fa fa-thumbs-up g-pos-rel g-top-1 g-mr-3"></i>
                            178
                          </a>
                        </li>
                        <li class="list-inline-item g-mr-20">
                          <a class="u-link-v5 g-color-gray-dark-v4 g-color-primary--hover" href="#!">
                            <i class="fa fa-thumbs-down g-pos-rel g-top-1 g-mr-3"></i>
                            34
                          </a>
                        </li>
                        <form action="" method="POST">
                          @csrf
                        <li class="list-inline-item ml-auto">
                          <a class="u-link-v5 g-color-gray-dark-v4 g-color-primary--hover" href="#!">
                            <i class="fa fa-reply g-pos-rel g-top-1 g-mr-3"></i>
                            <button type="button" class="btn btn-link" onclick="repost('replycomment',{{$valreplycmt->id}})" data-id="">Repost</button>
                          </a>
                        </li>
                      </form>
                      </ul>
                    </div>
                  </div>
                  @endif
                  @endif
                  @endforeach
                  @endforeach
                </div>
              </div>
            </div>
          </div>
          @endif
          @endforeach
          @endforeach
        </div>
      </div>
      {{--  Không liên quan  --}}
      <div class="col-4">
        <div class="interactive">
          <div>
            <h2>SUBSCRIBE</h2>
            <div style="display: flex; justify-content: center;">
              <video width="300" height="180" controls>
                <source src="https://youtu.be/_2QbXjLkRug" type="video/mp4">
                <source src="https://youtu.be/_2QbXjLkRug" type="video/ogg">
              </video>
            </div>
            <div style="margin-top: 20px; display: flex; justify-content: center;">
              <a href="https://www.youtube.com/">
                <button style="width: 300px" type="button" class="btn btn-danger"><i class="fab fa-youtube">&nbsp;Đăng
                    ký</i></button>
              </a>
            </div>
            {{--  <div class="wrap-avatar-square">
              <img class="avatar-square"
                src="https://images.unsplash.com/photo-1592218636432-1fcfb03707dc?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60"
                alt="interactive-avatar" />
              <div class="child">
                <code>Viet Nam Travel</code>
                <button><i class="fab fa-youtube">&nbsp;YouTube</i></button>
                <div class="followers"><a href="/">40k</a></div>
              </div>
            </div>  --}}
          </div>
          <div>
            <h2>ABOUT</h2>
            <div class="wrap-avatar-cycler">
              <img class="avatar-cycler"
                src="https://images.unsplash.com/photo-1592252687443-08df10cd260c?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=750&q=80"
                alt="interactive-avatar" />
              <span>
                Này đó! Tôi là Aileen Adalid. 21 tuổi, tôi bỏ công việc công ty ở Philippines để theo đuổi ước mơ.
                Ngày nay, tôi là một người du mục kỹ thuật số thành công (doanh nhân, nhà văn du lịch, & vlogger) sống
                một lối sống du lịch bền vững.
              </span>
              <span>
                Nhiệm vụ của tôi? Để cho bạn thấy làm thế nào hoàn toàn có thể tạo ra
                một cuộc sống du lịch (bất kể tỷ lệ cược), và tôi sẽ giúp bạn đạt được điều đó thông qua hướng dẫn du
                lịch chi tiết, cuộc phiêu lưu, tài nguyên, mẹo và THÊM của tôi!
              </span>
            </div>
          </div>
          <div>
            <h2>INSTAGRAM</h2>
            <div class="interactive-instagram">
              <div class="row wrap-cards">
                <div class="col-6 card-items">
                  <div class="card" style="width: 10rem; border: none;">
                    <img class="card-img-top"
                      src="https://images.unsplash.com/photo-1592218636432-1fcfb03707dc?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60"
                      alt="Card image cap">
                  </div>
                </div>
                <div class="col-6 card-items">
                  <div class="card" style="width: 10rem; border: none;">
                    <img class="card-img-top"
                      src="https://images.unsplash.com/photo-1592218636432-1fcfb03707dc?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60"
                      alt="Card image cap">
                  </div>
                </div>
                <div class="col-6 card-items">
                  <div class="card" style="width: 10rem; border: none;">
                    <img class="card-img-top"
                      src="https://images.unsplash.com/photo-1592218636432-1fcfb03707dc?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60"
                      alt="Card image cap">
                  </div>
                </div>
                <div class="col-6 card-items">
                  <div class="card" style="width: 10rem; border: none;">
                    <img class="card-img-top"
                      src="https://images.unsplash.com/photo-1592218636432-1fcfb03707dc?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60"
                      alt="Card image cap">
                  </div>
                </div>
                <div class="button-instagram">
                  <a href="https://www.instagram.com/">
                    <button type="button" class="btn btn-primary"><i class="fab fa-instagram"></i>&nbsp;Follow
                      Instagram</button>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@section('script')
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(e){
    $(".like").click(function(e){
      var id = document.getElementById('like');
      var post_id = $(this).attr("data-id");
      if(id.style.color === "blue"){
        id.style.color = "red";
        const status = "like";
        likeFunction(status);
      }else{
        if(id.style.color === "red"){
          id.style.color = "blue";
          const status = "disklike";
          likeFunction(status);
        }
      }
      function likeFunction(status) {
        e.preventDefault();
        console.log(post_id);
        var formData = new FormData();
        formData.append('post_id',post_id);
        formData.append('status',status);
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
        $.ajax({
            type:'POST',
            url:"{{route('user.get.like')}}",
            data: formData,
            contentType: false,
            processData: false,
            cache:false,
            success:function(data) {
               {{-- alert(data.success);  --}}
          }
        });
        location.reload();
      }
    });
    
  });
</script>
<script>
  function checkcmt(){
    var a = document.getElementById('cmt').value;
    if(a){
      document.getElementById('bncmt').disabled = false;
    }
    else{
      document.getElementById('bncmt').disabled = true;
    }
  }
</script>
<script>
  $(document).ready(function(e){
      $("#comment").submit(function(e){
        const post_id = $(this).attr("data-id");
        const content = $("#content").val();
        e.preventDefault();
        const formData = new FormData();
        formData.append('post_id',post_id);
        formData.append('content',content);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type:'POST',
            url:"{{route('user.post.comment')}}",
            data: formData,
            contentType: false,
            processData: false,
            cache:false,
            success:function(data) {
              alert(data.error);
            }
        });
        location.reload();
      });
  });
</script>
<script>
  function replycomment(cmt_id,keycmt){
      const content = $("#content"+keycmt).val();
     
      const formData = new FormData();
      formData.append('cmt_id',cmt_id);
      formData.append('content',content);
      $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type:'POST',
            url:"{{route('user.post.replycomment')}}",
            data: formData,
            contentType: false,
            processData: false,
            cache:false,
            success:function(data) {
              alert(data.error);
            }
        });
        location.reload();
      }
</script>
<script>
  function reply(cmt_id) {
      var x = document.getElementById("reply"+cmt_id);
      if (x.style.display === "block") {
        x.style.display = "none";
      } else {
        x.style.display = "block";
      }
    }
</script>
<script>
  function repost(status,id){
    const formData = new FormData();
      formData.append('cmt_id',id);
      formData.append('status',status);
      $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type:'POST',
            url:"{{route('user.post.repostcomment')}}",
            data: formData,
            contentType: false,
            processData: false,
            cache:false,
            success:function(data) {
              alert(data.success);
            }
        });
        {{--  location.reload();  --}}
  }
</script>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous"
  src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v5.0&appId=660344757451291&autoLogAppEvents=1">
</script>
@endsection
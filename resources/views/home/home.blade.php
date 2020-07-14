@extends('home.master')
@section('title','Home')
@section('content')
    {{-- @foreach($new as $val)
        @if($val->status == 1)
            <!-- Blog Post -->
            <div>
            <img src="{{$val->avatar}}" height="300px" alt="Card image cap">
            <div>
                <h2>{{$val->title}}</h2>
                <u><small>{{$val->category}}</small></u>
                <p>{{$val->description}}</p>
                <a href="{{route('home.get.content',$val->changetitle)}}">Read More &rarr;</a>
            </div>
            <div>
                Posted on <i>{{$val->created_at}}</i> by <b>{{$val->author}}</b>
            </div>
            </div>
        @endif
    @endforeach --}}
{{-- @endsection --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{asset('css/home/home.css')}}" type="text/css">
    {{-- <!-- <title>Footer</title> --> --}}
</head>

<body>

  
  <div class="container">
    <div class="container-wrap">
      <div class="wrap-avatar">
        <img class="avatar"
        src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOEAAADhCAMAAAAJbSJIAAAAXVBMVEX///+ZmZmWlpbv7++QkJCUlJSNjY2MjIybm5uGhob29vb7+/vs7OyIiIjy8vLQ0NCoqKjl5eXd3d3Dw8OioqLKysqurq6/v7/e3t61tbXn5+fW1ta7u7utra2BgYFgV+YLAAAK6klEQVR4nO2diXLiOBCGsZCs9oWNL2wgvP9jjoxJYsAGHS1LpOavmp2tyW6GLy2pu3V0b4K/ro3rD2Bd/wk/X/8JP1//CT9fKxGC5tcQtAYhXCEIYUKUXUUIGb5gGe4q64QCgjDKKWUE6roYVQMwKv6QEdsWXIGQZlEYFIemPG538Y9227TLDy2Ir1Ji9wPYI4TBdhT6pow3i0r2eV+L/4zc/Y+ohrVHSENSNN12me5bsaCEMCQDloUxa4mQZLzOty+M92DK3amlEbMyKS0Qghid0EgY74Hy9DWMVnRLohNCQGl/2qnyXRn354ATbBeCTAgBz/pjosN3Zdw2NENmRCUU9mO9lvkmamBcdLDGKg7hOHmA8vPekE9oV5EQcSri2RCCCDpzvkHHXqyrWEIhBLguMDkO36Cuvg1VcyHZEAhvj3iAIgyoOMVBRJqHNMq1F9AF7SFDQTQi/PkEvFB28O+VVJwhMCLYEEhWScdnSsoJwkg1JRRrDOOIS8y99sCNEc1tSCG1BSj0FTolHH6+YW1hCv4qOZh6f0MbQmZjjblTdTH7iAaEw482O1vmE8rNnL+ZDXlrH9AU0YQQeGvHSzwhXgzmogkh71fhGxC5/oacAWFYYwdqy6r0/aIm4eDorfrBR/XaQaoy4e0vAhKsCbjZFLquX9uGEUI2r6JdrRmjatlQ/MqqdQFFUqxpRHUbXhHD1ZbRX5XRSoQDIAHTHTUd9aHOONWbh5eVJ+GoLejsT2kR8tUn4ag91TiZ0iAEVq8TrD3roOEVdQj5yRHgZhOq79xorKV8hYxpSSVX/rzq/pBwV2NUKGmV/b66DV0tM6M6+4TulplRB9UsQ4FwPPIKrW0dyilWTRUVbSiiGbcmFJGNohGVCEVWGLnzFDftiJoR1WwIjLkGFDORWiR0vJCO2tskdD8LB/VKHkONkB5c0w3qImuEECId1BuKqUSnSoSsWG//8JUqrpBBqRBC1rhmG3VkCg5DyYaZ7XMmScWFwjBVidpo7RrtW7mCw1CxYeiBMxy1V9iwUSAkDPXGjIniWn4iKhC6zpumUjipUSCkZz98xaBS3umrEDpPK34lskRZRJVR6s00FKql1xp5QlK72MlfkvwOvzwhdXAYs6xG+iRKmhC4JyHbKPnATZ7Q/f7FVDtAJwwynxYa4fNllxppQkL98YZCSY9OyALXUPeqZINveUJvEotR0umFFOH1luUqV9jkdcK2odMztTmVyIQA/iSHo6RTROl5GHrl8AeXj0sIAeaLGAyl6Db0jRDbhn5lh4NS7KiNUD+2u3+0lQ1MP9eG6ISuT7cfZWEeekaIvZYKb/HH/aFPG96j0GMa7+LSDnuUOrkV/Eol/kpTuGa6F25+OIiBa6Z74ef4hLpmupOFfZqAr/uC5I3iAp8wKl1TTWVhvxQyr4KaFH/P27NzixP+uUVACn+OgDebs/QhsMr5oU9LTSF9G+NDz4ATauMMmHoUe+/lX3mpjFKPJmLDpYtJKd2n8WYiJtL+XvFOlDceUTr9VSX8ck32LeljGUVCwj05JE1aO3cTReDmib/YqjxIULpfSj05Q8xVXrCp3fOmTl7HPgmGaWjBWwj5saWYZiqfWY3QjwuYB6U33apvZjxwiSlTeu2scs9bfFcfrno3as/yVV9Yrl0O41nyt6GUCa/lIpjzbdNG8bGzqg2But6QYoqFFZQJ2Zfb0C1XLTqg8ZbbaegmfWxoQMiIS0I1X6hH6HTjNFWvwq9TF8NhdArqpZS0CFtXi02uUWZIrz6No8UmJRr9MHQIgUROnl7EhU65L71aX6ETp6gazWgSjpguHl+kmVbxRN26ietv2WyJXmVo3Zp7jK48FZNWq5aZvg2BrrzHfxgm4Xr12oa/jH+tiZhfQLPthX790lVvSZ30K0Jr174UilYLUPdMv5KwUR3haCWfkV4MSiUb1YIm6zxR2AcmHQTMarKTNR4lHgdH6MiGw0A92I7fuotZDwjjzgG2S17n8ncSLBEKRJt+sTLuN2NOCDywlvPHfWTcFwmjRwm1tYe6L8wbeKB00gESWqmQVVKMdkFIvYI4Qb+Jsu0jlJZPGKN0+EVZg7vgdIFx/5VRWF3JxEitEc0Yn6mRm58Ise8azc5IjHHO5W91vRNqd8CQ5BhD9VRg9nlEJRSheG2cUe17zjAbdWJ2BxzEIsgNdnDiro7o1X5+jtJBwEJoNOdjnBf0emPN637A4sMxSnqNQijHqg4NcvkloRMOgoBGwTlVWHWStKkz+epWKrJCODCykBWVTEvnYfI1LQtpgOQAH2SJ8NZSnULb7F+bMs3PNbXZZN3SKP3+nbAsCqGvyuM2juMkGTcEkmRor552zblm1pur27LhjwAIC0PKgrr46s+HphI6n9uiBkbFnxMr3cansk44aBiyhA2iN4l/HW7BAnKn+DmtQuhUKITw8LtXQsueJv/E+5aeZMC/QgYEFAeJkuMDoTZGKGOeEBIesTpD6jH9I2AZkMig7+G39LqS/WiIW+pDKUKTliJ67iHoK8R33TcF+453dKelgQ0BGKdF092isq4Pv/enzcw5XLYOi1uf73ifFyLEvTVI0fl2+qfcIn8g52nQmRxbnhEjz3FdXQKe1eXk+8bHhmSh9rKjeZ8mIJS1zydr8TXF00wSYAxkKaueE+juLP5c66Pq3foCwuEwn+PGZUtCzZVVDAtO23x+g+DY1KHWaqax0oAYM8128dgw2eY110kYRJoB1XH5ODJuINI4StTo2RXC27Pt3akPrkmfjDFvqSRrm7dbH6WYBNYJQ1JJ7aVtu6oAysPZ3BZ+/4UQKnKo+nCS2tmJxfhQ3OtQ7RV06eX30eJdV7WEZhGnczUehOFC8TVSnMut/JZOfObD9S/5zUYlQhIW6oeh8fFUnb/qYJIdjvkhfPWHXG4n506765axtJT6W1DtTftklx73XXk65UKnU1l2x3SnfcchB4VbfPKEENXeVIPetvJ3iN4T3tw386tieU6oZJQjW+srBE9eOX/rWEjeiX5LeP1BQVZ4U0/hW8mX3NMEqVFKfCvWNioPZQIniVEqAD2qajJVKdNaVsKG5OLZFPxVR98jviGEoeWh6zeVL5S+fwj1zoZAmGflde+1Degbp/HOhsRNk3F5HYM3VnxDSJw/+32r9E3H9TeE/hTdWVb6OhB/QSjG98WrSG1J5csHUS9t6Fvd2SWdXgVwrwip44fp8qpePGFfJgSCf6PSmurlhHGREILIm3TwvWJYDG6WbehDc2N5LbcsWSJc/fWdqQ5LU3GJ8JMm4ailCHWB0LMeZDLqrtvsz5SzhCB+Hq4/sLqq+XvF8zb0qAikvBbar87b0Nek/rW62Y2bOUJha5/aVcqrmPP7s4Sft8yM2s4dj8wQfuQyM6qa8RhzNnRbJ8lEczWWZgiZs/Iz5mqeI5sZQv83LpaVPF8xeiZkxeeacK5W+zNh5PXu4TvtgsfLA4+E4FsvElUd6MP1sCcb+lC/00T7R4fxSMjgs9LCZ/UPiHeE4FfxfD09RqePNvSkFrKJCHtFyDypZ22ih7br96P0Y2PuqdL7eub3NvSmrryJkpYtEnrXXE1PJ7rsDz85JP1Veufy7wgZfGZu/6h+uj18T2ilvMX6Ki9LNvwbg1SsNdOLNneEH7fPvaRpGdApoV99x0yUT5z+hBDWqzBnW1OnP7Vh9jdW0s19d8QJIYF4+1d0mCMc7iD+FS16fNcfDE8TqH9Pa61WwBGO6wAAAABJRU5ErkJggg=="
        alt="image default" />
      </div>
      <div class="infor">
        <h2>Nguyen Thai Long-18I1</h2>
        <h4>Trường Đại Học Công Nghệ Thông Tin và Truyền Thông Việt - Hàn</h4>
        <code>eat-sleep-code</code>
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
    
   
    <ul class="nav nav-tabs">
      <li><a href="#nav-home" data-toggle="tab">summany</a></li>
      <li><a href="#nav-profile" data-toggle="tab">tab2</a></li>
      <li><a href="#nav-contact" data-toggle="tab">tab3</a></li>
   </ul>
   
   <div class="tab-content">
      <div class="tab-pane active" id="nav-home">
         <div class="wrap-content-tabs">
         <div>
             <div class="icon-social">
             <i class="fas fa-envelope"></i>
             <i class="fab fa-gitlab"></i>
             <i class="fab fa-linkedin-in"></i>
             <i class="fab fa-twitter"></i>
             <i class="fab fa-facebook-square"></i>
             <i class="fab fa-soundcloud"></i>
             <i class="fab fa-youtube"></i>
             <i class="fas fa-camera"></i>
             </div>
           </div>
         <div class="about">
         {`There are no constraints on 
         the human mind, no walls around the 
         human spirit, no barriers to our progress 
         except those we ourselves erect`}
         </div>  
         <div class="bio">
             <h1>Biography</h1>
             <div class="bio-content"> who helps a team of intelligent 
                 minds in designing cutting-edge 
                 chipsets that millions of people 
                 around the world use in their everyday life. 
                 I use my web development skills (particularly front-end) 
                 to solve day-to-day problems using data and 
                 visualization techniques.</div>
         </div>      
         <div class="timeline">
             <h1>Timeline</h1> 
             <ul class="timeline-content">
                 <li>
                     <strong>2020-now-</strong>
                     {`Qualcomm - ASIC Physical Design & Signoff, Full-stack Web Development & Machine Learning.`}
                 </li>
                 <li>
                     <strong>2019-now-</strong>
                     {` Nokia - Internship with focus on Automation, Python, Web Development & Machine Learning.`}
                 </li>
                 <li>
                     <strong>2018-2019-</strong>
                     {` Anna University, MIT Campus, Chennai - Master of Engineering in VLSI Design &`}
                 </li>
                 <li>
                     <strong>2017-2018-</strong>
                     {`TATA Consultancy Services - Front-end Web Development, Android Development.`}
                 </li>
                 <li>
                     <strong>2016-2017-</strong>
                     {`Thiagarajar College of Engineering, Madurai - Bachelor of Engineering in Electronics & Communication (CGPA 9.05/10).`}
                 </li>
                 <span> {`In this website, you will find collection of my thoughts, 
                 notes, tutorials and resources based on my experience in technology. 
                 I still learn by myself about the technical topics that 
                 I write here so that I get a clear understanding of it. 
                 I do this mainly during my free time because`} </span>
                  <li>
                     {`It helps me learn these topics better by making me read, write and evaluate myself first before sharing it here.`}
                 </li>
                 <li>
                     {`It provides me a chance to organize my technical interests so that I can refer to it later.`}
                 </li>
                 <li>
                     {`It gives me a chance to share my knowledge with the world where it might help someone somewhere.`}
                 </li>
             </ul>
         </div>    
      </div>
   
   </div>
      <div class="tab-pane" id="nav-profile">BBB</div>
      <div class="tab-pane" id="nav-contact">CCC</div>
   
</div>
  </div>

</body>
</html>
  @endsection 

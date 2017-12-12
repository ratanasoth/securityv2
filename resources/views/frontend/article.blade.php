@extends('layouts.front')
@section('content')
<style type="text/css">
	
</style>
<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
	<div class="modal-dialog">

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
				<div class="row facebook-form">

					<div class="col-md-8 col-md-offset-2">
						<form class="form-horizontal">
							<div class="form-group">
								<label for="inputEmail3" class="col-sm-4 control-label">Email or Phone:</label>
								<div class="col-sm-8">
									<input type="email" class="form-control" id="inputEmail3">
								</div>
							</div>
							<div class="form-group">
								<label for="inputPassword3" class="col-sm-4 control-label">Password:</label>
								<div class="col-sm-8">
									<input type="password" class="form-control" id="inputPassword3">
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-offset-4 col-sm-8">
									<button type="submit" class="btn btn-primary">Log In</button>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-offset-4 col-sm-8">
									<a href="https://www.facebook.com/login/identify?ctx=recover&lwv=100">Forgotten account?</a>
									<button type="button" onclick="location.href='https://www.facebook.com/reg/';" class="btn btn-create">Create New Account</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="col-md-9 single-article-content">
			<div class="single-article-header">
				<h4>មិន​នឹក​ស្មាន​ថា ផ្លែ​ប៉េងប៉ោះ អាច​ដោះស្រាយ​បញ្ហា​មុខ ច្រើន​ដល់​ម្ល៉ឹង!</h4>
				<div class="col-md-12">
					<div class="pull-left">
						<div class="row">
							<span><i class="fa fa-clock-o" aria-hidden="true"></i> ម្សិលមិញ ម៉ោង 14:54</span>
						</div>
						
					</div>
					<div class="pull-right">
						<button type="submit" class="btn btn-facebook-share"><i class="fa fa-facebook-square" aria-hidden="true" data-toggle="modal" data-target="#myModal"></i></button>
					</div>
				</div>
				
				
				<hr/>
			</div>
			<article>
				<p>
					ក្រុមហ៊ុន RMA ដែល​ជា​ក្រុមហ៊ុន​នាំ​ចូល​រថយន្ត​ Ford មក​កាន់​ប្រទេស​កម្ពុជា បាន​រៀបចំ​កម្មវិធី​ដំណើរ​កម្សាន្ត​ជូន​អតិថិជន​របស់​ខ្លួន​ដោយ​ធ្វើ​ដំណើរ​ពី​ប្រទេស​កម្ពុជា​ទៅ​ប្រទេស​ថៃ មាន​រយៈពេល​ ៣យប់ ៤ថ្ងៃ ក្នុង​ចំណោម​ដំណើរ​កម្សាន្ត​នេះ RMA បាន​ទៅ​ដល់​មជ្ឈមណ្ឌល​សិក្សា​ស្រាវជ្រាវ​ និង អភិរក្ស​ដំរី ស្ថិត​នៅ​ក្នុង​ខេត្ត​សុរិន្ទ ប្រទេស​ថៃ។
				</p>
				<p>
					ខេត្ត​សុរិន្ទ ប្រទេស​ថៃ ដែល​មាន​ចម្ងាយ​ប្រមាណ​ជា ជាង​៥០០ គីឡូម៉ែត្រ ពី​រាជធានី​ភ្នំពេញ​ប្រទេស​កម្ពុជា គឺជា​ទឹក​ដី​សម្បូរ​សត្វដំរី។ នៅ​ក្នុង​មជ្ឈមណ្ឌល​គជ​សិក្សា​ ខេត្ត​សុរិន្ទ​មាន​ដំរី​ប្រមាណ​ជា ២០០ ក្បាល ដែល​គេ​យក​មក​បង្ហាត់​ និង សម្ដែង​នៅ​ក្នុង​រឿង​បុរាណ​របស់​ថៃ​ជាច្រើន​ហូរហែ​ជាបន្តបន្ទាប់​ ហើយ​ហ្វូង​ដំរី​ដែល​នៅ​ត្រាច់ចរ​នៅ​តាម​ផ្លូវ​នានា ក្នុង​ក្រុង​បាង​កក​ក្ដី ភាគច្រើន​ គឺជា​ដំរី ដែល​នៅ​ខេត្ត​សុរិន្ទ​នេះ​ឯង។
				</p>
				<p>
					<img src="http://cdn.sabay.com/cdn/media.sabay.com/media/sabay-news/Technology-News/Local/Car/Ford/Ford-Adventure-2016/Ford-Adventure-2016-8_large.jpg" class="img-responsive" alt="Responsive image">
				</p>
				
				<p>
					<strong>សូមចុចទស្សនា​វិដេអូ​ខាង​ក្រោម​នេះ</strong>
					<br>

					<div class="responsive-video">
						<iframe src="https://www.facebook.com/plugins/video.php?href=https%3A%2F%2Fwww.facebook.com%2FRHM.Production%2Fvideos%2F1814045242186887%2F&show_text=0&width=560" width="560" height="315" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allowFullScreen="true"></iframe>
						<iframe src="https://www.facebook.com/RHM.Production/videos/1814045242186887/" frameborder="0" allowfullscreen=""></iframe>
						<video src="https://www.youtube.com/watch?v=nRcQYTGwWdI"></video>
					</div>
				</p>
			</article>
		</div>
		<!-- Relative Article -->
		<div class="col-md-3">
			<div class="rel-article">
				<a href="#">
					<img src="/images/img1.jpg" class="img-responsive" alt="Responsive image"/>
					<div class="rel-article-content">
						<span class="bigtitle">រឿងកាន់តែធំ គណៈកម្មការ ប្រាប់ពីចំនុចខ្សោយ របស់ ម៉ា ដូណា ដែលមិនសាកសម ទទួលពានរង្វាន់ដែលខ្លួនចង់បាន (មានវីដេអូ)
						</span>
						<span class="biginfo">
							1,890 SHARES / ១ ម៉ោងមុន
						</span>
					</div>
				</a>
			</div>
			<div class="rel-article">
				<a href="#">
					<img src="/images/img1.jpg" class="img-responsive" alt="Responsive image"/>
					<div class="rel-article-content">
						<span class="bigtitle">រឿងកាន់តែធំ គណៈកម្មការ ប្រាប់ពីចំនុចខ្សោយ របស់ ម៉ា ដូណា ដែលមិនសាកសម ទទួលពានរង្វាន់ដែលខ្លួនចង់បាន (មានវីដេអូ)
						</span>
						<span class="biginfo">
							1,890 SHARES / ១ ម៉ោងមុន
						</span>
					</div>
				</a>
			</div>
			<div class="rel-article">
				<a href="#">
					<img src="/images/img1.jpg" class="img-responsive" alt="Responsive image"/>
					<div class="rel-article-content">
						<span class="bigtitle">រឿងកាន់តែធំ គណៈកម្មការ ប្រាប់ពីចំនុចខ្សោយ របស់ ម៉ា ដូណា ដែលមិនសាកសម ទទួលពានរង្វាន់ដែលខ្លួនចង់បាន (មានវីដេអូ)
						</span>
						<span class="biginfo">
							1,890 SHARES / ១ ម៉ោងមុន
						</span>
					</div>
				</a>
			</div>
			<div class="rel-article">
				<a href="#">
					<img src="/images/img1.jpg" class="img-responsive" alt="Responsive image"/>
					<div class="rel-article-content">
						<span class="bigtitle">រឿងកាន់តែធំ គណៈកម្មការ ប្រាប់ពីចំនុចខ្សោយ របស់ ម៉ា ដូណា ដែលមិនសាកសម ទទួលពានរង្វាន់ដែលខ្លួនចង់បាន (មានវីដេអូ)
						</span>
						<span class="biginfo">
							1,890 SHARES / ១ ម៉ោងមុន
						</span>
					</div>
				</a>
			</div>	
		</div>
	</div>
</div>
@endsection
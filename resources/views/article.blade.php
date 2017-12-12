@extends('layouts.frontend')

@section('content')
	<div class="header_bottom">
		<div class="wrap">
			<div class="menu">
			    <ul>
			    	<li><a href="index.html">HOME</a></li>
			    	<li><a href="single.html">ARTICLES</a></li>
			    	<li><a href="single.html">SERVICES</a></li>
			    	<li><a href="#">LOGOS</a></li>
			    	<li><a href="single.html">TOOLS</a></li>
			    	<li><a href="single.html">ICONS</a></li>
			    	<li><a href="single.html">WALLPAPERS</a></li>
			    	<li><a href="index.html">HELP</a></li>
			    	<li><a href="contact.html">CONTACT</a></li>
			    </ul>
			</div>
			<div class="search_box">
			    <form>
			    <input type="text" value="Search" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search';}"><input type="submit" value="">
			    </form>
			</div>
		<div class="clear"></div>
		</div>
	</div>
</div>
<div class="wrap">
	<div class="main">
		<div class="content">
			<div class="box1">
			   <h2><a href="single.html">Making it look like readable English. Many desktop publishing packages and web page</a></h2>
			   <span>By Kieth Deviec - 2 hours ago</span>
			   <p>Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editorsLorem Ipsum is that it has a more-or-less normal distribution of letters.</p>
				<div class="top_img">
				   <img src="images/img2_630X330.jpg" alt="" />
				</div>   
				<div class="data_desc">
				    <p>Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editorsLorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors</p>
				    <p>Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editorsLorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors</p>
				    <p>Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editorsLorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors</p>
				    <a href="#">Continue reading >>></a>
				</div>
			</div> 
		</div> 
	<div class="sidebar">
		<div class="side_top">
			<h2>Recent Feeds</h2>
			<div class="list1">
			   <ul>
				 <li><a href="#">Lorem ipsum dolor desktop publishing</a></li>
				 <li><a href="#">Lorem ipsum dolor desktop publishing</a></li>
				 <li><a href="#">Lorem ipsum dolor desktop publishing</a></li>
				 <li><a href="#">Lorem ipsum dolor desktop publishing</a></li>
				 <li><a href="#">Lorem ipsum dolor desktop publishing</a></li>
			     <li><a href="#">Lorem ipsum dolor desktop publishing</a></li>
			   </ul>
			</div>
		</div>
	<div class="side_bottom">
		<h2>Most Viewed</h2>
		<div class="list2">
		   <ul>
			 <li><a href="#">Lorem ipsum dolor desktop publishing</a></li>
			 <li><a href="#">Lorem ipsum dolor desktop publishing</a></li>
			 <li><a href="#">Lorem ipsum dolor desktop publishing</a></li>
			 <li><a href="#">Lorem ipsum dolor desktop publishing</a></li>
			 <li><a href="#">Lorem ipsum dolor desktop publishing</a></li>
			 <li><a href="#">Lorem ipsum dolor desktop publishing</a></li>
		   </ul>
		</div>
	</div>
	</div>
	<div class="clear"></div>
	</div>
</div>
@endsection


@extends('layouts.front')
@section('content')
<!-- category -->
<div class="col-md-12">
<div class="row article-row">
@if(count($articles) > 2 )
    <div class="article-header">
        <a href="#"><h4 class="title"><i class="fa fa-hand-o-right" aria-hidden="true"></i>  {{ $ptitle }}</h4></a>
        <hr/>
    </div>
    
    
        <!-- Left arttlce -->
        <div class="col-md-12 article-content">
            <div class="col-md-3">
            @for ($i = 0; $i < 2; $i++)
                <div class="p-article">
                    <a href="/news/{{$articles[$i]->id}}">
                         <div class="box ratio16_9">
                                <div class="img-bg" style="background-image: url('{{URL::to('media_photo?id='. $articles[$i]->image_header . '&width=400&height=400') }}');">
                                      
                                </div>
                        </div>   
                        <!-- <img src="{{URL::to('media_photo?id='. $articles[$i]->image_header . '&width=400&height=400') }}" class="img-responsive" alt="Responsive image"/> -->
                        <div class="p-article-content">
                            <span class="bigtitle">{{(strlen($articles[$i]->title) > 96) ? mb_substr($articles[$i]->title,0,94,'UTF-8').'...' : $articles[$i]->title}}</span>
                            <span class="biginfo"><i class="fa fa-clock-o" aria-hidden="true"></i> 
                                {{$articles[$i]->date}}
                            </span>
                        </div>
                    </a>
                </div>
            @endfor  
            </div>
            <!-- right article -->
            <div class="col-md-9">
                <ul class="article-list">
                    @foreach ($articles as $article)
                    @if ($loop->index > 1)
                        <li class="col-md-12 item-list">
                            <a href="/news/{{$article->id}}">
                                <div class="box ratio16_9 col-md-3">
                                    <div class="img-bg" style="background-image: url('{{URL::to('media_photo?id='. $article->image_header . '&width=400&height=400') }}');">
                                              
                                    </div>
                                </div>
                                <!-- <img src="{{URL::to('media_photo?id='. $article->image_header . '&width=400&height=400') }}" class="img-responsive col-md-2" alt="Responsive image"> -->
                                <div class="col-md-7 article-list-content">
                                    <span class="title">
                                        {{$article->title}}
                                    </span>
                                    <span class="info"><i class="fa fa-clock-o" aria-hidden="true"></i> 
                                        {{$article->date}}
                                    </span>
                                </div>
                            </a>
                        </li>
                    @endif
                    @endforeach
        
                </ul>
            </div>
        </div>
    </div>
    @else
    <!-- if article <=8 -->
    <div class="row article-row">
        <div class="article-header">
            <a href="#"><h4 class="title"><i class="fa fa-hand-o-right" aria-hidden="true"></i>  {{ $ptitle }}</h4></a>
            <hr/>
        </div>
        <div class="col-md-12 article-content">
             @foreach ($articles as $article)
            <div class="col-md-3">
                <div class="p-article">
                    <a href="/news/{{$article->id}}">
                        <div class="box ratio16_9">
                            <div class="img-bg" style="background-image: url('{{URL::to('media_photo?id='. $article->image_header . '&width=400&height=400') }}');">
                                      
                            </div>
                        </div>
                        <!-- <img src="{{URL::to('media_photo?id='. $article->image_header . '&width=400&height=400') }}" class="img-responsive" alt="Responsive image"/> -->
                        <div class="p-article-content">
                            <!-- <span class="bigtitle">{{$article->title}}</span> -->
                            <span class="bigtitle">{{$article->title}}</span>
                            <span class="biginfo"><i class="fa fa-clock-o" aria-hidden="true"></i> 
                                {{$article->date}}
                            </span>
                        </div>
                    </a>
                </div>   
            </div>
            @endforeach
        </div>
    </div>
    @endif

    </div>
    </div>

    @endsection
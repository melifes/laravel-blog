@section('title', $article->title.' - ')
@extends('home')

@section('content')
    <ul class="breadcrumb">
              <li><a href="{{ url('/')}}">首页</a></li>
              <li><a href="{{url('category/'.$article->category['id'])}}">{{$article->category['name']}}</a></li>
              <li class="active">{{$article->title}}</li>
            </ul>
    <div class="bs-grid row">
    <div class="tmd-primary col-sm-9">
        <div class="tmd-content">
            <article id="8" class="bs-article bs-panel-box">
                <header>
                    <h2 class="bs-article-title">{{$article->title}}</h2>
                    <ul class="bs-article-meta bs-subnav bs-subnav-line">
                        <li>Posted on <a href="{{url('category/'.$article->category['id'])}}">{{$article->category['name']}}</a></li>
                        <li>更新于 <a href="#">{{ $article->updated_at->diffForHumans() }}</a></li>
                        <li><a href="#"><span class="ds-thread-count" data-thread-key="{{ $article->id }}" data-count-type="comments"></span></a></li>
                        <li>
                            @foreach($article->tags as $tag)
                                <a href="{{url('tag/'.$tag->id)}}">{{$tag->name}}</a>&nbsp;
                            @endforeach
                        </li>
                    </ul>
                </header>

                <div class="blog-post">
                    <div class="tmd-article-content">
                        {!! EndaEditor::MarkDecode($article->content) !!}
                    </div>
                </div>

               @include('home/disqus')
            </article>
        </div>
    </div>
@endsection
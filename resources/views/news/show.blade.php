@extends('layouts.app')
@section('content')
@section('title',$news->title)
    <div class="col-md-50 offset-md-1" >
        <div class="row" id="show">
            <div id="image-container" class="col-md-6">
                <img src="/images/news/{{$news->image}}" class="img-fluid" alt="{{$news->title}}"/>
            </div>
            <div id="info-container-show" class="col-md-6">
                <h1 class="font-semibold text-xl text-gray-800 leading-tight">{{$news->title}}</h1>
                <p class="news-description">{{$news->description}}</p>
                <p class="news-date">{{$news->date_published}}</p>
                <p class="news-author">Autor: {{$news->author}}</p>
                <p class="news-city">{{$news->city}}</p>
            </div>
        </div>
    </div>
    

@endsection

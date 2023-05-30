@extends('layouts.app')
@section('content')
@section('title',$news->title)
    <div class="col-md-10 offset-md-1">
        <div class="row">
            <div id="image-container" class="col-md-6">
                <img src="/images/news/{{$news->image}}" class="img-fluid" alt="{{$news->title}}"/>
            </div>
            <div id="info-container" class="col-md-6">
                <h1>{{$news->title}}</h1>
                <p class="news-description">{{$news->description}}</p>
                <p class="news-city"><ion-icon name="location-outline"></ion-icon>{{$news->city}}</p>
                <p class="news-author"><ion-icon name="vector-pen"></ion-icon>{{$news->author}}</p>
            </div>
        </div>
    </div>
    

@endsection

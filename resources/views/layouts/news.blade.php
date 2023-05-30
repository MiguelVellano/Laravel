<div id="news-container" class="col-md-12">
    @foreach($news as $new)
    <div id="cards-container" class="row">
        <div class="card col-md-2">
            <img src="images/news/{{$new->image}}" alt="{{$new->title}}">
            <div class="card-body">
                <p class="card-date">{{$new->date_published}}</p>
                <h5 class="card-title">{{$new->title}}</h5>
                <a href="/news/{{$new->id}}" class="btn btn-primary">Saber mais</a>
            </div>
        </div>
    </div>
    @endforeach
</div>
{!! $news->links() !!}
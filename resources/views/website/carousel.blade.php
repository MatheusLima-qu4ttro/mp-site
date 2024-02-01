@if(count($slides))
<!-- Carousel -->
<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        @foreach($slides as $slide)
        <li data-target="#myCarousel" data-slide-to="$loop->index" class="{{$loop->index == 0 ? 'active' : ''}}"></li>
        @endforeach
    </ol>
    <div class="carousel-inner">
        @foreach($slides as $slide)
            <div class="carousel-item {{$loop->index == 0 ? 'active' : ''}}">
                <img class="d-block w-100" src="{{ url($slide->path) }}" alt="{{$slide->name}}">
            </div>
        @endforeach
    </div>
    <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
<!-- Carousel -->
@endif

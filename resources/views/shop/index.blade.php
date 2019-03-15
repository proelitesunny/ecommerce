@extends('layouts.shop')

@section('content')
    
    @if(session('message'))
        <div class="alert alert-success">
            {{session('message')}}
        </div>
    @endif
    <div class="row carousel-holder">

        <div class="col-md-12">
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <?php $i = 0; ?>
                    @foreach($slides as $slide)
                        <li data-target="#carousel-example-generic" data-slide-to="{{$i++}}" class="{{$i == 0 ? 'active' : ''}}"></li>
                    @endforeach
                </ol>
                <div class="carousel-inner">
                    <?php $i = 0; ?>
                    @foreach($slides as $slide)
                        <div class="item{{$i == 0 ? ' active' : ''}}">
                            <img class="slide-image" src="{{asset('img/slides/'.$slide->image)}}" alt="">
                        </div>
                        <?php $i++; ?>
                    @endforeach
                </div>
                <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                </a>
            </div>
        </div>

    </div>

    <div class="row">
        @include('shop.products')
        
    </div>
@endsection
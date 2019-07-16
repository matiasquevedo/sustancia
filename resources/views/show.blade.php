@extends('welcome')


@section('title', $article->title)

@section('content')

<div class="container">
  <div class="row">
    <div class="col-md-8">
      <img src="/images/articles/{{$image}}" width="500px" height="auto" alt="">
      <h1>{{$article->title}}</h1>
      <h4> {{$article->category->name}} - Por: {{$article->user->name}} </h4>
      <div>
        <div>
          <div class="text-justify">
            {!!$article->content!!}
          </div>
          <div>
            <h4>Fuente: {!!$article->fuente!!}</h4>
          </div>
        </div>
      </div>


    </div>
    <div class="col-md-4 ">
      <div class="padre-aling">
        <div class="div-fijo div-googleplay">
          <a href="https://play.google.com/store/apps/details?id=souar.dev.brick"><img src="/images/play.png" alt="" width="80%"></a>
        </div>        
      </div>      
    </div>
  </div>
</div>



@endsection
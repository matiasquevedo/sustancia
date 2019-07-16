@extends('welcome')


@section('title', $evento->title)

@section('content')

<div class="container">
  <div class="row">
    <div class="col-md-8">
      <img src="/images/eventos/{{$image}}" alt="" width="70%">
      <h1>{{$evento->title}}</h1>

      <div class="panel ">
        <div class="panel-body" id="content">
          <div>
            <div>
              <p>{!!$evento->descripcion!!}</p>
            </div>
          </div>
          
        </div>
    </div>


    </div>
    <div class="col-md-4 ">   
      <div class="padre-aling">
        <div class="div-fijo div-googleplay">
          <a href="https://play.google.com/store/apps/details?id=souar.dev.brick"><img src="/images/play.png" alt="" width="80%"></a>
          <div class="row">
            <div class="col-sm-6">
              <div>
                <h3>
                  <span><i class="fas fa-calendar-plus "></i> {!!$evento->fecha!!}</span>                  
                </h3>          
              </div>
              <div>
                <h3>
                  <span><i class="fas fa-clock "></i> {!!$evento->hora!!}</span>                  
                </h3>
              </div>
            </div>
            <div class="col-sm-6">
              <div>
                <h3>
                  <span><i class="fas fa-map-marker-alt"></i> {!!$evento->lugar!!}</span>                   
                </h3>
              </div>
              <div>
                <h3>
                  <span><i class="fas fa-dollar-sign"></i> {!!$evento->precio!!}</span>   
                  
                </h3>
              </div>
            </div>
            </div>
        </div>        
      </div> 
    </div>
  </div>
</div>



@endsection
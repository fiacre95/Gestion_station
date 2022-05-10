@extends('layout.app')

@section('content')
 
<div class="m-10">

<div class="col md-12 mb-10">
    
    <form class="form-inline" action="{{route ('station.search_admin') }}" method="GET">
        <div class="md-form my-0">    
          <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search" name="query">
        </div>
    </form>
    <a href="{{route ('station.stats') }}" class="btn btn-primary mr-0 float-right mb-3"><i class="fas fa-plus"> </i> Statistics  </a>
</div>

<div class="col md-12 mb-10">
    <form class="form-inline" action="{{route ('station.search_admin') }}" method="GET">
        <div class="md-form my-0">    
            <input class="form-control" type="date" value="{{ now()->toDateString('Y-m-d') }}" id="example-date-input" name="date1"/>
            <input class="form-control" type="date" value="{{ now()->toDateString('Y-m-d') }}" id="example-date-input" name="date2"/>   
            <button type="submit" class="btn btn-success">Primary</button>
        </div>

        
    </form>
    
</div>
<info></info>

        <div class="row">
            
            <div class="col-lg-4 ">
                <!--begin::Card-->
                <div class="card card-custom card-stretch bg-danger">
                    <div class="card-header">
                        <div class="card-title">
                            <h3 class="card-label">CAPITAL OBTENU </h3>
                        </div>
                    </div>
                    <div class="card-body">
                            <?php
                                $nombre_litre = 0;
                                $total = 0;
                            ?> 
                        
                        @foreach($achats as $achat)

                            <?php
                            $achat->created_at;
                            
                            $lineTotal = $achat->montant * $achat->quantite;
                            $total= $total + $lineTotal;

                            $litre = $achat->quantite;
                            $nombre_litre = $nombre_litre + $litre;
                            ?> 

                            
                        @endforeach

                        <h1> {{ $total }} FCFA</h1>
                    </div>
                </div>
                <!--end::Card-->
            </div>
            <div class="col-lg-4">
                <!--begin::Card-->
                <div class="card card-custom card-stretch bg-primary">
                    <div class="card-header ">
                        <div class="card-title">
                            <h3 class="card-label">NOMBRE DE LITRES VENDUS </h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <h1> {{ $nombre_litre }} LITRES </h1>
                    </div>
                </div>
                <!--end::Card-->
            </div>
        </div>
        
</div>

@endsection
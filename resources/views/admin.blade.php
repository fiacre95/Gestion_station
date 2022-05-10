@extends('layout.app')

@section('content')
 
<div class="m-10">

<div class="col md-12 mb-10">
    
    <form class="form-inline" action="{{route ('station.search') }}" method="GET">
        <div class="md-form my-0">    
          <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search" name="query">
        </div>
    </form>
    <a href="{{route ('station.stats') }}" class="btn btn-primary mr-0 float-right mb-3"><i class="fas fa-plus"> </i> Statistics  </a>
</div>

<div class="col md-12 mb-10">
    <form class="form-inline" action="{{route ('station.search_date') }}" method="GET">
        <div class="md-form my-0">    
            <input class="form-control" type="date" value="{{ now()->toDateString('Y-m-d') }}" id="example-date-input" name="date1"/>
            <input class="form-control" type="date" value="{{ now()->toDateString('Y-m-d') }}" id="example-date-input" name="date2"/>   
            <button type="submit" class="btn btn-success">Primary</button>
        </div>

        
    </form>
    
</div>
<info></info>

    
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Montant</th>
                <th scope="col">Quantite</th>
                <th scope="col">Cathegorie </th>
                <th scope="col">Date </th>
                <th scope="col">Modifier </th>
                <th scope="col">Details </th>
                <th scope="col">Supprimer </th>
            </tr>
        </thead>
        <tbody>
            
            @foreach($achats as $achat)
            <tr>
                <th scope="row">{{ $loop->index + 1 }}</th>
                <td>{{$achat->montant}}</td>
                <td>{{$achat->quantite}}</td>
                <td>{{$achat->cathegory}}</td>
                <td>{{$achat->created_at}}</td>
                <td>
                        <a href="{{ route ('station.edite', $achat) }}" class="btn btn-light-warning font-weight-bold mr-2">Modifier</a>
                </td>
                <td>
                        <a href="{{ route ('station.details', $achat) }}" class="btn btn-light-info font-weight-bold mr-2">Details</a>
                </td>
                <td>
                        <a href="{{ route ('station.delete', $achat) }}" class="btn btn-light-danger font-weight-bold mr-2" onclik="if(confirm('voulez vous vraiment le supprimer')){document.getElementById('form-{{ $achat->id }}')}">Supprimer</a>
                        <form action="{{ route ('station.delete', $achat) }}" method="post" id="form-{{$achat->id}}" >
                            @csrf
                            <input type="hidden" name="_method" value="delete"> 
                        </form>
                </td>
                
            </tr>
            @endforeach
            
        </tbody>
        
    </table>
    
    
    
</div>

@endsection
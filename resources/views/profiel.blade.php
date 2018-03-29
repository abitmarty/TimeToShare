@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Profiel</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div>
                      <p>Naam: {{auth()->user()->name}}</p>
                      <p>Id: {{Auth::user()->id}}</p>
                      <p>Email: {{auth()->user()->email}}</p>
                      <p>Producten: {{ $alleproducten->count() }}</p>
                      <p>Geleend: {{ $geleendProd->count() }}</p>
                      <p>Uitgeleend: {{ $uitgeleeend->count() }}</p>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
  document.getElementById("productenId").classList.remove('active');
  document.getElementById("profielId").classList.add('active');

  function clearBox(boxnr){
    document.getElementById(boxnr).value = '';
    document.getElementById(boxnr).style = 'color: black;';
  }
</script>
@endsection

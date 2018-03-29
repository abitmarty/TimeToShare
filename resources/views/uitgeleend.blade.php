@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Uitgeleend</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    @foreach ($uitGelProd as $prod)
                      <div class="productenClass">
                        <form class="leenForm" action="/ikhebm" method="post" style="display: inline-block;">
                          {{ csrf_field() }}
                          <p class="naamProduct">{{ $prod->product_naam }}</p>
                          <input class="Hide" name="prodId" value="{{$prod->id}}"><!-- Echt hiden!!!! -->
                          @if ($prod->geacepteerd == 1) <!-- Wachten op acceptatie en echt uitgeleend -->
                            <p class="rechtsForm" style="display: inline-block;">Geacepteerd</p>
                          @else
                            <div class="rechtsForm">
                              <input class="button" type="submit" name="accept_button" value="Ik heb het product">
                            </div>
                          @endif
                        </form>
                      </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
  document.getElementById("productenId").classList.remove('active');
  document.getElementById("uitgeleendId").classList.add('active');

  function clearBox(boxnr){
    document.getElementById(boxnr).value = '';
    document.getElementById(boxnr).style = 'color: black;';
  }
</script>
@endsection

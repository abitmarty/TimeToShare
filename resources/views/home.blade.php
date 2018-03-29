@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Producten</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    @foreach ($productenVanGb as $prod)
                        <div class="productenClass">
                          <form class="leenForm" action="/uitlenen" method="post" style="display: inline-block;">
                            {{ csrf_field() }}
                            <p class="naamProduct">{{ $prod->product_naam }}</p>
                            <input class="Hide" name="prodId" value="{{ $prod->id }}"><!-- Echt hiden!!!! -->
                            @if ($prod->uitgeleend == 1) <!-- Wachten op acceptatie en echt uitgeleend -->
                              @if ($prod->geacepteerd == 1) <!-- Wachten op acceptatie en echt uitgeleend -->
                                <p class="rechtsForm" style="display: inline-block;">Geacepteerd sinds {{ $prod->updated_at }}</p>
                              @else
                              <p class="rechtsForm" style="display: inline-block;">Uitgeleend sinds {{ $prod->updated_at }}</p>
                              @endif
                              <!-- <p class="rechtsForm" style="display: inline-block;">Uitgeleend sinds {{ $prod->updated_at }}</p> -->
                            @else
                            <div class="rechtsForm">
                              <input onclick="clearBox('uitleenBoxId{{$prod->id}}')" id="uitleenBoxId{{$prod->id}}" class="uitleenBoxId" value="User Id" type="text" name="uileenId" style="color:grey; width:50%;">
                              <input class="button" type="submit" value="Uitlenen">
                            </div>
                            @endif
                          </form>
                        </div>
                        <!-- <div class="productenClass">
                          <form class="leenForm" action="/uitlenen" method="post" style="display: inline-block;">
                            {{ csrf_field() }}
                            <p name="prodId" value="{{$prod->id}}" class="naamProduct">{{ $prod->product_naam }}</p>
                            <div class="rechtsForm">
                              <input onclick="clearBox('uitleenBoxId{{$prod->id}}')" id="uitleenBoxId{{$prod->id}}" class="uitleenBoxId" value="Uitleen Id" type="text" name="uileenId" style="color:grey;">
                              <input type="submit" value="Uitlenen">
                            </div>
                          </form>
                        </div> -->
                    @endforeach

                    <form method="post" id="deForm" action="/voegProductToe" style="display: inline-block; margin-left:1%; width:100%;">
                      {{ csrf_field() }}
                      <input id="box1" onclick="clearBox('box1')" value="Product naam" type="text" name="productNaam" style="color:grey;">
                      <input class="button" type="submit" value="Voeg toe">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
  function clearBox(boxnr){
    document.getElementById(boxnr).value = '';
    document.getElementById(boxnr).style = 'color: black;';
  }
</script>
@endsection

@extends('layout')

@section('content')

<style>
    .container {
      max-width: 450px;
    }
    .push-top {
      margin-top: 50px;
    }
</style>

<div class="card push-top">
  <div class="card-header">
    Kupon felvitele
  </div>

  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
  @if (Auth::user()->email === 'focipecs@focivilag.hu')
      <h1>Nem tudsz kupont létrehozni!</h1>
      <br>
      <a href="{{ route('kuponok.index') }}">Vissza</a>
  @else
      <form method="post" action="{{ route('kuponok.store') }}">
        <div class="form-group">
            @csrf
            <label for="name">Név</label>
            <input type="text" class="form-control" name="name"/>
        </div>
          <div class="form-group">
              <label for="value">Érték</label>
              <input type="number" class="form-control" name="value"/>
          </div>
          <div class="form-group">
              <label for="barcode">Vonalkód</label>
              <input type="number" class="form-control" name="barcode"/>
          </div>
          <div class="form-group">
            <label for="validtil">Érvényes</label>
            <input type="text" id="datepicker" class="form-control" name="validtil" placeholder="Év-Hónap-Nap"/>
        </div>
        <div class="form-group">
            <label for="value">Kiállítás dátuma</label>
            <input type="text" class="form-control" id="datePicker" name="kiad" placeholder="Év-Hónap-Nap"/>
        </div>
          <div class="form-group">
            <label for="used">Nincs felhasználva</label>
            <input type="checkbox" class="form-control" name="used" value="igen" checked style="display:none;"/>
        </div>
          <button type="submit" class="btn btn-block btn-danger">Létrehozás</button>
      </form>
      @endif
  </div>
</div>
@endsection

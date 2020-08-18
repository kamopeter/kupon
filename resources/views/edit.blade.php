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
    Módosítás
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
      <form method="post" action="{{ route('kuponok.update', $kupon->id) }}">
          <div class="form-group">
              @csrf
              @method('PATCH')
              <label for="name">Név</label>
              <input type="text" class="form-control" name="name" value="{{ $kupon->name }}"/>
          </div>
          <div class="form-group">
            <label for="value">Kiadás dátuma</label>
            <input type="text" class="form-control" id="datepicker" name="kiad"  value="{{ $kupon->kiad }}" placeholder="Év-Hónap-Nap"/>
        </div>
          @if (Auth::user()->email === 'focipecs@focivilag.hu')
          <div class="form-group">
            <label for="value">Érvényesség</label>
            <input type="date" class="form-control" name="validtil" value="{{ $kupon->validtil }}" disabled/>
        </div>
          <div class="form-group">
              <label for="value">Érték</label>
              <input type="number" class="form-control" name="value" value="{{ $kupon->value }}" disabled/>
          </div>
          <div class="form-group">
              <label for="barcode">Vonalkód</label>
              <input type="number" class="form-control" name="barcode" value="{{ $kupon->barcode }}" disabled/>
          </div>
          <div class="form-group" style="display: none;">
            <label for="used">Felhasználta?</label>
            <input type="checkbox" class="form-control" name="used" value="nem"  checked/>
        </div>
        <button type="submit" class="btn btn-block btn-danger">Módosítás</button>
        @else
        <div class="form-group">
            <label for="value">Érvényesség</label>
            <input type="date" class="form-control" name="validtil" value="{{ $kupon->validtil }}"/>
        </div>
        <div class="form-group">
            <label for="value">Érték</label>
            <input type="number" class="form-control" name="value" value="{{ $kupon->value }}" disabled/>
        </div>
        <div class="form-group">
            <label for="barcode">Vonalkód</label>
            <input type="number" class="form-control" name="barcode" value="{{ $kupon->barcode }}" disabled/>
        </div>
        <div class="form-group">
          <label for="used">Érvénytelenítés</label>
          <input type="checkbox" class="form-control" name="used" value="nem" />
      </div>
          <button type="submit" class="btn btn-block btn-danger">Módosítás</button>
      </form>
      @endif
  </div>
</div>
@endsection

@extends('layout')

@section('content')

<style>
  .push-top {
    margin-top: 50px;
  }
</style>

<div class="push-top">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}
    </div><br />
  @endif
  <div class="container">
      <a class="btn btn-primary" href="{{ route('kuponok.create') }}">Kupon létrehozása</a>
  </div>
  <table class="table" id="table">
    <thead>
        <tr class="table-warning">
          <td>ID</td>
          <td>Név</td>
          <td>Érték</td>
          <td>Vonalkód</td>
          <td>Érvényes - eddig</td>
          <td>Kiállítva - ekkor</td>
          <td>Érvényes?</td>
          <td class="text-center">Műveletek</td>
        </tr>
    </thead>
    <tbody>
        @foreach($kupon as $kuponok)
        <tr>
            <td>{{$kuponok->id}}</td>
            <td>{{$kuponok->name}}</td>
            <td>{{$kuponok->value}}</td>
            <td>{{$kuponok->barcode}}</td>
            <td>{{ $kuponok->validtil }}</td>
            <td>{{ $kuponok->kiad }}</td>
            <td class="usedfor">{{ $kuponok->used }}</td>
            <td class="text-center">
                @if (Auth::user()->email === 'kamopeter91@gmail.com')
                <a href="{{ route('kuponok.edit', $kuponok->id)}}" class="btn btn-primary btn-sm">Módosítás</a>
                @else
                <a href="{{ route('kuponok.edit', $kuponok->id)}}" class="btn btn-primary btn-sm">Név beírása</a>
                @endif

                <form action="{{ route('kuponok.destroy', $kuponok->id)}}" method="post" style="display: inline-block">
                    @csrf
                    @method('DELETE')
                    @if (Auth::user()->email === 'focipecs@focivilag.hu')
                    <button class="btn btn-danger btn-sm delete" type="submit" style="display: none;">Törlés</button>
                    @else
                    <button class="btn btn-danger btn-sm delete" type="submit">Törlés</button>
                    @endif
                  </form>
            </?>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
@endsection

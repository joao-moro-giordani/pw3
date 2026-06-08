@extends('keep/_base')
@section('conteudo')
@if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li style="color: red;">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <form method="post" action="{{ 
        isset($nota) ? route('keep.edit', $nota['id']) : route('keep.create')
    }}" enctype="multipart/form-data">
        @csrf
        @if (isset($nota))
            @method('PUT')
        @endif
        <textarea name="nota">{{ old('nota', $nota['nota'] ?? '') }}</textarea>
        <br>
        <input type="color" name="cor" value="{{ old('cor', $nota['cor'] ?? '#ffffff') }}"></input>
        <br>
        <br>
        Imagem: <input type="file" name="imagem"></input>
        <br>
        <br>
        <input type="submit" value="Gravar"></input>
    </form>

    <a href="{{ route('keep.index') }}">Cancelar</a>
@endsection
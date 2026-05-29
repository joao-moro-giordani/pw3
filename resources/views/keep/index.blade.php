@extends('keep/_base')

@section('conteudo')
    <p>Bem-vindo ao Little Keep!</p>

    <p><a href="{{ @route('keep.create') }}">Adicionar nota</a></p>
    <hr>
    @foreach($notas as $nota)
        <div style="background-color: {{ $nota['cor'] }}; padding: 10px; margin-bottom: 10px; border: 1px solid; border-radius: 5px;">
            {{ $nota['nota'] }}
        </div>
    @endforeach
@endsection
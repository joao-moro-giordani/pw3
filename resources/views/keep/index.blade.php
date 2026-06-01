@extends('keep/_base')

@section('conteudo')
    <p>Bem-vindo ao Little Keep!</p>

    <p><a href="{{ @route('keep.create') }}">Adicionar nota</a></p>
    <hr>
    @if (session('mensagem'))
        <div style="color: green;">{{ session('mensagem') }}</div>
    @endif
    <br>
    @foreach($notas as $nota)
        <div style="background-color: {{ $nota['cor'] }}; padding: 10px; margin-bottom: 10px; border: 1px solid; border-radius: 5px;">
            {{ $nota['nota'] }}
            <br><br>
            {{ \Carbon\Carbon::parse($nota['created_at'])->diffForHumans() }}
            <br>
            <a href="{{ route('keep.edit', $nota['id']) }}">✏️</a>
            <a href="{{ route('keep.delete', $nota['id']) }}">🗑️</a>
        </div>
    @endforeach
@endsection
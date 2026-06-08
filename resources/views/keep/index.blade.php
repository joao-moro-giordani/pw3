@extends('keep/_base')

@section('conteudo')
    <p>Bem-vindo ao Little Keep!</p>

    <p><a href="{{ @route('keep.create') }}">Adicionar nota</a></p>
    <p><a href="{{ @route('keep.trash') }}">🗑️ Lixeira</a></p>
    <hr>
    @if (session('mensagem'))
        <div style="color: green;">{{ session('mensagem') }}</div>
    @endif
    <br>
    <div style="flex-wrap: wrap; display: flex; gap: 10px;">
        @foreach($notas as $nota)
            <div
                style="background-color: {{ $nota['cor'] }}; padding: 10px; margin-bottom: 10px; border: 1px solid; border-radius: 5px; width: 300px;">
                {{ $nota['nota'] }}
                <br><br>
                Criada: {{ \Carbon\Carbon::parse($nota['created_at'])->diffForHumans() }}
                @if ($nota['updated_at'] != $nota['created_at'])
                    <br>
                    Editada: {{ \Carbon\Carbon::parse($nota['updated_at'])->diffForHumans() }}
                @endif
                <br>
                <a href="{{ route('keep.edit', $nota['id']) }}">✏️</a>
                <a href="{{ route('keep.delete', $nota['id']) }}">🗑️</a>
            </div>
        @endforeach
    </div>
@endsection
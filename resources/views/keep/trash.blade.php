@extends('keep/_base')

@section('conteudo')
    <p>🗑️ Lixeira do Little Keep!</p>

    <p><a href="{{ @route('keep.index') }}">Voltar</a></p>

    <hr>

    <div style="flex-wrap: wrap; display: flex; gap: 10px;">
        @foreach($notas as $nota)
            <div
                style="background-color: {{ $nota['cor'] }}; padding: 10px; margin-bottom: 10px; border: 1px solid; border-radius: 5px; width: 300px;">
                {{ $nota['nota'] }}
                <br><br>
                @if ($nota['imagem'])
                    <img src="{{ asset("storage/".$nota['imagem']) }}" alt="" width="200">
                @endif
                <br><br>
                Apagada: {{ \Carbon\Carbon::parse($nota['deleted_at'])->diffForHumans() }}
                <br>
                <a href="{{ route('keep.trash.restore', $nota['id']) }}">♻️ Restaurar</a>
                <a href="#">Apagar para Sempre</a>
            </div>
        @endforeach
    </div>
@endsection
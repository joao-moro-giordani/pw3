@extends('keep/_base')

@section('conteudo')
    <p>Apagar Nota</p>
    <p>Tem certeza que deseja apagar a nota?</p>
    <p style="border: 1px solid; border-color: {{ $nota['cor'] }}; padding: 10px;">{{ Str::limit($nota['nota'], 50) }}</p>
    <form method="post" action="{{ route('keep.delete', $nota['id']) }}">
        @csrf
        @method('delete')
        <input type="submit" value="Sim, apagar"></input>
    </form>

    <a href="{{ route('keep.index') }}">Não, voltar</a>    
@endsection
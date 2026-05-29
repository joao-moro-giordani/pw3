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
    <form method="post">
        @csrf
        <textarea name="nota"></textarea>
        <br>
        <input type="color" name="cor">
        <br>
        <input type="submit" value="Gravar"></input>
    </form>
@endsection
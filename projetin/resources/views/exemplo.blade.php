@extends('template')
{{-- Criar os novos HTMLS sempre entre a tag @section('conteudo') para levar junto o cabeçalho --}}
@section('conteudo')
    <h1>exemplo</h1>
@endsection

{{-- Sempre que usar JS escrever dentro da tag @section('script') --}}
@section('script')
    <script>
        console.log('exemplo');
    </script>
@endsection

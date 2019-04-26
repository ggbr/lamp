@extends('layouts.appNoHeader',[
'title' => 'Cadastrar Corretores',
])
@if (session('status'))
@component('global.alert', ['type' => 'success'])
{{ session('status') }}
@endcomponent
@endif

@section('PageStyleSheets')
@endsection

@section('PageScripts')

</script>
@endsection

@section('PageContent')

<p class="caption">
   <h1 class="center-align"> WELCOME </h1>
</p>


@endsection

@extends('dashboard-adminlte.parent')
@section('title', 'Operations')
@section('content')
    @livewireStyles
    @livewire('select-action',['panel'=>$panel])
    @livewireScripts
@endsection


@extends('dashboard-adminlte.parent')
@section('title', 'Failed Jobs')
@section('content')
    @livewireStyles
    @livewire('running-failed-jobs')
    @livewireScripts
@endsection


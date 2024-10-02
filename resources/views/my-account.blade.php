@extends('Layout.Layout')
@section('Content')
    <x-Breadcrumb :items="['Home', 'My Account']"></x-Breadcrumb>
    @livewire('MyAccountLiveWireComponent')

  
@endsection

@extends('Layout.Layout')
@section('Content')
    <x-Breadcrumb :items="['Home', 'Cart']" />
    <!-- Cart Page Start -->
   @livewire('ViewAllCartLiveWireComponent')
    <!-- Cart Page End -->
@endsection

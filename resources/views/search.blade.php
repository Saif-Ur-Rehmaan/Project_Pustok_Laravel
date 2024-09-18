@extends('Layout.Layout')
@section('Content')
    <x-Breadcrumb :items="['Home', 'Search']" />
    <main class="inner-page-sec-padding-bottom">
      @livewire('SearchFilterLiveWireComponent', ['query' => $Query])
    </main>
@endsection

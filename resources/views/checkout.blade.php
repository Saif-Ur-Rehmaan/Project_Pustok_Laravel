@extends('Layout.Layout')
@section('Content')
    <x-Breadcrumb :items="['Home', 'Checkout']" />
    <main id="content" class="page-section inner-page-sec-padding-bottom space-db--20">
        <div class="container">
            <div class="row">
               @livewire('CheckoutLiveWireComponent')
            </div>
        </div>
    </main>
@endsection

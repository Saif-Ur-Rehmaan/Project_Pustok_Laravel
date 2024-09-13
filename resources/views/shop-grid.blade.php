@extends('Layout.Layout')

@section('Content')
    <x-Breadcrumb :items="['Home', 'Shop']" />
    <main class="inner-page-sec-padding-bottom">
        <div class="container">

            @livewire('ShopLiveWireComponent')

        </div>
    </main>
@endsection

@section('Scripts')
    <script>
        const lists = document.getElementsByClassName('DropDown');
        for (let i = 0; i < lists.length; i++) {
            const list = lists[i];
            const LiElement = list.parentElement;
            LiElement.addEventListener('click', () => {
                if (list.classList.contains('d-none')) {
                    list.classList.remove('d-none')
                } else {
                    list.classList.add('d-none')
                }
            });

        }
    </script>
  
@endsection

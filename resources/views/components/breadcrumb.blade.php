 @props(['items'])
 <section class="breadcrumb-section">

     <h2 class="sr-only">Site Breadcrumb</h2>
     <div class="container">
         <div class="breadcrumb-contents">
             <nav aria-label="breadcrumb">
                 <ol class="breadcrumb">

                     @foreach ($items as $Item)
                         @if ($loop->last)
                             <li class="breadcrumb-item active">{{$Item}}</li>
                         @else
                             <li class="breadcrumb-item">{{ $Item }}</li>
                         @endif
                     @endforeach

                 </ol>
             </nav>
         </div>
     </div>
 </section>

<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="input-group mb-3">

                <input type="text" class="form-control" value=" " id="SearchBoxOfSearchPage" placeholder="Search Any thing here Author Name, Book Title, Category , Availablity, Max price"
                    wire:model.live.debounce.500ms='Query' name="searchbis">
          
            </div>
        </div>
    </div>
    {{-- top filters --}}
    <div class="shop-toolbar mb--30">
        <div class="row align-items-center">
            <div class="col-lg-2 col-md-2 col-sm-6">
                <!-- Product View Mode -->
                <div class="product-view-mode">
                    <a href="shop-grid-left-sidebar#" class="sorting-btn active" data-target="grid"><i
                            class="fas fa-th"></i></a>
                    <a href="shop-grid-left-sidebar#" class="sorting-btn" data-target="grid-four">
                        <span class="grid-four-icon">
                            <i class="fas fa-grip-vertical"></i><i class="fas fa-grip-vertical"></i>
                        </span>
                    </a>
                    <a href="shop-grid-left-sidebar#" class="sorting-btn" data-target="list "><i
                            class="fas fa-list"></i></a>
                </div>
            </div>
            <div class="col-xl-4 col-md-4 col-sm-6  mt--10 mt-sm--0">
                <span class="toolbar-status">
                    Showing {{ $BookPagination['Showing'] }} to {{ $BookPagination['To'] }} of
                    {{ $BookPagination['Of'] }} ({{ $BookPagination['Pages'] }} Pages)

                </span>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-6  mt--10 mt-md--0">
                <div class="sorting-selection">
                    <span>Show:</span>
                    <select wire:model.live='BookPagination.NoOfBooksTOShowInOnePage' class="">
                        <option value="3" {{ $BookPagination['NoOfBooksTOShowInOnePage'] == 3 ? 'selected' : '' }}>
                            3</option>
                        <option value="5" {{ $BookPagination['NoOfBooksTOShowInOnePage'] == 5 ? 'selected' : '' }}>
                            5</option>
                        <option value="9" {{ $BookPagination['NoOfBooksTOShowInOnePage'] == 9 ? 'selected' : '' }}>
                            9</option>
                        <option value="10"
                            {{ $BookPagination['NoOfBooksTOShowInOnePage'] == 10 ? 'selected' : '' }}>10</option>
                        <option value="12"
                            {{ $BookPagination['NoOfBooksTOShowInOnePage'] == 12 ? 'selected' : '' }}>12</option>
                    </select>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 mt--10 mt-md--0 ">
                <div class="sorting-selection">
                    <span class="d-inline-block text-truncate text-nowrap">Sort By:</span>
                    <select wire:model.live='SortBy' class="">
                        <option value=''>Default Sorting</option>
                        <option value='Sort By:Name (A - Z)'>Sort By:Name (A - Z)</option>
                        <option value='Sort By:Name (Z - A)'>Sort By:Name (Z - A)</option>
                        <option value='Sort By:Price (Low > High)'>Sort By:Price (Low > High)</option>
                        <option value='Sort By:Price (High > Low)'>Sort By:Price (High > Low)</option>

                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="shop-toolbar d-none">
        <div class="row align-items-center">
            <div class="col-lg-2 col-md-2 col-sm-6">
                <!-- Product View Mode -->
                <div class="product-view-mode">
                    <a href="shop-grid#" class="sorting-btn active" data-target="grid"><i class="fas fa-th"></i></a>
                    <a href="shop-grid#" class="sorting-btn" data-target="grid-four">
                        <span class="grid-four-icon">
                            <i class="fas fa-grip-vertical"></i><i class="fas fa-grip-vertical"></i>
                        </span>
                    </a>
                    <a href="shop-grid#" class="sorting-btn" data-target="list "><i class="fas fa-list"></i></a>
                </div>
            </div>
            <div class="col-xl-5 col-md-4 col-sm-6  mt--10 mt-sm--0">
                <span class="toolbar-status">
                    Showing 1 to 9 of 14 (2 Pages)
                </span>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-6  mt--10 mt-md--0">
                <div class="sorting-selection">
                    <span>Show:</span>
                    <select class="form-control nice-select sort-select">
                        <option value="" selected="selected">3</option>
                        <option value="">9</option>
                        <option value="">5</option>
                        <option value="">10</option>
                        <option value="">12</option>
                    </select>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 mt--10 mt-md--0 ">
                <div class="sorting-selection">
                    <span>Sort By:</span>
                    <select class="form-control nice-select sort-select mr-0">
                        <option value="" selected="selected">Default Sorting</option>
                        <option value="">Sort
                            By:Name (A - Z)</option>
                        <option value="">Sort
                            By:Name (Z - A)</option>
                        <option value="">Sort
                            By:Price (Low &gt; High)</option>
                        <option value="">Sort
                            By:Price (High &gt; Low)</option>
                        <option value="">Sort
                            By:Rating (Highest)</option>
                        <option value="">Sort
                            By:Rating (Lowest)</option>
                        <option value="">Sort
                            By:Model (A - Z)</option>
                        <option value="">Sort
                            By:Model (Z - A)</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
    {{-- books list --}}
    <div class="shop-product-wrap grid with-pagination row space-db--30 shop-border position-relative">
        <div wire:loading>
            <x-Loader></x-Loader>
        </div>

        @forelse ($Books as $Book)
            <!--Card-->
            <div class="col-lg-4 col-sm-6">
                <div class="product-card">
                    <div class="product-grid-content">
                        <div class="product-header">
                            <a class="author">

                                {{ $Book->author }}

                            </a>
                            <h3><a href="{{ URL('product-details', Crypt::encrypt($Book->id)) }}">
                                    {{ $Book->title }}</a></h3>
                        </div>
                        <div class="product-card--body">
                            <div class="card-image">

                                <img src="{{ URL($Book->image) }}" alt="">
                                <div class="hover-contents">
                                    <a href="{{ URL('product-details', Crypt::encrypt($Book->id)) }}"
                                        class="hover-image">
                                        <img src="{{ URL($Book->image) }}" alt="">
                                    </a>
                                    <div class="hover-btns">
                                        <a  wire:click='AddToCart({{ $Book->id }})' class="single-btn">
                                            <i class="fas fa-shopping-basket"></i>
                                        </a>
                                        <a wire:click='ManageWishlist({{$Book->id}})' class="single-btn">
                                            <i class="fas fa-heart"></i>
                                        </a>
                                        <a href="compare" class="single-btn">
                                            <i class="fas fa-random"></i>
                                        </a>
                                        <a data-bs-toggle="modal" data-bs-target="#quickModal"
                                            class="single-btn quickViewBtn" data-id="{{ $Book->id }}">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                       
                                    </div>
                                </div>
                            </div>

                            <div class="price-block">
                                @if ($Book->discountPercent != 0)
                                    <!-- After Discount Price in USD -->
                                    <span class="price">
                                        ${{ number_format($Book->priceInUSD * (1 - $Book->discountPercent / 100), 2) }}</span>
                                    <!-- Before Discount Price in USD -->
                                    <del class="price-old">${{ $Book->priceInUSD }}</del>
                                    <!-- Discount Percentage -->
                                    <span class="price-discount">{{ $Book->discountPercent }}%</span>
                                @else
                                    <!-- Regular Price if no Discount -->
                                    <span class="price">${{ $Book->priceInUSD }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="product-list-content">
                        <div class="card-image">
                            <img src="{{ URL($Book->image) }}" alt="">
                        </div>
                        <div class="product-card--body">
                            <div class="product-header">
                                <a class="author">
                                    {{ $Book->author }}
                                </a>
                                <h3><a href="{{ URL('product-details') }}" tabindex="0">{{ $Book->title }}</a>
                                </h3>
                            </div>
                            <article>
                                <h2 class="sr-only">Card List Article</h2>
                                <p>{{ $Book->productDescription }}</p>
                            </article>
                            <div class="price-block">
                                @if ($Book->discountPercent != 0)
                                    <!-- After Discount Price in USD -->
                                    <span
                                        class="price">${{ $Book->priceInUSD * (1 - $Book->discountPercent / 100) }}</span>
                                    <!-- Before Discount Price in USD -->
                                    <del class="price-old">${{ $Book->priceInUSD }}</del>
                                    <!-- Discount Percentage -->
                                    <span class="price-discount">{{ $Book->discountPercent }}%</span>
                                @else
                                    <!-- Regular Price if no Discount -->
                                    <span class="price">${{ $Book->priceInUSD }}</span>
                                @endif
                            </div>
                            <div class="rating-block">
                                <span class="fas fa-star star_on"></span>
                                <span class="fas fa-star star_on"></span>
                                <span class="fas fa-star star_on"></span>
                                <span class="fas fa-star star_on"></span>
                                <span class="fas fa-star "></span>
                            </div>
                            <div class="btn-block">
                                <a class="btn btn-outlined">Add To Cart</a>
                                <a class="card-link"><i class="fas fa-heart"></i>
                                    Add
                                    To
                                    Wishlist</a>
                                <a class="card-link"><i class="fas fa-random"></i>
                                    Add
                                    To
                                    Cart</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <h1>No Books Available For now</h1>
        @endforelse

    </div>
    <!-- Pagination Block -->
    <div class="row pt--30">
        <div class="col-md-12">
            <div class="pagination-block">
                @if ($Books->hasPages())
                    <ul class="pagination-btns flex-center">
                        @if ($Books->onFirstPage())
                            {{-- double back --}}
                            <li><a class="single-btn prev-btn  opacity-75 text-muted">|<i
                                        class="zmdi zmdi-chevron-left"></i> </a></li>
                            {{-- single back --}}
                            <li><a class="single-btn prev-btn  opacity-75 text-muted"><i
                                        class="zmdi zmdi-chevron-left"></i> </a></li>
                        @else
                            {{-- double back --}}
                            <li><a class="single-btn prev-btn" wire:click='previousPage' rel="prev">|<i
                                        class="zmdi zmdi-chevron-left"></i> </a></li>
                            {{-- single back --}}
                            <li><a class="single-btn prev-btn" wire:click='previousPage' rel="prev"><i
                                        class="zmdi zmdi-chevron-left"></i> </a></li>
                        @endif

                        {{-- Pagination Elements --}}
                        @php
                            $totalPages = $Books->lastPage();
                            $currentPage = $Books->currentPage();
                            $startPage = max(1, $currentPage - 2);
                            $endPage = min($totalPages, $currentPage + 2);
                        @endphp

                        {{-- Show the First Page --}}
                        @if ($startPage > 1)
                            <li><a href="#" wire:click.prevent="gotoPage(1)" class="single-btn">1</a></li>
                            @if ($startPage > 2)
                                <li><span>...</span></li>
                            @endif
                        @endif

                        {{-- Show Pages Around the Current Page --}}
                        @for ($page = $startPage; $page <= $endPage; $page++)
                            @if ($page == $currentPage)
                                <li class="active"><a href="#" class="single-btn">{{ $page }}</a>
                                </li>
                            @else
                                <li><a href="#" wire:click.prevent="gotoPage({{ $page }})"
                                        class="single-btn">{{ $page }}</a></li>
                            @endif
                        @endfor

                        {{-- Show the Last Page --}}
                        @if ($endPage < $totalPages)
                            @if ($endPage < $totalPages - 1)
                                <li><span>...</span></li>
                            @endif
                            <li><a href="#" wire:click.prevent="gotoPage({{ $totalPages }})"
                                    class="single-btn">{{ $totalPages }}</a></li>
                        @endif


                        @if ($Books->hasMorePages())
                            <li><a href="#" wire:click.prevent="nextPage" class="single-btn next-btn"><i
                                        class="zmdi zmdi-chevron-right"></i></a></li>
                            <li><a href="#" wire:click.prevent="nextPage" class="single-btn next-btn"><i
                                        class="zmdi zmdi-chevron-right"></i>|</a></li>
                        @else
                            <li class="text-muted opacity-75"><a class=" single-btn next-btn "><i
                                        class="zmdi zmdi-chevron-right"></i></a></li>
                            <li class="text-muted opacity-75"><a class=" single-btn next-btn "><i
                                        class="zmdi zmdi-chevron-right"></i>|</a></li>
                        @endif
                        {{-- <li><a class="single-btn next-btn" wire:click='nextPage'><i
                                    class="zmdi zmdi-chevron-right"></i></a></li>
                        <li><a class="single-btn next-btn" wire:click='nextPage'><i
                                    class="zmdi zmdi-chevron-right"></i>|</a></li> --}}
                    </ul>
                @endif

            </div>
        </div>
    </div>

</div>
@script
<script>
    document.querySelectorAll('.quickViewBtn').forEach(button => {
        button.addEventListener('click', function() {
            console.log('ascghaiv');
            
            // Get the ID from the data-id attribute
            const id = parseInt(this.getAttribute('data-id'));

            // Dispatch the event using Livewire's global object
            if (window.Livewire) {
                window.Livewire.dispatch('OpenProductModal', {
                    id: id
                });
            }
        });
    });
    document.querySelector("#SearchBoxOfSearchPage").addEventListener("keyup",(e)=>{
        const newQuery=e.target.value;
        window.history.pushState(null,'',encodeURIComponent(newQuery))
        console.log();
        
    })
</script>
@endscript

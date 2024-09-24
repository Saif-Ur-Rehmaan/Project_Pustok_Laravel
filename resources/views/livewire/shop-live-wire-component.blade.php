<div class="row">
    <div class="col-lg-9 order-lg-2">


        aaa
        <div class="shop-toolbar with-sidebar mb--30">
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
                            <option value="3"
                                {{ $BookPagination['NoOfBooksTOShowInOnePage'] == 3 ? 'selected' : '' }}>3</option>
                            <option value="5"
                                {{ $BookPagination['NoOfBooksTOShowInOnePage'] == 5 ? 'selected' : '' }}>5</option>
                            <option value="9"
                                {{ $BookPagination['NoOfBooksTOShowInOnePage'] == 9 ? 'selected' : '' }}>9</option>
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

        {{-- d-none --}}
        <div class="shop-toolbar d-none">
            <div class="row align-items-center">
                {{-- view Mode --}}
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
                {{-- Showing ... --}}
                <div class="col-xl-5 col-md-4 col-sm-6  mt--10 mt-sm--0">
                    <span class="toolbar-status">
                        Showing {{ $BookPagination['Showing'] }} to {{ $BookPagination['To'] }} of
                        {{ $BookPagination['Of'] }} (2 Pages)
                    </span>
                </div>
                {{-- Show --}}
                <div class="col-lg-2 col-md-2 col-sm-6  mt--10 mt-md--0">
                    <div class="sorting-selection">
                        <span>Show:</span>
                        <select wire:model='BookPagination.NoOfBooksTOShowInOnePage'
                            class="form-control nice-select sort-select">
                            <option value="3"
                                {{ $BookPagination['NoOfBooksTOShowInOnePage'] == 3 ? 'selected' : '' }}>3</option>
                            <option value="5"
                                {{ $BookPagination['NoOfBooksTOShowInOnePage'] == 5 ? 'selected' : '' }}>5</option>
                            <option value="9"
                                {{ $BookPagination['NoOfBooksTOShowInOnePage'] == 9 ? 'selected' : '' }}>9</option>
                            <option value="10"
                                {{ $BookPagination['NoOfBooksTOShowInOnePage'] == 10 ? 'selected' : '' }}>10</option>
                            <option value="12"
                                {{ $BookPagination['NoOfBooksTOShowInOnePage'] == 12 ? 'selected' : '' }}>12</option>
                        </select>

                    </div>
                </div>
                {{-- Sort By --}}
                <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 mt--10 mt-md--0 ">
                    <div class="sorting-selection">
                        <span>Sort By:</span>
                        <select class="SelectDD" class="form-control nice-select sort-select mr-0">
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
        {{-- Book List --}}
        <div class="shop-product-wrap grid g-5 position-relative with-pagination row space-db--30 shop-border">
            <div wire:loading>
                <x-Loader></x-Loader>

            </div>

            @forelse ($Books as $Book)
                <!--Card-->
                <div class="col-lg-4 col-sm-6 py-3 ">
                    <div class="product-card h-100 m-0">
                        <div class="product-grid-content">
                            <div class="product-header">
                                <a class="author">

                                    {{ $Book->author->displayName }}

                                </a>
                                <h3>
                                    <a class=" text-truncate"
                                        href="{{ URL('product-details', Crypt::encrypt($Book->id)) }}">
                                        {{ $Book->title }}
                                    </a>
                                </h3>
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
                                            <a class="AddToCartBtn single-btn {{ session()->has('cart') && collect(session('cart'))->contains(fn($item) => $item['id'] == $Book->id) ? 'bg-success' : '' }}" data-id="{{ $Book->id }}">
                                                <i class="fas fa-shopping-basket"></i>
                                            </a>

                                            <a class="single-btn">
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
                                        {{ $Book->author->displayName }}
                                    </a>
                                    <h3><a href="{{ URL('product-details') }}"
                                            tabindex="0">{{ $Book->title }}</a></h3>
                                </div>
                                <article>
                                    <h2 class="sr-only">Card List Article</h2>
                                    <p>{{ $Book->productSummary }}</p>
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
                                    @php
                                        $total = 0;
                                        $NumberOfReviews = 0;
                                        foreach ($Book->reviews as $review) {
                                            $total += (int) $review->reviewStars;
                                            $NumberOfReviews++;
                                        }
                                        if ($NumberOfReviews > 0) {
                                            $average = number_format((float) $total / $NumberOfReviews, 2); // ensures float division
                                        } else {
                                            $average = 0; // handle division by zero if necessary
                                        }
                                    @endphp
                                    @for ($i = 0; $i < 5; $i++)
                                        @if ($average > $i)
                                            <span class="fas fa-star star_on"></span>
                                        @else
                                            <span class="fas fa-star "></span>
                                        @endif
                                    @endfor
                                    {{ $average }}
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
    <div class="col-lg-3  mt--40 mt-lg--0">
        <div class="inner-page-sidebar">
            <!-- Accordion -->
            <div class="single-block">
                <h3 class="sidebar-title">Categories</h3>
                <ul class="sidebar-menu--shop" style="max-height: 600px; overflow-x:hidden;overflow-y:scroll; ">


                    <li>
                        <a wire:click="SetSubCategoryTo('')"
                            class="ClickAble  d-flex d-inline-block justify-content-between  w-100 {{ $ASubCategory == '' ? 'text-success fw-bolder' : '' }}">
                            <span class="  text-truncate">
                                All
                            </span>
                        </a>

                    </li>
                    @forelse ($Data['Categories']; as $Category)
                        <li>
                            <a
                                class="ClickAble  d-flex d-inline-block justify-content-between  w-100  {{ $Category->subcategories->contains('name', $ASubCategory) ? 'text-success fw-bolder' : '' }}">
                                <span class="  text-truncate">
                                    {{ $Category->name }}
                                </span>
                                &lpar;{{ count($Category->subcategories) }}&rpar;</a>

                            <ul class="inner-cat-items DropDown d-none">
                                @forelse ($Category->subcategories as $SubCat)
                                    <li>
                                        <a wire:click="SetSubCategoryTo('{{ $SubCat->name }}')"
                                            class="ClickAble {{ $ASubCategory == $SubCat->name ? 'text-success fw-bolder' : '' }}">{{ $SubCat->name }}
                                            &lpar;{{ count($SubCat->books) }}&rpar;
                                        </a>
                                    </li>
                                @empty
                                    <li>
                                        <a class="ClickAble">No Sub Categories Available</a>
                                    </li>
                                @endforelse
                            </ul>
                        </li>

                    @empty
                        <li>
                            <a class="ClickAble">No Categories Available</a>
                        </li>
                    @endforelse



                </ul>
            </div>
            <!-- Price -->
            <div class="single-block">
                <h3 class="sidebar-title">Fillter By Price</h3>
                <div class="range-slider pt--30 text-center">


                    {{-- 
                     wire:model not working correctly here bcz the element '<input type="text" wire:model.live="APriceMin" id="amountMin">' and  '<input type="text" wire:model="APriceMax" id="amountMax" hidden readonly="">' is not intracted directly by user
                    <style>
                        .ui-slider-range.ui-corner-all.ui-widget-header {
                            display: none
                        }
                    </style>
                    <div  
                        class="sb-range-slider ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content">
                        <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"
                        style="left: 0%;"  ></span>
                        <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"
                        style="left: 100%;" ></span>
                    </div>
                    <div class="slider-price">
                        <p>
                            <input type="text" id="amount"  readonly=""> <br>
                            <input type="text" wire:model.live="APriceMin" id="amountMin"   >
                            <input type="text" wire:model="APriceMax" id="amountMax" hidden readonly="">
                          
                        </p>
                    </div> --}}

                    <div class="row flex-row justify-content-center gap-2 mb-2">
                        <div class="col-auto d-inline p-0 m-0">Min Price $</div>
                        <div class="col-auto p-0"><input type="number" placeholder="{{ $APriceMin }}"
                                wire:model.live.debounce.500ms="APriceMin" class="w-100" id="amountMin"></div>
                    </div>
                    <div class="row flex-row justify-content-center gap-2">
                        <div class="col-auto d-inline p-0 m-0">Max Price $</div>
                        <div class="col-auto p-0"><input type="number" placeholder="{{ $APriceMax }}"
                                wire:model.live.debounce.500ms="APriceMax" class="w-100" id="amountMax"></div>
                    </div>

                </div>
            </div>
            <!-- Manufacturer -->
            <div class="single-block">
                <h3 class="sidebar-title">Select By Manufacturer</h3>
                <ul class="sidebar-menu--shop menu-type-2"
                    style="max-height: 600px; overflow-x:hidden;overflow-y:scroll; ">
                    <li>
                        <a wire:click="SetManufacturerTo('')"
                            class="ClickAble  d-flex d-inline-block justify-content-between  w-100 {{ $AManufacturer == '' ? 'text-success fw-bolder' : '' }}">
                            <span class="  text-truncate">
                                All
                            </span>
                        </a>
                    </li>
                    @forelse ($Data['Manufacturers'] as $Manufacturer)
                        <li>
                            <a wire:click="SetManufacturerTo('{{ $Manufacturer->ManufacturerName }}')"
                                class=" d-flex d-inline-block justify-content-between  w-100 ClickAble {{ $AManufacturer == $Manufacturer->ManufacturerName ? 'text-success fw-bolder' : '' }}">
                                <span class="  text-truncate">
                                    {{ $Manufacturer->ManufacturerName }}
                                </span>
                                <span>&lpar;{{ $Manufacturer->NoOfBooks }}&rpar;</span>
                            </a>
                        </li>
                    @empty
                        <li><a>No Manufacturer Available </a></li>
                    @endforelse

                </ul>
            </div>
            <!-- Color -->
            <div class="single-block">
                <h3 class="sidebar-title">Select By Color</h3>
                <ul class="sidebar-menu--shop menu-type-2"
                    style="max-height: 600px; overflow-x:hidden;overflow-y:scroll; ">
                    <li>
                        <a wire:click="SetColorTo('')"
                            class="ClickAble  d-flex d-inline-block justify-content-between  w-100 {{ $AColor == '' ? 'text-success fw-bolder' : '' }}">
                            <span class="  text-truncate">
                                All
                            </span>
                        </a>

                    </li>
                    @forelse ($Data['Colors'] as $Color)
                        <li>
                            <a wire:click="SetColorTo('{{ $Color->ColorName }}')"
                                class=" d-flex d-inline-block justify-content-between  w-100 ClickAble  {{ $AColor == $Color->ColorName ? 'text-success fw-bolder' : '' }}">
                                <span class="  text-truncate">
                                    {{ $Color->ColorName }}
                                </span>
                                <span>&lpar;{{ $Color->NoOfBooks }}&rpar;</span>
                            </a>
                        </li>
                    @empty
                        <li><a>No Colors Available </a></li>
                    @endforelse

                </ul>
            </div>
            <!-- Promotion Block -->
            <div class="single-block">
                <a class="promo-image sidebar">
                    <img src="{{ URL('image/others/home-side-promo.jpg') }}" alt="">
                </a>
            </div>
        </div>
    </div>
 
</div>

<div class="row">

    <div class="col-lg-9 order-lg-2">
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
                <div class="col-lg-4 col-md-4 col-sm-6 mt--10 mt-md--0 ">
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
        <div class="shop-toolbar d-none">
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
        {{-- Book List --}}
        <div class="shop-product-wrap grid position-relative with-pagination row space-db--30 shop-border">
            <div wire:loading>
                <x-Loader></x-Loader>

            </div>

            @forelse ($Data['Books'] as $Book)
                <!--Card-->
                <div class="col-lg-4 col-sm-6">
                    <div class="product-card">
                        <div class="product-grid-content">
                            <div class="product-header">
                                <a href="shop-grid-left-sidebar" class="author">

                                    {{ $Book->author->displayName }}

                                </a>
                                <h3><a href="product-details"> {{ $Book->title }}</a></h3>
                            </div>
                            <div class="product-card--body">
                                <div class="card-image">

                                    <img src="{{ URL($Book->image) }}" alt="">
                                    <div class="hover-contents">
                                        <a href="product-details" class="hover-image">
                                            <img src="{{ URL('image/products/product-1.jpg') }}" alt="">
                                        </a>
                                        <div class="hover-btns">
                                            <a href="cart" class="single-btn">
                                                <i class="fas fa-shopping-basket"></i>
                                            </a>
                                            <a href="wishlist" class="single-btn">
                                                <i class="fas fa-heart"></i>
                                            </a>
                                            <a href="compare" class="single-btn">
                                                <i class="fas fa-random"></i>
                                            </a>
                                            <a href="shop-grid-left-sidebar#" data-bs-toggle="modal"
                                                data-bs-target="#quickModal" class="single-btn">
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
                                    <a href="shop-grid-left-sidebar" class="author">
                                        {{ $Book->author->displayName }}
                                    </a>
                                    <h3><a href="product-details" tabindex="0">{{ $Book->title }}</a></h3>
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
                                    <a href="shop-grid-left-sidebar" class="btn btn-outlined">Add To Cart</a>
                                    <a href="shop-grid-left-sidebar" class="card-link"><i class="fas fa-heart"></i>
                                        Add
                                        To
                                        Wishlist</a>
                                    <a href="shop-grid-left-sidebar" class="card-link"><i class="fas fa-random"></i>
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
                    <ul class="pagination-btns flex-center">
                        <li><a href="shop-grid-left-sidebar" class="single-btn prev-btn ">|<i
                                    class="zmdi zmdi-chevron-left"></i> </a></li>
                        <li><a href="shop-grid-left-sidebar" class="single-btn prev-btn "><i
                                    class="zmdi zmdi-chevron-left"></i> </a></li>
                        <li class="active"><a href="shop-grid-left-sidebar" class="single-btn">1</a>
                        </li>
                        <li><a href="shop-grid-left-sidebar" class="single-btn">2</a></li>
                        <li><a href="shop-grid-left-sidebar" class="single-btn">3</a></li>
                        <li><a href="shop-grid-left-sidebar" class="single-btn">4</a></li>
                        <li><a href="shop-grid-left-sidebar" class="single-btn next-btn"><i
                                    class="zmdi zmdi-chevron-right"></i></a></li>
                        <li><a href="shop-grid-left-sidebar" class="single-btn next-btn"><i
                                    class="zmdi zmdi-chevron-right"></i>|</a></li>
                    </ul>
                </div>
            </div>
        </div>

    </div>
    <div class="col-lg-3  mt--40 mt-lg--0">
        <div class="inner-page-sidebar">
            <!-- Accordion -->
            <div class="single-block">
                <h3 class="sidebar-title">Categories</h3>
                <ul class="sidebar-menu--shop">


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
                        <div class="col-auto p-0"><input type="number"  placeholder="{{ $APriceMax }}"
                                wire:model.live.debounce.500ms="APriceMax" class="w-100" id="amountMax"></div>
                    </div>

                </div>
            </div>
            <!-- Manufacturer -->
            <div class="single-block">
                <h3 class="sidebar-title">Select By Manufacturer</h3>
                <ul class="sidebar-menu--shop menu-type-2">
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
                        <li><a href="shop-grid-left-sidebar">No Manufacturer Available </a></li>
                    @endforelse

                </ul>
            </div>
            <!-- Color -->
            <div class="single-block">
                <h3 class="sidebar-title">Select By Color</h3>
                <ul class="sidebar-menu--shop menu-type-2">
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
                        <li><a href="shop-grid-left-sidebar">No Colors Available </a></li>
                    @endforelse

                </ul>
            </div>
            <!-- Promotion Block -->
            <div class="single-block">
                <a href="shop-grid-left-sidebar" class="promo-image sidebar">
                    <img src="{{ URL('image/others/home-side-promo.jpg') }}" alt="">
                </a>
            </div>
        </div>
    </div>
</div>

@include('layout.header')
@include('layout.nav')
<!-- Ec Shop page -->
<section class="ec-page-content ">
    <div class="container">
        <div class="row">
            <!-- Sidebar Area Start -->
            <div class="ec-shop-leftside col-lg-3 order-lg-first col-md-12 order-md-last">
                <div class="ec-sidebar-wrap">
                    <div class="ec-sidebar-heading">
                        <h1>Filter Products By</h1>
                    </div>
                    <!-- Sidebar Price Block -->
                    <div class="ec-sidebar-block">
                        <div class="ec-sb-title">
                            <h3 class="ec-sidebar-title">Price</h3>
                        </div>
                        <div class="ec-sb-block-content es-price-slider">
                            <div class="ec-price-filter">
                                <div id="ec-sliderPrice" class="filter__slider-price" data-min="0" data-max="250"
                                    data-step="10"></div>
                                <div class="ec-price-input">
                                    <label class="filter__label"><input type="text" class="filter__input"></label>
                                    <span class="ec-price-divider"></span>
                                    <label class="filter__label"><input type="text" class="filter__input"></label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ec-shop-rightside col-lg-9 order-lg-last col-md-12 order-md-first margin-b-30">
                <!-- Shop Top Start -->
                <div class="ec-pro-list-top d-flex">
                    <div class="col-md-6 ec-grid-list">
                        <div class="ec-gl-btn">
                            <button class="btn btn-grid active"><i class="fi-rr-apps"></i></button>
                        </div>
                    </div>
                    <div class="col-md-6 ec-sort-select">
                        <span class="sort-by">Sort by</span>
                        <div>
                            <select name="ec-select" id="ec-select">
                                <option selected disabled>Position</option>
                                <option value="4">Price, low to high</option>
                                <option value="5">Price, high to low</option>
                            </select>
                        </div>
                    </div>
                </div>
                <!-- Shop Top End -->
                <!-- Shop content Start -->
                <div class="shop-pro-content">
                    <div class="shop-pro-inner">
                        <div class="row">
                            @forelse ($product as $productData)
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-6 mb-6 pro-gl-content">
                                    <div class="ec-product-inner">
                                        <div class="ec-pro-image-outer">
                                            <div class="ec-pro-image">
                                                <a href="{{ url('product/' . $productData->slug) }}" class="image">
                                                    <img class="main-image"
                                                        src="{{ $productData->getFirstMediaUrl('product_image') }}"
                                                        alt="Product" />
                                                </a>
                                                <span class="percentage">{{ $productData->discount }}%</span>
                                            </div>
                                        </div>
                                        <div class="ec-pro-content">
                                            <div class="ec-pro-title"><a
                                                    href="{{ url('product/' . $productData->slug) }}">{{ $productData->product_name }}</a>
                                            </div>
                                            <div class="ec-pro-rating px-3">
                                                <i class="ecicon eci-star fill"></i>
                                                <i class="ecicon eci-star fill"></i>
                                                <i class="ecicon eci-star fill"></i>
                                                <i class="ecicon eci-star fill"></i>
                                                <i class="ecicon eci-star"></i>
                                            </div>
                                            <span class="ec-price px-3 mb-3">
                                                @if ($productData->productsizeprice->isNotEmpty())
                                                    <span class="new-price">Rs.
                                                        {{ $productData->productsizeprice->first()->price }}</span>
                                                @endif
                                            </span>

                                        </div>
                                    </div>
                                </div>
                            @empty
                            @endforelse
                        </div>
                        <div>
                            <!-- Ec Pagination Start -->
                            <div class="ec-pro-pagination">
                                <span>Showing 1-12 of 21 item(s)</span>
                                <ul class="ec-pro-pagination-inner">
                                    <li><a class="active" href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#">4</a></li>
                                    <li><a href="#">5</a></li>
                                    <li><a class="next" href="#">Next <i class="ecicon eci-angle-right"></i></a>
                                    </li>
                                </ul>
                            </div>
                            <!-- Ec Pagination End -->
                        </div>
                        <!--Shop content End -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Shop page -->

@include('layout.footer')

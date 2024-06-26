@include('layout.header')
@include('layout.nav')
<!-- Ec Shop page -->
<style>
        /* Center the button */
        .button-container {
            display: flex;
            justify-content: center;
            margin-top: 20px; /* Adjust spacing as needed */
        }
    </style>
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

                        <form id="priceFilterForm" action="{{ url('products/search/view') }}" method="GET">
                            <div class="ec-sb-block-content es-price-slider">
                                <div class="ec-price-filter">
                                    <div id="ec-sliderPrice" class="filter__slider-price" data-min="0"
                                        data-max="10000" data-step="10"></div>
                                    <div class="ec-price-input">
                                         <label class="filter__label">
                                           <input type="text" id="minPrice" class="filter__input" name="min_price">
                                            </label>
                                        <span class="ec-price-divider"></span>
                                        <label class="filter__label">
                                            <input type="text" id="maxPrice" class="filter__input" name="max_price">
                                        </label>
                                    </div>
                                </div>
                                <br>
                                <div class="button-container">
                                    <button class="btn btn-primary" type="submit">Update</button>
                                </div>
                            </div>

                        </form>


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
                            <form class="ec-btn-group-form" id="myForm" action="{{ url('products/search/view') }}"
                                method="get">
                                <select name="position" id="position">
                                    <option selected disabled>Position</option>
                                    <option value="low-to-high">Price, low to high</option>
                                    <option value="high-to-low">Price, high to low</option>
                                </select>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Shop Top End -->
                <!-- Shop content Start -->
                <div class="shop-pro-content">
                    <div class="shop-pro-inner">
                        <div class="row">

                            @forelse ($resultedProducts as $productData)
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
                                            <div class="ec-pro-list-desc px-3">
                                                {{ strip_tags($productData->short_description) }}</div>
                                            <span class="ec-price px-3">

                                                <span class="new-price">Rs.
                                                    {{ $productData->product_price }}</span>

                                            </span>
                                            {{-- <div class="ec-spe-pro-btn">
                                                <form action="{{ url('cart') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="product_id"
                                                        value="{{ $productData->id }}">
                                                    <input type="hidden" name="quantity" value="1">
                                                    <button id="cart" class="btn btn-lg btn-primary">Add To
                                                        Cart<span class="cart-icon"><i
                                                                class="fi-rr-shopping-basket"></i></button>
                                                </form>
                                                <form id="wishlistForm_{{ $productData->id }}"
                                                    action="{{ url('wishlist') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="product_id"
                                                        value="{{ $productData->id }}">
                                                    <span class="social-btn">
                                                        <button class="wishlist" type="button"
                                                            data-form-id="wishlistForm_{{ $productData->id }}"><i
                                                                class="fi-rr-heart"></i></button>
                                                    </span>
                                                </form>
                                            </div> --}}
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <img src="{{ url('assets/img/Empty-rafiki.png') }}" alt="Wishlist image"
                                    class="img-fluid d-block mx-auto" style="width: 40%" />
                            @endforelse

                        </div>
                        <div>
                            {{ $resultedProducts->links('pagination::bootstrap-5') }}
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

<script>
    $(document).ready(function() {
        var form = $('#priceFilterForm');

        // Initialize the slider with jQuery UI
        $("#ec-sliderPrice").slider({
            range: true,
            min: 0,
            max: 250,
            step: 10,
            values: [0, 250],
            slide: function(event, ui) {
                $("#minPrice").val(ui.values[0]);
                $("#maxPrice").val(ui.values[1]);
            },
            change: function(event, ui) {
                // Update the input fields
                $("#minPrice").val(ui.values[0]);
                $("#maxPrice").val(ui.values[1]);
                // Submit the form when slider values change
                form.submit();
            }
        });

        // Set initial values
        $("#minPrice").val($("#ec-sliderPrice").slider("values", 0));
        $("#maxPrice").val($("#ec-sliderPrice").slider("values", 1));
    });
</script>


{{-- <script>
    $(document).ready(function() {
        $('#ec-select').change(function() {
            var searchKeyword = $('#search_keyword')
                .val(); // assuming you have an input field with id 'search_keyword'
            var position = $(this).val();

            $.ajax({
                url: '/products/search/view', // URL to your search endpoint
                method: 'GET',
                data: {
                    search_keyword: searchKeyword,
                    position: position
                },
                success: function(response) {
                    // $('#search-results').html(response);
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });
    });
</script> --}}

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var form = document.getElementById('myForm');
        var select = document.getElementById('position');

        select.addEventListener('change', function() {
            // Execute any code you want here before the form submission
            // For example, you can log the selected value to the console
            console.log("Selected value:", select.value);

            // Then submit the form
            form.submit();
        });
    });
</script>

{{-- <script>
    document.addEventListener("DOMContentLoaded", function() {
        var form = document.getElementById('priceFilterForm');

        $("#ec-sliderPrice").slider({
            range: true,
            min: 0,
            max: 250,
            step: 10,
            values: [0, 250],
            slide: function(event, ui) {
                $("#minPrice").val(ui.values[0]);
                $("#maxPrice").val(ui.values[1]);
            },
            change: function(event, ui) {
                // Submit the form when slider values change
                form.submit();
            }
        });

        // Set initial values
        $("#minPrice").val($("#ec-sliderPrice").slider("values", 0));
        $("#maxPrice").val($("#ec-sliderPrice").slider("values", 1));


    });
</script> --}}

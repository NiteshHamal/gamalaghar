@include('layout.header')
@include('layout.nav')
<!-- Ec breadcrumb start -->
<div class="sticky-header-next-sec  ec-breadcrumb section-space-mb">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="row ec_breadcrumb_inner">
                    <div class="col-md-6 col-sm-12">
                        <h2 class="ec-breadcrumb-title">Cart</h2>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <!-- ec-breadcrumb-list start -->
                        <ul class="ec-breadcrumb-list">
                            <li class="ec-breadcrumb-item"><a href="{{ url('profile') }}">Profile</a></li>
                            <li class="ec-breadcrumb-item active">Cart</li>
                        </ul>
                        <!-- ec-breadcrumb-list end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Ec breadcrumb end -->
<!-- Ec cart page -->
<section class="ec-page-content section-space-p">
    <div class="container">
        <div class="row">
            <div class="ec-cart-leftside col-lg-12 col-md-12 ">
                <!-- cart content Start -->
                <div class="ec-cart-content">
                    <div class="ec-cart-inner">
                        <div class="row">
                            <form action="{{ url('user/checkouts') }}" method="POST">
                                @csrf
                                <div class="table-content cart-table-content">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Product</th>
                                                <th>Price</th>
                                                <th style="text-align: center;">Quantity</th>
                                                <th>Size</th>
                                                <th>Total</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($cart as $cartData)
                                                <tr>
                                                    <td><input type="checkbox" name="selectedProducts[]"
                                                            class="form-check-input" value="{{ $cartData->cartid }}">
                                                    </td>
                                                    @foreach ($cartproductImages as $cartproductImage)
                                                        @if ($cartproductImage->id == $cartData->id)
                                                            <td data-label="Product" class="ec-cart-pro-name"><a><img
                                                                        class="ec-cart-pro-img mr-4"
                                                                        src="{{ $cartproductImage->getFirstMediaUrl('product_image') }}"
                                                                        alt="{{ $cartData->product_name }}" />{{ $cartData->product_name }}</a>
                                                            </td>
                                                        @endif
                                                    @endforeach
                                                    <td data-label="Price" class="ec-cart-pro-price"><span
                                                            class="amount">Rs. {{ $cartData->price }}</span>
                                                    </td>

                                                    <td data-label="Quantity" class="ec-cart-pro-qty"
                                                        style="text-align: center;">
                                                        <div class="cart-qty-plus-minus">
                                                            <input class="qty-input quantityInput" type="text"
                                                                name="quantity" value="{{ $cartData->quantity }}" />
                                                        </div>
                                                    </td>
                                                    <td><span class="size">{{ $cartData->size }}</span></td>


                                                    <td data-label="Total" class="ec-cart-pro-subtotal">
                                                        <!-- Use a span with a unique id for the subtotal -->
                                                        <span id="subtotal">Rs.
                                                            {{ $cartData->price * $cartData->quantity }}</span>
                                                    </td>
                                                    <td data-label="Remove" class="ec-cart-pro-remove">
                                                        <a href="{{ url('cart/delete/' . $cartData->cartid) }}"><i
                                                                class="ecicon eci-trash-o"></i></a>

                                                        <a class="updateQuantityLink"
                                                            href="{{ url('cart/update/' . $cartData->cartid . '?quantity=' . $cartData->quantity) }}"><i
                                                                class="bx bx-edit-alt"></i></a>

                                                    </td>

                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="5">
                                                        <img src="{{ url('assets/img/Empty-rafiki.png') }}"
                                                            alt="Wishlist image" class="img-fluid d-block mx-auto"
                                                            style="max-width: 300px;" />
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="ec-cart-update-bottom">
                                            <a href="{{ url('/') }}">Continue Shopping</a>
                                            <button class="btn btn-primary">Check Out</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!--cart content End -->
            </div>



            <script>
                $(document).ready(function() {
                    $('.quantityInput').on('input', function() {
                        var newQuantity = $(this).val();
                        var updateLink = $(this).closest('tr').find('.updateQuantityLink').attr('href');
                        var updatedLink = updateLink.split('?')[0] + '?quantity=' + newQuantity;
                        $(this).closest('tr').find('.updateQuantityLink').attr('href', updatedLink);
                    });
                });
            </script>



            {{-- <!-- Sidebar Area Start -->
            <div class="ec-cart-rightside col-lg-4 col-md-12">
                <div class="ec-sidebar-wrap">
                    <!-- Sidebar Summary Block -->
                    <div class="ec-sidebar-block">
                        <div class="ec-sb-title">
                            <h3 class="ec-sidebar-title">Summary</h3>
                        </div>
                        <div class="ec-sb-block-content">
                            <h4 class="ec-ship-title">Estimate Shipping</h4>
                            <div class="ec-cart-form">
                                <p>Enter your destination to get a shipping estimate</p>
                                <form action="#" method="post">
                                    <span class="ec-cart-wrap">
                                        <label>Country *</label>
                                        <span class="ec-cart-select-inner">
                                            <select name="ec_cart_country" id="ec-cart-select-country"
                                                class="ec-cart-select">
                                                <option selected="" disabled="">United States</option>
                                                <option value="1">Country 1</option>
                                                <option value="2">Country 2</option>
                                                <option value="3">Country 3</option>
                                                <option value="4">Country 4</option>
                                                <option value="5">Country 5</option>
                                            </select>
                                        </span>
                                    </span>
                                    <span class="ec-cart-wrap">
                                        <label>State/Province</label>
                                        <span class="ec-cart-select-inner">
                                            <select name="ec_cart_state" id="ec-cart-select-state"
                                                class="ec-cart-select">
                                                <option selected="" disabled="">Please Select a region, state
                                                </option>
                                                <option value="1">Region/State 1</option>
                                                <option value="2">Region/State 2</option>
                                                <option value="3">Region/State 3</option>
                                                <option value="4">Region/State 4</option>
                                                <option value="5">Region/State 5</option>
                                            </select>
                                        </span>
                                    </span>
                                    <span class="ec-cart-wrap">
                                        <label>Zip/Postal Code</label>
                                        <input type="text" name="postalcode" placeholder="Zip/Postal Code">
                                    </span>
                                </form>
                            </div>
                        </div>

                        <div class="ec-sb-block-content">
                            <div class="ec-cart-summary-bottom">
                                <div class="ec-cart-summary">
                                    <div>
                                        <span class="text-left">Sub-Total</span>
                                        <span class="text-right">$80.00</span>
                                    </div>
                                    <div>
                                        <span class="text-left">Delivery Charges</span>
                                        <span class="text-right">$80.00</span>
                                    </div>
                                    <div>
                                        <span class="text-left">Coupan Discount</span>
                                        <span class="text-right"><a class="ec-cart-coupan">Apply Coupan</a></span>
                                    </div>
                                    <div class="ec-cart-coupan-content">
                                        <form class="ec-cart-coupan-form" name="ec-cart-coupan-form" method="post"
                                            action="#">
                                            <input class="ec-coupan" type="text" required=""
                                                placeholder="Enter Your Coupan Code" name="ec-coupan" value="">
                                            <button class="ec-coupan-btn button btn-primary" type="submit"
                                                name="subscribe" value="">Apply</button>
                                        </form>
                                    </div>
                                    <div class="ec-cart-summary-total">
                                        <span class="text-left">Total Amount</span>
                                        <span class="text-right">$80.00</span>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- Sidebar Summary Block -->
                </div>
            </div> --}}
        </div>
    </div>
</section>
@include('user.new_product')
@include('layout.footer')

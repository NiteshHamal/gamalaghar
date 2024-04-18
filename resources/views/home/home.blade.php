@include('layout.header')
@livewireStyles
@include('layout.nav')
@include('home.main_banner')
{{-- @include('home.category') --}}
@include('home.about_banner')
@include('home.best_selling')
<!-- Service section start -->
<section class="section ec-service-sec section-space-p">
    <div class="container align-self-center">
        <div class="row">
            <div class="col-lg-4 col-md-12">
                <div class="main-content-detail">
                    <div class="main-content left">
                        <div class="detail-content ">
                            <h6 class="ec-service-title">Fast Shipping</h6>
                            <p class="ec-service-detail">Rapid delivery to your doorstep! Shop now for fast service!</p>
                        </div>
                        <img class="service-img" src="{{ url('assets/img/shipping.png') }}" alt="shipping-img">
                    </div>
                    <div class="main-content left">
                        <div class="detail-content">
                            <h6 class="ec-service-title">Trust Gurantee</h6>
                            <p class="ec-service-detail">Shop worry-free with our secure transactions and reliable
                                customer support</p>
                        </div>
                        <img class="service-img" src="{{ url('assets/img/trust.png') }}" alt="shipping-img">
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="ec-ser-mid-image">
                    <img class="ser-background" src="{{ url('assets/img/gamala2.jpg') }}" alt="">
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="main-content-detail">
                    <div class="main-content right">
                        <img class="service-img" src="{{ url('assets/img/support.png') }}" alt="shipping-img">
                        <div class="detail-content">
                            <h6 class="ec-service-title">24x7 Free Support</h6>
                            <p class="ec-service-detail">24/7 support: Get help anytime, anywhere. We're here for you,
                                day or night!</p>
                        </div>
                    </div>
                    <div class="main-content right">
                        <img class="service-img" src="{{ url('assets/img/discount.png') }}" alt="shipping-img">
                        <div class="detail-content">
                            <h6 class="ec-service-title">Daily Discounts</h6>
                            <p class="ec-service-detail">Save big with our unbeatable deals, refreshed every day. Shop
                                now and save!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Service section End -->
@include('home.bottom_banner')
@include('home.faq')
@include('home.get_in_touch')
@include('layout.footer')
@livewireScripts
</body>

</html>

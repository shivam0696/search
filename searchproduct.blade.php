@extends('front.layout.app_other')  

@section ('content')

// Search Route
Route::get('productList',[HomePageController::class,'ProductListAjax']);
Route::post('searchProduct',[HomePageController::class,'SearchProducts']);


  <!-- Breadcrumb Section Begin -->
  <section class="breadcrumb-section set-bg" data-setbg="front/assets/img/breadcrumb.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Search Result</h2>
                    <div class="breadcrumb__option">
                        <a href="index">Home</a>
                        <span>Search Page</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->



@if(session('success'))
<div class="alert alert-success">
{{ session('success') }}
</div> 
@endif

<!-- Featured Section Begin -->
<section class="featured spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">

                <div class="section-title">
                    <h2>Search Product Results </h2>
                </div>
    
            </div>
        </div>
        <div class="row featured__filter">
            @foreach ( $products as $searchroducts)
            <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
            <div class="featured__item">
                    <div class="featured__item__pic set-bg" data-setbg="backend/images/{{ $searchroducts->pro_img }}">
                        <ul class="featured__item__pic__hover">
                            <li><a href="prodetailspage/{{ $searchroducts->id }}"><i class="fa fa-shopping-cart"></i></a></li>
                        </ul>
                    </div>
                    <div class="featured__item__text">
                        <h6>{{ $searchroducts->pro_name }}</h6>
                        <h5>&#8377; {{ $searchroducts->pro_price }}</h5>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- Featured Section End -->


@endsection

@section('title')
Serach Page
@endsection


    



<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

@extends('front.layout.app_other')  


@section ('content')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="front/assets/img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Shopping Cart</h2>
                        <div class="breadcrumb__option">
                            <a href="index">Home</a>
                            <span>Cart Page</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shoping Cart Section Begin -->
    <section class="shoping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
            {{-- @if(session('success'))
                    <div class="alert alert-success">
                    {{ session('success') }}
                    </div> 
                @endif --}}
                    <div class="shoping__cart__table">
                        <table id="cart" class="table table-hover table-condensed">
                            <thead>
                                <tr>
                                    <th>Products</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Subtotal</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $total = 0 @endphp
                                @if(session('cart'))
                             
                                @foreach(session('cart') as $id => $details)
                                    @php $total += $details['product_price'] * $details['quantity'] @endphp
                                    
                                <tr data-id="{{ $id }}">
                                    <td data-th="Product">
                                        <img src="{{asset('backend/images/'.$details['product_image'] )}}" width="100" height="100" class="img-responsive">
                                        <h5>{{ $details['product_name'] }}</h5>
                                    </td>

                                    <td data-th="Price">
                                        &#8377;{{ $details['product_price'] }}
                                    </td>

                                    <td data-th="Quantity">
                                        <div class="pro-qty">
                                            <button class="qty-btn minus">-</button>
                                            <input type="text" value="{{ $details['quantity'] }}" class="quantity update-cart" />
                                            <button class="qty-btn plus">+</button>
                                        </div>
                                    </td>
                                    
                                    <td data-th="Subtotal">
                                        &#8377;{{ $details['product_price'] * $details['quantity'] }}
                                    </td>
                                    
                                    <td class="actions" data-th="">
                                        <button class="btn btn-danger btn-sm remove-from-cart" title="Delete Product"><i class="fa fa-trash-o"></i></button>
                                    </td>
                             </tr>
                             @endforeach

                             @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__btns">
                        <a href="index" class="primary-btn cart-btn">CONTINUE SHOPPING</a>
                    </div>
                </div>
      
                <div class="col-lg-6">
                    <div class="shoping__checkout">
                        <h5>Cart Total</h5>
                        <ul>
                            <li>Grand Total <span>&#8377; {{ $total }} /-</span></li>
                        </ul>
                        <a href="#" class="primary-btn">PROCEED TO CHECKOUT</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shoping Cart Section End -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <script type="text/javascript">
    function updateQuantity(element) {
    const row = element.closest("tr");
    const quantityValue = element.val();

    $.ajax({
        url: '{{ route('update.cart') }}',
        method: "PATCH",
        data: {
            _token: '{{ csrf_token() }}',
            id: row.data("id"),
            quantity: quantityValue
        },
        success: function () {
            window.location.reload();
        },
        error: function (xhr) {
            console.error("Error updating quantity: ", xhr);
        }
    });
}

// Handle click events for + and - buttons
$(".qty-btn").on("click", function (e) {
    e.preventDefault();
    const quantityInput = $(this).siblings(".quantity");
    let currentVal = parseInt(quantityInput.val());

    if ($(this).hasClass('plus')) {
        quantityInput.val(currentVal + 1);
    } else if ($(this).hasClass('minus')) {
        if (currentVal > 1) {
            quantityInput.val(currentVal - 1);
        }
    }

    updateQuantity(quantityInput);
});

// Handle change events for quantity input
$(".update-cart").on("change", function () {
    let newValue = parseInt($(this).val());
    if (newValue < 1) {
        $(this).val(1); // Set minimum value to 1 if input is less than 1
    }
    updateQuantity($(this));
});



    
        $(".remove-from-cart").click(function (e) {
            //console.log('This is for testing to delete product');
            e.preventDefault();
            var ele = $(this);
            if(confirm("Are you sure want to remove?")) {
                $.ajax({
                    url: '{{ route('remove.from.cart') }}',
                    method: "DELETE",
                    data: {
                        _token: '{{ csrf_token() }}', 
                        id: ele.parents("tr").attr("data-id")
                    },
    
                    success: function (response) {
                        window.location.reload();
    
                    }
                });
            }
        });
    
    </script>
@endsection

@section('title')
Cart Page
@endsection

@if (session('success'))
<script>
    $(document).ready(function() {
        toastr.success("{{ session('success') }}");
    });
</script>
@endif





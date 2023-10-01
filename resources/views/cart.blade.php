@extends('shop')

@section('content')
    <table id="cart" class="table table-bordered">
        <thead>
        <tr>
            <th>Image</th>
            <th>Name</th>
            <th>Price</th>
            <th>Quantity orange </th>
            <th>Quantity</th>
            
            <th>Total</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @php $total = 0 @endphp
        @if(session('cart'))
            @foreach(session('cart') as $id => $details)
                <tr rowId="{{ $id }}">

                    <td data-th="Product">
                        <div class="row">
                            <div class="col-sm-3 hidden-xs">
                                @if(isset($details['image']))
                                    <a href="#" class="avatar">
                                        <img alt="" class="rounded-circle shadow-4" style="width: 150px;"
                                             src="{{ asset('back/assets/imag/product/' . $details['image']) }}">
                                    </a>
                                @endif
                            </div>
                        </div>
                    </td>
                    <td>
                        <h4 class="nomargin">{{ $details['name'] }}</h4>
                    </td>
                    <td data-th="Price" i>${{ $details['selling_price'] }}</td>


                    <td id="available_quantity"><span>{{ $details['quantity'] }}</span></td>
                    <td data-th="Quantity">
                         
                        <input type="number" name="qty" id="quantity_wanted" min="1" class="quantity-input">
                    </td>
                    <td data-th="Total" class="text-center">
                                                <span itemprop="price" class="price" id="total_price">
                                        Price : {{ $details['selling_price'] }}
                                        </span>

                            </td>


                          



                    <td class="actions">
                        <a class="btn btn-outline-danger btn-sm delete-product"><i class="fa fa-trash-o"></i></a>
                    </td>
                </tr>





            @endforeach
        @endif
        </tbody>
        <tfoot>
        <tr>
            <td colspan="5" class="text-right">
                <a href="{{ route('home') }}" class="btn btn-primary"><i class="fa fa-angle-left"></i> Continue Shopping</a>

                <!-- Button trigger modal -->
                <a href="{{ route('cart.checkout') }}" class="btn btn-success">Checkout</a>

            


            </td>
        </tr>
        </tfoot>
    </table>


@endsection

@section('scripts')

<script type="text/javascript">

    $(".edit-cart-info").change(function (e) {
        e.preventDefault();
        var ele = $(this);
        $.ajax({
            url: '{{ route('update.sopping.cart') }}',
            method: "patch",
            data: {
                _token: '{{ csrf_token() }}',
                id: ele.parents("tr").attr("rowId"),
            },
            success: function (response) {
               window.location.reload();
            }
        });
    });

    $(".delete-product").click(function (e) {
        e.preventDefault();

        var ele = $(this);

        if(confirm("Do you really want to delete?")) {
            $.ajax({
                url: '{{ route('delete.cart.product') }}',
                method: "DELETE",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: ele.parents("tr").attr("rowId")
                },
                success: function (response) {
                    window.location.reload();
                }
            });
        }
    });

</script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
    const quantityInput = document.getElementById("quantity_wanted");
    const availableQuantity = parseInt({{ $details['quantity'] }});
    const price = parseFloat({{ $details['selling_price'] }});
    const totalPriceElement = document.getElementById("total_price");
    
    quantityInput.addEventListener("change", function () {
        const enteredQuantity = parseInt(this.value, 10);
        
        if (isNaN(enteredQuantity) || enteredQuantity < 1) {
            alert("الكمية المدخلة غير صالحة.");
            this.value = 1;
        } else if (enteredQuantity > availableQuantity) {
            alert("الكمية المدخلة تجاوزت الكمية المتاحة.");
            this.value = availableQuantity;
        } else {
            const total = enteredQuantity * price;
            totalPriceElement.textContent = total.toFixed(2);
        }
    });
});

</script>
<script>


    var quantityInput = document.getElementById('quantity_wanted');
    var decreaseQtyButton = document.getElementById('decreaseQty');
    var increaseQtyButton = document.getElementById('increaseQty');
    var priceSpan = document.getElementById('product_price');
    var maxQuantity = @if(isset($details['quantity'])) parseInt("{{ $details['quantity'] }}") @else 0 @endif; // استبدل هذا بالحد الأقصى للكمية من البيانات
    var originalPrice = parseFloat(priceSpan.textContent.split(":")[1]);

    increaseQtyButton.addEventListener('click', function() {


        var quantity = parseInt(quantityInput.value);

        if (!isNaN(quantity) && quantity < maxQuantity) { // التحقق من عدم تجاوز الحد الأقصى
            quantityInput.value = quantity + 1;
            var updatedPrice = originalPrice * (quantity + 1);
            priceSpan.textContent = 'Price : ' + updatedPrice.toFixed(2); // تعيين السعر المحدث
        }
    });

    decreaseQtyButton.addEventListener('click', function() {
        var quantity = parseInt(quantityInput.value);
        if (!isNaN(quantity) && quantity > 1) {
            quantityInput.value = quantity - 1;
            var updatedPrice = originalPrice * (quantity - 1);
            priceSpan.textContent = 'Price : ' + updatedPrice.toFixed(2); // تعيين السعر المحدث
        }
    });

</script>




@endsection

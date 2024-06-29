@extends('layouts.app')

@section("extrastyle")
<style>
    .box {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 8px;
        background-color: #f9f9f9;
        max-height: 85vh;
    }
    .title{
        display: flex;
        justify-content: space-between;
        margin-bottom: 10px;
    }
    .product-title {
        width: 63.8%;
        background: #f9f9f9;
        display: flex;
        justify-content: space-between;
    }
    .product-title select, .product-title input {
        width: 45%;
        background: #fff;
    }
    .cart-title {
        /* background: #eee; */
        width: 35%;
    }
    .pos-container {
        display: flex;
        justify-content: space-between;
        border-radius: 8px;
        background-color: #f9f9f9;
        max-height: 75vh;
    }
    .product-list {
        width: 65%;
        display: flex;
        flex-wrap: wrap;
        gap: 15px;
        overflow-y: auto;
        background: #f9f9f9;
    }
    .cart-list {
        background: #eee;
        padding: 10px;
        border-radius: 10px;
        width: 35%;
        overflow-y: auto
    }
    .product-list .product, .cart-list .cart-item {
        display: flex;
        align-items: center;
        flex-direction: column;
        margin-bottom: 15px;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 8px;
        background-color: #fff;
        flex: 1 1 calc(25% - 15px); /* Ensures each product takes 1/3 of the row width */
        box-sizing: border-box;
    }
    .product-list .product img, .cart-list .cart-item img {
        max-width: 98%;
        /* border: 2px solid #dadade; */
        object-fit: cover;
        border-radius: 8px;
    }
    .product-list .product .details, .cart-list .cart-item .details {
        flex-grow: 1;
        width: 100%;
    }
    .product-list .product .details .name, .cart-list .cart-item .details .name {
        font-size: 14px;
        font-weight: bold;
        display: -webkit-box;
        -webkit-line-clamp: 2; /* Show ellipsis after 2 lines */
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
        line-height: 1.2; /* Adjust line height as necessary */
        max-height: 3em; /* Should be 2 times the line-height */
        word-break: break-word;
        margin-top: 5px;
    }
    .product-list .product .details .price, .cart-list .cart-item .details .price {
        font-size: 12px;
        margin-top: 5px;
        color: #888;
    }
    .product-list .product button {
        position: absolute;
        bottom: 8px;
        width: 90%;
    }
    /*
    .product-list .product button:hover, .cart-list .cart-item button:hover {
        background-color: #0056b3;
    } */
    .product-list .product{
        height: 300px;
        max-width: calc(25% - 15px) !important;
        position: relative;
    }
    .cart-list .cart-item {
        flex-direction: row !important;
    }
    .cart-list .cart-item img {
        width: 20% !important;
        margin-right: 15px;
    }
    .cart-list .checkout {
        margin-top: 20px;
        padding: 15px;
        border: 1px solid #ddd;
        border-radius: 8px;
        background-color: #fff;
    }
    .cart-list .checkout .total {
        display: flex;
        justify-content: space-between;
        margin-bottom: 10px;
    }
    .cart-list .checkout .checkout-btn {
        width: 100%;
        padding: 10px;
        background-color: #28a745;
        color: #fff;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        font-size: 16px;
    }
    .cart-list .checkout .checkout-btn:hover {
        background-color: #218838;
    }
    .footer-product{
        display: flex;
        flex-direction: row;
        width: 50%;
        justify-content: space-between;
    }
    .footer-product input{
        width: 35%;
        text-align: center;
        border-radius: 6px;
        border: 1px solid #ccc;
    }
</style>
@endsection

@section('content')
<div class="container">
    {{-- @dd($products) --}}
    <div class="box">
        <div class="title">
            <div class="product-title">
                <form method="GET" class="product-title">
                <input class="form-control" type="text" placeholder="Cari . . ." name="search" value="{{@$search}}">
                <select class="form-control" name="category_id">
                    <option value="0">Semua Kategori</option>
                    @foreach ($categories as $cat)
                        <option @selected($category_id == $cat->id) value="{{ $cat->id }}"> {{ @$cat->name }} </option>
                    @endforeach
                </select>
                <button class="btn btn-primary">
                    <i class="fa fa-search"></i>
                </button>
                </form>
            </div>
            <div class="cart-title"></div>
        </div>
        <div class="pos-container">
            <div class="product-list">
                @foreach ($products as $product)
                <div class="product">
                    <img src="{{ @$product->images[0]->url }}" alt="Product-{{ @$product->id }}">
                    <div class="details">
                        <div class="name">{{ @$product->name }}</div>
                        <div class="price">Rp. {{ number_format(@$product->sell_price, 0, '.', '.') }}</div>
                    </div>
                    <button id="add-{{@$product->id}}" onclick="addToCart({{$product}})" class="btn btn-primary btn-sm">
                        <span class="fa fa-plus"></span>
                    </button>
                </div>
                @endforeach
                <!-- Add more products as needed -->
            </div>
            <div class="cart-list" id="cartlist">
                <div id="item-container">
                    {{-- <div class="cart-item">
                        <img src="https://res.cloudinary.com/dgsttrk3m/image/upload/v1715854344/vcj3le4xnyfqmanu5sul.jpg" alt="Product 1">
                        <div class="details">
                            <div class="name">Product namanya sangat panjang sekali sehingga jadi bisa sampe berbaris berbaris</div>
                            <div class="price">$10.00</div>
                        </div>
                        <div class="footer-product">
                            <button class="btn btn-light btn-sm"> <span class="fa fa-minus"></span></button>
                            <input />
                            <button class="btn btn-light btn-sm"> <span class="fa fa-plus"></span></button>
                        </div>
                    </div> --}}
                </div>
                <!-- Add more cart items as needed -->
                <div class="checkout">
                    <div class="total">
                        <div>Total:</div>
                        <div id="total-checkout"></div>
                    </div>
                    <button class="checkout-btn">Checkout</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section("extrascript")
<script>
    let carts = [];

    function addToCart(elem){
        const cartlist = $("#item-container");
        const item = generateCartItem(elem);
        cartlist.append(item);
        elem.quantity = 1;
        carts.push(elem);

        // disable the add button
        const btn = $(`#add-${elem.id}`);
        btn.prop("disabled", true);

        generateTotal();
    }
    function generateCartItem(elem){
        let template = `
        <div class="cart-item">
            <img src="${elem?.images[0]?.url}" alt="product_${elem?.id}">
            <div class="details">
                <div class="name">${elem.name}</div>
                <div class="price">Rp. ${numberWithIndonesianThousands(elem.sell_price)} </div>
            </div>
            <div class="footer-product">
                <button onclick="handleQty(${elem.id}, false)" class="btn btn-light btn-sm"> <span class="fa fa-minus"></span></button>
                <input disabled value='1' id='qty-${elem.id}' />
                <button onclick="handleQty(${elem.id})" class="btn btn-light btn-sm"> <span class="fa fa-plus"></span></button>
            </div>
        </div>`
        return template;
    }

    function handleQty(id, add=true){
        qty = $(`#qty-${id}`);
        let val_ = Number(qty.val());
        val_ = add ? val_+1 : val_-1;
        val_ = val_ < 0 ? 0 : val_;
        qty.val(val_);

        let selectedCart = carts.find(i => i.id == id);
        selectedCart.quantity = val_;
        generateTotal();
    }

    function numberWithIndonesianThousands(x) {
        x = x.toString();
        var pattern = /(-?\d+)(\d{3})/;
        while (pattern.test(x))
            x = x.replace(pattern, "$1.$2");
        return x;
    }

    function generateTotal(){
        const totalElem = $("#total-checkout");
        let t = 0;
        for (const c of carts) {
            t += c.quantity * c.sell_price;
        }
        totalElem.html(numberWithIndonesianThousands(t));
    }
</script>
@endsection

@section('header')
<div id="header">
    <span id="product_title">定食屋</span>
    <span class="title">@yield('title')</span>
    <span id="user-icon" class="option-icon">
        <i class="fas fa-user-circle"></i>
    </span>
    <span id="shopping-cart" class="option-icon">
        <span @click="submitItems"><i class="fas fa-shopping-cart"></i></span>
        <span v-show="itemNum>0">[[itemNum]]</span>
    </span>
</div>
<script src="view/js/dishCart.js"></script>
@endsection
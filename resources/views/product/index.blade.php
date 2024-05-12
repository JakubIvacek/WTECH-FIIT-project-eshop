<x-product>

    <ul class="list-unstyled d-flex flex-wrap justify-content-center">

        @foreach ($products as $product)

            <li style="padding: 10px;">

                <a href="javascript:void(0)" class="noUnderline" onclick="redirectToProductCloseup('{{ $product->id }}')">

                    <div class="card card_bg rounded-2 heightCard" data-category="{{ strtolower($product->category) }}">
                        <img class="card-img-top img-fluid" src="{{ $product->images->first()->imgsrc }}" alt="Product image here">

                        <div class="card-body  text-warning fw-bold">

                            <div class="card-header bg-transparent border-0">

                                <p class="mobileBigger text-dark no-underline">{{ $product->name }}</p>

                            </div>

                            <ul class="list-group list-group-flush border-0 mobileBiggerSmall">

                                <li class="list-group-item border-0 no-underline">
                                    <p>

                                    @foreach ($product->sizes as $size)
                                            @if($size->count > 0)
                                                {{ $size->size }}
                                            @endif
                                    @endforeach
                                    </p>
                                </li>

                                <li class="list-group-item border-0 ">{{ $product->price }}</li>

                            </ul>

                        </div>

                    </div>

                </a>

            </li>

        @endforeach

    </ul>
    <div class="w-100 d-flex justify-content-center">
        {{ $products->links() }}
    </div>

</x-product>
<script>
    function redirectToProductCloseup(productId) {
        window.location.href = '/products/' + productId;
        localStorage.setItem('product', productId);
    }
</script>



<x-productClose>
    <div class="container-fluid  rounded-2">
        <div class="row align-items-center justify-content-center">
            <div class="col-12 d-block d-xl-none">
                <div id="productCarousel" class="carousel slide " data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <!-- First slide -->
                        <div class="carousel-item active">
                            <img src="{{ asset($product->images->first()->imgsrc) }}" class="d-block w-100" alt="product image first slide">
                        </div>
                        <!-- Second slide -->
                        <div class="carousel-item">
                            <img src="{{ asset($product->images[1]->imgsrc) }}" class="d-block w-100" alt="product image second slide">
                        </div>
                        <!-- Second slide -->
                        <div class="carousel-item">
                            <img src="{{ asset($product->images[2]->imgsrc) }}" class="d-block w-100" alt="product image third slide">
                        </div>
                    </div>
                    <!-- Carousel controls -->
                    <button class="carousel-control-prev" type="button" data-bs-target="#productCarousel" data-bs-slide="prev">
                        <img src="{{asset('img/prev_icon.jpg')}}" width="40" alt="icon left arrow">
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#productCarousel" data-bs-slide="next">
                        <img src="{{asset('img/next_icon.jpg')}}" width="40" alt="icon right arrow">
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
            <div class="row-xl-12 d-none d-xl-block d-flex flex-row">
                <ul class="d-flex flex-row list-unstyled">
                    <li>
                        <img src="{{ asset($product->images->first()->imgsrc) }}" class="d-block img-fluid" alt="product first image">
                    </li>
                    <li>
                        <img src="{{ asset($product->images[1]->imgsrc) }}" class="d-block w-50" alt="product second image">
                        <img src="{{ asset($product->images[2]->imgsrc) }}" class="d-block w-50" alt="product third image">
                    </li>

                </ul>
            </div>
        </div>
        <div class="row">
            <div class="card-body text-warning fw-bold">
                <div class="card-header bg-transparent border-0">
                    <p class="mobileBigger text-dark no-underline fw-bold ps-4">{{ $product->name}}</p>
                </div>
                <ul class="ps-2 list-group list-group-flush border-0 mobileBiggerCloseup mobileBiggerCloseup2">
                    <li class="list-group-item border-0 no-underline">
                        <label for="Size"></label>
                        <select class="custom-select biggerInput border-0 border-bottom border-end border-black border-4" id="size">
                            <option selected>select size</option>
                            @foreach ($product->sizes as $size)
                                @if($size->count > 0)
                                    <option value="{{ $size->size }}">{{ $size->size }}</option>
                                @endif
                            @endforeach
                        </select>
                    </li>
                    <li class="list-group-item border-0">Price :{{ $product->price}} € </li>
                </ul>
            </div>
        </div>
    </div>
</x-productClose>

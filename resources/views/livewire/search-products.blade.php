
<div style="position: relative;">
    <input wire:model.live="search" type="text" placeholder="Enter search" aria-label="Search query" aria-describedby="basic-addon2" class="form-control"/>
    <div style="position: absolute; top: 100%; left: 0; z-index: 1000; max-height: 200px; width: 350px; overflow-y: auto;">
        <ul class="list-group">
        @foreach ($products as $product)
            <li class="list-group-item">
                <a href="#" class="text-dark" wire:click.prevent="redirectToProduct('{{ $product->name }}')">{{ $product->name }}</a>
            </li>
        @endforeach
    </ul>
    </div>
</div>

<div class="widget-category mb-30">
    <h5 class="section-title style-1 mb-30 wow fadeIn animated">Category</h5>
    <ul class="categories">
        @foreach ($categories as $category)
            <li><a href="#" class="{{ $categoryId == $category->id ? 'active' : '' }}"
                    wire:click.prevent='filterByCategory({{ $category->id }})'>{{ $category->name }}</a>
            </li>
        @endforeach
    </ul>
</div>

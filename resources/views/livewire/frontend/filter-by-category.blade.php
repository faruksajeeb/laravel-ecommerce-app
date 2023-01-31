<div class="widget-category mb-30 categori-dropdown-wrap">
    <h5 class="section-title style-1 mb-30 wow fadeIn animated">Category</h5>
    <ul class="categories">
        @foreach ($categories as $category)
            @php
                $subCategories = App\Models\Subcategory::where('category_id', $category->id)
                    ->where('status', 1)
                    ->get();
            @endphp
            <li class="{{ count($subCategories) > 0 ? 'has-children' : '' }}"><a href="#"
                    class="{{ $categoryId == $category->id ? 'active' : '' }}"
                    wire:click.prevent='filterByCategory({{ $category->id }})'>{{ $category->name }}</a>
                @if (count($subCategories) > 0)
                    <div class="dropdown-menu">
                        <ul class="">
                            {{-- <li><span class="submenu-title">Hot & Trending</span>
                                                </li> --}}
                            @foreach ($subCategories as $subcategory)
                                <li><a class="dropdown-item nav-link nav_item"
                                        href="{{ route('search-by-subcategory', ['subcategoryId' => Crypt::encryptString($subcategory->id)]) }}">{{ $subcategory->subcategory_name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </li>
        @endforeach
    </ul>
</div>

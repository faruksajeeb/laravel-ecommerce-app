<div class="main-categori-wrap d-none d-lg-block">
    <a class="categori-button-active" href="#">
        <span class="fi-rs-apps"></span> Browse Categories
    </a>
    <div class="categori-dropdown-wrap categori-dropdown-active-large">
        <ul>
                @foreach ($categories as $category)
                @php
                    $subCategories = App\Models\Subcategory::where('category_id',$category->id)->where('status',1)->get();
                @endphp
                <li class="{{ (count($subCategories)>0) ? 'has-children': '' }}">
                        <a href="{{ route('search-by-category',['categoryId'=>Crypt::encryptString($category->id)]) }}" ><i class="surfsidemedia-font-dress"></i>{{ $category->name}}</a>
                        {{-- <a href="#" wire:click.prevent='filterByCategory({{$category->id}})' ><i class="sajeeb-font-dress"></i>{{ $category->name}}</a> --}}
                       
                        @if (count($subCategories)>0)
                        <div class="dropdown-menu">
                            <ul class="mega-menu d-lg-flex">
                                <li class="mega-menu-col col-lg-7">
                                    <ul class="d-lg-flex">
                                        <li class="mega-menu-col col-lg-6">
                                            <ul>
                                                {{-- <li><span class="submenu-title">Hot & Trending</span>
                                                </li> --}}
                                                @foreach ($subCategories as $subcategory)
                                                <li><a class="dropdown-item nav-link nav_item"
                                                    href="{{ route('search-by-subcategory',['subcategoryId'=>Crypt::encryptString($subcategory->id)]) }}"  >{{ $subcategory->subcategory_name }}</a></li>
                                                @endforeach
                                            </ul>
                                        </li>
                                        {{-- <li class="mega-menu-col col-lg-6">
                                            <ul>
                                                <li><span class="submenu-title">Bottoms</span></li>
                                                <li><a class="dropdown-item nav-link nav_item"
                                                        href="#">Leggings</a></li>
                                                <li><a class="dropdown-item nav-link nav_item"
                                                        href="#">Skirts</a></li>
                                                <li><a class="dropdown-item nav-link nav_item"
                                                        href="#">Shorts</a></li>
                                                <li><a class="dropdown-item nav-link nav_item"
                                                        href="#">Jeans</a></li>
                                                <li><a class="dropdown-item nav-link nav_item"
                                                        href="#">Pants & Capris</a></li>
                                                <li><a class="dropdown-item nav-link nav_item"
                                                        href="#">Bikini Sets</a></li>
                                                <li><a class="dropdown-item nav-link nav_item"
                                                        href="#">Cover-Ups</a></li>
                                                <li><a class="dropdown-item nav-link nav_item"
                                                        href="#">Swimwear</a></li>
                                            </ul>
                                        </li> --}}
                                    </ul>
                                </li>
                                {{-- <li class="mega-menu-col col-lg-5">
                                    <div class="header-banner2">
                                        <img src="{{ asset('frontend-assets/imgs/banner/menu-banner-2.jpg') }}"
                                            alt="menu_banner1">
                                        <div class="banne_info">
                                            <h6>10% Off</h6>
                                            <h4>New Arrival</h4>
                                            <a href="#">Shop now</a>
                                        </div>
                                    </div>
                                    <div class="header-banner2">
                                        <img src="{{ asset('frontend-assets/imgs/banner/menu-banner-3.jpg') }}"
                                            alt="menu_banner2">
                                        <div class="banne_info">
                                            <h6>15% Off</h6>
                                            <h4>Hot Deals</h4>
                                            <a href="#">Shop now</a>
                                        </div>
                                    </div>
                                </li> --}}
                            </ul>
                        </div>  
                        @endif
                    </li>   
                @endforeach
           
            {{-- <li class="has-children">
                <a href="shop.html"><i class="surfsidemedia-font-tshirt"></i>Men's
                    Clothing</a>
                <div class="dropdown-menu">
                    <ul class="mega-menu d-lg-flex">
                        <li class="mega-menu-col col-lg-7">
                            <ul class="d-lg-flex">
                                <li class="mega-menu-col col-lg-6">
                                    <ul>
                                        <li><span class="submenu-title">Jackets & Coats</span>
                                        </li>
                                        <li><a class="dropdown-item nav-link nav_item"
                                                href="#">Down Jackets</a></li>
                                        <li><a class="dropdown-item nav-link nav_item"
                                                href="#">Jackets</a></li>
                                        <li><a class="dropdown-item nav-link nav_item"
                                                href="#">Parkas</a></li>
                                        <li><a class="dropdown-item nav-link nav_item"
                                                href="#">Faux Leather Coats</a></li>
                                        <li><a class="dropdown-item nav-link nav_item"
                                                href="#">Trench</a></li>
                                        <li><a class="dropdown-item nav-link nav_item"
                                                href="#">Wool & Blends</a></li>
                                        <li><a class="dropdown-item nav-link nav_item"
                                                href="#">Vests & Waistcoats</a></li>
                                        <li><a class="dropdown-item nav-link nav_item"
                                                href="#">Leather Coats</a></li>
                                    </ul>
                                </li>
                                <li class="mega-menu-col col-lg-6">
                                    <ul>
                                        <li><span class="submenu-title">Suits & Blazers</span>
                                        </li>
                                        <li><a class="dropdown-item nav-link nav_item"
                                                href="#">Blazers</a></li>
                                        <li><a class="dropdown-item nav-link nav_item"
                                                href="#">Suit Jackets</a></li>
                                        <li><a class="dropdown-item nav-link nav_item"
                                                href="#">Suit Pants</a></li>
                                        <li><a class="dropdown-item nav-link nav_item"
                                                href="#">Suits</a></li>
                                        <li><a class="dropdown-item nav-link nav_item"
                                                href="#">Vests</a></li>
                                        <li><a class="dropdown-item nav-link nav_item"
                                                href="#">Tailor-made Suits</a></li>
                                        <li><a class="dropdown-item nav-link nav_item"
                                                href="#">Cover-Ups</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="mega-menu-col col-lg-5">
                            <div class="header-banner2">
                                <img src="{{ asset('frontend-assets/imgs/banner/menu-banner-4.jpg') }}"
                                    alt="menu_banner1">
                                <div class="banne_info">
                                    <h6>10% Off</h6>
                                    <h4>New Arrival</h4>
                                    <a href="#">Shop now</a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </li> --}}
            
            {{-- <li><a href="shop.html"><i class="surfsidemedia-font-kite"></i>Outdoor fun</a> --}}
            </li>
            <li>
                <ul class="more_slide_open" style="display: none;">
                    <li><a href="shop.html"><i class="surfsidemedia-font-desktop"></i>Beauty,
                            Health</a></li>
                    <li><a href="shop.html"><i class="surfsidemedia-font-cpu"></i>Bags and
                            Shoes</a></li>
                    <li><a href="shop.html"><i class="surfsidemedia-font-diamond"></i>Consumer
                            Electronics</a></li>
                    <li><a href="shop.html"><i class="surfsidemedia-font-home"></i>Automobiles
                            & Motorcycles</a></li>
                </ul>
            </li>
        </ul>
        <div class="more_categories">Show more...</div>
    </div>
</div>
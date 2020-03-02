<div class="directify_fn_mobile_menu_wrap absolute" data-bg-type="translight">

    <div class="directify_fn_mobile_menu">
        <div class="mobile_logo">
            <a class="dark" href="index-2.html"><img src="<?= THEME_ASSET_URL ?>img/logo-dark.png" alt="" /></a>
            <a class="light" href="index-2.html"><img src="<?= THEME_ASSET_URL ?>img/logo-light.png" alt="" /></a>
        </div>
        <div class="mobile_search">
            <a href="#">
                <img class="svg" src="<?= THEME_ASSET_URL ?>img/svg/search.svg" alt="" />
                Tìm kiếm
            </a>
        </div>
        <div class="hamburger hamburger--collapse-r">
            <div class="hamburger-box">
                <div class="hamburger-inner"></div>
            </div>
        </div>
        <div class="s-search">
            <a href="#">
                <img class="svg" src="<?= THEME_ASSET_URL ?>img/svg/search.svg" alt="" />
            </a>
        </div>
    </div>
    <div class="directify_fn_mobile_nav">
        <ul class="nav">
            <li>
                <a href="#">Explore<i class="xcon-angle-down"></i></a>
                <ul class="sub_menu">
                    <li><a href="listing.html">Restaurants</a></li>
                    <li><a href="listing.html">Hotels</a></li>
                    <li><a href="listing.html">Shopping</a></li>
                    <li><a href="listing.html">Galleries</a></li>
                    <li><a href="listing.html">Parks</a></li>
                    <li><a href="listing.html">Movies</a></li>
                    <li><a href="listing.html">Services</a></li>
                    <li><a href="listing.html">Theatres</a></li>
                    <li><a href="listing.html">Hospitals</a></li>
                    <li><a href="listing_single1.html">Single Page #1</a></li>
                    <li><a href="listing_single2.html">Single Page #2</a></li>
                </ul>
            </li>
            <li>
                <a href="#">Pages<i class="xcon-angle-down"></i></a>
                <ul class="sub_menu">
                    <li><a href="index-2.html">Homepage #1</a></li>
                    <li><a href="index21.html">Homepage #2</a></li>
                    <li><a href="index23.html">Homepage #3</a></li>
                    <li><a href="index25.html">Homepage #4</a></li>
                    <li><a href="index10.html">Homepage #5</a></li><li><a href="contact.html">Contact</a></li>
                    <li>
                        <a href="#">Submenu Level #1<i class="xcon-angle-down"></i></a>
                        <ul class="sub_menu">
                            <li><a href="#">Level #2</a></li>
                            <li><a href="#">Level #2</a></li>
                            <li>
                                <a href="#">Level #2<i class="xcon-angle-down"></i></a>
                                <ul class="sub_menu">
                                    <li><a href="#">Level #3</a></li>
                                    <li><a href="#">Level #3</a></li>
                                    <li><a href="#">Level #3</a></li>
                                    <li>
                                        <a href="#">Level #3<i class="xcon-angle-down"></i></a>
                                        <ul class="sub_menu">
                                            <li><a href="#">Level #4</a></li>
                                            <li><a href="#">Level #4</a></li>
                                            <li><a href="#">Level #4</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li><a href="#">Level #2</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#">Dashboard<i class="xcon-angle-down"></i></a>
                <ul class="sub_menu">
                    <li><a href="dashboard-home.html">Dashboard - Home</a></li>
                    <li>
                        <a href="#">Dashboard - Listings<i class="xcon-angle-down"></i></a>
                        <ul class="sub_menu">
                            <li><a href="dashboard-listings.html">Active</a></li>
                            <li><a href="dashboard-listings.html">Panding</a></li>
                            <li><a href="dashboard-listings.html">Expired</a></li>
                        </ul>
                    </li>
                    <li><a href="dashboard-reviews.html">Dashboard - Reviews</a></li>
                    <li><a href="dashboard-bookmarks.html">Dashboard - Bookmarks</a></li>
                    <li><a href="dashboard-adding.html">Dashboard - Adding</a></li>
                    <li><a href="dashboard-invoices.html">Dashboard - Invoices</a></li>
                    <li><a href="dashboard-profile.html">Dashboard - Profile</a></li>
                </ul>
            </li>
            <li>
                <a href="#">Blog<i class="xcon-angle-down"></i></a>
                <ul class="sub_menu">
                    <li><a href="blog.html">Blog</a></li>
                    <li><a href="blog_single.html">Single Page</a></li>
                </ul>
            </li>
            <li>
                <?php if(!isset($_SESSION[AUTH])) :?>
            <li>
                <a href="<?= BASE_URL . 'login.php' ?>">Log In</a>
            </li>
            <?php endif; ?>
            <?php if(isset($_SESSION[AUTH])) :?>
                <li>
                    <a href="#" d>Hello: <?php echo $_SESSION[AUTH]['name']; ?></a>
                    <ul class="sub_menu">
                        <li><a href="#">Sửa thông tin tài khoản</a></li>
                        <li><a href="<?= BASE_URL . 'logout.php' ?>">LOGOUT</a></li>
                    </ul>
                </li>
            <?php endif; ?>
            </li>
            <li class="add_listing">
                <a href="submit.html"><span>Add Listings</span></a>
            </li>
        </ul>
    </div>

    <div class="mobile_search_see one">
        <div class="selects">
            <div>
                <input class="directify_fn_search_input" type="search" placeholder="What Are You Looking For?" />
            </div>
            <div>
                <select class="directify_fn_select">
                    <option value="all">All Listings</option>
                    <option value="restaurant">Restaurants</option>
                    <option value="hotel">Hotels</option>
                    <option value="shopping">Shopping</option>
                    <option value="gallery">Gallery</option>
                    <option value="park">Park</option>
                    <option value="movie">Movie</option>
                    <option value="service">Services</option>
                    <option value="theatre">Theatres</option>
                    <option value="hospital">Hospitals</option>
                </select>
            </div>
            <div>
                <input type="text" id="select-location" placeholder="Location" />
                <img class="svg" src="<?= THEME_ASSET_URL ?>img/svg/gps-fixed-indicator.svg" alt="" />
            </div>
        </div>
        <a href="#"><img class="svg" src="<?= THEME_ASSET_URL ?>img/svg/search.svg" alt="" /><span>Search</span></a>
    </div>

</div>
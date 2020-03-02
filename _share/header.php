<header class="directify_fn_header_wrap absolute " data-bg-type="translight">
    <div>
        <div class="directify_fn_header">
            <div class="header">
                <div class="directify_fn_header_logo">
                    <a class="dark" href="index-2.html"><img src="<?= THEME_ASSET_URL ?>img/logo-dark.png" alt="" /></a>
                    <a class="light" href="index-2.html"><img src="<?= THEME_ASSET_URL ?>img/logo-light.png" alt="" /></a>
                </div>
                <div class="directify_fn_header_search">
                    <a href="#">
                        <img class="svg" src="<?= THEME_ASSET_URL ?>img/svg/search.svg" alt="" />
                        Tìm kiếm
                    </a>
                    <div class="directify_fn_header_search_see_wrap one">
                        <div class="header_search_see">
                            <div class="selects">
                                <div>
                                    <input class="directify_fn_search_input" type="search" name="keyword" placeholder="Bạn đang tìm kiếm món ăn gì?" />
                                </div>
                                <div>
                                    <select class="directify_fn_select">
                                        <option value="all">Tất Cả Các Thể Loại</option>
                                        <?php foreach ($types as $key => $type): ?>
                                            <option value="<?= $type['id'] ?>"><?= $type['name'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div>
                                    <select class="directify_fn_select">
                                        <option value="all">Tất Cả Các Địa Điểm</option>
                                        <?php foreach ($places as $key => $place): ?>
                                            <option value="<?= $place['id'] ?>"><?= $place['name'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <a href="#"><img class="svg" src="<?= THEME_ASSET_URL ?>img/svg/search.svg" alt="" /><span>Search</span></a>
                        </div>
                    </div>
                </div>
                <div class="directify_fn_header_nav_list">
                    <ul class="nav__hor">
                        <li>
                            <a href="#">Khám phá<i class="xcon-angle-down"></i></a>
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
                                    <a href="#">Submenu Level #1<i class="xcon-angle-right"></i></a>
                                    <ul class="sub_menu">
                                        <li><a href="#">Level #2</a></li>
                                        <li><a href="#">Level #2</a></li>
                                        <li>
                                            <a href="#">Level #2<i class="xcon-angle-right"></i></a>
                                            <ul class="sub_menu">
                                                <li><a href="#">Level #3</a></li>
                                                <li><a href="#">Level #3</a></li>
                                                <li><a href="#">Level #3</a></li>
                                                <li>
                                                    <a href="#">Level #3<i class="xcon-angle-right"></i></a>
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
                                    <a href="#">Dashboard - Listings<i class="xcon-angle-right"></i></a>
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
                        <?php if(!isset($_SESSION[AUTH])) :?>
                            <li>
                                <a href="<?= BASE_URL . 'login.php' ?>">Log In</a>
                            </li>
                        <?php endif; ?>
                        <?php if(isset($_SESSION[AUTH])) :?>
                            <li>
                                <a href="#">Hello: <?php echo $_SESSION[AUTH]['name']; ?><i class="xcon-angle-down"></i></a>
                                <ul class="sub_menu">
                                    <?php if($_SESSION[AUTH]['role_id']<=2): ?>
                                        <li><a href="<?= ADMIN_URL . 'dashboard/index.php'?>">Admin</a></li>
                                    <?php endif;?>
                                    <li><a href="#">Edit profile</a></li>
                                    <li><a href="<?= BASE_URL . 'logout.php' ?>">Logout</a></li>
                                </ul>
                            </li>
                        <?php endif; ?>
                        <li class="add_listing">
                            <a href="submit.html"><img class="svg" src="<?= THEME_ASSET_URL ?>img/svg/pencil.svg" alt="" /><span>Add Listings</span></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>
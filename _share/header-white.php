<header class="directify_fn_header_wrap" data-bg-type="light">
    <div>
        <div class="directify_fn_header">
            <div class="header">
                <div class="directify_fn_header_logo">
                    <a class="dark" href="<?= BASE_URL . 'index.php' ?>"><img src="<?= THEME_ASSET_URL ?>img/logo-dark.png" alt="" /></a>
                    <a class="light" href="<?= BASE_URL . 'index.php' ?>"><img src="<?= THEME_ASSET_URL ?>img/logo-light.png" alt="" /></a>
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
                                    <input class="directify_fn_search_input" type="search" placeholder="What Are You Looking For?" />
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
                                <li><a href="listing.html">Các món ăn</a></li>
                                <li><a href="listing.html">Địa điểm</a></li>
                                <li><a href="listing.html">Các loại món</a></li>
                                <li><a href="listing.html">Thư viện ảnh</a></li>
                                <li><a href="listing.html">Dịch vụ</a></li>
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
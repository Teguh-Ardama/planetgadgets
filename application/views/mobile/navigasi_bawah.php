<footer class="tabs-footer">
            <ul class="nav nav-tabs justify-content-center" id="maintab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">
                        <i class="material-icons">store</i>
                        <small class="sr-only">Store</small>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="search-tab" data-toggle="tab" href="#search" role="tab" aria-controls="search" aria-selected="false">
                        <i class="material-icons">find_in_page</i>
                        <small class="sr-only">Search</small>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="cart-tab" data-toggle="tab" href="#cart" role="tab" aria-controls="cart" aria-selected="false">
                        <i class="material-icons">local_mall</i>
                        <?php if($keranjang) { ?>
                            <span class="notification-point"></span>
                        <?php }else { ?>
                        <?php } ?>
                        <small class="sr-only">Local Mall</small>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="favorite-tab" data-toggle="tab" href="#favorite" role="tab" aria-controls="favorite" aria-selected="false">
                        <i class="material-icons">favorite_border</i>
                        <small class="sr-only">Wishlist</small>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">
                        <i class="material-icons">account_circle</i>
                        <small class="sr-only">Account</small>
                    </a>
                </li>
            </ul>
        </footer>
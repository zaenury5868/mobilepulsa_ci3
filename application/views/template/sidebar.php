<!-- Left Sidebar Menu -->
<div class="fixed-sidebar-left">
    <ul class="nav navbar-nav side-nav nicescroll-bar">
        <li class="navigation-header">
            <span>Dashboard</span>
            <i class="zmdi zmdi-more"></i>
        </li>
        <li>
            <a href="<?= base_url('bca'); ?>"
                class="<?= ($this->uri->segment(1) == '' || $this->uri->segment(1) == 'bca') ? "active" : ""; ?>">
                <div class="pull-left">
                    <i class="zmdi zmdi-city mr-20"></i>
                    <span class="right-nav-text">Bank BCA</span>
                </div>
                <div class="clearfix"></div>
            </a>
        </li>

        <li>
            <a href="<?= base_url('mobilepulsa'); ?>"
                class="<?= ($this->uri->segment(1) == 'mobilepulsa') ? "active" : ""; ?>">
                <div class="pull-left">
                    <i class="zmdi zmdi-smartphone-android mr-20"></i>
                    <span class="right-nav-text">Mobile Pulsa</span>
                </div>
                <div class="clearfix"></div>
            </a>
        </li>

        <li>
            <hr class="light-grey-hr mb-10" />
        </li>

        <li class="navigation-header">
            <span>Transaksi</span>
            <i class="zmdi zmdi-more"></i>
        </li>

        <li>
            <a href="#">
                <div class="pull-left">
                    <i class="zmdi zmdi-smartphone-iphone mr-20"></i>
                    <span class="right-nav-text">Pulsa</span>
                </div>
                <div class="clearfix"></div>
            </a>
        </li>

        <li>
            <a href="#">
                <div class="pull-left">
                    <i class="zmdi zmdi-portable-wifi mr-20"></i>
                    <span class="right-nav-text">Paket Data</span>
                </div>
                <div class="clearfix"></div>
            </a>
        </li>

        <li>
            <a href="#">
                <div class="pull-left">
                    <i class="zmdi zmdi-flash mr-20"></i>
                    <span class="right-nav-text">Listrik</span>
                </div>
                <div class="clearfix"></div>
            </a>
        </li>

        <li>
            <a href="#">
                <div class="pull-left">
                    <i class="zmdi zmdi-gamepad mr-20"></i>
                    <span class="right-nav-text">Voucher Game</span>
                </div>
                <div class="clearfix"></div>
            </a>
        </li>


        <li>
            <a href="#">
                <div class="pull-left">
                    <i class="zmdi zmdi-card-giftcard mr-20"></i>
                    <span class="right-nav-text">Voucher</span>
                </div>
                <div class="clearfix"></div>
            </a>
        </li>

        <li>
            <a href="#">
                <div class="pull-left">
                    <i class="zmdi zmdi-calendar-alt mr-20"></i>
                    <span class="right-nav-text">Tagihan</span>
                </div>
                <div class="clearfix"></div>
            </a>
        </li>

        <li>
            <a href="#">
                <div class="pull-left">
                    <i class="zmdi zmdi-globe-alt mr-20"></i>
                    <span class="right-nav-text">Pulsa International</span>
                </div>
                <div class="clearfix"></div>
            </a>
        </li>

        <li>
            <a href="#">
                <div class="pull-left">
                    <i class="zmdi zmdi-money mr-20"></i>
                    <span class="right-nav-text">E-Money</span>
                </div>
                <div class="clearfix"></div>
            </a>
        </li>
        <li>
            <hr class="light-grey-hr mb-10" />
        </li>
    </ul>
</div>

<!-- /Left Sidebar Menu -->
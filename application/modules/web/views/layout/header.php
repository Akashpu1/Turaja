<!-- Begin Main Header Area -->
<!-- Begin Main Header Area Two -->
<header class="main-header_area-2">
  <div class="header-top_area d-none d-lg-block">
    <div class="container">
      <div class="header-top_nav">
        <div class="row">
          <div class="col-lg-12">
            <div class="ht-menu text-center">
              <?php if(isset($hedtitle)){ echo $hedtitle->headertitle?>
             <?php   } else{  ?>
            Free Domestic Shipping
             <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="header-middle_area">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="header-middle_nav">
            <div class="header-logo_area">
              <a href="<?php echo base_url(); ?>">
                <img src="<?php echo base_url(ASSETS) ?>/images/menu/logo/1.png" alt="Header Logo">
              </a>
            </div>


            <div class="header-right_area  header-right_area-2">

              <ul>
                <li class="mobile-menu_wrap d-lg-none">
                  <a href="#mobileMenu" class="mobile-menu_btn toolbar-btn color--white">
                    <i class="ion-android-menu"></i>
                  </a>
                </li>
                <li>
                  <a href="<?php echo base_url('auth') ?>" class="menu-btn  color--white  d-lg-block">

                    <i class="ion-android-person"></i>

                  </a>
                </li>

                <li class="minicart-wrap">
                  <a href="#miniCart" class="minicart-btn toolbar-btn">
                    <div class="minicart-count_area">
                      <span class="item-count card-item-count"></span>
                      <i class="ion-bag"></i>
                    </div>
                  </a>
                </li>


              </ul>
              <div class="currency-switcher">
                <div class="form-currency">
                  <select  id="myselect" >
                    <option value="INR">
                      INR
                    </option>
                    <option value="USD">
                      USD
                    </option>
                  </select>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="header-bottom_area d-none d-lg-block">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="main-menu_area position-relative">
            <nav class="main-nav d-flex justify-content-center">
              <ul>
                <!-- <li><a href="<?php //echo base_url('shop?newarrivals') ?>">New Arrival</a></li> -->
                <li><a href="<?php echo base_url('shop?cat=12') ?>">Saree <i class="ion-chevron-down"></i></a>
                  <ul class="kenne-dropdown">
                    <li><a href="<?php echo base_url('shop?cat=19') ?>">Tussar</a></li>
                    <li><a href="<?php echo base_url('shop?cat=20') ?>">Chanderi</a></li>
                    <li><a href="<?php echo base_url('shop?cat=21') ?>">Crape</a></li>
                    <li><a href="<?php echo base_url('shop?cat=22') ?>">Chiffon</a></li>
                    <li><a href="<?php echo base_url('shop?cat=23') ?>">Georget</a></li>
                    <li><a href="<?php echo base_url('shop?cat=24') ?>">Linen</a></li>
                    <li><a href="<?php echo base_url('shop?cat=25') ?>">Silk</a></li>
                    <!--<li><a href="<?php //echo base_url('shop?cat=') ?>">Orgenza</a></li>-->
                  </ul>
                </li>
                <li><a href="<?php echo base_url('shop?cat=16') ?>">Suits
                    <i class="ion-chevron-down"></i></a>
                  <ul class="kenne-dropdown">
                    <li><a href="<?php echo base_url('shop?cat=26') ?>">Tussar</a></li>
                    <li><a href="<?php echo base_url('shop?cat=27') ?>">Chanderi</a></li>
                    <li><a href="<?php echo base_url('shop?cat=28') ?>">Fancy banglore item</a></li>
                  </ul>

                </li>
                <li><a href="<?php echo base_url('shop?cat=13') ?>">Dupatta</a></li>
                <li><a href="<?php echo base_url('shop?cat=15') ?>">Ready To Wear
                    <i class="ion-chevron-down"></i></a>
                  <ul class="kenne-dropdown">
                    <li><a href="<?php echo base_url('shop?cat=29') ?>">Chanderi</a></li>
                    <li><a href="<?php echo base_url('shop?cat=30') ?>">Tussar</a></li>
                  </ul>

                </li>


                <li><a href="<?php echo base_url('shop?cat=17') ?>">Men's <i class="ion-chevron-down"></i></a>
                  <ul class="kenne-dropdown">
                    <li><a href="<?php echo base_url('shop?cat=31') ?>">Kurta</a></li>
                    <li><a href="<?php echo base_url('shop?cat=32') ?>">Jacket</a></li>
                  </ul>
                </li>

                <li><a href="<?php echo base_url('shop?cat=14') ?>">Fabric </a>
                </li>

                <li><a href="<?php echo base_url('shop?cat=18') ?>">Accessories
                    <i class="ion-chevron-down"></i></a>
                  <ul class="kenne-dropdown">
                    <li><a href="<?php echo base_url('shop?cat=33') ?>">Men's</a></li>
                    <li><a href="<?php echo base_url('shop?cat=34') ?>">Woman's</a></li>

                  </ul>

                </li>
              </ul>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="header-sticky">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <div class="sticky-header_nav position-relative">
            <div class="row align-items-center justify-content-between">
              <div class="col-lg-2 col-sm-6">
                <div class="header-logo_area">
                  <a href="<?php echo base_url();?>">
                    <img src="<?php echo base_url(ASSETS) ?>/images/menu/logo/1.png" alt="Header Logo">
                  </a>
                </div>
              </div>
              <div class="col-lg-8 d-none d-lg-block position-static">
                <div class="main-menu_area">
                  <nav class="main-nav d-flex justify-content-center">
                    <ul>
                      <!-- <li><a href="<?php //echo base_url('shop?cat=') ?>">New Arrival</a></li> -->
                      <li><a href="<?php echo base_url('shop?cat=12') ?>">Saree <i class="ion-chevron-down"></i></a>
                        <ul class="kenne-dropdown">
                          <li><a href="<?php echo base_url('shop?cat=19') ?>">Tussar</a></li>
                          <li><a href="<?php echo base_url('shop?cat=20') ?>">Chanderi</a></li>
                          <li><a href="<?php echo base_url('shop?cat=21') ?>">Crape</a></li>
                          <li><a href="<?php echo base_url('shop?cat=22') ?>">Chiffon</a></li>
                          <li><a href="<?php echo base_url('shop?cat=23') ?>">Georget</a></li>
                          <li><a href="<?php echo base_url('shop?cat=24') ?>">Linen</a></li>
                          <li><a href="<?php echo base_url('shop?cat=25') ?>">Silk</a></li>
                          <li><a href="<?php echo base_url('shop?cat=26') ?>">Orgenza</a></li>
                        </ul>
                      </li>
                      <li><a href="<?php echo base_url('shop?cat=16') ?>">Suits
                          <i class="ion-chevron-down"></i></a>
                        <ul class="kenne-dropdown">
                          <li><a href="<?php echo base_url('shop?cat=26') ?>">Tussar</a></li>
                          <li><a href="<?php echo base_url('shop?cat=27') ?>">Chanderi</a></li>
                          <li><a href="<?php echo base_url('shop?cat=28') ?>">Fancy banglore item</a></li>
                        </ul>

                      </li>
                      <li><a href="<?php echo base_url('shop?cat=13') ?>">Dupatta</a></li>
                      <li><a href="<?php echo base_url('shop?cat=15') ?>">Ready To Wear
                          <i class="ion-chevron-down"></i></a>
                        <ul class="kenne-dropdown">
                          <li><a href="<?php echo base_url('shop?cat=29') ?>">Chanderi</a></li>
                          <li><a href="<?php echo base_url('shop?cat=30') ?>">Tussar</a></li>

                        </ul>

                      </li>


                      <li><a href="<?php echo base_url('shop?cat=17') ?>">Men's <i class="ion-chevron-down"></i></a>
                        <ul class="kenne-dropdown">
                          <li><a href="<?php echo base_url('shop?cat=31') ?>">Kurta</a></li>
                          <li><a href="<?php echo base_url('shop?cat=32') ?>">Jacket</a></li>
                        </ul>
                      </li>

                      <li><a href="<?php echo base_url('shop?cat=14') ?>">Fabric </a>
                      </li>

                      <li><a href="<?php echo base_url('shop?cat=18') ?>">Accessories
                          <i class="ion-chevron-down"></i></a>
                        <ul class="kenne-dropdown">
                          <li><a href="<?php echo base_url('shop?cat=33') ?>">Men's</a></li>
                          <li><a href="<?php echo base_url('shop?cat=34') ?>">Woman's</a></li>

                        </ul>

                      </li>
                    </ul>
                  </nav>
                </div>
              </div>
              <div class="col-lg-2 col-sm-6">
                <div class="header-right_area header-right_area-2">
                  <ul>
                    <li class="mobile-menu_wrap d-lg-none">
                      <a href="#mobileMenu" class="mobile-menu_btn toolbar-btn color--white">
                        <i class="ion-android-menu"></i>
                      </a>
                    </li>
                    <li>
                      <a href="#offcanvasMenu" class="menu-btn toolbar-btn color--white  d-lg-block">

                        <i class="ion-android-person"></i>

                      </a>
                    </li>

                    <li class="minicart-wrap">
                      <a href="#miniCart" class="minicart-btn toolbar-btn">
                        <div class="minicart-count_area">
                          <span class="item-count card-item-count"></span>
                          <i class="ion-bag"></i>
                        </div>
                      </a>
                    </li>


                  </ul>
                  <div class="currency-switcher">
                    <div class="form-currency">
                      <select onchange="setLocation(this.value)" id="myselect">
                        <option>
                          INR

                        </option>
                        <option>
                          USD

                        </option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="offcanvas-minicart_wrapper" id="miniCart"></div>
  <div class="mobile-menu_wrapper" id="mobileMenu">
    <div class="offcanvas-menu-inner">
      <div class="container">
        <a href="#" class="btn-close white-close_btn"><i class="ion-android-close"></i></a>
        <div class="offcanvas-inner_logo">
          <a href="<?php echo base_url();?>">
            <img src="<?php echo base_url(ASSETS) ?>/images/menu/logo/1.png" alt="Header Logo">
          </a>
        </div>
        <nav class="offcanvas-navigation">
          <ul class="mobile-menu">
            <li>
              <a href="#">
                <span class="mm-text">NEW ARRIVAL</span>
              </a>
            </li>
            <li class="menu-item-has-children active"><a href="#"><span class="mm-text">SAREE</span></a>
              <ul class="sub-menu">
                <li><a href="#">Tussar</a></li>
                <li><a href="#">Chanderi</a></li>
                <li><a href="#">Crape</a></li>
                <li><a href="#">Chiffon</a></li>
                <li><a href="#">Georget</a></li>
                <li><a href="#">Linen</a></li>
                <li><a href="#">Silk</a></li>
                <li><a href="#">Orgenza</a></li>
              </ul>
            </li>

            <li class="menu-item-has-children">
              <a href="#">
                <span class="mm-text">SUITS</span>
              </a>
              <ul class="sub-menu">


                <li><a href="#">Tussar</a></li>
                <li><a href="#">Chanderi</a></li>
                <li><a href="#">Fancy banglore item</a></li>

              </ul>
            </li>
            <li class="">
              <a href="#">
                <span class="mm-text"> DUPATTA</span>
              </a>
            </li>

            <li class="menu-item-has-children">
              <a href="#">
                <span class="mm-text">READY TO WEAR</span>
              </a>
              <ul class="sub-menu">
                <li><a href="#">Chanderi</a></li>
                <li><a href="#">Tussar</a></li>

              </ul>
            </li>

            <li class="menu-item-has-children">
              <a href="#">
                <span class="mm-text">MES'S</span>
              </a>
              <ul class="sub-menu">
                <li><a href="#">Kurta</a></li>
                <li><a href="#">Jacket</a></li>

              </ul>
            </li>

            <li>
              <a href="#">
                <span class="mm-text">FABRIC</span>
              </a>

            </li>

            <li class="menu-item-has-children">
              <a href="#">
                <span class="mm-text">ACCESSORIES</span>
              </a>
              <ul class="sub-menu">
                <li><a href="#">Men's</a></li>
                <li><a href="#">Woman's</a></li>

              </ul>
            </li>
          </ul>
        </nav>
        <nav class="offcanvas-navigation user-setting_area">
          <ul class="mobile-menu">
            <li class="menu-item-has-children active">
              <a href="#">
                <span class="mm-text">User
                  Setting
                </span>
              </a>
              <ul class="sub-menu">
                <li>
                  <a href="my-account.html">
                    <span class="mm-text">My Account</span>
                  </a>
                </li>

              </ul>
            </li>


          </ul>
        </nav>
      </div>
    </div>
  </div>
  <div class="global-overlay"></div>
</header>
<!-- Main Header Area End Here Two -->
<!-- Main Header Area End Here -->

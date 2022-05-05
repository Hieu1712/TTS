<template>
  <div>
    <header>
      <div class="header-area">
        <div class="main-header header-sticky">
          <div class="container-fluid">
            <div class="menu-wrapper">
              <!-- Logo -->
              <div class="logo">
                <a href="/index"
                  ><img src="/time-zone/assets/img/logo/logo.png" alt=""
                /></a>
              </div>
              <!-- Main-menu -->
              <div class="main-menu d-none d-lg-block">
                <nav>
                  <ul id="navigation">
                    <li><a href="/index">Home</a></li>
                    <li><a href="/shop">shop</a></li>
                    <li><a href="/about">about</a></li>
                    <li class="hot">
                      <a href="#">Latest</a>
                      <ul class="submenu">
                        <li><a href="/shop">Product list</a></li>
                        <!-- <li><a href="/product-details"> Product Details</a></li> -->
                      </ul>
                    </li>
                    <li>
                      <a href="#">Blog</a>
                      <ul class="submenu">
                        <li><a href="#">Blog</a></li>
                        <!-- <li><a href="/blog-details">Blog Details</a></li> -->
                      </ul>
                    </li>
                    <li>
                      <a href="#">Pages</a>
                      <ul class="submenu">
                        <!-- <li><a href="/login-shop">Login</a></li> -->
                        <li><a href="/cart">Cart</a></li>
                        <!-- <li><a href="/elements">Element</a></li>
                                            <li><a href="/confirmation">Confirmation</a></li> -->
                        <li><a href="/checkout">Product Checkout</a></li>
                      </ul>
                    </li>
                    <li><a href="/contact">Contact</a></li>
                  </ul>
                </nav>
              </div>
              <!-- Header Right -->
              <div class="header-right">
                <ul>
                  <li>
                    <div class="nav-search search-switch">
                      <span class="flaticon-search"></span>
                    </div>
                  </li>
                  <li>
                    <a href="/login"><span class="flaticon-user"></span></a>
                  </li>
                  <li>
                    <a href="/cart"
                      ><i style="color: black" class="fas fa-shopping-cart"
                        >[<span
                          style="padding: 0px 0px"
                          class="cart-quantity"
                          >{{ showCartQuantity }}</span
                        >]</i
                      ></a
                    >
                  </li>
                </ul>
              </div>
            </div>
            <!-- Mobile Menu -->
            <div class="col-12">
              <div class="mobile_menu d-block d-lg-none"></div>
            </div>
          </div>
        </div>
      </div>
    </header>
  </div>
</template>

<script>
export default {

};
</script>

<style>
</style>
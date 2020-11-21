
<!-- Begin Kenne's Content Wrapper Area -->
<div class="kenne-content_wrapper">
  <div class="container">
    <div class="row">
      <div class="col-lg-3 order-2 order-lg-1" id="load-side-filter">

      </div>
      <div class="col-lg-9 order-1 order-lg-2">
        <div class="shop-toolbar">
          <div class="product-view-mode">
            <a class="active grid-3" data-target="gridview-3" data-toggle="tooltip" data-placement="top" title="Grid View"><i class="fa fa-th"></i></a>
           
          </div>
          <div class="product-page_count">
            <p>Showing  <?php if(!isset($listCount)==0) echo $listCount;  ?> results</p>
          </div>
          <div class="product-item-selection_area">
            <div class="product-short">
              <label class="select-label">Short By:</label>
              <select class="nice-select myniceselect">
                <option value="asc">Recommended</option>
                <option value="asc">Name, A to Z</option>
                <option value="desc">Name, Z to A</option>
                <option value="pasc">Price, low to high</option>
                <option value="pdesc">Price, high to low</option>
              </select>
            </div>
          </div>
        </div>
        <div id="product-list">
          <div class="shop-product-wrap grid gridview-3 row" id="sort-list">
              <?php if(isset($msg)) echo $msg ?>
               </div>
        </div>
        <div id="loader-icon"><img src="<?php echo base_url('assets/images/loaderIcon.gif'); ?>"></div>
      </div>
    </div>
  </div>
</div>
<!-- Kenne's Content Wrapper Area End Here -->

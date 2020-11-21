
    <div class="kenne-sidebar-catagories_area">
        <div class="kenne-sidebar_categories">
        <div class="kenne-categories_title first-child">
            <h5>Filter by price</h5>
        </div>
        <div class="price-filter">
            <div id="slider-range"></div>
            <div class="price-slider-amount">
            <div class="label-input">
                <label>price : </label>
                <input type="text" id="amount" name="price" placeholder="Add Your Price" />
                <input type="hidden" name="price-start" value="">
                <input type="hidden" name="price-end" value="">
            </div>
            </div>
        </div>
        </div>
        <?php if (isset($craft)): ?>
          <div class="kenne-sidebar_categories category-module">
            <div class="kenne-categories_title">
              <h5>Craft</h5>
            </div>
            <div class="sidebar-categories_menu">
              <ul>
                <li><a href="javascript:void(0)">View All</a></li>
                <?php foreach ($craft as $value): ?>
                  <li><label for=""> <input type="checkbox" name="craft" class="craft" value="<?php echo $value['id']; ?>"> <?php echo ucfirst($value['craftname']); ?> </label></li>
                <?php endforeach; ?>
              </ul>
            </div>
          </div>
        <?php endif; ?>
        <?php if (isset($color)): ?>
          <div class="kenne-sidebar_categories">
            <div class="kenne-categories_title">
              <h5>Color</h5>
            </div>
            <ul class="sidebar-checkbox_list">
              <?php foreach ($color as $value): ?>
                <li>
                  <label for=""> <input type="checkbox" name="color" class="color" value="<?php echo $value['color']; ?>"> <?php echo ucfirst($value['color']) ?> (<?php echo $value['colorCount']?>) </label>
                </li>
              <?php endforeach; ?>
            </ul>
          </div>
        <?php endif; ?>

        <?php if (isset($cat)): ?>
          <input type="hidden" name="category" value="<?php echo $cat; ?>">
        <?php endif; ?>
    </div>
<?php get_section('filter/script');?>

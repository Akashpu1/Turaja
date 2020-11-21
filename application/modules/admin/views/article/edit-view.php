
<div class="container-fluid">

  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <div class="row">
        <form action="<?php echo base_url('admin/article/update')?>" method="POST">
          <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <div class="product-status-wrap drp-lst">
              <h4>Edit Article </h4>
              <div class="form-group">
                <label class="login2">Article name</label>
                <input name="name" type="text" class="form-control" placeholder="Article Name" required value="<?php echo $article->title; ?>">
              </div>
              <div class="form-group">
                <label class="login2">Article content</label>
                <textarea name="content" id="summernote1" col="100" rows="20" required><?php echo $article->content; ?></textarea>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <div class="product-status-wrap drp-lst">
              <span id="addfeaturepreview">
                <img src="<?php echo base_url().$image->thumb; ?>" alt="">
                <input type="hidden" name="featureImage" value="<?php echo $image->thumb; ?>">
              </span>
              <button id="removepreview" type="button" class="btn btn-link" style="color:#667add">remove</button>
              <button Class="addfeatureimage" type="button" class="btn btn-link" name="button" style="color:#667add">change feature image</button>
              <div class="form-group">
                <label class="login2">Slug</label>
                <input name="slug" type="text" class="form-control" placeholder="slug" value="<?php echo $article->slug; ?>">
              </div>
              <div class="form-group">
                <label class="login2">Category</label>
                <select class="select2_demo_2 form-control" name='category[]' data-placeholder="Choose a Category..." multiple="multiple">
                  <?php foreach($category as $row){ ?>
                    <?php if(in_array($row['id'], $indexcategory)): ?>
                      <option selected value="<?php echo $row['id'] ?>"> <?php echo $row['name'] ?> </option>
                    <?php else: ?>
                      <option value="<?php echo $row['id'] ?>"> <?php echo $row['name'] ?> </option>
                    <?php endif; ?>
                  <?php } ?>
                </select>
              </div>
              <div class="form-group">
                <label class="login2">Tag</label>
                <select class="select2_demo_2 form-control" name='tag[]' data-placeholder="Choose a Tags..." multiple="multiple">
                  <?php foreach($tag as $row){ ?>
                    <?php if(in_array($row['id'], $indextags)): ?>
                      <option selected value="<?php echo $row['id'] ?>"> <?php echo $row['title'] ?> </option>
                    <?php else: ?>
                      <option value="<?php echo $row['id'] ?>"> <?php echo $row['title'] ?> </option>
                    <?php endif; ?>
                  <?php } ?>
                </select>
              </div>
              <div class="form-group">
                <label class="login2">Create Date:</label>
                <span><?php echo my_date_show_time($article->created_at); ?></span>
              </div>
              <div class="form-group">
                <label class="login2">Status:</label>
                <?php if ($article->is_publish): ?>
                  <span>Publish</span>
                <?php else: ?>
                  <span>Save in Draft</span>
                <?php endif; ?>
              </div>
              <div class="payment-adress">
                <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" />

                <input type="hidden" name="postid" value="<?php echo $article->id; ?>">
                <?php if ($article->is_publish): ?>
                  <button type="submit" name='submit' value="save" class="btn btn-primary pull-left ">Draft</button>&nbsp;&nbsp;&nbsp;
                <?php else: ?>
                  <button type="submit" name='submit' value="publish" class="btn btn-primary pull-left ">Publish</button>&nbsp;&nbsp;&nbsp;
                <?php endif; ?>
                <button type="submit" name="submit" value="update" class="btn btn-primary">Update</button>&nbsp;&nbsp;&nbsp;
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>


<script>
  function publish($id) {
    var val1 = $("form").serialize();
    $.ajax({
      type: "POST",
      url: "insert.php",
      data: val1,
      success: function(result) {
        alert(result);
      }
    });
  }
</script>

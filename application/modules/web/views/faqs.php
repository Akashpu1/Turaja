<div class="breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-content">
            <h2>FAQ</h2>
        </div>
    </div>
</div>
<div class="container">
    <hr>
    <div class="col-md-12">
        <div class="frequently-content">
            <div class="frequently-desc">
                <h3><?php echo $faq_main[0]['heading'] ?></h3>
                <p><?php echo $faq_main[0]['content'] ?></p>
            </div>
        </div>
        <hr>
        <!-- Begin Frequently Accordin -->
        <div class="frequently-accordion">
            <div id="accordion">
                <?php $i = 0;
                foreach ($faqs as $row) { ?>
                    <div class="card <?php if ($i == 0) {
                                            echo "actives";
                                        } ?>">
                        <div class="card-header" id="heading<?php echo $row['id'] ?>">
                            <h5 class="mb-0">
                                <a href="javascript:void(0)" class="collapsed" data-toggle="collapse" data-target="#collapse<?php echo $row['id'] ?>" aria-expanded="false" aria-controls="collapse<?php echo $row['id'] ?>">
                                    <?php echo $row['question'] ?>
                                </a>
                            </h5>
                        </div>
                        <div id="collapse<?php echo $row['id'] ?>" class="collapse" aria-labelledby="heading<?php echo $row['id'] ?>" data-parent="#accordion" style="">
                            <div class="card-body">
                                <?php echo $row['answer'] ?>
                            </div>
                        </div>
                    </div>
                <?php $i++;
                } ?>
            </div>
        </div>
        <!--Frequently Accordin End Here -->
    </div>
</div>
<hr>
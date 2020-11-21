<!-- breadcrumb area start -->
<div class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb-wrap">
                    <nav aria-label="breadcrumb">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i class="fa fa-home"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page">Collection</li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb area end -->

<!-- page main wrapper start -->
<div class="shop-main-wrapper section-padding">
    <div class="container">
        <div class="row">
            <!-- sidebar area start -->
            <div class="section-title text-center">
                <h2 class="title"> <?php echo $collection[0]['title'] ?></h2>
                <p class="sub-title"> <?php echo $collection[0]['sub_title'] ?></p>
            </div>


            <?php echo $content ?>

            <!-- start pagination area -->

            <!-- end pagination area -->


            <!-- shop main wrapper end -->
        </div>
    </div>
</div>

<!-- page main wrapper end -->
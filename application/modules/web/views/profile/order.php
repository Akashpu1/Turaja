<div class="myaccount-orders">
    <h4 class="small-title">ORDER ID #<?php echo $id; ?></h4>
    <?php if (!empty($orders)) : ?>
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <tbody>
                    <tr>
                        <th>#</th>
                        <th>Product Name</th>
                        <th>Picture</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>SubTotal</th>

                    </tr>
                    <?php $i = 1;
                    foreach ($orders as $value) : ?>
                        <tr>
                            <td>#<?php echo $i ?></td>
                            <td><a href="<?php echo base_url('product?pid=') . $value['id'] ?>"><?php echo substr($value['name'], 0, 18); ?></a></td>

                            <td> <img class="primary-img" src="<?php echo base_url('uploads/product/') . $value['profile_pic'] ?>" alt="Kenne's Product Image" width="100px"></td>

                            <td>₹ <?php echo $value['price']; ?></td>
                            <td>
                                <?php echo $value['quantity']; ?>
                            </td>
                            <td>
                                <?php echo $value['sub_total']; ?>
                            </td>
                        </tr>
                    <?php $i++;
                endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php endif; ?>
</div>
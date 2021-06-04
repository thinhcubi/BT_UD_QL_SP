<div class="col-12 col-md-12 mt-2">
    <div class="card">
        <div class="card-header">
            Danh sách sản phẩm
        </div>
        <div class="card-body">
            <div class="col-12">
                <a class="btn btn-success mb-2" href="./index.php?page=add">Thêm mới</a>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên</th>
                        <th>Gía</th>
                        <th>Mô tả</th>
                        <th>Nhà sản xuất</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($products as $key => $product): ?>
                    <tr>
                        <td><?php echo ++$key ?></td>
                        <td><?php echo $product->name ?></td>
                        <td><?php echo $product->price ?></td>
                        <td><?php echo $product->description ?></td>
                        <td><?php echo $product->producer ?></td>
                       <td><a href="./index.php?page=delete&id=<?php echo $product->id; ?>"
                              class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</a>
                       <a href="./index.php?page=edit&id=<?php echo $product->id ; ?>"
                          class="btn btn-danger btn-sm" >Edit</a>
                       </td>

                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>



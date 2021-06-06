<div class="col-12 col-md-12 mt-2">
    <div class="card">
        <div class="card-header">
            Danh sách sản phẩm
        </div>
        <div class="card-body">
            <div class="col-12">
                <nav class="navbar navbar-light bg-light">
                    <div class="container-fluid">
                        <form class="d-flex" method="post">
                            <input class="form-control me-2" name="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success" type="submit">Search</button>
                        </form>
                    </div>
                </nav>
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
                    <?php foreach ($pro as $key    => $product): ?>
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
                            <a href="./index.php>page=description&id=<?php echo $product->id; ?>"
                               class="btn btn-danger btn-sm" >Chi tiet</a>
                        </td>

                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
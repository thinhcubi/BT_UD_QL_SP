<div class="col-12 col-md-12 mt-2">
    <div class="card">
        <div class="card-header">
            Cập nhật thông tin khách hàng
        </div>
        <div class="card-body">
            <div class="col-12">
                <form method="post">
                    <?php foreach ($product as $item) : ?>
                    <div class="mb-3">
                        <label class="form-label">Tên</label>
                        <input type="text" value="<?php echo $item->name; ?>" name="name" class="form-control">
                        <?php if (isset($errors['name'])): ?>
                            <p class="text-danger"><?php echo $errors['name'] ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Gia</label>
                        <input type="number" value="<?php echo $item->price; ?>" class="form-control" name="price">
                        <?php if (isset($errors['price'])): ?>
                            <p class="text-danger"><?php echo $errors['price'] ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Mo ta</label>
                        <input type="text" value="<?php echo $item->description; ?>" class="form-control" name="description">
                        <?php if (isset($errors['description'])): ?>
                            <p class="text-danger"><?php echo $errors['description'] ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nha san xuat</label>
                        <input type="text" value="<?php echo $item->producer; ?>" class="form-control" name="producer">
                        <?php if (isset($errors['producer'])): ?>
                            <p class="text-danger"><?php echo $errors['producer'] ?></p>
                        <?php endif; ?>
                    </div>
                     <?php endforeach; ?>
                    <button type="submit" class="btn btn-primary">Lưu</button>
                    <a type="button" href="index.php" class="btn btn-secondary">Quay lại</a>
                </form>
            </div>
        </div>
    </div>
</div>






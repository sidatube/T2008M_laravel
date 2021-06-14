@extends("layout");
@section("main")
    <div class="content-wrapper">
        <div class="container">
            <h1>Danh sách sản phẩm</h1>
            <a href="addoredit">
                <button type="button" class=" btn btn-primary">Thêm mới</button>
            </a>

            <a href="?route=mycart">
                <button type="button" class=" btn btn-warning me-5">Giỏ hàng</button>
            </a>

            <table class="table table-striped">
                <thead>
                <th>id</th>
                <th>Tên</th>
                <th colspan="2">Mô tả</th>
                <th>Giá</th>
                <th>Nhà cung cấp</th>
                <th colspan="3">Tool</th>
                </thead>
                <tbody>
                <?php foreach ($dssp as $sp): ?>
                <tr>
                    <td><?php echo $sp["id"]  ?></td>
                    <td><?php echo $sp["name"] ?></td>
                    <td colspan="2"><?php echo $sp["mota"] ?></td>
                    <td><?php echo $sp["gia"]." VND" ?></td>
                    <td><?php echo $sp["ncc"] ?></td>
                    <td>
                        <form action="?route=addpro" method="post">
                            <input type="hidden" name="id" value="<?php echo $sp["id"]  ?>">
                            <button type="submit" class="btn btn-primary">Sửa</button>
                        </form>
                    </td>
                    <td>
                        <form action="?route=delete" method="post">
                            <input type="hidden" name="id" value="<?php echo $sp["id"]  ?>">
                            <button type="submit" class="btn btn-success">Xóa</button>
                        </form>
                    </td>
                    <td>
                        <form action="?route=addtocart" method="post">
                            <input type="hidden" name="id" value="<?php echo $sp["id"]  ?>">
                            <button type="submit" class="btn btn-warning">Cart+</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
                </tbody>
            </table>


        </div>
    </div>
@endsection

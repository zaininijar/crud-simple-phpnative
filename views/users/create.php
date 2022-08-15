<div class="border px-3 pt-3 mb-3">
    <p class="fs-4">Form Order</p>
</div>
<div class="card">
  <div class="card-body">
    <form action="<?= $APP_URL . 'orders/store' ?>" method="post">
        <div>
            <label for="nama_makanan">Nama Makanan : </label>
            <div class="input-group mb-3">
              <input type="text" name="nama_makanan" id="nama_makanan" class="form-control" placeholder="Type name your food">
            </div>
        </div>
        <div>
            <label for="harga">Harga : </label>
            <div class="input-group mb-3">
              <input type="number" name="harga" id="harga" class="form-control" placeholder="Input price">
            </div>
        </div>
        <div>
            <label for="quantity">Quantity : </label>
            <div class="input-group mb-3">
              <input type="number" name="quantity" id="quantity" class="form-control" placeholder="Input quantity">
            </div>
        </div>
        <button type="submit" name="submit_order" class="btn btn-primary">Order Now</button>
    </form>
  </div>
</div>

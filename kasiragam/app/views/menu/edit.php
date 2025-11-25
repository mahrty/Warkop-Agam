<!-- views/menu/edit.php -->

<style>
  body {
    margin: 0;
    padding: 0;
    background: linear-gradient(135deg, #C9DDE1, #AFCFD4);
    font-family: "Poppins", sans-serif;
  }

  .card {
    background: rgba(255, 255, 255, 0.78);
    backdrop-filter: blur(8px);
    border-radius: 20px;
    padding: 35px 40px;
    max-width: 650px;
    margin: 40px auto;
    box-shadow: 0 10px 30px rgba(0,0,0,0.12);
  }

  h3 {
    font-size: 26px;
    margin-bottom: 20px;
    color: #2f3e46;
    font-weight: 700;
    text-align: left;
  }

  label {
    font-size: 15px;
    font-weight: 600;
    color: #2f3e46;
  }

  input, select, textarea {
    width: 100%;
    padding: 12px 15px;
    margin-top: 6px;
    margin-bottom: 18px;
    border-radius: 12px;
    border: 1px solid #567;
    background: #f5f8f9;
    font-size: 15px;
    outline: none;
    transition: 0.25s ease;
    font-family: "Poppins", sans-serif;
  }

  input:focus, select:focus, textarea:focus {
    border-color: #3E5E68;
  }

  img {
    margin-top: 8px;
    border-radius: 10px;
  }

  .btn {
    background: #3E5E68;
    color: #fff;
    padding: 12px 22px;
    border: none;
    border-radius: 14px;
    cursor: pointer;
    font-size: 16px;
    font-weight: 600;
    transition: 0.25s ease;
  }

  .btn:hover {
    background: #2b434a;
    transform: translateY(-2px);
  }
</style>


<div class="card">
  <h3>Edit Menu</h3>

  <form method="post" enctype="multipart/form-data" action="?page=menu&action=edit&id=<?= $menu['id_menu'] ?>">

    <label>Nama Menu</label>
    <input type="text" name="nama_menu" value="<?= htmlspecialchars($menu['nama_menu']) ?>" required>

    <label>Kategori</label>
    <select name="kategori">
      <option value="Makanan" <?= $menu['kategori']=='Makanan'?'selected':'' ?>>Makanan</option>
      <option value="Minuman" <?= $menu['kategori']=='Minuman'?'selected':'' ?>>Minuman</option>
    </select>

    <label>Harga</label>
    <input type="number" name="harga" value="<?= $menu['harga'] ?>" required>

    <label>Stok</label>
    <input type="number" name="stok" value="<?= $menu['stok'] ?>" required>

    <label>Status</label>
    <select name="status">
      <option value="Tersedia" <?= $menu['status']=='Tersedia'?'selected':'' ?>>Tersedia</option>
      <option value="Tidak Tersedia" <?= $menu['status']=='Tidak Tersedia'?'selected':'' ?>>Tidak Tersedia</option>
    </select>

    <label>Deskripsi</label>
    <textarea name="deskripsi" rows="2"><?= htmlspecialchars($menu['deskripsi']) ?></textarea>

    <label>Gambar Saat Ini</label>
    <?php if ($menu['gambar']): ?>
      <img src="/uploads/<?= $menu['gambar'] ?>" width="90"><br><br>
    <?php endif; ?>

    <label>Upload Gambar Baru</label>
    <input type="file" name="gambar">

    <button class="btn" type="submit">Update</button>
  </form>
</div>

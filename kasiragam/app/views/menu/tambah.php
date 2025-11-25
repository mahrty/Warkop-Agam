<style>
  body {
    margin: 0;
    padding: 0;
    background: linear-gradient(135deg, #C9DDE1, #AFCFD4);
    font-family: "Poppins", sans-serif;
    padding-top: 100px;
  }

  .card {
    background: rgba(255, 255, 255, 0.78);
    backdrop-filter: blur(8px);
    border-radius: 20px;
    padding: 35px 40px;
    max-width: 650px;
    margin: 30px auto;
    box-shadow: 0 10px 30px rgba(0,0,0,0.12);
  }

  h3 {
    text-align: center;
    font-size: 28px;
    font-weight: 700;
    color: #2f3e46;
    margin-bottom: 20px;
  }

  label {
    font-weight: 600;
    font-size: 15px;
    color: #2f3e46;
    display: block;
    margin-top: 12px;
    margin-bottom: 5px;
  }

  input[type="text"],
  input[type="number"],
  select,
  textarea {
    width: 100%;
    padding: 12px;
    border-radius: 12px;
    border: 1px solid #aac1c4;
    font-size: 15px;
    background: rgba(255,255,255,0.8);
    outline: none;
    transition: 0.2s;
  }

  input:focus,
  select:focus,
  textarea:focus {
    border-color: #3E5E68;
    box-shadow: 0 0 0 2px rgba(62,94,104,0.25);
  }

  textarea {
    resize: none;
  }

  .btn {
    margin-top: 18px;
    width: 100%;
    background: #3E5E68;
    color: #fff;
    padding: 12px;
    border: none;
    border-radius: 14px;
    font-size: 17px;
    font-weight: 600;
    cursor: pointer;
    transition: 0.25s ease;
  }

  .btn:hover {
    background: #2c464e;
    transform: translateY(-2px);
  }
</style>

<div class="card">
  <h3>Tambah Menu Baru</h3>

  <form method="post" enctype="multipart/form-data" action="?page=menu&action=tambah">

    <label>Nama Menu</label>
    <input type="text" name="nama_menu" required>

    <label>Kategori</label>
    <select name="kategori" required>
      <option value="Makanan">Makanan</option>
      <option value="Minuman">Minuman</option>
    </select>

    <label>Harga</label>
    <input type="number" name="harga" required>

    <label>Stok</label>
    <input type="number" name="stok" required>

    <label>Status</label>
    <select name="status" required>
      <option value="Tersedia">Tersedia</option>
      <option value="Tidak Tersedia">Tidak Tersedia</option>
    </select>

    <label>Deskripsi</label>
    <textarea name="deskripsi" rows="2"></textarea>

    <label>Upload Gambar</label>
    <input type="file" name="gambar" accept=".jpg,.jpeg,.png,.gif">

    <button class="btn" type="submit">Simpan</button>
  </form>
</div>

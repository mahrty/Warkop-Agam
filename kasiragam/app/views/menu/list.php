<style>
  body {
    margin: 0;
    padding: 0;
    font-family: "Poppins", sans-serif;
    background: linear-gradient(135deg, #C9DDE1, #AFCFD4);
    padding-top: 100px; /* supaya tidak ketutup navbar */
  }

  .navbar {
    position: fixed;
    top: 0;
    width: 100%;
    padding: 14px 0;
    backdrop-filter: blur(10px);
    background: rgba(255, 255, 255, 0.28);
    box-shadow: 0 4px 12px rgba(0,0,0,0.15);
    z-index: 100;
    text-align: center;
  }

  .navbar a {
    color: #2f3e46;
    font-weight: 600;
    text-decoration: none;
    margin: 0 22px;
    font-size: 17px;
    transition: 0.25s ease;
  }

  .navbar a:hover {
    color: #496A74;
    transform: translateY(-1px);
  }

  .card {
    background: rgba(255,255,255,0.78);
    backdrop-filter: blur(8px);
    border-radius: 20px;
    padding: 30px 35px;
    max-width: 1100px;
    margin: auto;
    box-shadow: 0 10px 30px rgba(0,0,0,0.12);
  }

  .btn {
    background: #3E5E68;
    padding: 10px 18px;
    color: white;
    border-radius: 12px;
    text-decoration: none;
    font-weight: 600;
    transition: .25s;
  }

  .btn:hover {
    background: #2c464e;
  }

  table {
    background: rgba(255,255,255,0.85);
    backdrop-filter: blur(5px);
    border-radius: 12px;
    overflow: hidden;
  }

  table tr td {
    background: rgba(255,255,255,0.4);
  }

</style>

<div class="navbar">
  <a href="?page=home">Home</a>
  <a href="?page=menu">Menu</a>
  <a href="?page=pesanan&action=input">Input Pesanan</a>
  <a href="?page=pesanan">Daftar Pesanan</a>
  <a href="?page=pembayaran">Pembayaran</a>
  <a href="?page=laporan">Laporan</a>
  <a style="color:#b33131;" href="?page=login&action=logout">Logout</a>
</div>

<div class="card">
  <a href="?page=menu&action=tambah" class="btn">+ Tambah Menu</a>
  <br><br>

  <table border="1" cellpadding="10" cellspacing="0" width="100%">
    <tr style="background-color:#89A6A8;color:white;">
      <th>ID</th>
      <th>Nama Menu</th>
      <th>Kategori</th>
      <th>Harga</th>
      <th>Stok</th>
      <th>Status</th>
      <th>Deskripsi</th>
      <th>Gambar</th>
      <th>Aksi</th>
    </tr>

    <?php while ($row = $data->fetch_assoc()): ?>
      <tr>
        <td><?= $row['id_menu'] ?></td>
        <td><?= $row['nama_menu'] ?></td>
        <td><?= $row['kategori'] ?></td>
        <td>Rp <?= number_format($row['harga'], 0, ',', '.') ?></td>
        <td><?= $row['stok'] ?></td>
        <td><?= $row['status'] ?></td>
        <td><?= $row['deskripsi'] ?></td>
        <td>
          <?php if ($row['gambar']): ?>
            <img src="uploads/<?= $row['gambar'] ?>" width="70">
          <?php else: ?>
            -
          <?php endif; ?>
        </td>
        <td>
          <a href="?page=menu&action=edit&id=<?= $row['id_menu'] ?>">Edit</a> |
          <a href="?page=menu&action=hapus&id=<?= $row['id_menu'] ?>" onclick="return confirm('Yakin?')">Hapus</a>
        </td>
      </tr>
    <?php endwhile; ?>
  </table>
</div>

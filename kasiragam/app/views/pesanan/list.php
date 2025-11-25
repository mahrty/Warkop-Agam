<!-- NAVBAR GLASS AESTHETIC --> 
<style>
  body {
    margin: 0;
    padding: 90px 20px 20px;
    font-family: "Poppins", sans-serif;

    background: linear-gradient(135deg, #C9DDE1, #AFCFD4);
    min-height: 100vh;
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
    font-family: 'Poppins', sans-serif;
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

  h2 {
    color: #2f3e46;
    font-weight: 700;
    margin-bottom: 10px;
  }

  table {
    background: rgba(255,255,255,0.65);
    backdrop-filter: blur(6px);
    border-radius: 10px;
    overflow: hidden;
  }

  table tr:nth-child(even) {
    background: rgba(255,255,255,0.35);
  }

  table th {
    background:#89A6A8;
    color:white;
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

<h2>Daftar Pesanan</h2>

<a href="?page=pesanan&action=input" 
   style="padding:8px 12px;background:#4a6f73;color:white;border-radius:5px;text-decoration:none;">
   + Tambah Pesanan
</a>

<br><br>

<table border="1" cellpadding="8" cellspacing="0" width="100%">
    <tr>
        <th>ID</th>
        <th>Tanggal</th>
        <th>Pelanggan</th>
        <th>Total</th>
        <th>Status</th>
        <th>Aksi</th>
    </tr>

    <?php while ($row = $data->fetch_assoc()) { ?>
        <tr>
            <td><?= $row['id_pesanan'] ?></td>
            <td><?= $row['tanggal_pesanan'] ?></td>
            <td><?= $row['nama_pelanggan'] ?></td>
            <td>Rp <?= number_format($row['total_harga'],0,',','.') ?></td>
            <td><?= $row['status_pesanan'] ?></td>
            <td>
                <a href="?page=pesanan&action=detail&id=<?= $row['id_pesanan'] ?>">Detail</a> |
                <a href="?page=pesanan&action=hapus&id=<?= $row['id_pesanan'] ?>"
                   onclick="return confirm('Hapus pesanan ini?')" style="color:red;">
                   Hapus
                </a>
            </td>
        </tr>
    <?php } ?>
</table>

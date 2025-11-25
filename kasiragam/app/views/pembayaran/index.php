<!-- NAVBAR GLASS AESTHETIC -->
<style>
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

  /* BACKGROUND + BASE STYLE */
  body, html {
    margin: 0;
    padding-top: 90px;
    font-family: "Poppins", sans-serif;
    background: linear-gradient(135deg, #C9DDE1, #AFCFD4);
    min-height: 100vh;
  }

  /* CARD */
  .card {
    background: rgba(255,255,255,0.78);
    backdrop-filter: blur(8px);
    padding: 25px;
    border-radius: 18px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.12);
    margin: 30px auto;
    width: 95%;
    max-width: 950px;
  }

  /* TABLE */
  table {
    width: 100%;
    border-collapse: collapse;
    overflow: hidden;
    border-radius: 12px;
  }

  th {
    background:#89A6A8;
    color:white;
    padding:12px;
    font-weight:600;
  }

  td {
    padding:10px;
    background: rgba(255,255,255,0.85);
    border-bottom:1px solid #d6e2e3;
  }

  tr:hover td {
    background: rgba(200,220,222,0.4);
  }

  /* TITLE */
  h2 {
    text-align:center;
    color:#3E5E68;
    font-size:28px;
    margin-top:5px;
  }
</style>

<!-- NAVBAR -->
<div class="navbar">
  <a href="?page=home">Home</a>
  <a href="?page=menu">Menu</a>
  <a href="?page=pesanan&action=input">Input Pesanan</a>
  <a href="?page=pesanan">Daftar Pesanan</a>
  <a href="?page=pembayaran">Pembayaran</a>
  <a href="?page=laporan">Laporan</a>
  <a style="color:#b33131;" href="?page=login&action=logout">Logout</a>
</div>


<h2>Daftar Pembayaran</h2>

<div class="card">
  <table cellpadding="10" cellspacing="0">
    <tr>
      <th>ID Pesanan</th>
      <th>Tanggal</th>
      <th>Nama Pelanggan</th>
      <th>Total Harga</th>
      <th>Status</th>
      <th>Aksi</th>
    </tr>

    <?php while ($row = $data->fetch_assoc()): ?>
      <tr>
        <td><?= $row['id_pesanan'] ?></td>
        <td><?= $row['tanggal_pesanan'] ?></td>
        <td><?= $row['nama_pelanggan'] ?></td>
        <td>Rp <?= number_format($row['total_harga'],0,',','.') ?></td>
        <td><?= $row['status_pesanan'] ?></td>
        <td>
          <a href="?page=pembayaran&action=form&id=<?= $row['id_pesanan'] ?>"
             style="background:#4CAF50;color:white;padding:5px 12px;border-radius:6px;text-decoration:none;">
             Bayar
          </a>
        </td>
      </tr>
    <?php endwhile; ?>

  </table>
</div>

<!-- BACKGROUND GRADIENT -->
<style>
  body {
    margin: 0;
    padding: 90px 20px 20px;
    font-family: "Poppins", sans-serif;
    background: linear-gradient(135deg, #C9DDE1, #AFCFD4);
    min-height: 100vh;
  }

  .detail-box {
      background: rgba(255,255,255,0.78);
      backdrop-filter: blur(7px);
      padding: 25px;
      border-radius: 18px;
      box-shadow: 0 8px 20px rgba(0,0,0,0.12);
      margin-top: 20px;
  }

  table {
      width: 100%;
      border-collapse: collapse;
      background: rgba(255,255,255,0.75);
      backdrop-filter: blur(6px);
      border-radius: 12px;
      overflow: hidden;
  }

  th {
      background: #89A6A8;
      color: white;
      padding: 10px;
  }

  td {
      padding: 10px;
      border-bottom: 1px solid #d6e2e3;
      color: #2f3e46;
  }

  tr:nth-child(even) {
      background: rgba(255,255,255,0.45);
  }

  tr:hover td {
      background: rgba(200,220,222,0.4);
  }

  h2, h3 {
      color: #2f3e46;
  }

  .btn-back {
      display: inline-block;
      padding: 10px 16px;
      background: #3E5E68;
      color: white;
      border-radius: 10px;
      text-decoration: none;
      margin-top: 20px;
      font-weight: 600;
      transition: .2s;
  }

  .btn-back:hover {
      background: #2c454e;
      transform: translateY(-2px);
  }
</style>

<?php 
$p = Pesanan::find($_GET['id']);
$d = Pesanan::detail($_GET['id']);
?>

<div class="detail-box">

<h2>Detail Pesanan #<?= $p['id_pesanan'] ?></h2>

<p><strong>Tanggal:</strong> <?= $p['tanggal_pesanan'] ?></p>
<p><strong>Pelanggan:</strong> <?= htmlspecialchars($p['nama_pelanggan']) ?></p>
<p><strong>Status:</strong> <?= $p['status_pesanan'] ?></p>

<table cellpadding="8" cellspacing="0">
    <tr>
        <th>Menu</th>
        <th>Harga</th>
        <th>Jumlah</th>
        <th>Subtotal</th>
    </tr>

    <?php while ($row = $d->fetch_assoc()) { ?>
        <tr>
            <td><?= $row['nama_menu'] ?></td>
            <td>Rp <?= number_format($row['harga'], 0, ',', '.') ?></td>
            <td><?= $row['jumlah'] ?></td>
            <td>Rp <?= number_format($row['subtotal'], 0, ',', '.') ?></td>
        </tr>
    <?php } ?>
</table>

<h3 style="margin-top:15px;">Total: Rp <?= number_format($p['total_harga'], 0, ',', '.') ?></h3>

<a href="?page=pesanan" class="btn-back">Kembali</a>

</div>

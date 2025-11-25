<!-- app/views/laporan/index.php -->
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

  body {
    padding-top: 90px;
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

<style>
    body {
        background: linear-gradient(135deg, #C9DDE1, #AFCFD4);
        font-family: "Poppins", sans-serif;
        padding-top: 90px;
        margin: 0;
    }

    .container {
        max-width: 1000px;
        margin: 50px auto;
        background: rgba(255,255,255,0.75);
        padding: 25px 30px;
        border-radius: 16px;
        backdrop-filter: blur(8px);
        box-shadow: 0 8px 25px rgba(0,0,0,0.12);
    }

    h2 {
        color: #3E5E68;
        margin-bottom: 20px;
        font-weight: 700;
        text-align: center;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        border-radius: 12px;
        overflow: hidden;
        background: rgba(255,255,255,0.85);
    }

    th {
        background: #89A6A8;
        color: white;
        padding: 10px 15px;
        font-weight: 600;
    }

    td {
        padding: 10px 15px;
        border-bottom: 1px solid #d0d7d8;
        text-align: center;
    }

    tr:nth-child(even) {
        background: rgba(190,218,220,0.55);
    }

    tr:hover td {
        background: rgba(200,220,222,0.4);
    }

    .total-box {
        background: #6e8f95;
        color: #fff;
        text-align: center;
        font-weight: 600;
        padding: 12px;
        border-radius: 10px;
        margin-top: 20px;
        font-size: 18px;
    }

    .alert {
        text-align: center;
        background: rgba(255,255,255,0.6);
        padding: 12px;
        border-radius: 8px;
        font-weight: 500;
    }
</style>

<div class="container">
    <h2>Laporan Penjualan</h2>

    <?php if ($laporan && $laporan->num_rows > 0): ?>
        <table>
            <thead>
                <tr>
                    <th>ID Laporan</th>
                    <th>Tanggal</th>
                    <th>Nama Kasir</th>
                    <th>Total Pendapatan</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $totalKeseluruhan = 0;
                while ($row = $laporan->fetch_assoc()):
                    $totalKeseluruhan += $row['total_pendapatan'];
                ?>
                    <tr>
                        <td><?= $row['id_laporan'] ?></td>
                        <td><?= $row['tanggal_laporan'] ?></td>
                        <td><?= htmlspecialchars($row['nama_kasir']) ?></td>
                        <td>Rp <?= number_format($row['total_pendapatan'], 0, ',', '.') ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>

        <div class="total-box">
            Total Pendapatan Keseluruhan:  
            <br>  
            Rp <?= number_format($totalKeseluruhan, 0, ',', '.') ?>
        </div>

    <?php else: ?>
        <div class="alert">Belum ada laporan penjualan.</div>
    <?php endif; ?>
</div>

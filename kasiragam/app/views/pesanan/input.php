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
  }

  .card {
      background: rgba(255,255,255,0.78);
      backdrop-filter: blur(7px);
      padding: 25px;
      border-radius: 18px;
      box-shadow: 0 8px 20px rgba(0,0,0,0.12);
  }

  table {
      width: 100%;
      border-collapse: collapse;
      background: rgba(255,255,255,0.7);
      border-radius: 10px;
      overflow: hidden;
  }

  th {
      background: #89A6A8;
      color: white;
      padding: 10px;
  }

  td {
      padding: 10px;
      color: #2f3e46;
  }

  tr:nth-child(even) {
      background: rgba(255,255,255,0.45);
  }

  button {
      background-color:#496A74;
      color:white;
      padding:10px 14px;
      border:none;
      border-radius:8px;
      margin-top:10px;
      cursor:pointer;
      font-weight:600;
  }

  button:hover {
      background:#2c464e;
      transform: translateY(-2px);
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

<h2>Input Pesanan</h2>

<form action="?page=pesanan&action=simpan" method="POST">
    <div class="card">

        <label>Nama Pelanggan:</label><br>
        <input type="text" name="nama_pelanggan" required
               style="padding:8px;width:100%;border-radius:8px;border:1px solid #ccc;">
        <br><br>

        <table cellpadding="8" cellspacing="0">
            <tr>
                <th>Pilih</th>
                <th>Nama Menu</th>
                <th>Harga</th>
                <th>Jumlah</th>
            </tr>

            <?php while ($row = $menu->fetch_assoc()) { ?>
                <tr>
                    <td><input type="checkbox" name="menu[]" value="<?= $row['id_menu'] ?>"></td>
                    <td><?= $row['nama_menu'] ?></td>
                    <td>Rp <?= number_format($row['harga'], 0, ',', '.') ?></td>
                    <td><input type="number" name="jumlah_<?= $row['id_menu'] ?>" min="1" value="1"
                               style="padding:5px;width:70px;border-radius:6px;border:1px solid #bbb;"></td>
                </tr>
            <?php } ?>
        </table>

        <br>

        <button type="submit">Simpan Pesanan</button>

    </div>
</form>

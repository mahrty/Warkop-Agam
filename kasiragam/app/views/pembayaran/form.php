<!-- app/views/pembayaran/form.php -->

<style>
  body {
    padding-top: 90px;
    background: linear-gradient(135deg, #C9DDE1, #AFCFD4);
    font-family: "Poppins", sans-serif;
  }

  .card {
    background: rgba(255,255,255,0.75);
    backdrop-filter: blur(10px);
    padding: 25px 28px;
    border-radius: 18px;
    width: 380px;
    margin: auto;
    box-shadow: 0 8px 22px rgba(0,0,0,0.12);
    animation: fadeIn .4s ease;
  }

  h2 {
    color: #3E5E68;
    text-align: center;
    margin-bottom: 18px;
    font-weight: 700;
  }

  p {
    color: #2f3e46;
    font-size: 15px;
    margin-bottom: 8px;
  }

  label {
    font-weight: 600;
    color: #3E5E68;
    font-size: 14px;
  }

  select, input[type="number"] {
    width: 100%;
    padding: 10px;
    border: none;
    margin-top: 6px;
    margin-bottom: 14px;
    border-radius: 10px;
    background: rgba(255,255,255,0.65);
    box-shadow: inset 0 2px 6px rgba(0,0,0,0.1);
    font-size: 15px;
    font-family: inherit;
  }

  button {
    width: 100%;
    padding: 12px;
    border: none;
    border-radius: 12px;
    background: #496A74;
    color: white;
    font-weight: 600;
    font-size: 15px;
    cursor: pointer;
    transition: .25s ease;
  }

  button:hover {
    background: #3b555d;
    transform: translateY(-2px);
  }

  a {
    display: inline-block;
    margin-top: 12px;
    text-decoration: none;
    color: #344f57;
    font-weight: 600;
    transition: .25s;
  }

  a:hover {
    color: #1f343a;
  }

  @keyframes fadeIn {
    from { opacity: 0; transform: translateY(10px); }
    to   { opacity: 1; transform: translateY(0); }
  }
</style>

<div class="card">
    <h2>Pembayaran #<?= $pesanan['id_pesanan'] ?></h2>

    <p><strong>Pelanggan:</strong> <?= $pesanan['nama_pelanggan'] ?></p>
    <p><strong>Total:</strong> Rp <?= number_format($pesanan['total_harga'],0,',','.') ?></p>

    <form action="?page=pembayaran&action=simpan" method="POST">
        <input type="hidden" name="id_pesanan" value="<?= $pesanan['id_pesanan'] ?>">

        <label>Metode Pembayaran</label>
        <select name="metode_pembayaran" required>
            <option value="">-- Pilih --</option>
            <option value="Tunai">Tunai</option>
            <option value="NonTunai">Non Tunai</option>
        </select>

        <label>Jumlah Bayar (Rp)</label>
        <input type="number" name="jumlah_bayar" min="0" required>

        <button type="submit">Bayar Sekarang</button>
    </form>

    <a href="?page=pembayaran">← Kembali</a>
</div>

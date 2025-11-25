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




<!-- HOME CONTENT -->
<style>
  body, html {
    margin: 0;
    padding: 0;
    font-family: "Poppins", sans-serif;
    height: 100vh;
    background: linear-gradient(135deg, #C9DDE1, #AFCFD4);
    display: flex;
    justify-content: center;
    align-items: center;
  }

  .hero {
    width: 100%;
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 20px;
  }

  .hero-content {
    background: rgba(255,255,255,0.78);
    backdrop-filter: blur(8px);
    border-radius: 22px;
    padding: 55px 60px;
    max-width: 720px;
    text-align: center;
    box-shadow: 0 12px 35px rgba(0,0,0,0.12);
    animation: fadeIn 0.7s ease;
  }

  .hero-content h1 {
    font-size: 44px;
    font-weight: 700;
    color: #3E5E68;
    margin-bottom: 8px;
  }

  .hero-content h2 {
    font-size: 22px;
    color: #496A74;
    font-weight: 500;
    margin-bottom: 20px;
  }

  .hero-content p {
    font-size: 17px;
    line-height: 1.7;
    color: #334;
  }

  .btn-start {
    margin-top: 15px;
    background: #3E5E68;
    color: #fff;
    border: none;
    padding: 12px 26px;
    border-radius: 14px;
    cursor: pointer;
    font-size: 17px;
    font-weight: 600;
    transition: 0.25s ease;
  }

  .btn-start:hover {
    background: #2c464e;
    transform: translateY(-2px);
  }
</style>

<div class="hero">
  <div class="hero-content">
    <h1>Selamat Datang, <?= htmlspecialchars($nama) ?></h1>
    <h2>di Warkop Agam</h2>

    <p>
      Tempat di mana kopi, tawa, dan cerita sederhana bertemu.<br>
      Yuk mulai hari ini dengan semangat baru dan pelayanan terbaik.
    </p>

    <button class="btn-start" onclick="window.location.href='?page=pesanan&action=input'">
      Mulai Input Pesanan
    </button>
  </div>
</div>

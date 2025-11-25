<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login Kasir</title>

  <style>
    body {
      margin: 0;
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(135deg, #C9DDE1, #AFCFD4);
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 0 15px;
    }

    .login-container {
      background: #fff;
      border-radius: 22px;
      box-shadow: 0 12px 35px rgba(0,0,0,0.12);
      padding: 45px 50px;
      width: 100%;
      max-width: 390px;
      text-align: center;
      animation: fadeIn 0.6s ease;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(18px); }
      to { opacity: 1; transform: translateY(0); }
    }

    h2 {
      color: #3E5E68;
      font-weight: 600;
      margin-bottom: 28px;
      letter-spacing: 0.5px;
    }

    .form-group {
      margin-bottom: 20px;
      text-align: left;
    }

    label {
      font-weight: 500;
      color: #333;
      font-size: 14px;
    }

    input {
      width: 100%;
      padding: 12px 14px;
      border: 1px solid #C7D7DA;
      border-radius: 12px;
      font-size: 15px;
      margin-top: 6px;
      transition: all 0.25s ease;
      background: #f9fbfb;
    }

    input:hover {
      border-color: #7fa4ad;
    }

    input:focus {
      outline: none;
      border-color: #3E5E68;
      background: #fff;
      box-shadow: 0 0 8px rgba(62,94,104,0.25);
    }

    .btn {
      width: 100%;
      background: #3E5E68;
      color: #fff;
      padding: 13px;
      font-size: 16px;
      font-weight: 600;
      border: none;
      border-radius: 14px;
      cursor: pointer;
      transition: 0.25s ease;
      margin-top: 10px;
    }

    .btn:hover {
      background: #2c464e;
      transform: translateY(-1px);
    }

    .error {
      color: #b12020;
      background: #fdeaea;
      padding: 12px;
      border-radius: 10px;
      margin-bottom: 18px;
      font-size: 14px;
      font-weight: 500;
      border-left: 4px solid #d64545;
    }

    .footer {
      margin-top: 25px;
      font-size: 13px;
      color: #6a6a6a;
      letter-spacing: 0.2px;
    }
  </style>
</head>
<body>

  <div class="login-container">
    <h2>Login Kasir</h2>

    <?php if (!empty($err)): ?>
      <div class="error"><?= htmlspecialchars($err) ?></div>
    <?php endif; ?>

    <form method="POST" action="?page=login">
      <div class="form-group">
        <label>Username</label>
        <input type="text" name="username" required>
      </div>

      <div class="form-group">
        <label>Password</label>
        <input type="password" name="password" required>
      </div>

      <button class="btn" type="submit">Masuk</button>
    </form>

    <div class="footer">
      Hari Baru, Semangat Baru Semangat Bekerja 
    </div>
  </div>

</body>
</html>

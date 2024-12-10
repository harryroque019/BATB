<style>
.login-container {
  background-color: #fff;
  display: flex;
  padding: 0 0 162px;
  flex-direction: column;
  overflow: hidden;
  font-family: Inter, sans-serif;
}

.header-banner {
  background-color: #d6e4ff;
  box-shadow: 0 4px 4px rgba(0, 0, 0, 0.25);
  display: flex;
  width: 100%;
  flex-direction: column;
  align-items: center;
  padding: 27px 70px;
}

.header-content {
  display: flex;
  width: 582px;
  max-width: 100%;
  gap: 40px 45px;
  flex-wrap: wrap;
}

.logo {
  aspect-ratio: 1;
  object-fit: contain;
  object-position: center;
  width: 90px;
}

.site-title {
  font-size: 64px;
  font-weight: 100;
  color: #000;
  align-self: start;
  margin-top: 13px;
  flex-grow: 1;
  width: 429px;
}

.login-form-container {
  border-radius: 63px;
  background-color: #c2ebfa;
  align-self: center;
  display: flex;
  width: 396px;
  max-width: 100%;
  flex-direction: column;
  margin: 129px 0 0 35px;
  padding: 18px 54px 242px;
}

.login-title {
  font-size: 36px;
  font-weight: 500;
  align-self: center;
  margin: 0;
}

.form-group {
  display: flex;
  flex-direction: column;
  margin-top: 20px;
}

.form-input {
  background-color: #d9d9d9;
  height: 29px;
  border: none;
  width: 100%;
  padding: 4px 8px;
}

.forgot-password-link {
  font-size: 15px;
  align-self: center;
  margin-top: 20px;
  color: #000;
  text-decoration: none;
}

.submit-button {
  background-color: #1eff00;
  align-self: flex-end;
  font-size: 15px;
  color: #e32a2a;
  font-weight: 800;
  margin: 38px 0 -48px;
  padding: 7px 34px;
  border: none;
  cursor: pointer;
}

.visually-hidden {
  position: absolute;
  width: 1px;
  height: 1px;
  padding: 0;
  margin: -1px;
  overflow: hidden;
  clip: rect(0, 0, 0, 0);
  border: 0;
}

@media (max-width: 991px) {
  .login-container {
    padding-bottom: 100px;
  }

  .header-banner {
    max-width: 100%;
    padding: 0 20px;
  }

  .site-title {
    font-size: 40px;
    max-width: 100%;
  }

  .login-form-container {
    margin-top: 40px;
    padding: 0 20px 100px;
  }

  .submit-button {
    margin-bottom: 10px;
    white-space: initial;
    padding: 7px 20px;
  }
}
</style>

<main class="login-container">
  <header class="header-banner">
    <div class="header-content">
      <h1 class="site-title">ESTO WEBSITE</h1>
    </div>
  </header>

  <form class="login-form-container" action="#" method="post">
    <h2 class="login-title">LogIn</h2>
    
    <div class="form-group">
      <label for="email" class="visually-hidden">Gmail</label>
      <input type="email" id="email" class="form-input" required aria-label="Gmail" />
    </div>

    <div class="form-group">
      <label for="password" class="visually-hidden">Password</label>
      <input type="password" id="password" class="form-input" required aria-label="Password" />
    </div>

    <a href="#" class="forgot-password-link" tabindex="0">forgot password</a>
    
    <button type="submit" class="submit-button">LOGIN</button>
  </form>
</main>
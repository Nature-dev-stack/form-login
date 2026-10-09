<?php 
if (!isset($_SESSION['id'])) {
  session_start();
  include_once "includes/header.php"  
?>

  <main class="auth-wrap">
    <section class="glass-card auth-card">
      <div class="auth-heading">
        <h1>Login</h1>
        <p>Welcome back, please login to your account</p>
      </div>

      <?php 
        if(isset($_GET['error'])) {
          echo "<div id='registerAlert' class='alert alert-danger'>{$_GET['error']}</div>";
        } else if(isset($_GET['success'])) {
          echo "<div id='registerAlert' class='alert alert-success'>{$_GET['success']}</div>";
        }
      ?>

      <form id="loginForm" method="post" action="includes/login.inc.php" novalidate>
        <div class="input-box">
          <span class="input-icon"><i class="fa-regular fa-user"></i></span>
          <input id="loginEmail" type="email" name= "email" placeholder="Email address" autocomplete="email" required>
        </div>

        <div class="input-box">
          <span class="input-icon"><i class="fa-regular fa-user"></i></span>
          <input id="loginPassword" type="password" name= "password" placeholder="Password" autocomplete="current-password" required>
          <button type="button" class="password-toggle" data-target="loginPassword"><i class="fa-regular fa-eye-slash"></i></button>
        </div>

        <div class="form-options">
          <label class="check-label">
            <input id="rememberMe" type="checkbox">
            <span class="custom-check">✓</span>
            Remember me
          </label>

          <a href="#" id="forgotPassword">Forgot password?</a>
        </div>

        <button class="btn btn-gradient submit-button" type="submit">
          <span class="button-text">Login</span>
        </button>
      </form>

      <p class="switch-text">
        Don't have an account?
        <a href="registration.php">Signup</a>
      </p>

    </section>
  </main>

  <!-- <script src="assets/js/login.js"></script> -->

<?php 
include_once "includes/footer.php"; 
}
?>
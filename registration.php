<?php 

if (!isset($_SESSION['id'])) {
  session_start();
  include_once "includes/header.php" 
  
?>


  <main class="auth-wrap">
    <section class="glass-card auth-card register-card">
      <div class="auth-heading">
        <h1>Create Account</h1>
        <p>Register to get access to your personal dashboard</p>
      </div>

      <?php 
        if(isset($_GET['error'])) {
          echo "<div id='registerAlert' class='alert alert-danger'>{$_GET['error']}</div>";
        }
      ?>

      <form id="registerForm" method="post" action="includes/register.inc.php" novalidate>
        <div class="input-box">
          <span class="input-icon"><i class="fa-regular fa-user"></i></span>
          <input id="fullName" type="text" name="fullName" placeholder="Full name" autocomplete="name" required>
        </div>

        <div class="input-box">
          <span class="input-icon">@</span>
          <input id="registerEmail" type="email" name="email" placeholder="Email address" autocomplete="email" required>
        </div>

        <div class="input-box">
          <span class="input-icon"><i class="fa-regular fa-user"></i></span>
          <input id="registerPassword" type="password" placeholder="Password (8+ characters)" required name="password">

          <button type="button" class="password-toggle" data-target="registerPassword"><i class="fa-regular fa-eye-slash"></i></button>
        </div>

        <div class="password-strength">
          <div class="strength-track"><span id="strengthBar"></span></div>
          <small id="strengthText">Use at least 8 characters</small>
        </div>

        <div class="input-box">
          <span class="input-icon"><i class="fa-regular fa-user"></i></span>

          <input id="password_confirmation" type="password" placeholder="Confirm Password" required name="password_confirmation">

          <button type="button" class="password-toggle" data-target="password_confirmation"><i class="fa-regular fa-eye-slash"></i></button>
        </div>

        <!-- <label class="check-label terms-label">
          <input id="terms" type="checkbox" required>
          <span class="custom-check">✓</span>
          I agree to the terms of this demo application.
        </label> -->

        <button class="btn btn-gradient submit-button" type="submit">
          <span class="button-text">Create Account</span>
        </button>
      </form>

      <p class="switch-text">
        Already have an account?
        <a href="login.html">Login</a>
      </p>

    </section>
  </main>

  <script src="assets/js/registration.js"></script>

<?php 
include_once "includes/footer.php"; 
}
?>
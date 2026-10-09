<?php

session_start();
if (!isset($_SESSION["id"])) {
  header("Location: ../login.php");
  exit();
}

$name = $_SESSION["fullName"];
$email = $_SESSION["email"];
$createdAt = $_SESSION["created_at"];

$initial = mb_strtoupper(mb_substr($name, 0, 1));

include_once "includes/header.php";

?>

<header class="dashboard-topbar">
  <a href="dashboard.html" class="brand">
    <span class="brand-icon">👞</span>
    NATURE
  </a>

  <div class="dashboard-user-mini">
    <div class="avatar avatar-small" id="topAvatar"><?php echo $initial ?></div>
    <span id="topName"><?php echo $name; ?></span>
    <button id="mobileMenuBtn" class="menu-button" type="button">☰</button>
  </div>
</header>

<div class="dashboard-shell">
  <aside class="dashboard-sidebar glass-card" id="sidebar">
    <div class="profile-box">
      <div class="avatar avatar-large" id="profileAvatar"><?php echo $initial ?></div>
      <h2 id="profileName"><?= $name; ?></h2>
      <p id="profileEmail"><?php echo $email; ?></p>
    </div>

    <nav class="dashboard-nav">
      <button class="nav-item active" data-section="overview">
        <span><i class="fa-regular fa-house"></i></span> Overview
      </button>

      <button class="nav-item" data-section="profile">
        <span><i class="fa-regular fa-user"></i></span> My Profile
      </button>

      <button class="nav-item" data-section="settings">
        <span><i class="fa-solid fa-gear"></i></span> Settings
      </button>

      <a href="includes/logout.inc.php" class="nav-item" id="logoutBtn">
        <span><i class="fa-solid fa-right-from-bracket"></i></span> Logout
      </a>
    </nav>
  </aside>

  <main class="dashboard-main">
    <div id="dashboardAlert" class="alert hidden"></div>

    <section class="dashboard-section active-section" id="overview">
      <div class="section-heading">
        <div>
          <span class="eyebrow">Dashboard</span>
          <h1>Welcome, <span id="welcomeName"><?php echo $name?></span>!</h1>
          <p>Here is your personal overview.</p>
        </div>

        <div class="stats-grid">
          <div class="stat-card glass-card">
            <div class="stat-icon">✓</div>
            <div><small>Account</small>
              <h3>Active</h3>
            </div>
          </div>

          <div class="stat-card glass-card">
            <div class="stat-icon">♡</div>
            <div><small>Security</small>
              <h3>Protected</h3>
            </div>
          </div>

          <div class="stat-card glass-card">
            <div class="stat-icon">⚡</div>
            <div><small>Status</small>
              <h3>Online</h3>
            </div>
          </div>
        </div>

        <div class="glass-card content-card">
          <span class="eyebrow">Main content area</span>
          <h2>This is where your application will live.</h2>
          <p>
            This area is intentionally ready for the feature you decide to add
            later — products, transactions, posts, analytics, tasks, messages,
            courses or anything else.
          </p>
        </div>
    </section>

    <section class="dashboard-section" id="profile">
      <div class="section-heading">
        <div>
          <span class="eyebrow">Account</span>
          <h1>My Profile</h1>
          <p>Your registered account information.</p>
        </div>
      </div>

      <div class="glass-card content-card profile-details">
        <div class="detail-row">
          <span>Full name</span>
          <strong id="detailName">-</strong>
        </div>
        <div class="detail-row">
          <span>Email</span>
          <strong id="detailEmail">-</strong>
        </div>
        <div class="detail-row">
          <span>Account status</span>
          <strong>Active</strong>
        </div>
      </div>
    </section>

    <section class="dashboard-section" id="settings">
      <div class="section-heading">
        <div>
          <span class="eyebrow">Preferences</span>
          <h1>Settings</h1>
          <p>Basic settings for the project.</p>
        </div>
      </div>

      <div class="glass-card content-card">
        <div class="setting-row">
          <div>
            <strong>Authentication</strong>
            <small>Login, registration and sessions will be connected with PHP later.</small>
          </div>
        </div>

        <hr>

        <button class="btn btn-glass" type="button">
          PHP authentication will be added here
        </button>
      </div>
    </section>
  </main>
</div>

<div class="sidebar-backdrop" id="sidebarBackdrop"></div>

<script src="assets/js/dashboard.js"></script>

<?php include_once "includes/footer.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>navbar</title>
<style>
  :root{ --nav-bg:#e7d4bb; --nav-height:64px; }

  *{ box-sizing: border-box; }

  body{
    margin: 0;
    font-family: Arial, sans-serif;
    /* make room for fixed nav so page content isn't hidden */
    padding-top: var(--nav-height);
  }

  nav{
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: var(--nav-height);
    background: var(--nav-bg);
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 0 1rem;
    z-index: 1000;
  }

  .logo{ font-size: 20px; font-weight: 700; }

  /* desktop links */
  .nav-links{
    display: flex;
    gap: 24px;
    align-items: center;
  }
  .nav-links a{
    text-decoration: none;
    color: #000;
    font-size: 16px;
    padding: 6px 8px;
  }

  /* hamburger button (hidden on desktop) */
  .menu-btn{
    display: none;
    background: transparent;
    border: none;
    font-size: 28px;
    cursor: pointer;
    line-height: 1;
  }

  /* mobile layout */
  @media (max-width: 768px){
    .menu-btn{ display: block; }

    .nav-links{
      position: absolute;
      top: var(--nav-height);
      left: 0;
      right: 0;
      width: 100%;
      flex-direction: column;
      gap: 0;
      background: var(--nav-bg);
      padding: 8px 0;
      display: none;             /* hidden by default */
      border-top: 1px solid rgba(0,0,0,0.06);
    }

    .nav-links a{
      display: block;
      width: 100%;
      padding: 12px 16px;
      text-align: center;
      border-bottom: 1px solid rgba(0,0,0,0.03);
    }

    .nav-links.show{ display: flex; }
  }

  /* optional: bigger clickable area for hamburger */
  .menu-btn .bar{ display:block; width:28px; height:3px; margin:5px 0; background:#000; border-radius:2px; }
</style>
</head>
<body>

<nav role="navigation" aria-label="main navigation">
  <div class="logo">Travel</div>

  <!-- use a button for accessibility -->
  <button id="menuBtn" class="menu-btn" aria-expanded="false" aria-controls="navLinks" aria-label="Toggle menu">
    <!-- simple hamburger made with spans for consistent sizing -->
    <span class="bar" aria-hidden="true"></span>
    <span class="bar" aria-hidden="true"></span>
    <span class="bar" aria-hidden="true"></span>
  </button>

  <div class="nav-links" id="navLinks">
    <a href="index.php">Home</a>
    <a href="about-page.php">About</a>
    <a href="package.php">Package</a>
    <a href="book.php">Book</a>
    <a href="admin.php">Admin</a>
  </div>
</nav>

<script>

(function () {
  const menuBtn = document.getElementById('menuBtn');
  const navLinks = document.getElementById('navLinks');

  if (!menuBtn || !navLinks) {
    console.error('Menu button or navLinks element not found.');
    return;
  }

  // toggle function
  function toggleMenu() {
    const isOpen = navLinks.classList.toggle('show');
    menuBtn.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
  }

  // open/close on button click
  menuBtn.addEventListener('click', function (e) {
    e.stopPropagation(); // prevent immediate outside-click handler
    toggleMenu();
  });

  // close when clicking a nav link (good on mobile)
  navLinks.addEventListener('click', function (e) {
    const target = e.target;
    if (target.tagName === 'A' && window.matchMedia('(max-width: 768px)').matches) {
      // small delay so link navigation still works
      navLinks.classList.remove('show');
      menuBtn.setAttribute('aria-expanded', 'false');
    }
  });

  // close when clicking outside the nav when open
  document.addEventListener('click', function (e) {
    if (navLinks.classList.contains('show')) {
      // if the click is outside navLinks and outside button, close
      if (!navLinks.contains(e.target) && !menuBtn.contains(e.target)) {
        navLinks.classList.remove('show');
        menuBtn.setAttribute('aria-expanded', 'false');
      }
    }
  });

  // optional: close on Escape key
  document.addEventListener('keydown', function (e) {
    if (e.key === 'Escape' && navLinks.classList.contains('show')) {
      navLinks.classList.remove('show');
      menuBtn.setAttribute('aria-expanded', 'false');
      menuBtn.focus();
    }
  });
})();
</script>
</body>
</html>
<?php

/**
 * DocAMPP — Docker, Apache, MySQL, PHP
 * Landing page created by DrkF0rest
 *
 * Update the values below to match your environment.
 */
$phpmyadmin_url   = "http://localhost:8081";   // change to match phpMyAdmin's port in your docker-compose file

$php_version      = phpversion();
$server_software  = $_SERVER['SERVER_SOFTWARE'] ?? 'Apache';
?>
<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DocAMPP</title>
  <meta name="color-scheme" content="light dark">
  <!-- Set the theme before first paint to avoid a flash of the wrong theme -->
  <script>
    (function() {
      try {
        var saved = localStorage.getItem('DocAMPP-theme');
        if (saved === 'dark') {
          document.documentElement.setAttribute('data-theme', 'dark');
        }
      } catch (e) {}
    })();
  </script>
  <!-- ===== FAVICON / TAB ICON SVG MINIMALIS ===== -->
  <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 64 64'%3E%3Crect width='64' height='64' rx='12' fill='%232496ED'/%3E%3Cpath d='M32 16L20 28v12h24V28L32 16z' fill='%23FFFFFF' opacity='0.9'/%3E%3Cpath d='M32 22l-6 6v8h12v-8l-6-6z' fill='%232496ED'/%3E%3Crect x='22' y='36' width='20' height='8' rx='1' fill='%23FFFFFF' opacity='0.7'/%3E%3C/svg%3E">

  <!-- Fallback untuk browser yang tidak support SVG favicon -->
  <link rel="icon" type="image/png" sizes="32x32" href="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 64 64'%3E%3Crect width='64' height='64' rx='12' fill='%232496ED'/%3E%3Cpath d='M32 16L20 28v12h24V28L32 16z' fill='%23FFFFFF' opacity='0.9'/%3E%3Cpath d='M32 22l-6 6v8h12v-8l-6-6z' fill='%232496ED'/%3E%3Crect x='22' y='36' width='20' height='8' rx='1' fill='%23FFFFFF' opacity='0.7'/%3E%3C/svg%3E">

  <!-- Apple Touch Icon -->
  <link rel="apple-touch-icon" href="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 64 64'%3E%3Crect width='64' height='64' rx='12' fill='%232496ED'/%3E%3Cpath d='M32 16L20 28v12h24V28L32 16z' fill='%23FFFFFF' opacity='0.9'/%3E%3Cpath d='M32 22l-6 6v8h12v-8l-6-6z' fill='%232496ED'/%3E%3Crect x='22' y='36' width='20' height='8' rx='1' fill='%23FFFFFF' opacity='0.7'/%3E%3C/svg%3E">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700&family=Inter:wght@400;500;600&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet">
  <style>
    :root {
      --blue: #2496ED;
      /* docker blue */
      --blue-deep: #0B3558;
      /* navy text */
      --blue-tint: #EAF4FF;
      /* light section bg */
      --blue-tint-2: #F5FAFF;
      --slate: #5B6B79;
      /* body copy */
      --line: #E2ECF5;
      --white: #FFFFFF;
      --surface: #FFFFFF;
      --bg: #FFFFFF;
      --header-bg: rgba(255, 255, 255, 0.86);
      --shadow-soft: rgba(11, 53, 88, .08);
      --apache-tint: #FCEEEA;
      --mysql-tint: #EAF3EC;
      --php-tint: #F1EEFB;
      --radius: 14px;
    }

    /* ---------- Dark theme ---------- */
    [data-theme="dark"] {
      --blue: #4FADF3;
      --blue-deep: #EAF2FA;
      --blue-tint: rgba(79, 173, 243, .14);
      --blue-tint-2: #101A29;
      --slate: #93A6BA;
      --line: #223047;
      --white: #101A29;
      --surface: #131F30;
      --bg: #0B121D;
      --header-bg: rgba(11, 18, 29, 0.82);
      --shadow-soft: rgba(0, 0, 0, .35);
      --apache-tint: #2A1F1D;
      --mysql-tint: #17251C;
      --php-tint: #201C33;
    }

    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    html {
      scroll-behavior: smooth;
    }

    body {
      font-family: 'Inter', sans-serif;
      color: var(--blue-deep);
      background: var(--bg);
      line-height: 1.6;
      -webkit-font-smoothing: antialiased;
      transition: background-color .35s ease, color .35s ease;
    }

    h1,
    h2,
    h3,
    .brand {
      font-family: 'Space Grotesk', sans-serif;
    }

    .mono {
      font-family: 'JetBrains Mono', monospace;
    }

    a {
      color: inherit;
      text-decoration: none;
    }

    img,
    svg {
      display: block;
    }

    /* ---------- Layout helpers ---------- */
    .wrap {
      max-width: 1120px;
      margin: 0 auto;
      padding: 0 32px;
    }

    section {
      padding: 96px 0;
    }

    @media (max-width:640px) {
      section {
        padding: 64px 0;
      }

      .wrap {
        padding: 0 20px;
      }
    }

    /* ---------- Scroll reveal ---------- */
    .reveal {
      opacity: 0;
      transform: translateY(22px);
      transition: opacity .7s cubic-bezier(.16, 1, .3, 1), transform .7s cubic-bezier(.16, 1, .3, 1);
    }

    .reveal.in-view {
      opacity: 1;
      transform: translateY(0);
    }

    /* ---------- Navbar ---------- */
    header {
      position: sticky;
      top: 0;
      z-index: 50;
      background: var(--header-bg);
      backdrop-filter: blur(10px);
      border-bottom: 1px solid var(--line);
      transition: background-color .35s ease, border-color .35s ease;
    }

    nav.wrap {
      display: flex;
      align-items: center;
      justify-content: space-between;
      height: 72px;
    }

    .brand {
      display: flex;
      align-items: center;
      gap: 10px;
      font-size: 22px;
      font-weight: 700;
      letter-spacing: -0.01em;
      color: var(--blue-deep);
    }

    .brand .letter-d {
      color: var(--blue);
    }

    .brand-icon {
      width: 30px;
      height: 30px;
      flex-shrink: 0;
    }

    .nav-right {
      display: flex;
      align-items: center;
      gap: 28px;
    }

    /* ---------- Theme toggle ---------- */
    .theme-toggle {
      position: relative;
      width: 52px;
      height: 28px;
      border-radius: 999px;
      border: 1px solid var(--line);
      background: var(--blue-tint);
      cursor: pointer;
      flex-shrink: 0;
      padding: 0;
      transition: background-color .35s ease, border-color .35s ease;
    }

    .theme-toggle:focus-visible {
      outline: 2px solid var(--blue);
      outline-offset: 2px;
    }

    .theme-toggle .knob {
      position: absolute;
      top: 2px;
      left: 2px;
      width: 22px;
      height: 22px;
      border-radius: 50%;
      background: var(--white);
      box-shadow: 0 2px 6px var(--shadow-soft);
      display: flex;
      align-items: center;
      justify-content: center;
      transition: transform .4s cubic-bezier(.34, 1.56, .64, 1), background-color .35s ease;
    }

    [data-theme="dark"] .theme-toggle .knob {
      transform: translateX(24px);
    }

    .theme-toggle .knob svg {
      width: 13px;
      height: 13px;
      transition: opacity .3s ease, transform .4s ease;
    }

    .theme-toggle .icon-sun {
      color: #E39B2C;
      opacity: 1;
      position: absolute;
      transform: rotate(0deg) scale(1);
    }

    .theme-toggle .icon-moon {
      color: #4FADF3;
      opacity: 0;
      position: absolute;
      transform: rotate(-90deg) scale(.4);
    }

    [data-theme="dark"] .theme-toggle .icon-sun {
      opacity: 0;
      transform: rotate(90deg) scale(.4);
    }

    [data-theme="dark"] .theme-toggle .icon-moon {
      opacity: 1;
      transform: rotate(0deg) scale(1);
    }

    .btn {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      padding: 11px 20px;
      border-radius: 10px;
      font-size: 14.5px;
      font-weight: 600;
      border: 1px solid transparent;
      cursor: pointer;
      transition: transform .15s ease, box-shadow .15s ease, background .15s ease, border-color .15s ease, color .15s ease;
    }

    .btn:focus-visible {
      outline: 2px solid var(--blue);
      outline-offset: 2px;
    }

    .btn-primary {
      background: var(--blue);
      color: #fff;
      box-shadow: 0 1px 2px var(--shadow-soft);
    }

    .btn-primary:hover {
      background: #1c82d6;
      box-shadow: 0 8px 20px rgba(36, 150, 237, .28);
      transform: translateY(-1px);
    }

    .btn-ghost {
      background: transparent;
      color: var(--blue-deep);
      border-color: var(--line);
    }

    .btn-ghost:hover {
      border-color: var(--blue);
      color: var(--blue);
      transform: translateY(-1px);
    }

    .btn-sm {
      padding: 9px 16px;
      font-size: 13.5px;
    }

    /* ---------- Hero ---------- */
    .hero {
      padding-top: 60px;
      padding-bottom: 80px;
      display: grid;
      grid-template-columns: 1.1fr .9fr;
      gap: 56px;
      align-items: center;
    }

    @media (max-width:860px) {
      .hero {
        grid-template-columns: 1fr;
        padding-top: 72px;
      }
    }

    .eyebrow {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      font-size: 12.5px;
      font-weight: 500;
      color: var(--blue);
      background: var(--blue-tint);
      border: 1px solid var(--line);
      padding: 6px 12px;
      border-radius: 100px;
      margin-bottom: 22px;
      opacity: 0;
      animation: fadeIn .6s ease .1s forwards;
    }

    .eyebrow .dot {
      width: 6px;
      height: 6px;
      border-radius: 50%;
      background: var(--blue);
      animation: pulse 2s ease-in-out infinite;
    }

    @keyframes pulse {

      0%,
      100% {
        box-shadow: 0 0 0 0 rgba(36, 150, 237, .45);
      }

      50% {
        box-shadow: 0 0 0 5px rgba(36, 150, 237, 0);
      }
    }

    @keyframes fadeIn {
      to {
        opacity: 1;
      }
    }

    h1.headline {
      font-size: clamp(34px, 5vw, 54px);
      font-weight: 700;
      letter-spacing: -0.02em;
      color: var(--blue-deep);
      margin-bottom: 20px;
      opacity: 0;
      transform: translateY(10px);
      animation: fadeUp .6s ease .18s forwards;
    }

    h1.headline .accent {
      color: var(--blue);
    }

    .lede {
      font-size: 17px;
      color: var(--slate);
      max-width: 480px;
      margin-bottom: 34px;
      opacity: 0;
      transform: translateY(10px);
      animation: fadeUp .6s ease .28s forwards;
    }

    .hero-actions {
      display: flex;
      gap: 14px;
      flex-wrap: wrap;
      opacity: 0;
      transform: translateY(10px);
      animation: fadeUp .6s ease .38s forwards;
    }

    @keyframes fadeUp {
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    /* Stack diagram — signature element: docker image layers */
    .layers {
      display: flex;
      flex-direction: column-reverse;
      gap: 12px;
    }

    .layer {
      display: flex;
      align-items: center;
      gap: 14px;
      background: var(--surface);
      border: 1px solid var(--line);
      border-radius: 12px;
      padding: 16px 18px;
      box-shadow: 0 1px 2px var(--shadow-soft);
      opacity: 0;
      transform: translateY(14px);
      animation: rise .55s ease forwards;
      transition: background-color .35s ease, border-color .35s ease, transform .2s ease, box-shadow .2s ease;
    }

    .layer:hover {
      transform: translateY(-2px);
      box-shadow: 0 10px 24px var(--shadow-soft);
    }

    .layer:nth-child(1) {
      animation-delay: .05s;
    }

    .layer:nth-child(2) {
      animation-delay: .18s;
    }

    .layer:nth-child(3) {
      animation-delay: .31s;
    }

    .layer:nth-child(4) {
      animation-delay: .44s;
    }

    @keyframes rise {
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .layer .idx {
      font-family: 'JetBrains Mono', monospace;
      font-size: 11.5px;
      color: #9BB3C4;
      width: 20px;
    }

    .layer .sq {
      width: 34px;
      height: 34px;
      border-radius: 8px;
      flex-shrink: 0;
      display: flex;
      align-items: center;
      justify-content: center;
      transition: background-color .35s ease;
    }

    .layer .name {
      font-weight: 600;
      font-size: 15px;
      color: var(--blue-deep);
    }

    .layer .desc {
      font-size: 12.5px;
      color: var(--slate);
    }

    .layer-body {
      display: flex;
      flex-direction: column;
      gap: 1px;
    }

    .layer.docker .sq {
      background: var(--blue-tint);
    }

    .layer.apache .sq {
      background: var(--apache-tint);
    }

    .layer.mysql .sq {
      background: var(--mysql-tint);
    }

    .layer.php .sq {
      background: var(--php-tint);
    }

    /* ---------- Section headers ---------- */
    .section-head {
      max-width: 560px;
      margin-bottom: 48px;
    }

    .section-tag {
      font-family: 'JetBrains Mono', monospace;
      font-size: 12px;
      color: var(--blue);
      text-transform: uppercase;
      letter-spacing: .08em;
      margin-bottom: 10px;
      display: block;
    }

    .section-head h2 {
      font-size: clamp(26px, 3vw, 34px);
      letter-spacing: -0.01em;
      margin-bottom: 12px;
    }

    .section-head p {
      color: var(--slate);
      font-size: 15.5px;
    }

    /* ---------- Stack cards ---------- */
    .stack-grid {
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      gap: 18px;
    }

    @media (max-width:860px) {
      .stack-grid {
        grid-template-columns: repeat(2, 1fr);
      }
    }

    @media (max-width:480px) {
      .stack-grid {
        grid-template-columns: 1fr;
      }
    }

    .stack-card {
      border: 1px solid var(--line);
      border-radius: var(--radius);
      padding: 26px 22px;
      background: var(--surface);
      transition: border-color .2s ease, transform .2s ease, box-shadow .2s ease, background-color .35s ease;
    }

    .stack-card:hover {
      border-color: var(--blue);
      transform: translateY(-4px);
      box-shadow: 0 12px 28px var(--shadow-soft);
    }

    .stack-card .ic {
      width: 38px;
      height: 38px;
      margin-bottom: 16px;
      transition: transform .3s ease;
    }

    .stack-card:hover .ic {
      transform: scale(1.08) rotate(-3deg);
    }

    .stack-card h3 {
      font-size: 16.5px;
      margin-bottom: 6px;
    }

    .stack-card p {
      font-size: 13.5px;
      color: var(--slate);
    }

    /* ---------- phpMyAdmin band ---------- */
    .pma {
      margin-top: 30px;
      margin-bottom: 30px;
      background: var(--blue-tint-2);
      border-top: 1px solid var(--line);
      border-bottom: 1px solid var(--line);
      transition: background-color .35s ease, border-color .35s ease;
    }

    .pma-inner {
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 24px;
      flex-wrap: wrap;
    }

    .pma-left {
      display: flex;
      align-items: center;
      gap: 16px;
    }

    .pma-icon {
      width: 48px;
      height: 48px;
      border-radius: 12px;
      background: var(--blue);
      display: flex;
      align-items: center;
      justify-content: center;
      flex-shrink: 0;
    }

    .pma h3 {
      font-size: 18px;
      margin-bottom: 4px;
    }

    .pma p {
      font-size: 13.5px;
      color: var(--slate);
    }

    .pma-url {
      font-family: 'JetBrains Mono', monospace;
      font-size: 12.5px;
      color: var(--blue);
      background: var(--blue-tint);
      padding: 2px 8px;
      border-radius: 6px;
    }

    /* ---------- About ---------- */
    .about {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 56px;
      align-items: center;
      margin-bottom: 10px;
    }

    @media (max-width:860px) {
      .about {
        grid-template-columns: 1fr;
      }
    }

    .about-card {
      border: 1px solid var(--line);
      border-radius: var(--radius);
      padding: 32px;
      background: var(--surface);
      transition: background-color .35s ease, border-color .35s ease, transform .3s ease, box-shadow .3s ease;
    }

    .about-card:hover {
      transform: translateY(-3px);
      box-shadow: 0 14px 30px var(--shadow-soft);
    }

    .about-card .gh-row {
      display: flex;
      align-items: center;
      gap: 14px;
      margin-bottom: 22px;
    }

    .about-card .gh-avatar {
      width: 52px;
      height: 52px;
      border-radius: 50%;
      background: var(--blue-deep);
      color: var(--bg);
      display: flex;
      align-items: center;
      justify-content: center;
      font-family: 'Space Grotesk', sans-serif;
      font-weight: 700;
      font-size: 18px;
      transition: background-color .35s ease, color .35s ease;
    }

    .about-card .gh-name {
      font-weight: 600;
      font-size: 16px;
    }

    .about-card .gh-handle {
      font-size: 13.5px;
      color: var(--slate);
    }

    .meta-list {
      list-style: none;
      display: flex;
      flex-direction: column;
      gap: 10px;
      margin-top: 8px;
    }

    .meta-list li {
      display: flex;
      justify-content: space-between;
      font-size: 13.5px;
      padding: 10px 0;
      border-top: 1px solid var(--line);
      transition: border-color .35s ease;
    }

    .meta-list li span:first-child {
      color: var(--slate);
    }

    .meta-list li span:last-child {
      font-family: 'JetBrains Mono', monospace;
      color: var(--blue-deep);
    }

    /* ---------- Footer ---------- */
    footer {
      border-top: 1px solid var(--line);
      padding: 36px 0;
      transition: border-color .35s ease;
    }

    footer .wrap {
      display: flex;
      align-items: center;
      justify-content: space-between;
      flex-wrap: wrap;
      gap: 12px;
    }

    footer p {
      font-size: 13px;
      color: var(--slate);
    }

    footer .foot-brand {
      display: flex;
      align-items: center;
      gap: 8px;
      font-weight: 600;
      font-size: 14px;
    }

    @media (prefers-reduced-motion: reduce) {

      .layer,
      .eyebrow,
      h1.headline,
      .lede,
      .hero-actions {
        animation: none !important;
        opacity: 1 !important;
        transform: none !important;
      }

      .reveal {
        opacity: 1;
        transform: none;
        transition: none;
      }

      html {
        scroll-behavior: auto;
      }

      * {
        transition-duration: 0.01ms !important;
      }
    }
  </style>
</head>

<body>

  <header>
    <nav class="wrap">
      <div class="brand">
        <svg class="brand-icon" xmlns="http://www.w3.org/2000/svg" height="14" width="14" viewBox="0 0 640 640">
          <path fill="#2496ed" d="M349.9 300.3L283.8 300.3L283.8 240.9L349.9 240.9L349.9 300.3zM349.9 96L283.8 96L283.8 156.7L349.9 156.7L349.9 96zM428.1 240.8L362 240.8L362 300.2L428.1 300.2L428.1 240.8zM271.8 168.7L205.7 168.7L205.7 228.8L271.8 228.8L271.8 168.7zM349.9 168.7L283.8 168.7L283.8 228.8L349.9 228.8L349.9 168.7zM626.7 268.7C612.3 259 579.1 255.5 553.6 260.3C550.3 236.3 536.9 215.4 512.5 196.6L498.5 187.3L489.2 201.3C470.8 229.1 465.8 274.9 485.5 305.1C476.8 309.8 459.7 316.2 437.1 315.8L2.4 315.8C-6.3 366.6 8.2 432.6 46.4 477.9C83.5 521.8 139.1 544.1 211.8 544.1C369.2 544.1 485.7 471.6 540.2 339.9C561.6 340.3 607.8 340 631.5 294.7C633 292.2 638.1 281.5 640 277.6L626.7 268.7zM115.6 240.8L49.6 240.8L49.6 300.2L115.7 300.2L115.7 240.8L115.6 240.8zM193.7 240.8L127.6 240.8L127.6 300.2L193.7 300.2L193.7 240.8zM271.8 240.8L205.7 240.8L205.7 300.2L271.8 300.2L271.8 240.8zM193.7 168.7L127.6 168.7L127.6 228.8L193.7 228.8L193.7 168.7z" />
        </svg>
        <a href="https://docampp.drkforest.site">
          <span><span class="letter-d">Doc</span>AMPP</span>
        </a>
      </div>
      <div class="nav-right">
        <button class="theme-toggle" id="themeToggle" type="button" aria-label="Toggle dark mode" aria-pressed="false">
          <span class="knob">
            <svg class="icon-sun" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
              <circle cx="12" cy="12" r="4.2"></circle>
              <line x1="12" y1="1.5" x2="12" y2="4"></line>
              <line x1="12" y1="20" x2="12" y2="22.5"></line>
              <line x1="4.2" y1="4.2" x2="6" y2="6"></line>
              <line x1="18" y1="18" x2="19.8" y2="19.8"></line>
              <line x1="1.5" y1="12" x2="4" y2="12"></line>
              <line x1="20" y1="12" x2="22.5" y2="12"></line>
              <line x1="4.2" y1="19.8" x2="6" y2="18"></line>
              <line x1="18" y1="6" x2="19.8" y2="4.2"></line>
            </svg>
            <svg class="icon-moon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
              <path d="M20.5 14.4A8.6 8.6 0 1 1 9.6 3.5a7 7 0 0 0 10.9 10.9z"></path>
            </svg>
          </span>
        </button>
      </div>
    </nav>
  </header>

  <main>

    <!-- HERO -->
    <section class="hero wrap">
      <div>
        <h1 class="headline"><span class="accent">Docker</span>, Apache, MySQL &amp; PHP<br>in a single container.</h1>
        <p class="lede">DocAMPP bundles four classic web development layers into one consistent Docker image no manual installs, no "works on my machine".</p>
        <div class="hero-actions">
          <a class="btn btn-primary" href="<?php echo htmlspecialchars($phpmyadmin_url); ?>" target="_blank" rel="noopener">
            Open phpMyAdmin →
          </a>
          <a class="btn btn-ghost" href="#stack">
            Explore the stack
          </a>
        </div>
      </div>

      <div class="layers" aria-hidden="false">
        <div class="layer php">
          <span class="idx">04</span>
          <div class="sq">
            <svg xmlns="http://www.w3.org/2000/svg" height="18" width="18" viewBox="0 0 640 640">
              <path fill="#6c4fcb" d="M320 168.5C491.4 168.5 623.2 240.7 623.2 320C623.2 399.3 491.3 471.5 320 471.5C148.6 471.5 16.8 399.3 16.8 320C16.8 240.7 148.7 168.5 320 168.5zM320 151.7C143.3 151.7 0 227 0 320C0 413 143.3 488.3 320 488.3C496.7 488.3 640 413 640 320C640 227 496.7 151.7 320 151.7zM218.2 306.5C210.3 347 182.4 342.8 148.1 342.8L161.8 272.2C199.8 272.2 225.6 268.1 218.2 306.5zM97.4 414.3L134.1 414.3L142.8 369.5C183.9 369.5 209.4 372.5 233 350.4C259.1 326.4 265.9 283.7 247.3 262.3C237.6 251.1 222 245.6 200.8 245.6L130.1 245.6L97.4 414.3zM283.1 200.7L319.6 200.7L310.9 245.5C342.4 245.5 371.6 243.2 385.7 256.2C400.5 269.8 393.4 287.2 377.4 369.3L340.4 369.3C355.8 289.9 358.7 283.3 353.1 277.3C347.7 271.5 335.4 272.7 305.7 272.7L286.9 369.3L250.4 369.3L283.1 200.7zM505 306.5C497 347.6 468.3 342.8 434.9 342.8L448.6 272.2C486.8 272.2 512.4 268.1 505 306.5zM384.2 414.3L421 414.3L429.7 369.5C472.9 369.5 496.8 372 519.9 350.4C546 326.4 552.8 283.7 534.2 262.3C524.5 251.1 508.9 245.6 487.7 245.6L417 245.6L384.2 414.3z" />
            </svg>
          </div>
          <div class="layer-body">
            <span class="name">PHP</span>
            <span class="desc">v<?php echo htmlspecialchars($php_version); ?> · application layer</span>
          </div>
        </div>

        <div class="layer mysql">
          <span class="idx">03</span>
          <div class="sq">
            <svg xmlns="http://www.w3.org/2000/svg" height="18" width="18" viewBox="0 0 640 640">
              <path fill="#3f7d53" d="M544 269.8C529.2 279.6 512.2 287.5 494.5 293.8C447.5 310.6 385.8 320 320 320C254.2 320 192.4 310.5 145.5 293.8C127.9 287.5 110.8 279.6 96 269.8L96 352C96 396.2 196.3 432 320 432C443.7 432 544 396.2 544 352L544 269.8zM544 192L544 144C544 99.8 443.7 64 320 64C196.3 64 96 99.8 96 144L96 192C96 236.2 196.3 272 320 272C443.7 272 544 236.2 544 192zM494.5 453.8C447.6 470.5 385.9 480 320 480C254.1 480 192.4 470.5 145.5 453.8C127.9 447.5 110.8 439.6 96 429.8L96 496C96 540.2 196.3 576 320 576C443.7 576 544 540.2 544 496L544 429.8C529.2 439.6 512.2 447.5 494.5 453.8z" />
            </svg>
          </div>
          <div class="layer-body">
            <span class="name">MySQL</span>
            <span class="desc">database layer</span>
          </div>
        </div>

        <div class="layer apache">
          <span class="idx">02</span>
          <div class="sq">
            <svg xmlns="http://www.w3.org/2000/svg" height="18" width="18" viewBox="0 0 640 640">
              <path fill="#d9694f" d="M539.3 64.1C549.2 63.3 558.9 67.1 565.9 74.1C572.9 81.1 576.7 90.8 575.9 100.7C571.9 150 558.5 226.9 529.6 300.4C527.8 304.9 524.1 308.3 519.4 309.7L438.5 334C434.6 335.2 432 338.7 432 342.8C432 347.9 436.1 352 441.2 352L479.8 352C491.8 352 499.5 364.8 493.3 375.1C489.3 381.8 485 388.3 480.6 394.7C478.6 397.6 475.6 399.7 472.2 400.8L374.5 430C370.6 431.2 368 434.7 368 438.8C368 443.9 372.1 448 377.2 448L393.2 448C407.8 448 414.2 465.4 402 473.4C334 518.4 264.3 516.7 219.6 504.7C206.9 501.3 195.6 494.8 185.2 486.8L112 560C103.2 568.8 88.8 568.8 80 560C71.2 551.2 71.2 536.8 80 528L160 448L160.5 448.5C161.2 447.2 162.1 446 163.2 444.9L320 288C328.8 279.2 328.8 264.8 320 256C311.2 247.2 296.8 247.2 288 256L153.7 390.2C144.8 399.1 129.7 394.6 128.7 382C124.4 328.8 138 258.9 201.3 195.6C292.4 104.5 455.5 70.9 539.2 64.1z" />
            </svg>
          </div>
          <div class="layer-body">
            <span class="name">Apache</span>
            <span class="desc"><?php echo htmlspecialchars($server_software); ?></span>
          </div>
        </div>

        <div class="layer docker">
          <span class="idx">01</span>
          <div class="sq">
            <svg xmlns="http://www.w3.org/2000/svg" height="18" width="18" viewBox="0 0 640 640">
              <path fill="rgb(36, 150, 237)" d="M349.9 300.3L283.8 300.3L283.8 240.9L349.9 240.9L349.9 300.3zM349.9 96L283.8 96L283.8 156.7L349.9 156.7L349.9 96zM428.1 240.8L362 240.8L362 300.2L428.1 300.2L428.1 240.8zM271.8 168.7L205.7 168.7L205.7 228.8L271.8 228.8L271.8 168.7zM349.9 168.7L283.8 168.7L283.8 228.8L349.9 228.8L349.9 168.7zM626.7 268.7C612.3 259 579.1 255.5 553.6 260.3C550.3 236.3 536.9 215.4 512.5 196.6L498.5 187.3L489.2 201.3C470.8 229.1 465.8 274.9 485.5 305.1C476.8 309.8 459.7 316.2 437.1 315.8L2.4 315.8C-6.3 366.6 8.2 432.6 46.4 477.9C83.5 521.8 139.1 544.1 211.8 544.1C369.2 544.1 485.7 471.6 540.2 339.9C561.6 340.3 607.8 340 631.5 294.7C633 292.2 638.1 281.5 640 277.6L626.7 268.7zM115.6 240.8L49.6 240.8L49.6 300.2L115.7 300.2L115.7 240.8L115.6 240.8zM193.7 240.8L127.6 240.8L127.6 300.2L193.7 300.2L193.7 240.8zM271.8 240.8L205.7 240.8L205.7 300.2L271.8 300.2L271.8 240.8zM193.7 168.7L127.6 168.7L127.6 228.8L193.7 228.8L193.7 168.7z" />
            </svg>
          </div>
          <div class="layer-body">
            <span class="name">Docker</span>
            <span class="desc">base container layer</span>
          </div>
        </div>
      </div>
    </section>

    <!-- STACK -->
    <section id="stack" class="wrap">
      <div class="section-head reveal">
        <span class="section-tag">/// stack</span>
        <h2>Four components, one workflow</h2>
        <p>Each letter in DocAMPP is a layer running side-by-side through Docker Compose.</p>
      </div>
      <div class="stack-grid">
        <div class="stack-card reveal">
          <svg class="ic" xmlns="http://www.w3.org/2000/svg" height="38" width="38" viewBox="0 0 640 640">
            <path fill="rgb(36, 150, 237)" d="M349.9 300.3L283.8 300.3L283.8 240.9L349.9 240.9L349.9 300.3zM349.9 96L283.8 96L283.8 156.7L349.9 156.7L349.9 96zM428.1 240.8L362 240.8L362 300.2L428.1 300.2L428.1 240.8zM271.8 168.7L205.7 168.7L205.7 228.8L271.8 228.8L271.8 168.7zM349.9 168.7L283.8 168.7L283.8 228.8L349.9 228.8L349.9 168.7zM626.7 268.7C612.3 259 579.1 255.5 553.6 260.3C550.3 236.3 536.9 215.4 512.5 196.6L498.5 187.3L489.2 201.3C470.8 229.1 465.8 274.9 485.5 305.1C476.8 309.8 459.7 316.2 437.1 315.8L2.4 315.8C-6.3 366.6 8.2 432.6 46.4 477.9C83.5 521.8 139.1 544.1 211.8 544.1C369.2 544.1 485.7 471.6 540.2 339.9C561.6 340.3 607.8 340 631.5 294.7C633 292.2 638.1 281.5 640 277.6L626.7 268.7zM115.6 240.8L49.6 240.8L49.6 300.2L115.7 300.2L115.7 240.8L115.6 240.8zM193.7 240.8L127.6 240.8L127.6 300.2L193.7 300.2L193.7 240.8zM271.8 240.8L205.7 240.8L205.7 300.2L271.8 300.2L271.8 240.8zM193.7 168.7L127.6 168.7L127.6 228.8L193.7 228.8L193.7 168.7z" />
          </svg>
          <h3>Docker</h3>
          <p>Isolates each service into a container so the environment stays identical on any machine.</p>
        </div>
        <div class="stack-card reveal">
          <svg class="ic" xmlns="http://www.w3.org/2000/svg" height="38" width="38" viewBox="0 0 640 640">
            <path fill="#d9694f" d="M539.3 64.1C549.2 63.3 558.9 67.1 565.9 74.1C572.9 81.1 576.7 90.8 575.9 100.7C571.9 150 558.5 226.9 529.6 300.4C527.8 304.9 524.1 308.3 519.4 309.7L438.5 334C434.6 335.2 432 338.7 432 342.8C432 347.9 436.1 352 441.2 352L479.8 352C491.8 352 499.5 364.8 493.3 375.1C489.3 381.8 485 388.3 480.6 394.7C478.6 397.6 475.6 399.7 472.2 400.8L374.5 430C370.6 431.2 368 434.7 368 438.8C368 443.9 372.1 448 377.2 448L393.2 448C407.8 448 414.2 465.4 402 473.4C334 518.4 264.3 516.7 219.6 504.7C206.9 501.3 195.6 494.8 185.2 486.8L112 560C103.2 568.8 88.8 568.8 80 560C71.2 551.2 71.2 536.8 80 528L160 448L160.5 448.5C161.2 447.2 162.1 446 163.2 444.9L320 288C328.8 279.2 328.8 264.8 320 256C311.2 247.2 296.8 247.2 288 256L153.7 390.2C144.8 399.1 129.7 394.6 128.7 382C124.4 328.8 138 258.9 201.3 195.6C292.4 104.5 455.5 70.9 539.2 64.1z" />
          </svg>
          <h3>Apache</h3>
          <p>The web server that handles HTTP requests and runs PHP files.</p>
        </div>
        <div class="stack-card reveal">
          <svg class="ic" xmlns="http://www.w3.org/2000/svg" height="38" width="38" viewBox="0 0 640 640">
            <path fill="#3f7d53" d="M544 269.8C529.2 279.6 512.2 287.5 494.5 293.8C447.5 310.6 385.8 320 320 320C254.2 320 192.4 310.5 145.5 293.8C127.9 287.5 110.8 279.6 96 269.8L96 352C96 396.2 196.3 432 320 432C443.7 432 544 396.2 544 352L544 269.8zM544 192L544 144C544 99.8 443.7 64 320 64C196.3 64 96 99.8 96 144L96 192C96 236.2 196.3 272 320 272C443.7 272 544 236.2 544 192zM494.5 453.8C447.6 470.5 385.9 480 320 480C254.1 480 192.4 470.5 145.5 453.8C127.9 447.5 110.8 439.6 96 429.8L96 496C96 540.2 196.3 576 320 576C443.7 576 544 540.2 544 496L544 429.8C529.2 439.6 512.2 447.5 494.5 453.8z" />
          </svg>
          <h3>MySQL</h3>
          <p>Stores and manages application data through a relational database system.</p>
        </div>
        <div class="stack-card reveal">
          <svg class="ic" xmlns="http://www.w3.org/2000/svg" height="38" width="38" viewBox="0 0 640 640">
            <path fill="#6c4fcb" d="M320 168.5C491.4 168.5 623.2 240.7 623.2 320C623.2 399.3 491.3 471.5 320 471.5C148.6 471.5 16.8 399.3 16.8 320C16.8 240.7 148.7 168.5 320 168.5zM320 151.7C143.3 151.7 0 227 0 320C0 413 143.3 488.3 320 488.3C496.7 488.3 640 413 640 320C640 227 496.7 151.7 320 151.7zM218.2 306.5C210.3 347 182.4 342.8 148.1 342.8L161.8 272.2C199.8 272.2 225.6 268.1 218.2 306.5zM97.4 414.3L134.1 414.3L142.8 369.5C183.9 369.5 209.4 372.5 233 350.4C259.1 326.4 265.9 283.7 247.3 262.3C237.6 251.1 222 245.6 200.8 245.6L130.1 245.6L97.4 414.3zM283.1 200.7L319.6 200.7L310.9 245.5C342.4 245.5 371.6 243.2 385.7 256.2C400.5 269.8 393.4 287.2 377.4 369.3L340.4 369.3C355.8 289.9 358.7 283.3 353.1 277.3C347.7 271.5 335.4 272.7 305.7 272.7L286.9 369.3L250.4 369.3L283.1 200.7zM505 306.5C497 347.6 468.3 342.8 434.9 342.8L448.6 272.2C486.8 272.2 512.4 268.1 505 306.5zM384.2 414.3L421 414.3L429.7 369.5C472.9 369.5 496.8 372 519.9 350.4C546 326.4 552.8 283.7 534.2 262.3C524.5 251.1 508.9 245.6 487.7 245.6L417 245.6L384.2 414.3z" />
          </svg>
          <h3>PHP</h3>
          <p>The application logic that connects the frontend with data in MySQL.</p>
        </div>
      </div>
    </section>

    <!-- PHPMYADMIN -->
    <section id="phpmyadmin" class="pma">
      <div class="wrap pma-inner reveal">
        <div class="pma-left">
          <div class="pma-icon">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
              <ellipse cx="12" cy="6" rx="7" ry="2.6" fill="#fff" />
              <path d="M5 6v6c0 1.4 3.1 2.6 7 2.6s7-1.2 7-2.6V6" stroke="#fff" stroke-width="1.4" fill="none" />
              <path d="M5 12v6c0 1.4 3.1 2.6 7 2.6s7-1.2 7-2.6v-6" stroke="#fff" stroke-width="1.4" fill="none" />
            </svg>
          </div>
          <div>
            <h3>Manage your database through phpMyAdmin</h3>
            <p>Connects directly to your MySQL container <span class="pma-url"><?php echo htmlspecialchars($phpmyadmin_url); ?></span></p>
          </div>
        </div>
        <a class="btn btn-primary" href="<?php echo htmlspecialchars($phpmyadmin_url); ?>" target="_blank" rel="noopener">Open phpMyAdmin →</a>
      </div>
    </section>

    <!-- ABOUT -->
    <section id="about" class="wrap about">
      <div class="reveal">
        <span class="section-tag">/// about</span>
        <h2 style="font-size:clamp(26px,3vw,34px); letter-spacing:-0.01em; margin-bottom:14px;">Built by DrkF0rest</h2>
        <p style="color:var(--slate); font-size:15.5px; margin-bottom:24px;">DocAMPP is an open-source project built to speed up local development setup. Follow its progress or contribute on GitHub.</p>
        <a class="btn btn-ghost" href="<?php echo htmlspecialchars("https://github.com/DrkF0rest"); ?>" target="_blank" rel="noopener">
          <svg width="16" height="16" viewBox="0 0 16 16" fill="currentColor">
            <path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.01 8.01 0 0016 8c0-4.42-3.58-8-8-8z" />
          </svg>
          github.com/DrkF0rest
        </a>
      </div>
      <div class="about-card reveal">
        <div class="gh-row">
          <div>
            <div class="gh-name">Container Information</div>
            <div class="gh-handle">Docker</div>
          </div>
        </div>
        <ul class="meta-list">
          <li><span>Server</span><span><?php echo htmlspecialchars($server_software); ?></span></li>
          <li><span>PHP version</span><span><?php echo htmlspecialchars($php_version); ?></span></li>
        </ul>
      </div>
    </section>

  </main>

  <footer>
    <div class="wrap">
      <p>&copy; <?php echo date('Y'); ?> DocAMPP — built by DrkF0rest.</p>
    </div>
  </footer>

  <script>
    (function() {
      var toggle = document.getElementById('themeToggle');
      var root = document.documentElement;

      function isDark() {
        return root.getAttribute('data-theme') === 'dark';
      }

      function setTheme(dark) {
        root.setAttribute('data-theme', dark ? 'dark' : 'light');
        toggle.setAttribute('aria-pressed', dark ? 'true' : 'false');
        try {
          localStorage.setItem('DocAMPP-theme', dark ? 'dark' : 'light');
        } catch (e) {}
      }

      // Sync the toggle's a11y state with whatever the inline head script set.
      setTheme(isDark());

      toggle.addEventListener('click', function() {
        setTheme(!isDark());
      });

      // Reveal-on-scroll animations for sections below the fold.
      var revealEls = document.querySelectorAll('.reveal');
      if ('IntersectionObserver' in window && revealEls.length) {
        var observer = new IntersectionObserver(function(entries) {
          entries.forEach(function(entry) {
            if (entry.isIntersecting) {
              entry.target.classList.add('in-view');
              observer.unobserve(entry.target);
            }
          });
        }, {
          threshold: 0.15,
          rootMargin: '0px 0px -40px 0px'
        });

        revealEls.forEach(function(el) {
          observer.observe(el);
        });
      } else {
        revealEls.forEach(function(el) {
          el.classList.add('in-view');
        });
      }
    })();
  </script>

</body>

</html>
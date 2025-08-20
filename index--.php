<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Centre for Postgraduate Studies - QIU</title>
  <link rel="icon" href="favicon.ico" type="image/x-icon" />
  <style>
    :root {
      --bg-color: #f4f4f4;
      --text-color: #000;
      --header-bg: linear-gradient(to right, red, black);
      --menu-bg: rgba(0, 0, 0, 0.95);
      --section-bg: white;
    }

    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    html, body {
      height: 100%;
      font-family: Arial, sans-serif;
      scroll-behavior: smooth;
      background-color: var(--bg-color);
      color: var(--text-color);
    }

    body {
      display: flex;
      flex-direction: column;
      min-height: 100vh;
    }

    header {
      background: var(--header-bg);
      color: white;
      padding: 10px 20px;
      border-bottom: 1px solid #b71c1c;
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      z-index: 1001;
      height: 70px;
    }

    .header-inner {
      display: flex;
      align-items: center;
      justify-content: space-between;
      height: 100%;
    }

    .left-group {
      display: flex;
      align-items: center;
      gap: 10px;
    }

    header img {
      height: 45px;
    }

    header h1 {
      font-size: 20px;
      flex: 1;
      text-align: right;
    }

    .hamburger {
      width: 24px;
      height: 18px;
      cursor: pointer;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      transition: transform 0.3s ease-in-out;
    }

    .hamburger span {
      height: 2px;
      background: white;
      border-radius: 1px;
      transition: all 0.3s ease-in-out;
      transform-origin: center;
    }

    .hamburger.open span:nth-child(1) {
      transform: rotate(45deg) translate(5px, 5px);
    }

    .hamburger.open span:nth-child(2) {
      opacity: 0;
    }

    .hamburger.open span:nth-child(3) {
      transform: rotate(-45deg) translate(5px, -5px);
    }

    .overlay-menu {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100vh;
      background-color: var(--menu-bg);
      z-index: 1000;
      display: none;
      overflow-y: auto;
      padding: 30px;
      box-sizing: border-box;
      flex-direction: column;
    }

    .overlay-menu.active {
      display: flex;
    }

    .overlay-menu-wrapper {
      display: flex;
      flex-direction: column;
      gap: 40px;
    }

    .overlay-menu-row {
      display: grid;
      grid-template-columns: repeat(5, 1fr);
      gap: 40px;
    }

    .menu-column {
      min-width: 200px;
    }

    .menu-header {
      color: #fff;
      font-size: 22px;
      margin-top: 10px;
      margin-bottom: 10px;
      border-bottom: 1px solid #555;
      padding-bottom: 5px;
    }

    .menu-link {
      font-size: 20px;
      font-weight: bold;
      color: #fff;
      text-decoration: none;
      display: block;
      margin-bottom: 10px;
      transition: color 0.2s ease;
    }

    .menu-link:hover {
      color: #00aced;
      cursor: pointer;
    }

    .submenu {
      margin-left: 15px;
    }

    .submenu-link {
      font-size: 16px;
      color: #ddd;
      text-decoration: none;
      display: block;
      margin: 4px 0;
      padding-left: 10px;
      transition: color 0.2s ease;
    }

    .submenu-link:hover {
      color: #00aced;
      cursor: pointer;
    }

    .breadcrumb {
      padding: 10px 20px;
      font-size: 14px;
    }

    .breadcrumb a {
      color: var(--text-color);
      text-decoration: none;
      font-weight: bold;
    }

    .breadcrumb .divider {
      margin: 0 5px;
      color: #666;
    }

    .content-wrapper {
      flex: 1;
      padding: 20px;
    }

    section {
      padding: 30px;
      margin: 0 auto;
      width: 100%;
      max-width: 1000px;
      background: var(--section-bg);
      box-shadow: 0 2px 6px rgba(0,0,0,0.15);
      border-radius: 8px;
      animation: fadeIn 0.5s ease-in-out;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }

    footer {
      background-color: #000;
      color: white;
      text-align: center;
      padding: 15px;
    }

    /* Image Slider Styles */
    .image-slider {
      margin-top: 70px; /* height of fixed header */
      width: 100%;
      height: 100%; /* Increased height from 300% to 500px */
      overflow: hidden;
      position: relative;
    }

    .slides {
      display: flex;
      transition: transform 0.8s cubic-bezier(0.4, 0, 0.2, 1); /* Smoother easing */
      width: 400%; /* 4 images × 100% each */
      height: 100%;
    }

    .slides img {
      width: 25%; /* Each image takes 25% of the total width (100% / 4 images) */
      height: 100%;
      object-fit: fill; /* Changed from 'fill' to 'cover' for better aspect ratio */
      flex-shrink: 0; /* Prevent images from shrinking */
    }

    .slider-dots {
      position: absolute;
      bottom: 20px;
      left: 50%;
      transform: translateX(-50%);
      display: flex;
      gap: 10px;
      z-index: 2;
    }

    .slider-dot {
      width: 12px;
      height: 12px;
      background: rgba(255,255,255,0.7);
      border-radius: 50%;
      cursor: pointer;
      transition: all 0.3s ease;
    }

    .slider-dot:hover {
      background: rgba(255,255,255,0.9);
      transform: scale(1.1);
    }

    .slider-dot.active {
      background: #fff;
      transform: scale(1.2);
    }

    @media (max-width: 768px) {
      header {
        padding: 8px 12px;
        height: 60px;
      }

      header h1 {
        font-size: 15px;
      }

      .image-slider {
        margin-top: 60px;
        height: 300px; /* Smaller height for mobile */
      }

      .breadcrumb {
        font-size: 13px;
        margin-top: 10px;
      }

      section {
        padding: 20px 15px;
        font-size: 15px;
      }

      .overlay-menu-row {
        grid-template-columns: 1fr;
      }

      .overlay-menu a {
        font-size: 20px;
        margin: 12px 0;
      }

      .content-wrapper {
        padding: 10px;
      }

      footer {
        font-size: 13px;
        padding: 10px;
      }
    }
  </style>
</head>
<body>

<header>
  <div class="header-inner">
    <div class="left-group">
      <div class="hamburger" onclick="toggleMenu()">
        <span></span>
        <span></span>
        <span></span>
      </div>
      <img src="logo.png" alt="QIU Logo">
    </div>
    <h1>Centre for Postgraduate Studies</h1>
  </div>
</header>

<!-- Slider Section -->
<div class="image-slider" id="imageSlider">
  <div class="slides" id="slides">
    <img src="ds1.png" alt="Slide 1">
    <img src="ds2.png" alt="Slide 2">
    <img src="ds3.png" alt="Slide 3">
    <img src="ds4.png" alt="Slide 4">
  </div>
  <div class="slider-dots" id="sliderDots">
    <div class="slider-dot active" data-index="0"></div>
    <div class="slider-dot" data-index="1"></div>
    <div class="slider-dot" data-index="2"></div>
    <div class="slider-dot" data-index="3"></div>
  </div>
</div>

<!-- Overlay menu -->
<div id="overlayMenuContainer"></div>

<div class="breadcrumb" id="breadcrumb">
  <a href="#" class="breadcrumb-link" data-target="home">Home</a>
</div>


<h2>Welcome to the Centre</h2>
<p>Explore our advanced programmes designed to cultivate leaders and researchers in various disciplines at QIU.

<br><br><br><br><br><br><br><br><br><br><br>
Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
<br><br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br><br>

</p>


<?php /*include("./sections/home.html"); */ ?>


<!--<div class="content-wrapper" id="content">
  <br><br><br><br><br>
</div>-->

<footer>
  &copy; 2025 Centre for Postgraduate Studies, QIU
</footer>

<script>
  const hamburger = document.querySelector('.hamburger');
  const content = document.getElementById('content');
  const breadcrumb = document.getElementById('breadcrumb');

  function toggleMenu() {
    const overlay = document.getElementById('overlayMenu');
    hamburger.classList.toggle('open');
    overlay?.classList.toggle('active');
  }

  function attachMenuListeners() {
    const links = document.querySelectorAll('.menu-link, .submenu-link');
    links.forEach(link => {
      link.addEventListener('click', e => {
        e.preventDefault();
        const target = link.getAttribute('data-target');
        if (target) loadSection(target);
      });
    });
  }

  function updateBreadcrumb(id) {
    const title = document.querySelector('#content h2')?.textContent || '';
    breadcrumb.innerHTML = `
      <a href="#" class="breadcrumb-link" data-target="home">Home</a>
      ${id !== 'home' ? `<span class="divider">›</span><a href="#" class="breadcrumb-link" data-target="${id}">${title}</a>` : ''}
    `;
    document.querySelectorAll('.breadcrumb-link').forEach(link => {
      link.addEventListener('click', e => {
        e.preventDefault();
        loadSection(link.getAttribute('data-target'));
      });
    });
  }

  async function loadSection(id) {
    try {
      const res = await fetch(`sections/${id}.html`);
      const html = await res.text();
      content.innerHTML = `<section>${html}</section>`;
      updateBreadcrumb(id);
    } catch {
      content.innerHTML = `<section><h2>404</h2><p>Page not found.</p></section>`;
    }

    const overlay = document.getElementById('overlayMenu');
    overlay?.classList.remove('active');
    hamburger.classList.remove('open');
  }

  // Load overlay menu and initialize
  fetch('overlay-menu.html')
    .then(res => res.text())
    .then(html => {
      document.getElementById('overlayMenuContainer').innerHTML = html;
      setTimeout(() => attachMenuListeners(), 0);
      loadSection('home');
    });

  // Enhanced Slider Logic
  const slides = document.getElementById('slides');
  const dots = document.querySelectorAll('.slider-dot');
  let currentIndex = 0;
  let isTransitioning = false;

  function showSlide(index, smooth = true) {
    if (isTransitioning && smooth) return; // Prevent multiple rapid transitions
    
    isTransitioning = true;
    currentIndex = index;
    
    // Apply transition
    slides.style.transform = `translateX(-${25 * index}%)`;
    
    // Update dots
    dots.forEach((dot, i) => {
      dot.classList.toggle('active', i === index);
    });
    
    // Reset transition flag after animation completes
    setTimeout(() => {
      isTransitioning = false;
    }, 800); // Match the CSS transition duration
  }

  function nextSlide() {
    const nextIndex = (currentIndex + 1) % dots.length;
    showSlide(nextIndex);
  }

  // Auto-advance slider
  let sliderInterval = setInterval(nextSlide, 5000); // Changed to 5 seconds for better UX

  // Dot click handlers
  dots.forEach((dot, index) => {
    dot.addEventListener('click', () => {
      clearInterval(sliderInterval);
      showSlide(index);
      // Restart auto-advance after user interaction
      sliderInterval = setInterval(nextSlide, 5000);
    });
  });

  // Pause auto-advance on hover
  const slider = document.getElementById('imageSlider');
  slider.addEventListener('mouseenter', () => {
    clearInterval(sliderInterval);
  });

  slider.addEventListener('mouseleave', () => {
    sliderInterval = setInterval(nextSlide, 5000);
  });

  // Initialize slider
  showSlide(0, false);
</script>
</body>
</html>
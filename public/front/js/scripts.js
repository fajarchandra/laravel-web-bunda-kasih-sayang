/*!
* Start Bootstrap - Blog Home v5.0.9 (https://startbootstrap.com/template/blog-home)
* Copyright 2013-2023 Start Bootstrap
* Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-blog-home/blob/master/LICENSE)
*/
// This file is intentionally blank
// Use this file to add JavaScript to your project

// js Navbar
document.addEventListener("scroll", function () {
    const navbar = document.querySelector(".custom-navbar");
  
    if (window.scrollY > 50) { // Jika scroll lebih dari 50px
      navbar.classList.add("scrolled"); //tambah class scroled
    } else {
      navbar.classList.remove("scrolled"); //jika tidak di scroll jangan tambahkan class
    }
  });
  // end JS Navbar
  

 
  
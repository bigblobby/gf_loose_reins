/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you require will output into a single css file (app.css in this case)
require('../scss/app.scss');

// Need jQuery? Install it with "yarn add jquery", then uncomment to require it.
//const $ = require('jquery');
import $ from 'jquery';

$(document).ready(function(){

    // SCROLL EVENTS:
    // Stick the navigation to the top on scroll
    $(window).on('scroll', function(){
       if(window.pageYOffset > 1) {
           $('.header-container').addClass('scrolling');
       } else {
           $('.header-container').removeClass('scrolling');
       }

       // Hide the sticky social icons when close to the footer
       if(window.innerHeight + window.pageYOffset >= document.body.offsetHeight - 200){
           $('.sticky-social-icons').addClass('active');
       } else {
           $('.sticky-social-icons').removeClass('active');
       }
    });
});

// Navigation Burger Menu
(function(){
    let nav = document.querySelector('.bottom-nav');
    let btn = document.querySelector('.mobile-menu-btn');

    btn.addEventListener('click', function(e){
        if(nav.style.height){
            nav.style.height = null;
            btn.classList.remove('active');
        } else {
            nav.style.height = nav.scrollHeight + 'px';
            btn.classList.add('active');
        }
    });
})();

// Close the burger menu when expanding width to desktop width (and change 'x' back to 3 lines)
(function(){
    let nav = document.querySelector('.bottom-nav');
    let btn = document.querySelector('.mobile-menu-btn');

    window.addEventListener('resize', function(){
       if(window.innerWidth > 993){
           nav.setAttribute("style", "");
           btn.classList.remove('active');
       }
    });
})();

// Sticky 'book now' button
(function(){
    let bookNowBtn = document.querySelector('.booking-button');
    let bookingBar = document.querySelector('.booking-bar');

    bookNowBtn.addEventListener('click', function(){
        if(bookingBar.classList.contains('active')){
            bookingBar.classList.remove('active');
            bookNowBtn.textContent = 'Book Now';
        } else {
            bookingBar.classList.add('active');
            bookNowBtn.textContent = 'Close';
        }
    });
})();

// Change the header banner image on mobile (move it down)
(function(){
    let headerContainer = document.querySelector('.header-container');
    let pageHeader = document.querySelector('.page-header');

    window.addEventListener('load', changePadding);
    window.addEventListener('resize', changePadding);

    function changePadding(){
        if(location.pathname !== '/') {
            if (window.innerWidth < 992) {
                pageHeader.setAttribute('style', "padding-top:" + headerContainer.clientHeight + "px");
            } else {
                pageHeader.setAttribute('style', "padding-top: 0px");
            }
        }
    }
})();























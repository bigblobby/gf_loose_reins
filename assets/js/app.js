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

    $('.mobile-menu-btn').on('click', function(){

        //$('.main-navigation-container').toggleClass('active');

    });
});

// Navigation Burger Menu
(function(){
    let nav = document.querySelector('.main-navigation');
    let btn = document.querySelector('.mobile-menu-btn');

    btn.addEventListener('click', function(e){
        if(nav.style.height){
            nav.style.height = null;
        } else {
            nav.style.height = nav.scrollHeight + 'px';
        }
    });
})();

// Close the burger menu when expanding width to desktop width
(function(){
    let nav = document.querySelector('.main-navigation');

    window.addEventListener('resize', function(){
        console.log(window.innerWidth);
       if(window.innerWidth > 993){
           console.log(nav.setAttribute("style", ""));
       }
    });
})();

//Navigation stick on scroll
(function(){
    let mainNav = document.querySelector('.header-container');

    window.addEventListener('scroll', function(){
        if(window.scrollY > 1){
            // mainNav.style.position = 'fixed';
            // mainNav.style.left = 0;
            // mainNav.style.right = 0;
            mainNav.classList.add('scrolling');
        } else {
            //mainNav.style.position = 'static';
            mainNav.classList.remove('scrolling');
        }
    });
})();



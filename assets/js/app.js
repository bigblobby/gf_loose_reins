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



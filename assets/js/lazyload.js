// If you are forEach-ing over an array DO NOT splice the same array
// and expect the looping to continue. It will NOT, it will break the loop.
// you have to reverse over the array with a for loop so you don't break the indexing.
// splice will disrupt the indexing.


// document.addEventListener("DOMContentLoaded", function() {
//     let lazyImages = [].slice.call(document.querySelectorAll("img.lazy"));
//     let active = false;
//
//     function lazyLoad() {
//         if (active === false) {
//             active = true;
//
//             setTimeout(function() {
//                 lazyImages.forEach(function(lazyImage, index) {
//                     console.log(lazyImage, index);
//                     if ((lazyImage.getBoundingClientRect().top <= window.innerHeight && lazyImage.getBoundingClientRect().bottom >= 0) && getComputedStyle(lazyImage).display !== "none") {
//                         lazyImage.src = lazyImage.dataset.src;
//
//
//                         lazyImages.splice(index, 1);
//
//                         lazyImage.classList.remove("lazy");
//                         // Remove listeners when all lazy images have loaded
//                         if (lazyImages.length === 0) {
//                             document.removeEventListener("scroll", lazyLoad);
//                             window.removeEventListener("resize", lazyLoad);
//                             window.removeEventListener("orientationchange", lazyLoad);
//                         }
//                     }
//                 });
//
//                 active = false;
//             }, 200);
//         }
//     }
//
//     lazyLoad();
//
//     document.addEventListener("scroll", lazyLoad);
//     window.addEventListener("resize", lazyLoad);
//     window.addEventListener("orientationchange", lazyLoad);
// });



/*----------READ ABOVE FOR WHY THIS HAS BEEN KEPT----------*/

document.addEventListener("DOMContentLoaded", function() {
    let lazyImages = [].slice.call(document.querySelectorAll("img.lazy"));
    let active = false;

    function lazyLoad() {
        if (active === false) {
            active = true;

            setTimeout(function() {
                for(i = lazyImages.length - 1; i >= 0; i -=1){
                    if ((lazyImages[i].getBoundingClientRect().top <= window.innerHeight && lazyImages[i].getBoundingClientRect().bottom >= 0) && getComputedStyle(lazyImages[i]).display !== "none") {
                        lazyImages[i].src = lazyImages[i].dataset.src;

                        lazyImages.splice(i, 1);

                        lazyImages[i].classList.remove("lazy");
                        // Remove listeners when all lazy images have loaded
                        if (lazyImages.length === 0) {
                            document.removeEventListener("scroll", lazyLoad);
                            window.removeEventListener("resize", lazyLoad);
                            window.removeEventListener("orientationchange", lazyLoad);
                        }
                    }
                }
                active = false;
            }, 200);
        }
    }

    lazyLoad();

    document.addEventListener("scroll", lazyLoad);
    window.addEventListener("resize", lazyLoad);
    window.addEventListener("orientationchange", lazyLoad);
});
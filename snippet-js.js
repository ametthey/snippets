/************************************************
 * Getting a random value from a JavaScript array
 ***********************************************/

// Array of names
const myArray = [ 'Romain', 'Fred', 'Vincent', 'Louis', 'Thomas', 'Tim' ];
const randomItem = Math.floor( Math.random() * myArray.length );

console.log( myArray[randomItem] ); // will out a random value of myArray


/************************************************
 * Back to top
 ***********************************************/

// add to the html tag
scroll-behavior: smooth;

// target the selector of back to top button
const scrollToTopButton = document.querySelector('.button__top');

// Function to make the page go up to to the top
const scrollToTop = () => {
    const c = document.documentElement.scrollTop || document.body.scrollTop;
    // https://developer.mozilla.org/en-US/docs/Web/API/window/requestAnimationFrame
    if (c > 0) {
        window.scrollToTop;
        window.scrollTo(0, c - c / 0.5);
    }
};

// if button exist, execute the function
if ( scrollToTopButton ) {
    scrollToTopButton.onclick = function(e) {
        e.preventDefault();
        scrollToTop();
    }
}

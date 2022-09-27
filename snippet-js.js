
/************************************************
 * useful values
 ***********************************************/

const element = document.querySelector('.element');
const distanceFromTop = e.currentTarget.scrollTop; // how
element.addEventListener( 'scroll', (e) => {
    console.log(`La distance entre la distance actuelle et le haut de l'élement est ${distanceFromTop}`);
});



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
function backToTop() {
    const container = document.querySelector('.container-archive-list');
    const button = document.querySelector(".footer-back-to-top")
    container.addEventListener('scroll', () => {
        if (container.offsetHeight + container.scrollTop >= container.scrollHeight) {

            button.classList.add('visible');

            button.addEventListener("click", scrollToTop)

            function scrollToTop() {
                container.scrollTo({
                    top: 0,
                    behavior: "smooth"
                })
            }
        } else {
            button.classList.remove('visible');
        }
    });
}



/************************************************
 * Random Number with 3 digits
 ***********************************************/

Math.floor(Math.random()*(999-100+1)+100);

/************************************************
 * Random Number with 2 digits
 ***********************************************/
Math.floor(Math.random() * 100)

/****************************************************
* Fade In when images in 200px in viewport
* *************************************************/
if(!!window.IntersectionObserver){
	let observer = new IntersectionObserver((entries, observer) => {
		entries.forEach(entry => {
		if(entry.isIntersecting){
			console.log(entry.target.src);
			observer.unobserve(entry.target);
		}
		});
	}, {rootMargin: "0px 0px -200px 0px"});
	document.querySelectorAll('img').forEach(img => { observer.observe(img) });
}

else document.querySelector('#warning').style.display = 'block';




/************************************************
 * Intersection Observer
 * querySelectorAll
 * adding and removing is-visible class
 ***********************************************/
const observerOptions = {
    root: null,
    threshold: 0,
    rootMargin: '0px 0px -50px 0px'
};

const observer = new IntersectionObserver(entries => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('in-view');
            observer.unobserve(entry.target);
        }
    });
}, observerOptions);

window.addEventListener('DOMContentLoaded', (event) => {

    const sections = Array.from(document.getElementsByClassName('section'));

    for (let section of sections) {
        observer.observe(section);
    }

});


/************************************************
 * Class declaration
 * exemple with Dog
 ***********************************************/

// Class declaration
class Dog {
    // We need this to declare arguments
    constructor(name, breed) {
        this.name = name;
        this.breed = breed;
    }
    // Example of a method
    bark() {
        console.log(`This is a method for bark`);
    }
    // This is a static method that can be called on the class directly
    // Dog.info
    static info() {
        console.log('this is a very important information');
    }

    // we can get information GETTER
    get description() {
        return `${this.name} is a ${this.breed} type of dog`
    }

    // we can set a new information SETTER
    set nicknames(value) {
        this.nick = value.trim();
    }

    // we can get infor from new setter
    get nicknames() {
        return this.nick;
    }
}

// we use the class the create a new Dog
const dolly = Dog( 'Dolly', 'levrier' );

// we use the method bark of the class Dog
dolly.bark();

/************************************************
 * Snippet to get the position of the mouse
 ***********************************************/

window.addEventListener( 'mousemove', (event) => {
    console.log( event.clientX, event.clientX );
});


const cursor = {
    x: 0,
    y: 0
}
window.addEventListener( 'mousemove', (event) => {
    cursor.x = event.clientX / sizes.width - 0.5
    cursor.y = event.clientY / sizes.height - 0.5
});

/************************************************
 * Regex
 * Replace whitespace by character
 ***********************************************/
const title = 'Je suis là';
title.replace(/\s/g, '+');
console.log(title)
'Je+suis+là';

/************************************************
 * Detect inactivity on mousemove and keydown
 ***********************************************/
var inactivityTime = function () {
    var time;
    window.onload = resetTimer;
    // DOM Events
    document.onmousemove = resetTimer;
    document.onkeypress = resetTimer;

    function fadeOut() {
        // Here create the function you want to be executed
    }

    function resetTimer() {
        clearTimeout(time);
        time = setTimeout(fadeOut, 6000)
    }
};

inactivityTime();

/************************************************
 * Close with esc key
 ***********************************************/

document.addEventListener('keydown', function(e) {
    let keyCode = e.keyCode;
    if (keyCode === 27) {//keycode is an Integer, not a String

    }
});


/************************************************
 * Transform number from 1 to 01
 * https://gist.github.com/niksumeiko/6856869
 ***********************************************/
function numberToDay(j) {
    return ('0' + j).slice(-2);
}

console.log( numberToDay(8) ); // output 08

/************************************************
 * Fade background color on scroll
 ***********************************************/

let last_known_scroll_position = 0;
let ticking = false;

// A PROPOS
const element = document.querySelector('.content--apropos');
const elementHeight = document.querySelector('.content--apropos').clientHeight;
const half = elementHeight / 2;

function fadeBackgroundColor(scroll_pos) {

    // ADD CLASS TO FADE AT HALF THE POSITION
    if ( scroll_pos < half ) {
        element.classList.remove('is-fading');
    } else if ( scroll_pos > half) {
        element.classList.add('is-fading');
    }

}

window.addEventListener('scroll', function(e) {
    last_known_scroll_position = window.scrollY;

    if (!ticking) {
        window.requestAnimationFrame(function() {
            fadeBackgroundColor(last_known_scroll_position);
            ticking = false;
        });

        ticking = true;
    }
});


/************************************************
 * Mutation Observer for appendChild
 ***********************************************/

var observer = new MutationObserver(function(mutations) {
    for (var i = 0; i < mutations.length; i++) {
        var mutation = mutations[i];
        switch(mutation.type) {
            case 'childList':
                console.log(mutation.addedNodes);
                break;
            default:

        }
    }
});

// HERE ARE THE STUFF TO CHANGE IF WE WANT SOMETHING ELSE THAN APPENDCHILD
observer.observe(document, {
    childList: true,
    subtree: true,
    attributes: true,
    characterData: true
});

/***********************************************************
 * Hide the header is contentHome is scrolled more than 50px
 **********************************************************/
const header = document.querySelector('.header-home');
const contentHome = document.querySelector('.content--home');
contentHome.addEventListener( 'scroll', (e) => {
    var scrollPosition = contentHome.scrollTop;
    if ( scrollPosition >= 50 ) {
        header.classList.add('is-hidden');
    } else {
        header.classList.remove('is-hidden');
    }

});

/***********************************************************
 * Set multiples setAttribute
 **********************************************************/
function setAttributes(el, attrs) {
    for(var key in attrs) {
        el.setAttribute(key, attrs[key]);
    }
}

// Example
setAttributes(elem, {"src": "http://example.com/something.jpeg", "height": "100%", ...});

/***********************************************************
 * Get mouse position
 **********************************************************/
// Gets the mouse position
const getMousePos = e => {
    return {
        x : e.clientX,
        y : e.clientY
    };
};

/***********************************************************
 * Jquery Anonymous function
 ***********************************************************/
( function ( $ ) {
    // Expressions
} )( jQuery );

/*******************************************************
* HELPER FOR GETTING STROKE DASHARRAY and STROKE OFFSET
* *****************************************************/
function getStrokeDasharrayDashoffset() {
    const path = document.querySelector('.svg-element path');
    const pathL = path.getTotalLength();
    console.log( pathL );
}
getStrokeDasharrayDashoffset();

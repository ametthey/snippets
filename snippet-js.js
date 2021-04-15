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


/************************************************
 * Random Number with 3 digits
 ***********************************************/

Math.floor(Math.random()*(999-100+1)+100);


/************************************************
 * Intersection Observer
 * querySelectorAll
 * adding and removing is-visible class
 ***********************************************/

let sections = document.querySelectorAll(".swiper-container-vertical .swiper-slide");
const options = {
  root: null,
  rootMargin: '0px',
};

observer = new IntersectionObserver(entries => {
  entries.forEach(entry => {
    if (entry.intersectionRatio > 0) {
        entry.target.classList.add('is-visble');
    } else {
        entry.target.classList.remove('is-visible');
    }
  });
});

sections.forEach(section => observer.observe(section));


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

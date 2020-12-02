let scene, camera, renderer;

let add = 0.01;


// set up the environment -
// initiallize scene, camera, objects and renderer
let init = function() {
    // create the scene
    scene = new THREE.Scene();
    scene.background = new THREE.Color(0xababab);

    // create an locate the camera
    camera = new THREE.PerspectiveCamera(30,
        window.innerWidth / window.innerHeight,
        1, 1000);
    camera.position.z = 5;


    // create the renderer
    renderer = new THREE.WebGLRenderer();
    renderer.setSize(window.innerWidth, window.innerHeight);

    // append the canvas to the dom
    document.body.appendChild(renderer.domElement);

};


// main animation loop - calls 50-60 in a second.
let mainLoop = function() {
    console.log("Hello");
    renderer.render(scene, camera);
    requestAnimationFrame(mainLoop);
};

init();
mainLoop();



/*
 * Helper Functions
 */

// help loop our form in the viewport
// check threeJS udemy course
if (form.position.x > 6 || form.position.x < -6) {
    add *= -1;
}


// create a Sphere
/*
 * To work we need:
 * 1. declare sphere at the top
 * 2. call the function on the init function
 */
let createSphere = function() {
    let geometry = new THREE.SphereGeometry(5, 30, 30, 0, Math.PI,
        0, Math.PI / 2);

    let material = new THREE.MeshBasicMaterial({color: 0xffffff,
        wireframe: true});

    sphere = new THREE.Mesh( geometry, material );
    scene.add(sphere);
};

// create a Torus
/*
 * To work we need:
 * 1. declare torus at the top
 * 2. call the function on the init function
 */
let createTorus = function() {
    let geometry = new THREE.TorusGeometry(5, 1, 30, 30, Math.PI);

    let material = new THREE.MeshBasicMaterial({color: 0xffffff,
        wireframe: true});


    torus = new THREE.Mesh( geometry, material );
    scene.add(torus);
};

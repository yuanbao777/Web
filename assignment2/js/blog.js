//function rand(min, max) {
    return Math.floor(Math.random() * max) + min;
  //}
  
  //document.querySelectorAll('.post:not(.featured)').forEach((post) => {
    //post.querySelector('.image').style.backgroundImage = `url("https://unsplash.it/300/300/?image=${rand(100, 1000)}")`;
  //});

  fetch('get-posts.php')
    .then(response => response.json())
    .then(posts => {
    
    });
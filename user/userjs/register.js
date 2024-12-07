 // JavaScript to control the image slide effect
 const showFirstImageButton = document.getElementById("showFirstImageButton");
 const showSecondImageButton = document.getElementById("showSecondImageButton");
 const image1 = document.getElementById("image1");
 const image2 = document.getElementById("image2");

 // Function to show the first image with slide effect
 function showFirstImage() {
     image1.style.transform = "translateX(0)"; // Show image1 by setting translateX to 0
     image2.style.transform = "translateX(100%)"; // Hide image2 by moving it out of view
 }

 // Function to show the second image with slide effect
 function showSecondImage() {
     image1.style.transform = "translateX(-100%)"; // Move image1 out of view to the left
     image2.style.transform = "translateX(0)"; // Show image2 by setting translateX to 0
 }

 // Event listener for the first button
 showFirstImageButton.addEventListener("click", showFirstImage);

 // Event listener for the second button
 showSecondImageButton.addEventListener("click", showSecondImage);

 // Optional: Auto-slide images every 3 seconds
 let currentImage = 1;
 setInterval(() => {
     if (currentImage === 1) {
         showSecondImage();
         currentImage = 2;
     } else {
         showFirstImage();
         currentImage = 1;
     }
 }, 3000);
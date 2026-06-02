const bigPic = document.getElementById("bigPic");
const bigPicParent = document.getElementById("parent");

const images = document.querySelectorAll("img");
console.log(images);

images.forEach((img) => {
  img.addEventListener("click", () => {
    bigPic.src = img.src;
    bigPicParent.style.display = "block";
  });
});

document.querySelector(".close-btn").addEventListener("click", () => {
  bigPicParent.style.display = "none";
});

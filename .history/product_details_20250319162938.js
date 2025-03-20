// Quantity selector functions
function increaseQuantity() {
  const quantityInput = document.getElementById("quantity");
  const currentValue = parseInt(quantityInput.value);
  quantityInput.value = currentValue + 1;
}

function decreaseQuantity() {
  const quantityInput = document.getElementById("quantity");
  const currentValue = parseInt(quantityInput.value);
  if (currentValue > 1) {
    quantityInput.value = currentValue - 1;
  }
}

// Image zoom effect on hover
document.addEventListener("DOMContentLoaded", function () {
  const mainProductImage = document.querySelector(".product-main-img");

  if (mainProductImage) {
    mainProductImage.addEventListener("mousemove", function (e) {
      const zoomer = this;
      const offsetX = e.offsetX;
      const offsetY = e.offsetY;
      const x = (offsetX / zoomer.offsetWidth) * 100;
      const y = (offsetY / zoomer.offsetHeight) * 100;
      zoomer.style.backgroundPosition = x + "% " + y + "%";
    });
  }

  // Fade in animation for product details section
  const productSection = document.querySelector(".product-details-section");
  if (productSection) {
    setTimeout(() => {
      productSection.style.opacity = "1";
    }, 200);
  }

  // Initialize image switcher if additional product views exist
  const relatedImages = document.querySelectorAll(".related-product-img");
  relatedImages.forEach((img) => {
    img.addEventListener("click", function () {
      const mainImage = document.querySelector(".product-main-img");
      const tempSrc = mainImage.src;
      mainImage.src = this.src;
      this.src = tempSrc;
    });
  });
});

// Add smooth scroll effect
document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
  anchor.addEventListener("click", function (e) {
    e.preventDefault();
    const targetId = this.getAttribute("href");
    if (targetId !== "#") {
      document.querySelector(targetId).scrollIntoView({
        behavior: "smooth",
      });
    }
  });
});

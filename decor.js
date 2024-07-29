const image = document.querySelector("img");

image.addEventListener("mouseover", () => {
  image.src = image.dataset.src;
});
const sizeButtons = document.querySelectorAll(".size_shoes input[type='button']");
// Thêm sự kiện click cho từng nút
sizeButtons.forEach(button => {
  button.addEventListener("click", () => {
    // Xóa màu đen trên các nút khác nếu chúng đang được tô đen
    sizeButtons.forEach(otherButton => {
      otherButton.style.backgroundColor = "";
    });

    // Tô đen nút được click
    button.style.backgroundColor = "black";
  });
});
document.addEventListener("DOMContentLoaded", function () {
  var searchIcon = document.querySelector(".searching");
  var searchInput = document.getElementById("searchInput");

  searchIcon.addEventListener("click", function () {
      searchInput.classList.toggle("visible");
      if (searchInput.classList.contains("visible")) {
          searchInput.focus();
      }
  });

  searchInput.addEventListener("blur", function () {
      searchInput.classList.remove("visible");
  });
});

    function increaseQuantity() {
        var quantityInput = document.getElementById('quantity');
        var currentQuantity = parseInt(quantityInput.value);
        quantityInput.value = currentQuantity + 1;
    };

    function decreaseQuantity() {
        var quantityInput = document.getElementById('quantity');
        var currentQuantity = parseInt(quantityInput.value);
        
        if (currentQuantity > 1) {
            quantityInput.value = currentQuantity - 1;
        }
    };
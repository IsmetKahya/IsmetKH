document.addEventListener("DOMContentLoaded", function () {
    const modal = document.getElementById("modal");
    const openButtons = document.querySelectorAll(".open-modal-btn");
    const closeButton = document.querySelector("[data-action='close-modal']");

    const modalProductId = document.getElementById("modalProductId");
    const modalProductKey = document.getElementById("modalProductKey");
    const modalPriceNormal = document.getElementById("modal-price-normal");
    const modalPriceLarge = document.getElementById("modal-price-large");

    openButtons.forEach(button => {
        button.addEventListener("click", () => {
            const productId = button.dataset.id;
            const priceNormal = button.dataset.priceNormal;
            const priceLarge = button.dataset.priceLarge;

            modalProductId.value = productId;
            modalPriceNormal.textContent = Number(priceNormal).toFixed(2);
            modalPriceLarge.textContent = Number(priceLarge).toFixed(2);
            const radios = document.querySelectorAll("input[name='grootofklein']");
            radios.forEach(radio => {
                radio.addEventListener("change", () => {
                    const selectedSize = radio.value;
                    modalProductKey.value = `${productId}_${selectedSize}`;
                });
            });

            modal.classList.remove("hidden");
        });
    });

    closeButton.addEventListener("click", () => {
        modal.classList.add("hidden");
    });
});
document.getElementById("menu-button").addEventListener("click", function () {
        const mobileMenu = document.getElementById("mobile-menu");
        mobileMenu.classList.toggle("hidden");
            });


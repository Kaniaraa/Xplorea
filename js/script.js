document.addEventListener("DOMContentLoaded", function () {
    // expand login
    const loginToggle = document.getElementById('loginToggle');
    const loginExpand = document.getElementById('loginExpand');

    loginToggle.addEventListener('click', function (e) {
        e.preventDefault();
        loginExpand.classList.toggle('hidden');
    });

    document.addEventListener('click', function (e) {
        if (!loginToggle.contains(e.target) && !loginExpand.contains(e.target)) {
            loginExpand.classList.add('hidden');
        }
    });

    // expand artist
    const artistToggle = document.getElementById('artistToggle');
    const artistExpand = document.getElementById('artistExpand');

    artistToggle.addEventListener('click', function (e) {
        e.preventDefault();
        artistExpand.classList.toggle('hidden');
    });

    // Tutup saat klik di luar
    document.addEventListener('click', function (e) {
        if (!artistToggle.contains(e.target) && !artistExpand.contains(e.target)) {
            artistExpand.classList.add('hidden');
        }
    });

    // expand cart
    const cartToggle = document.getElementById('cartToggle');
    const cartExpand = document.getElementById('cartExpand');
    const closeCart = document.getElementById('closeCart');
    const overlay = document.getElementById('overlay');

    if (cartToggle && cartExpand && closeCart && overlay) {
        cartToggle.addEventListener('click', function (e) {
            e.preventDefault();
            cartExpand.classList.remove('hidden');
            overlay.classList.remove('hidden');
        });

        closeCart.addEventListener('click', function () {
            cartExpand.classList.add('hidden');
            overlay.classList.add('hidden');
        });

        // Klik di luar cart (klik overlay) -> tutup
        overlay.addEventListener('click', function () {
            cartExpand.classList.add('hidden');
            overlay.classList.add('hidden');
        });
    }
});
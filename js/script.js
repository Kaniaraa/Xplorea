document.addEventListener("DOMContentLoaded", function () {
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
});
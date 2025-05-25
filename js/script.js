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
});

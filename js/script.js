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

    const links = document.querySelectorAll(".artist-section-link");
    const sections = document.querySelectorAll("section");

    links.forEach(link => {
    link.addEventListener("click", function (e) {
      e.preventDefault(); // Hindari reload halaman
      const target = this.getAttribute("data-section");

      // Sembunyikan semua section
      sections.forEach(sec => sec.style.display = "none");

      // Tampilkan section yang sesuai
      const targetSection = document.querySelector("." + target);
      if (targetSection) {
        targetSection.style.display = "block";
      }
    });
  });


    fetch("get-artists.php")
    .then(res => res.json())
    .then(data => {
    const container = document.querySelector(".popular-artist"); // atau section lain

    data.forEach(artist => {
      // Nama artis
      const nameEl = document.createElement("h3");
      nameEl.textContent = artist.name;
      nameEl.style.color = "#d35400"; // misalnya style warna
      container.appendChild(nameEl);

      // Pembungkus barisan karya
      const artworkRow = document.createElement("div");
      artworkRow.classList.add("artwork-row");
      artworkRow.style.display = "flex";
      artworkRow.style.gap = "20px";
      artworkRow.style.flexWrap = "wrap";

      artist.artworks.forEach(art => {
        const wrapper = document.createElement("div");
        wrapper.style.textAlign = "center";

        const img = document.createElement("img");
        img.src = art.image;
        img.alt = art.title;
        img.style.width = "200px";

        const title = document.createElement("p");
        title.textContent = art.title;

        wrapper.appendChild(img);
        wrapper.appendChild(title);
        artworkRow.appendChild(wrapper);
      });

      container.appendChild(artworkRow);
    });
  })
  .catch(err => console.error("Gagal ambil data:", err));
  
});

document.addEventListener("DOMContentLoaded", function () {
    const cartBottom = document.querySelector('.cart-expand-bottom');
    const addToCartButtons = document.querySelectorAll('.add-to-cart');

    addToCartButtons.forEach(button => {
        button.addEventListener('click', function () {
            // Simulasikan bahwa barang berhasil ditambahkan
            cartBottom.style.display = 'flex'; 
        });
    });
});




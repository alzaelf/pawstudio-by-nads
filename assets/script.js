document.addEventListener('DOMContentLoaded', function() {
  const images = document.querySelectorAll('img[style*="animation: bounce"]');  
  images.forEach(img => {
    img.addEventListener('mouseover', function() {
      this.style.transform = 'scale(1.1)';  // Besarkan gambar saat hover
    });
    img.addEventListener('mouseout', function() {
      this.style.transform = 'scale(1)';  // Kembalikan ukuran
    });
  });
});

document.addEventListener('DOMContentLoaded', function() {
  const header = document.querySelector('.navbar');
  if (header) {
    window.addEventListener('scroll', function() {
      if (window.scrollY > 50) { 
        header.style.position = 'fixed';
        header.style.top = '0';
        header.style.width = '100%';
      } else {
        header.style.position = 'static';  
      }
    });
  }
});

<!doctype html>
<html lang="tr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Giriş Yap | Beyza Koyun</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Harici CSS -->
    <link rel="stylesheet" href="style.css" />
    <!-- Vue.js 3 Kütüphanesi -->
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
  </head>

  <body class="d-flex flex-column min-vh-100 theme-login">
    <!-- Navigasyon Menüsü -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container">
        <a class="navbar-brand" href="index.html">Beyza</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarLogin" aria-controls="navbarLogin" aria-expanded="false" aria-label="Menüyü Aç/Kapat">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarLogin">

          <ul class="navbar-nav ms-auto">
            <li class="nav-item"><a class="nav-link" href="index.html">Hakkında</a></li>
            <li class="nav-item"><a class="nav-link" href="ozgecmis.html">Özgeçmiş</a></li>
            <li class="nav-item"><a class="nav-link" href="sehrim.html">Şehrim</a></li>
            <li class="nav-item"><a class="nav-link" href="ilgialanlarim.html">İlgi Alanlarım</a></li>
            <li class="nav-item"><a class="nav-link" href="iletisim.html">İletişim</a></li>
            <li class="nav-item"><a class="nav-link btn btn-primary text-white ms-lg-2 active" href="login.php">Giriş Yap</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Vue.js'in Kontrol Edeceği Ana Alan (id="app") -->
    <main class="container mt-5 mb-5" id="app">
      <div class="row justify-content-center">
        <div class="col-md-5">
          <div class="card shadow border-0 rounded-3">
            <div class="card-header text-center py-3 border-bottom">
              <h4 class="mb-0">Öğrenci Girişi</h4>
            </div>
            <div class="card-body p-4">
              
              <!-- Vue ile Dinamik Hata Mesajı Gösterimi -->
              <div v-if="hatalar.length > 0" class="alert alert-danger shadow-sm">
                <b>Lütfen dikkat:</b>
                <ul class="mb-0 mt-1">
                  <li v-for="hata in hatalar">{{ hata }}</li>
                </ul>
              </div>

              <!-- Form: action="giris_kontrol.php" -->
              <form action="giris_kontrol.php" method="POST" @submit="formuDenetle">
                <div class="mb-3">
                  <label class="form-label fw-bold">Öğrenci E-Posta</label>
                  <input type="email" class="form-control" name="email" v-model="email" placeholder="b123456789@ogr.sakarya.edu.tr">
                </div>
                <div class="mb-4">
                  <label class="form-label fw-bold">Şifre (Okul Numaranız)</label>
                  <input type="password" class="form-control" name="sifre" v-model="sifre" placeholder="Şifrenizi girin">
                </div>
                <div class="d-grid mb-3">
                  <button type="submit" class="btn btn-primary btn-lg shadow-sm">Giriş Yap</button>
                </div>
                
                <!-- Yeni Eklenen Kayıt Ol Bölümü -->
                <div class="text-center border-top pt-3 mt-2">
                  <p class="text-muted mb-0">Sistemde hesabınız yok mu?</p>
                  <a href="#" @click.prevent="kayitUyarisiGoster" class="text-primary fw-bold text-decoration-none">Öğrenci Kaydı Oluştur</a>
                </div>

              </form>

            </div>
          </div>
        </div>
      </div>
    </main>

    <footer class="py-4 mt-auto footer-blue">
        <div class="container text-center">
            <div class="d-flex justify-content-center flex-wrap gap-4 mb-3">
                <a href="mailto:Koyunb9@gmail.com" class="text-white text-decoration-none d-flex align-items-center gap-2 hover-opacity">
                    <span class="fs-5">📧</span> <span>Koyunb9@gmail.com</span>
                </a>
                <a href="https://github.com/bk9-pixel" target="_blank" class="text-white text-decoration-none d-flex align-items-center gap-2 hover-opacity">
                    <span class="fs-5">💻</span> <span>GitHub</span>
                </a>
                <a href="https://www.linkedin.com/in/beyza-koyun-92264a38a/" target="_blank" class="text-white text-decoration-none d-flex align-items-center gap-2 hover-opacity">
                    <span class="fs-5">🔗</span> <span>LinkedIn</span>
                </a>
            </div>
            <p class="mb-0 text-muted small">&copy; 2026 Beyza Koyun - Tüm Hakları Saklıdır.</p>
        </div>
        <style>
            .hover-opacity { transition: opacity 0.3s ease; }
            .hover-opacity:hover { opacity: 0.7; color: var(--accent-green) !important; }
        </style>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Vue.js Kodları -->
    <script>
      const { createApp } = Vue;

      createApp({
        data() {
          return {
            email: '',
            sifre: '',
            hatalar: [] 
          }
        },
        methods: {
          formuDenetle(event) {
            this.hatalar = []; 

            if (!this.email) {
              this.hatalar.push('Öğrenci e-posta alanı boş bırakılamaz.');
            } else if (!this.gecerliEmail(this.email)) {
              this.hatalar.push('Lütfen geçerli bir e-posta adresi girin.');
            }

            if (!this.sifre) {
              this.hatalar.push('Şifre alanı boş bırakılamaz.');
            }

            if (this.hatalar.length > 0) {
              event.preventDefault(); 
            }
          },
          gecerliEmail(email) {
            const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return regex.test(email);
          },
          // Kayıt Ol butonuna tıklandığında çalışacak olan fonksiyon
          kayitUyarisiGoster() {
            alert("Üniversite sistemimize kayıtlar yalnızca Öğrenci İşleri Daire Başkanlığı tarafından otomatik olarak yapılmaktadır. Lütfen bölüm sekreterliğiniz ile iletişime geçin.");
          }
        }
      }).mount('#app');
    </script>
  </body>
</html>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giriş Durumu | Beyza Koyun</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6 mt-5">
                
                <?php
                // Sayfaya form doldurulmadan direkt gelinmesini engelliyoruz
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    
                    // Formdan gelen verileri temizleyip değişkenlere alıyoruz
                    $gelen_email = htmlspecialchars(trim($_POST['email']));
                    $gelen_sifre = htmlspecialchars(trim($_POST['sifre']));

                    // Okulun veritabanı gibi düşünebileceğimiz doğru bilgiler (Bunu kendine göre değiştirebilirsin)
                    $dogru_email = "b123456789@ogr.sakarya.edu.tr";
                    $dogru_sifre = "123456789";

                    // Gelen bilgilerle doğru bilgileri karşılaştırıyoruz
                    if ($gelen_email === $dogru_email && $gelen_sifre === $dogru_sifre) {
                        // GİRİŞ BAŞARILI EKRANI
                        echo '
                        <div class="card border-success shadow">
                            <div class="card-header bg-success text-white text-center">
                                <h3>Giriş Başarılı</h3>
                            </div>
                            <div class="card-body text-center p-5">
                                <h4 class="text-success mb-4">Hoşgeldin ' . $gelen_sifre . '</h4>
                                <p class="text-muted">Öğrenci sistemine başarıyla giriş yaptınız. Yönlendiriliyorsunuz...</p>
                                <a href="index.html" class="btn btn-outline-success mt-3 px-4">Ana Sayfaya Dön</a>
                            </div>
                        </div>';
                    } else {
                        // GİRİŞ BAŞARISIZ EKRANI (Hatalı Şifre)
                        echo '
                        <div class="card border-danger shadow">
                            <div class="card-header bg-danger text-white text-center">
                                <h3>Giriş Başarısız!</h3>
                            </div>
                            <div class="card-body text-center p-5">
                                <h5 class="text-danger mb-4">Hatalı E-Posta veya Şifre (Okul No) girdiniz.</h5>
                                <p class="text-muted">Lütfen Sakarya Üniversitesi öğrenci mailinizi ve numaranızı kontrol edip tekrar deneyin.</p>
                                <a href="login.php" class="btn btn-danger mt-3 px-4">Geri Dön ve Tekrar Dene</a>
                            </div>
                        </div>';
                    }

                } else {
                    // Form dışı erişim uyarısı
                    echo '
                    <div class="alert alert-warning text-center shadow">
                        <h4>İzinsiz Erişim!</h4>
                        <p>Bu sayfaya doğrudan giremezsiniz. Lütfen Giriş Yap sayfasını kullanın.</p>
                        <a href="login.php" class="btn btn-warning mt-2">Giriş Sayfasına Git</a>
                    </div>';
                }
                ?>

            </div>
        </div>
    </div>

</body>
</html>
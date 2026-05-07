<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mesaj Gönderildi | Beyza Koyun</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow border-0 rounded-3">
                    <div class="card-header bg-success text-white text-center py-3">
                        <h4 class="mb-0">Form Başarıyla İletildi!</h4>
                    </div>
                    <div class="card-body p-4">
                        <p class="text-muted mb-4 text-center">İletişim formundan gönderdiğiniz veriler PHP ile yakalandı ve aşağıda listelendi:</p>
                        
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <?php
                                // Formun POST metoduyla gönderilip gönderilmediğini kontrol ediyoruz
                                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                    
                                    // Verileri değişkene aktarıyoruz (Boşsa 'Belirtilmedi' yazacak)
                                    $isim = isset($_POST['isim']) ? htmlspecialchars($_POST['isim']) : 'Belirtilmedi';
                                    $soyisim = isset($_POST['soyisim']) ? htmlspecialchars($_POST['soyisim']) : 'Belirtilmedi';
                                    $email = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : 'Belirtilmedi';
                                    $sehir = isset($_POST['sehir']) ? htmlspecialchars($_POST['sehir']) : 'Belirtilmedi';
                                    $cinsiyet = isset($_POST['cinsiyet']) ? htmlspecialchars($_POST['cinsiyet']) : 'Belirtilmedi';
                                    $mesaj = isset($_POST['mesaj']) ? htmlspecialchars($_POST['mesaj']) : 'Belirtilmedi';
                                    $telefon  = isset($_POST['telefon']) ? htmlspecialchars($_POST['telefon']) : 'Belirtilmedi';
                                    $onay = isset($_POST['onay'])    ?    'Onaylandı'   : 'Onaylanmadı';


                                    // Verileri tablo satırları olarak ekrana basıyoruz
                                    echo "<tr><th style='width: 30%;'>Ad:</th><td>" . $isim . "</td></tr>";
                                    echo "<tr><th>Soyad:</th><td>" . $soyisim . "</td></tr>";
                                    echo "<tr><th>E-Posta:</th><td>" . $email . "</td></tr>";
                                    echo "<tr><th>Şehir:</th><td>" . $sehir . "</td></tr>";
                                    echo "<tr><th>Cinsiyet:</th><td>" . $cinsiyet . "</td></tr>";
                                    echo "<tr><th>Mesaj:</th><td>" . nl2br($mesaj) . "</td></tr>";
                                    echo "<tr><th>Telefon:</th><td>" . $telefon . "</td></tr>";
                                    echo "<tr><th>KVKK Onayı:</th><td>" . $onay . "</td></tr>";
                                    
                                } else {
                                    echo "<tr><td colspan='2' class='text-danger text-center'>Bu sayfaya doğrudan erişim yetkiniz yok. Lütfen formu kullanarak gelin.</td></tr>";
                                }
                                ?>
                            </tbody>
                        </table>

                        <div class="text-center mt-4">
                            <a href="iletisim.html" class="btn btn-outline-primary px-4">Geri Dön</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
<?php
    $message = '';
    $sendStatusMsg = '';

    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $uzrast = $_POST['uzrast'];
        $phone = $_POST['tel'];
        $honeypot = $_POST['honeypot'];

        // Validate input and check honeypot
        if(empty($name) || empty($uzrast) || empty($phone) || !empty($honeypot)){
            $message = $lang['global']['field-check'];
            $notSentClass = 'not-send';
        }
        else{
            // Send the email
            $to = 'markomarko988@gmail.com'; // Replace with your email address
            $subject = 'Stepko - Kontakt forma';
            $body = "Ime i prezime: $name\nUzrast: $uzrast\nBroj telefona: $phone";
            $body = iconv(mb_detect_encoding($body, mb_detect_order(), true), "UTF-8", $body);
            $headers = "Od: noreply@stepko.dance\r\n";
            $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
            
            if(mail($to, $subject, $body, $headers)) {
                $message = 'Poruka uspješno poslata!';
                $sendStatusMsg = 'send-success';
            }
            else{
                $message = 'Desila se greka pri slanju, pokušajte opet';
                $sendStatusMsg = 'send-fail';
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stepko</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/main.css">
</head>
<body>
    <header id="header">
        <nav>
            <a href="#radionice">Radionice</a>
            <a href="#top">
                <img src="assets/images/logo.svg" class="logo" alt="">
            </a>
            <a href="#kontakt">Kontakt</a>
        </nav>
    </header>
    <main>
        <section class="landing">
            <div class="section-container section-column-2">
                <div class="section-column landing-text">
                    <h1>Radost kretanja</h1>
                    <strong>Dijete je aktivno i koristi svoje tijelo kao „alat“ za izražavanje, upoznavanje, ovladavanje i kreiranje u procesu učenja o sebi, drugima i svojoj okolini.</strong>
                    <p>
                        Kretanje, pokret i igra imaju pozitvan uticaj i doprinose fizičkom i mentalnom zdravlju i razvoju djeteta. Stepko organizuje kreativne radionce plesa i sporta koje zadovoljavaju saznajne, socijalne i komunikativne potrebe djeteta, potrebe za pokretom, igrom i stvaranjem.</p>
                        <a href="#kontakt" class="btn btn-primary">Prijavite se <img src="assets/icons/down.svg" alt=""></a>
                </div>
                <div class="section-column section-column-center">
                    <div class="landing-image">
                    <img src="assets/images/balerina.jpg" alt="">
                    </div>
                </div>
            </div>
            <img src="assets/icons/yellow-rectangle.svg" alt="" class="yellow-rectangle">
            <img src="assets/icons/yellow-rectangle-blurred.svg" alt="" class="yellow-rectangle-blurred">
        </section>
        <section class="radionica" id="radionice">
            <div class="section-container section-column-2">
                <div class="section-column section-column-center">
                    <div class="image-container">
                        <img src="assets/images/noge-balerine.jpg" alt="">
                    </div>
                </div>
                <div class="section-column">
                    <h2>Radionice</h2>
                    <ul class="star-list">
                        <li>
                        Radionice se organizuju u skladu sa mogućnostima i potrebama određenog uzrasta djece
                        </li>
                        <li>Aktivnosti koje podstiču kvalitetan psihofizički razvoj djeteta</li>
                        <li>Sve aktivnosti realizuju se kroz igru i zabavu</li>
                        <li>PLES (usklađivanje pokreta i muzike, usvajanje i izvođenje koreografije)</li>
                        <li>Ø SPORT (vježbe, poligoni)</li>
                        <li>IGRA ( igre karakteristične za određeni uzrast)</li>
                    </ul>
                </div>
            </div>
            <img src="assets/icons/blue-circle.svg" alt="" class="blue-circle">
            <img src="assets/icons/blue-circle.svg" alt="" class="blue-circle2">
        </section>
        <section id="kontakt">
            <div class="contact">
            <form method="post" action="" class="contact-form" id="contact-form">
                    <h4>Prijavite se</h4>
                    <div class="form-field-2">
                        <div class="form-field">
                            <div class="form-group form-element">
                                <label for="name">Ime i prezime</label>
                                <input id="name" type="text" name="name" class="form-control" required="required" placeholder="" data-error="Obavezno polje" autocomplete="on">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="form-field">
                            <div class="form-group form-element">
                                <label for="uzrast">Uzrast</label>
                                <input id="uzrast" type="text" name="uzrast" class="form-control" required="required" placeholder="" data-error="Obavezno polje" autocomplete="on">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="form-field">
                            <div class="form-group form-element">
                                <label for="tel">Broj telefona</label>
                                <input id="tel" type="number" name="tel" class="form-control" required="required" placeholder="" data-error="Obavezno polje" autocomplete="on">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="form-field hidden-field">
                            <div class="form-group form-element">
                                <label for="honeypot">Leave this field blank:</label>
                                <input type="text" name="honeypot" id="honeypot">
                            </div>
                        </div>
                    </div>
                    <div class="messages"></div>
                    <div class="form-field">
                        <div class="form-element submit-form">
                            <div class="contact-buttons-wrapper">
                                <input type="submit" id="send-button" name="submit" value="Pošalji" class="btn btn-white">
                            </div>
                    </div>
                </form>
                <p class="message-on-submit <?= $sendStatusMsg; ?>"><?php echo $message; ?></p>
                <div class="contact-list">
                    <div class="contact-item">
                        <img src="assets/icons/email.svg" alt="">
                        <a href="mailto:prijave@stepko.dance">prijave@stepko.dance</a>
                    </div>
                    <div class="contact-item">
                        <img src="assets/icons/phone.svg" alt="">
                        <a href="tel:065 555 555">065 555 555</a>
                    </div>
                    <div class="contact-item">
                        <img src="assets/icons/location.svg" alt="">
                        <a href="#">Veljka Mlađenovića bb</a>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <script>
        // Get a reference to the header element
        const header = document.getElementById("header");

        // Function to handle scroll event
        function handleScroll() {
            if (window.pageYOffset > 100) {
                // Add the "scrolled" class when scrolled more than 100px
                header.classList.add("scrolled");
            } else {
                // Remove the "scrolled" class when scrolled less than 100px
                header.classList.remove("scrolled");
            }
        }

        // Add a scroll event listener to the window
        window.addEventListener("scroll", handleScroll);

    </script>
    <script src="assets/js/jquery-3.7.1.min.js"></script>
    <script src="assets/js/contact-form-validator.js"></script>
    <script>
			$('#contact-form').validator();
	</script>
</body>
</html>
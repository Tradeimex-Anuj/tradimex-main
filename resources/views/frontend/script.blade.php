<script src="https://www.google.com/recaptcha/api.js"></script>
<<<<<<< HEAD

=======
    
>>>>>>> 04a096cefd956ed8d5f5a9841a8da4ad0a300d9c
<script>
//   function onSubmit(token) {
//      document.getElementById("contactform").submit();
//   }
</script>

<script>
    grecaptcha.ready(() => {
        grecaptcha.execute('6LeMDa0pAAAAADpczSGmVwa78vlXEMlRW10UNaQa', { action: 'modal' }).then(token => {
            document.querySelector('#HeaderRecaptchaResponse').value = token;
            console.log(document.querySelectorAll("#HeaderRecaptchaResponse").value);
        });
    });
</script>

<script>
    grecaptcha.ready(() => {
        grecaptcha.execute('6LeMDa0pAAAAADpczSGmVwa78vlXEMlRW10UNaQa', { action: 'contact' }).then(token => {
            document.querySelector('#recaptchaResponse').value = token;
            console.log(document.querySelectorAll("#recaptchaResponse").value);
        });
    });
</script>

<script>
    grecaptcha.ready(() => {
        grecaptcha.execute('6LeMDa0pAAAAADpczSGmVwa78vlXEMlRW10UNaQa', { action: 'contact' }).then(token => {
            document.querySelector('#footerRecaptchaResponse').value = token;
            console.log(document.querySelectorAll("#footerRecaptchaResponse").value);
        });
    });
</script>
<script>
//   function onSubmit(token) {
//      document.getElementById("contact-form").submit();
//   }
<<<<<<< HEAD
// </script>
=======
// </script> 
>>>>>>> 04a096cefd956ed8d5f5a9841a8da4ad0a300d9c

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="//code.tidio.co/sdzqyzkqyjktbhjlcr0v8xbgipvxwtc9.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.4/js/select2.min.js" crossorigin="anonymous"></script>
<<<<<<< HEAD

    {{-- <script>
        $(document).ready(function() {
            $('.toggle-btn').click(function() {
                $(this).siblings('ul').toggle(); // Toggle the nested ul
                $(this).text($(this).text() === '+' ? '-' : '+'); // Change the toggle text
            });
        });
    </script> --}}

    <script>
        // Toggle the display of child nodes
        document.querySelectorAll('.tree-toggle').forEach(toggle => {
            toggle.addEventListener('click', function(e) {
                e.preventDefault();
                const nextUl = this.nextElementSibling;
                if (nextUl) {
                    nextUl.classList.toggle('d-none');
                }
                this.classList.toggle('collapsed');
            });
        });

        // Hide all nested lists initially
        document.querySelectorAll('.nested').forEach(ul => {
            ul.classList.add('d-none');
        });
    </script>

=======
    
>>>>>>> 04a096cefd956ed8d5f5a9841a8da4ad0a300d9c
    <script>
        function format(item, state) {
        if (!item.id) {
            return item.text;
        }
        var countryUrl = "https://hatscripts.github.io/circle-flags/flags/";
        var stateUrl = "https://oxguy3.github.io/flags/svg/us/";
        var url = state ? stateUrl : countryUrl;
        var img = $("", {
            class: "img-flag",
            width: 26,
            src: url + item.element.value.toLowerCase() + ".svg"
        });
        var span = $("<span>", {
            text: " " + item.text
        });
        span.prepend(img);
        return span;
        }

        $(document).ready(function() {
            $("#countries").select2({
                templateResult: function(item) {
                    return format(item, false);
                }
            });
            $("#us-states").select2({
                templateResult: function(item) {
                    return format(item, true);
                }
            });
        });
    </script>
<<<<<<< HEAD

=======
   
>>>>>>> 04a096cefd956ed8d5f5a9841a8da4ad0a300d9c

    <!-- Google Tag Manager (noscript) -->
    <noscript>
        <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NBN2JCV" height="0" width="0" style="display:none;visibility:hidden"></iframe>
    </noscript>
    <!-- End Google Tag Manager (noscript) -->
<<<<<<< HEAD

=======
    
>>>>>>> 04a096cefd956ed8d5f5a9841a8da4ad0a300d9c
    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            if (!localStorage.getItem('modalShown')) {
                setTimeout(() => {
                    var myModal = new bootstrap.Modal(document.getElementById('exampleModal-1'));
                    myModal.show();
                    localStorage.setItem('modalShown', 'true');
                }, 45000); // 45000 milliseconds = 45 seconds
            }
        });
<<<<<<< HEAD

=======
    
>>>>>>> 04a096cefd956ed8d5f5a9841a8da4ad0a300d9c
        function handleFormSubmit() {
            var myModal = bootstrap.Modal.getInstance(document.getElementById('exampleModal-1'));
            myModal.hide();
            return true; // Continue with the form submission
        }
<<<<<<< HEAD

=======
    
>>>>>>> 04a096cefd956ed8d5f5a9841a8da4ad0a300d9c
        function myStopFunction() {
            var myModal = bootstrap.Modal.getInstance(document.getElementById('exampleModal-1'));
            myModal.hide();
        }
    </script>

    <!--{{-- Link validation script --}}-->
    <script>
        // Function to validate the form
        function validateForm() {
            // Get the value of the message field
            var message = document.getElementById('txt').value;
<<<<<<< HEAD

            // Regular expression to match URLs
            var urlRegex = /(https?:\/\/[^\s]+)/g;

=======
            
            // Regular expression to match URLs
            var urlRegex = /(https?:\/\/[^\s]+)/g;
            
>>>>>>> 04a096cefd956ed8d5f5a9841a8da4ad0a300d9c
            // Check if the message contains a URL
            if (urlRegex.test(message)) {
                // Alert the user and prevent form submission
                alert('Please do not include URLs in the message.');
                return false;
            }
<<<<<<< HEAD

=======
            
>>>>>>> 04a096cefd956ed8d5f5a9841a8da4ad0a300d9c
            // If the message does not contain a URL, allow form submission
            return true;
        }

        function validateForm() {
            // Get the value of the message field
            var message = document.getElementById('txt').value;
<<<<<<< HEAD

            // Regular expression to match URLs
            var urlRegex = /(https?:\/\/[^\s]+)/g;

=======
            
            // Regular expression to match URLs
            var urlRegex = /(https?:\/\/[^\s]+)/g;
            
>>>>>>> 04a096cefd956ed8d5f5a9841a8da4ad0a300d9c
            // Check if the message contains a URL
            if (urlRegex.test(message)) {
                // Alert the user and prevent form submission
                alert('Please do not include URLs in the message.');
                return false;
            }
<<<<<<< HEAD

=======
            
>>>>>>> 04a096cefd956ed8d5f5a9841a8da4ad0a300d9c
            // If the message does not contain a URL, allow form submission
            return true;
        }

        // Function to validate Contact form
        function validatecontactForm() {
            //  console.log('Entered in function:');
            // Get the value of the message field
            var message = document.getElementsByName("message")[0].value;
            var nameInput = document.getElementsByName('name')[0].value;
            var companyInput = document.getElementsByName('company')[0].value;
            var numberInput = document.getElementsByName('number')[0].value;
<<<<<<< HEAD

            console.log('message',message);

            // Regular expression to match URLs
            var urlRegex = /(https?:\/\/[^\s]+)/g;
             // Regular expression to check for links


=======
            
            console.log('message',message);
            
            // Regular expression to match URLs
            var urlRegex = /(https?:\/\/[^\s]+)/g;
             // Regular expression to check for links
         
            
>>>>>>> 04a096cefd956ed8d5f5a9841a8da4ad0a300d9c
            // Check if the message contains a URL
            if (urlRegex.test(message)|| urlRegex.test(nameInput) || urlRegex.test(companyInput) || urlRegex.test(numberInput)) {
                // Alert the user and prevent form submission
                alert('Please do not include URLs in Form.');
                return false;
            }
<<<<<<< HEAD

=======
            
>>>>>>> 04a096cefd956ed8d5f5a9841a8da4ad0a300d9c
            // If the message does not contain a URL, allow form submission
            return true;
        }
    </script>

<<<<<<< HEAD

=======
    
>>>>>>> 04a096cefd956ed8d5f5a9841a8da4ad0a300d9c
    <script>
       function refreshCaptcha() {
            var xhr = new XMLHttpRequest();
            xhr.open('GET', '/refresh_captcha');
            xhr.onload = function() {
                if (xhr.status === 200) {
                    var responseData = JSON.parse(xhr.responseText);
                    var captchaImg = document.getElementById('captchaImg');
                    if (captchaImg) {
                        captchaImg.src = responseData.captcha;
                    } else {
                        console.error('CAPTCHA image element not found');
                    }
                } else {
                    console.error('Request failed with status:', xhr.status);
                }
            };
            xhr.onerror = function() {
                console.error('Request failed');
            };
            xhr.send();
        }
    </script>
    <!-- Fontawesome Icon JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/all.min.js" integrity="sha512-uKQ39gEGiyUJl4AI6L+ekBdGKpGw4xJ55+xyJG7YFlJokPNYegn9KwQ3P8A7aFQAUtUsAQHep+d/lrGqrbPIDQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/fontawesome.min.js" integrity="sha512-64O4TSvYybbO2u06YzKDmZfLj/Tcr9+oorWhxzE3yDnmBRf7wvDgQweCzUf5pm2xYTgHMMyk5tW8kWU92JENng==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<<<<<<< HEAD

=======
    
>>>>>>> 04a096cefd956ed8d5f5a9841a8da4ad0a300d9c
    <script src="public/frontend/js/main.js"></script>

    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "Organization",
            "name": "TradeImeX info solution Pvt Ltd",
<<<<<<< HEAD

=======
            
>>>>>>> 04a096cefd956ed8d5f5a9841a8da4ad0a300d9c
                    "url": "https://www.tradeimex.in/",
            "contactPoint": {
                "@type": "ContactPoint",
                "telephone": "9319646667",
                "contactType": "customer service",
                "areaServed": "IN",
                "availableLanguage": "en"
            },
            "sameAs": [
                "https://www.facebook.com/tradeimex/",
                "https://twitter.com/TradeImeX/",
                "https://www.youtube.com/channel/UCTHU41uHt6xOub4XDy2Egxw",
                "https://www.linkedin.com/company/tradeimex/",
                "https://in.pinterest.com/tradeimex/",
                "https://www.tradeimex.in/"
            ]
        }
    </script>
    <script>
        {
            "@context": "https://schema.org/",
            "@type": "WebSite",
            "name": "Tradeimex",
            "url": "https://www.tradeimex.in/",
            "potentialAction": {
                "@type": "SearchAction",
            "target": "https://www.tradeimex.in/{search_term_string}https://www.tradeimex.in/",
                "query-input": "required name=search_term_string"
            }
        }
    </script>
    <script>
        {
            "@context": "https://schema.org",
            "@type": "LocalBusiness",
            "name": "TradeImex - Import Export Data Provider, Data Analytic & Shipment Services",
            "image": "https://www.tradeimex.in/",
            "@id": "",
            "url": "https://www.tradeimex.in/",
            "telephone": "9319646667",
            "address": {
                "@type": "PostalAddress",
                "streetAddress": "372, 3rd Floor, 110034, Block RU, Pitam Pura, New Delhi, Delhi 110034",
                "addressLocality": "New Delhi",
                "postalCode": "110034",
                "addressCountry": "IN"
            },
            "openingHoursSpecification": {
                "@type": "OpeningHoursSpecification",
                "dayOfWeek": [
                "Monday",
                "Tuesday",
                "Wednesday",
                "Thursday",
                "Friday"
                ],
                "opens": "10:00",
                "closes": "18:30"
            }
        }
<<<<<<< HEAD
    </script>
=======
    </script>
>>>>>>> 04a096cefd956ed8d5f5a9841a8da4ad0a300d9c

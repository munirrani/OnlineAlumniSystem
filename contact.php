<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once("php/head.php")?>

    <link rel="stylesheet" href="css/event.css">

    <title>Contact Us | FSKTM Alumni</title>
</head>
<body>
  <div class="container-fluid p-0 m-0">
  <?php include_once("php/heading.php")?>

    <main>
      <div class="contactus">
        <div class="container form-contactus shadow-lg">
          <div class="row align-items-center">
            <div class="col d-flex justify-content-center">
              <img src="img/contact-img.png" alt="" />
            </div>
            <div class="col cont-right">
              <div class="contact-us">
                
                <form id="contact-form">
                  <h1 class="contact-us-heading">CONTACT US</h1>
                  <input type="text" id="contact-name" class="form-control mb-4 shadow" name="name"
                    placeholder="Full Name" required="Please enter your name!" autofocus="" />
                  <input type="text" id="contact-email" class="form-control mb-4 shadow" name="email"
                    placeholder="Email-ID" required="Please enter a valid email-id" />
                  <input type="text" id="contact-subject" class="form-control mb-4 shadow" name="subject"
                    placeholder="Subject" required="Please enter a subject" />
                  <textarea id="contact-message" rows="15" class="form-control shadow" name="body"
                    placeholder="Type your message" required="Please include a message"></textarea>
                  
                    <button id="contact-submit" type="button" onclick="sendEmail()" class="submit-message">
                      Submit
                    </button>
                  

                  <div class="modal fade" id="confirmation-modal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title" id="exampleModalLabel">Confirmation</h4>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <h3 class="display-5">
                            <p class="lead">Your message was submitted. We will get back to you shortly with a reply!
                            </p>
                          </h3>
                        </div>
                        <div class="modal-footer">
                          <button type="button"  id="confirmbutton" class="btn" data-bs-dismiss="modal">
                            Okay
                          </button>
                        </div>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>

    <?php include_once("php/footer.php")?>
  </div>

  <?php include_once("php/scripts.php")?>

  <script type="text/javascript">
        function sendEmail() {
            var name = $("#contact-name");
            var email = $("#contact-email");
            var subject = $("#contact-subject");
            var body = $("#contact-message");

            if (isNotEmpty(name) && isNotEmpty(email) && isNotEmpty(subject) && isNotEmpty(body)) {
                $.ajax({
                   url: 'sendEmail.php',
                   method: 'POST',
                   dataType: 'json',
                   data: {
                       name: name.val(),
                       email: email.val(),
                       subject: subject.val(),
                       body: body.val()
                   }, success: function (response) {
                        $('#contact-form')[0].reset();
                        $('#confirmation-modal').modal('show');
                   }
                });
            }
        }

        function isNotEmpty(caller) {
            if (caller.val() == "") {
                caller.css('border', '1px solid red');
                return false;
            } else
                caller.css('border', '');

            return true;
        }
  </script>
</body>

</html>
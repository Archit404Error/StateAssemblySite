<html>
  <head>

     <script src="https://www.google.com/recaptcha/api.js?render=6Lft67MZAAAAAB1mRt-nX_ZLT9kcAfY14W7g1L8h"></script>
    <script>
        grecaptcha.ready(function () {
            grecaptcha.execute('6Lft67MZAAAAAB1mRt-nX_ZLT9kcAfY14W7g1L8h', { action: 'contact' }).then(function (token) {
                var recaptchaResponse = document.getElementById('recaptchaResponse');
                recaptchaResponse.value = token;
            });
        });
    </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="wow.min.js"></script>
    <script>new WOW().init();</script>
    <link type = "text/css" rel = "stylesheet" href = "animate.css">
    <link type = "text/css" rel = "stylesheet" href = "style.css">
    <script>
      $(document).ready(function(){
        $("a").on('click', function(event) {
          if (this.hash !== "") {
            event.preventDefault();
            var hash = this.hash;
            $('html, body').animate({
              scrollTop: $(hash).offset().top
            }, 800, function(){
              window.location.hash = hash;
            });
          }
        });
      });
    </script>
  </head>
  <body>
    <nav class="navbar main-navigation">
      <a style = "color: white;" class="navbar-brand" href="#">MAS State Assembly</a>
      <ul class="nav navbar-nav">
        <li><a href="index.html">Home</a></li>
        <li><a href="billcreate.html">Create Bill</a></li>
        <li><a href="outreach.php">Outreach Form</a></li>
      </ul>
    </nav>
    <div style = "height: 5vh;">
    </div>
    <div id="formArea" style="background-color: #fafafa; width: 100vw; display: inline-block;">
      <center><h1>SAR Outreach Form</h1></center>
      <div class = "row">
        <div class = "col-md-3"></div>
        <center><h3 class = "col-md-6" style = "color: #666666;">The purpose of this form is to allow everyone in JSA to list out what problems they face
          so that the State Assembly can solve them! This form serves as a way to allow you to have your voice heard,
          so please be sure to use it!</h3></center>
        <div class = "col-md-3"></div>
      </div>
      <form method="POST" action="show.php" style = "padding: 2vw;">
        <div class = "form-group col-md-6">
          <label for = "name">Full Name</label>
          <input required type = "text" class = "form-control" name="name" id = "name" placeholder="Ex: Archit Mehta">
        </div>
        <div class = "form-group col-md-6">
          <label for = "chapter">Chapter</label>
          <input required type = "text" class = "form-control" name="chapter" id = "chapter" placeholder = "Ex: WW-P North">
        </div>
        <div class = "form-group col-md-12">
          <label for = "problem">Describe Your Problem</label>
          <textarea required class = "form-control" id = "problem" name="problem" rows = "3" placeholder= "Ex: I believe there aren't enough awards at Winter Congress"></textarea>
        </div>
            <div class="form-check form-group col-md-12">
                    <input class="form-check-input" name="public" type="checkbox" id="inlineCheckbox1" value="true">
                    <label class="form-check-label" for="inlineCheckbox1" style="color:black">By checking this box, you give us permission to review and publish your submission, as well as possibly discuss it at the next State Assembly meeting.</label>
            </div>
        <div class = "form-group col-md-12">
          <button type = "submit" class = "btn btn-primary">Submit</button>
          <input type="hidden" name="recaptcha_response" id="recaptchaResponse">
        </div>
      </form>
    </div>
  </body>
</html>

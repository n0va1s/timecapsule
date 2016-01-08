<head>
  <title>Cápsula do Tempo (time capsule)</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <link href="http://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <!-- Arquivo locais -->
  <script src="assets/js/jquery-validation/dist/jquery.validate.min.js" type="text/javascript"></script>
  <script src="vendor/etdsolutions/jquery.maskedinput/jquery.maskedinput.js" type="text/javascript"></script>
  <style>
  body {
      font: 15px Montserrat, sans-serif;
      line-height: 1.8;
      color: #f5f6f7;
  }
  p {font-size: 15px;}
  .margin {margin-bottom: 5px;}
  .bg-1 {
      background-color: #1abc9c; /* Green */
      color: #ffffff;
  }
  .bg-2 {
      background-color: #61186E;
      /*background-color: #474e5d;*/ /* Dark Blue */
      color: #ffffff;
  }
  .bg-3 {
      background-color: #ffffff; /* White */
      color: #555555;
  }
  .bg-4 {
      background-color: #2f2f2f; /* Black Gray */
      color: #fff;
  }
  .container-fluid {
      padding-top: 10px;
      padding-bottom: 10px;
  }
  .navbar {
      padding-top: 5px;
      padding-bottom: 5px;
      border: 0;
      border-radius: 0;
      margin-bottom: 0;
      font-size: 12px;
      letter-spacing: 5px;
  }
  .navbar-nav  li a:hover {
      color: #1abc9c !important;
  }
  #frmCapsula label.error {
      float: left;
      color: red;
      padding-left: 0px;
  }
  </style>
  <script type="text/javascript">
  $(document).ready(function(){
      $("#date").mask("99/99/9999",{placeholder:"DD/MM/YYYY"});
      $("#phone").mask("(99)?9999-9999");

      $("#btnVoltar").click(function() {
        history.back()
      });

      $("#frmCapsula").validate({
        rules: {
          name: {
            required: true
          },
          email: {
            required: true,
            email: true
          },
          date: {
            required: true
          },
          message: {
            required: true
          }
        },
        messages: {
          name:{
            required: "Informe o nome"
          },
          email: {
            required: "Informe o email",
            email: "O email não é válido"
          },
          date: {
            required: "Informe a data"
          },
          message: {
            required: "Informe a mensagem"
          }
        }
      });
  });
</script>
</head>

<html>
  <head>
    <title>Main themplate</title>
    <meta charset="${encoding}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  <body>
      <header><h1>This is the MVC Application</h1></header>
      <div>
          <?php $this->renderContent(); ?>
      </div>
      <footer><?php echo date('Y'); ?>&COPY; Ivan Majeru</footer>
  </body>
</html>


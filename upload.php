<html>
<head>
</style>
  <!-- Don't forget to include jQuery ;) -->
<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
  <script src="js/jquery.modal.js" type="text/javascript" charset="utf-8"></script>
<link href="css/jquery.modal.css" rel="stylesheet" type="text/css" media="all"/>
</head>
<body>

  <!-- Modal HTML embedded directly into document -->
  <div id="ex1" style="display:none;">
    <form action="up.php" enctype="multipart/form-data" method="post" role="form">
    <div class="form-group">
        <label for="exampleInputFile">File Upload</label>
        <input type="file" name="file" id="file" size="150">
        <p class="help-block">Only Excel/CSV File Import.</p>
    </div>
    <button type="submit" class="btn btn-default" name="Import" value="Import">Upload</button>
</form>
  </div>

  <!-- Link to open the modal -->
  <p><a href="#ex1" rel="modal:open">Open Modal</a></p>

</body>
</html>

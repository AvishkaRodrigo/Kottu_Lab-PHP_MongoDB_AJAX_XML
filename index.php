<html>
<head>
  <title>Kottu Labs</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="styles.css">

</head>

<body>

  <?php
    require 'xmlLoader.php';
    require 'generateXML.php';
  ?>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand ps-4" href="#">Kottu Labs</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse d-flex justify-content-center" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-link px-5 border-end border-2" >Menu</a>
          <a class="nav-link px-5 border-end border-2" >Order Now</a>
          <a class="nav-link px-5 border-end border-2" >About Us</a>
        </div>
      </div>
    </div>
  </nav>

  <div class="content ps-5 d-flex">
  
    <div id="display-menu"  class="col-8 overflow-scroll">
      Loading...A
      
    </div>
    
    <div class="form-area col m-3">
      <form method="post" id="contactform" class="row g-3">
        <div class="form-group">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" name="name" id="name">
        </div>
          <div class="form-group">
            <label for="price" class="form-label">Price</label>
            <input type="number" class="form-control" name="price" id="price">
          </div>
          <div class="">
            <label for="type" class="form-label">Category</label>
            <select class="form-select" id="type" name="type">
              <option selected disabled value="">Choose...</option>
              <!-- <option selected></option> -->
              <option value="Kottu Rice">Kottu Rice</option>
              <option value="KL Inventions">KL Inventions</option>
              <option value="Devilled Dishes">Devilled Dishes</option>
            </select>
          </div>
          <div class="form-group">
            <label for="description" class="form-label">Descrption</label>
            <textarea name="description" class="form-control" name="description" id="description"></textarea>
          </div>
          <div class="d-flex justify-content-center">
            <button class="btn btn-dark submit" id="submit" type="button" onclick="addData()">Add item</button>
          </div>
          
      </form>
    
      <div class="d-flex justify-content-center mt-5">
        <button class="btn btn-light submit" type="button" onclick="generateMenuXML()">Download Menu</button>
      </div>
    </div>
  </div>
</body>

  <script>
    function addData () {
        event.preventDefault();
        
        var data = new FormData();
        data.append('name', document.getElementById("name").value);
        data.append('price', document.getElementById("price").value);
        data.append('type', document.getElementById("type").value);
        data.append('description', document.getElementById("description").value);
          
        const xhttp = new XMLHttpRequest();
        xhttp.open("POST", "insertData.php", true);
        xhttp.send(data);
        showMenu();
        clearData();
    };


    function showMenu() {
      
      const xhttp = new XMLHttpRequest();
      xhttp.onload = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("display-menu").innerHTML = this.responseText;
        }
      }
      xhttp.open("GET", "menu.php", true);
      xhttp.send();  
      
      return this.responseText; 
    }
    document.getElementById("display-menu").innerHTML = showMenu() || "Loading...";
    
    function clearData() {
      document.getElementById("name").value = "";
      document.getElementById("price").value = "";
      document.getElementById("type").value = "";
      document.getElementById("description").value = "";
    }

    </script>

</html>
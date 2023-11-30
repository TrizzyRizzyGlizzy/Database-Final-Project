<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>NavBar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
              <div class="container-fluid">
                  <a class="navbar-brand" href="#">Your Store</a>
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarNav">
                      <ul class="navbar-nav">
                          <li class="nav-item active">
                              <a class="nav-link" href="#">Home</a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link" href="#">Featured</a>
                          </li>
                          <li class="nav-item dropdown">
                              <a class="nav-link dropdown-toggle" href="#" id="categoriesDropdown" role="button"
                                  data-bs-toggle="dropdown" aria-expanded="false">
                                  Categories
                              </a>
                              <ul class="dropdown-menu" aria-labelledby="categoriesDropdown">
                                  <li><a class="dropdown-item" href="#">Produce</a></li>
                                  <li><a class="dropdown-item" href="#">Dairy Products</a></li>
                                  <!-- Add more categories as needed -->
                              </ul>
                          </li>
                      </ul>
                      <form class="d-flex ms-auto">
                          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                          <button class="btn btn-outline-success" type="submit">Search</button>
                      </form>
                      <ul class="navbar-nav">
                          <li class="nav-item">
                              <a class="nav-link" href="#">Cart</a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link" href="#">Login</a>
                          </li>
                          <!-- Add more user-related links as needed -->
                      </ul>
                  </div>
              </div>
        </nav>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>
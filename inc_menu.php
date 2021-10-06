
 <div class="row">
            <div class="col-xxl-12 pb-3">
                <nav class="navbar navbar-expand-lg navbar-light bg-primary">
                    <div class="container-fluid">
                      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                      </button>
                      <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                          <li class="nav-item">
                            <a class="nav-link active text-light" aria-current="page" href="index.php">Home</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link text-light" href="#">About</a>
                          </li>
                          <li class="nav-item dropdown">
                            <a class="nav-link text-light dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                              Categories
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <?php
                    include('admin/dbconnection.php');

                    $datainfour="SELECT * from category order by id DESC";
                    $query = mysqli_query($conn, $datainfour);
                    while ($row = mysqli_fetch_array($query)) {
                    ?>
                    <li><a href="category.php?id=<?=$row['id'];?>" class="dropdown-item"><?=$row['name']; ?></a> </li>

                    <?php
                    }
                    
                    ?>
                            
                            </ul>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link text-light">Contact</a>
                          </li>
                        </ul>
                        <form class="d-flex">
                          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                          <button class="btn btn-outline-success text-light" type="submit">Search</button>
                        </form>
                      </div>
                    </div>
                  </nav>
            </div>
        </div>
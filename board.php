<?php include 'connection.php' ?>
<!DOCTYPE html>
<html>

<head>
  <meta charset=”UTF-8″>
  <title>PAD9 Forum</title>
  <link rel="stylesheet" href="css/bootstrap.css" type="text/css">
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: purple;">
    <a class="navbar-brand" href="#">
      <img src="" width="30" height="30" class="d-inline-block align-top" alt="">
      PAD 9 Forum
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>

      </ul>
      <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form>
    </div>
  </nav>
  <div class="container">
    <div id="content">
      <nav class="nav nav-pills nav-fill">
        <?php
        $sql = "SELECT cat_id, cat_name FROM categories";
        $result = $conn->query($sql);
        $i = 0;
        if ($result->num_rows > 0) {
          // output data of each row
          while ($row = $result->fetch_assoc()) {
            echo '<a class="nav-item nav-link cat" href="board.php?id='.$row["cat_id"].'">' . $row["cat_name"] . '</a>';
            $i++;
          }
        } else {
          echo "0 results";
        }
        ?>
        <a class="nav-item nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
      </nav>
    </div>
    <div id="footer">
      <table class="table table-dark">
        <thead>
          <tr>
            <th scope="col">Topic</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <?php
            $id = $_GET["id"];
            $sqli = "SELECT topic_subject FROM topics WHERE topics.topic_id = " . $id;
            $posts = $conn->query($sqli); 

            if ($posts->num_rows > 0) {
              //output data into html
              while ($thread = $posts->fetch_assoc()) {
                echo "<td><a href=\"#\">" . $thread["topic_subject"] . "</a></td>";
              }
            } else {
              echo "0 results";
            }
            $conn->close();
            ?>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</body>

</html>
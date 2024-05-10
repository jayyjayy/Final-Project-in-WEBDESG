<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="js/bootstrap.min.js"></script>
    <title>My Website</title>
    <style>
        .products {
            display: flex;
            flex-wrap: wrap;
        }

        .product {
            width: 300px;
            margin: 20px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            color: white;
            
        }

        .product img {
            width: 100%;
            height: auto;
        }

        .product h2 {
            margin-top: 0;
        }

        .product button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
        }

        .product button:hover {
            background-color: #45a049;
        }
        .products {
            background-image: url(Images/Ag30.jpg);
            background-size: cover;
            background-repeat: no-repeat;
            height: 100vh;
            overflow-x: hidden;
        }
        .pag {
            padding-top: 7px;
            font-size: 36px;
            color: white;
            font-style: italic;
            margin-top: 10px;
            margin-left: 500px;
        }
    </style>
</head>
<body>
    <div class="Header" id="2hd">
        <H1 class="bname">RjayGuitars</H1>
        <p class="bd">Building high quality and affordable guitars</p>
    </div>
    <nav class="navbar">
        <ul>
            <li><a href="/EcomWeb/created.php">Add New product</a></li>
            <li class="pag">Welcome to My Guitar Shop</li>     
        </ul> 
    </nav>
    <div class="products">
        <?php
        // MySQL database configuration
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "rjayguitars";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $database);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Fetch products from database
        $sql = "SELECT * FROM myweb";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<div class='product'>";
                echo "<img src= 'Images/" . $row['image'] . "' alt='" . $row['name'] . "'/>";
                echo "<h2>" . $row['name'] . "</h2>";
                echo "<p>$" . $row['price'] . "</p>";
                echo "<button>Add to Cart</button>";
                echo "</div>";  
            }
        } else {
            echo "No products available.";
        }

        // Close connection
        $conn->close();
        ?>
    </div>
    <div class="footer">
        <h4>ABOUT RjayGuitars</h4>
            <p class="footc">We are a maker of world-class and affordable Philippine-made guitars and
                instruments since 2023. With over three decades 
                of experience, we have been dedicated to producing
                high-quality and exceptional-sounding instruments that
                cater to both beginners and professionals.</p>
        <h4>CONNECT WITH US</h4>
        <ul class="cws">
            <li><img src="Images/fb2.jpg"></li>
            <li><img src="Images/tt.jpg"></li>
            <li><img src="Images/yt.jpg"></li>
            <li><img src="Images/ins.jpg"></li>
        </ul>    
    </div>
</body>
</html>
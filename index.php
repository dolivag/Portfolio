<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="./footer.php">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
    <link rel="stylesheet" href="./styles/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dani Oliva Blog</title>
</head>

<body>


    <?php include 'header.php'; ?>


    <main>
        <nav class="nav-bar">
            <ul class="nav-links">
                <li><a href="#">Full bio</a></li>
                <li><a href="#">My works</a></li>
                <li><a href="#">My articles</a></li>
                <li><a href="#">My experience</a></li>
                <li><a href="#">Hire me</a></li>
            </ul>
        </nav>
        <div class="favourites">
            <div class="favourites-card">
                <a href="#"><img src="./images/HTML5_Logo_256.png" alt="html5 logo"></a>
                <h3>HTML5</h3>
                <button src="#" alt="">See more</button>
            </div>
            <div class="favourites-card">
                <a href="#"><img src="./images/css3.png" alt="css3 logo"></a>
                <h3>CSS3</h3>
                <button src="#" alt="">See more</button>
            </div>
            <div class="favourites-card">
                <a href="#"><img src="./images/js.png" alt="js logo"></a>
                <h3>Javascript</h3>
                <button src="#" alt="">See more</button>
            </div>
        </div>
        <div class="content">
            <article class="article">

                <h4 class="article-title">Title1</h4>
                <div class="content-image">
                    <p class="article-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente,
                        magni
                        impedit? Iure maxime numquam architecto perferendis alias magni minus similique impedit ab! Quis
                        voluptatum ipsa accusamus minus inventore sequi vitae?</p>
                    <img src="./images/hero2.jpg" alt="">
                </div>
                <button>See more</button>
            </article>
            <article class="article">

                <h4 class="article-title">Title2</h4>
                <div class="content-image">
                    <p class="article-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente,
                        magni
                        impedit? Iure maxime numquam architecto perferendis alias magni minus similique impedit ab! Quis
                        voluptatum ipsa accusamus minus inventore sequi vitae?</p>
                    <img src="./images/hero1.jpg" alt="A chinese wall">
                </div>
                <button>See more</button>
            </article>
            <article class="article">

                <h4 class="article-title">Title3</h4>
                <div class="content-image">
                    <p class="article-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente,
                        magni
                        impedit? Iure maxime numquam architecto perferendis alias magni minus similique impedit ab! Quis
                        voluptatum ipsa accusamus minus inventore sequi vitae?</p>
                    <img src="./images/hero3.jpg" alt="A picture">
                </div>
                <button>See more</button>
            </article>

        </div>
    </main>

    <footer class="page-footer">

        <?php include 'footer.php'; ?>

    </footer>

</body>

</html>
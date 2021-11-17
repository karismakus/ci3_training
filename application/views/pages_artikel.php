<div class="container">
    <div class="row">
        <div class="col">
            <h1><?= $title ?></h1>
        </div>
    </div>
    <div class="row mt-3">
        <?php foreach ($artikel as $artikel) : ?>
            <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                <div class="card" style="width: 18rem;">
                    <img src="https://media.istockphoto.com/photos/young-woman-reading-the-news-on-a-modern-tablet-computer-while-in-picture-id1177502660?b=1&k=20&m=1177502660&s=170667a&w=0&h=ROub8oDtheyx3xtHMjtU2FV6ZC7g2iSGX2qxme6388w=" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?= $artikel ?></h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
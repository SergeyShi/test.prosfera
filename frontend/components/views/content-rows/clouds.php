

<!-- Content Row -->
    <section class="content-row content-row-color content-row-clouds">
        <div class="content-slider animate-container-slide" data-nav="true" data-rotation="5">
            <?php foreach ($contentRows as $contentRow): ?>
                <?php
                    try {
                        $img = $contentRow->getImage();
                    } catch (Exception $e){
                        echo 'No image ' . $contentRow->id;
                    }
                ?>
            <a class="slide" data-title=<?= $contentRow->name; ?> href="products-cloud-hosting.html">
                <div class="container">
                    <header class="content-header content-header-large content-header-uppercase">
                        <p>
                            <?= $contentRow->description; ?><span class="text-color-secondary">$9/month</span>
                        </p>
                    </header>
                    <img src="<?=  '../../backend/web/uploads/store/' . $img->filePath ?>" width="1280px" height="160px">

                </div>
            </a>

            <?php endforeach; ?>
        </div>
    </section>

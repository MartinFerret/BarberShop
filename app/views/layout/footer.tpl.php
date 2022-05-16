<footer>
<!--         <div class="icons">
        <i class="fab fa-facebook"></i>
        <i class="fab fa-whatsapp"></i>
        <i class="fas fa-envelope"></i>
        <i class="fab fa-instagram"></i>
        </div> -->

        <div class="marque">
            <ul>
            <?php foreach($brandForFooter as $brand) : ?>
                <li><?=$brand->getName();?></li>
            <?php endforeach;?>
            </ul>
        </div>

        <div class="type">
            <ul>
            <?php foreach($typeForFooter as $type) : ?>
                <li><?=$type->getName();?></li>
            <?php endforeach;?>
            </ul>
        </div>
    </footer>





<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="<?=$absoluteURL ?>/assets/js/app.js"></script>
</body>
</html>
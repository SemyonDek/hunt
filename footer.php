<link rel="stylesheet" href="css/footer.css" />

<aside id="compare-leash" style="height: 39px; <?php
                                                if (isset($_SESSION['comprasion']) && $_SESSION['comprasion'] !== '') {
                                                    echo 'bottom: 0;';
                                                }
                                                ?>">
    <a href="compare.php" class="">
        Сравнить выбранные товары (<strong>
            <?php
            if (isset($_SESSION['comprasion']) && $_SESSION['comprasion'] !== '') {
                echo ' ' . count($_SESSION['comprasion']) . ' ';
            } else echo 0;
            ?></strong>)
    </a>
</aside>

<footer>
    <div class="container">
        <div class="subscribe">
            <div class="subscribe-l">
                <div>Подпишитесь на нас</div>
                <p>
                    Присоединяйтесь сейчас для получения новостей, обновлений,
                    специальных предложений
                </p>
                <ul class="social">
                    <li class="ico-tel"><a href="https://t.me/huntrusale">Telegram</a></li>
                    <li class="ico-vk"><a href="https://vk.com/huntru">VK</a></li>
                    <li class="ico-dzen"><a href="https://dzen.ru/huntru">Dzen</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="bottomline">
        <div class="container">
            <div class="copy">На рынке © 1997 года</div>
            <div class="clear-both"></div>
        </div>
    </div>
</footer>
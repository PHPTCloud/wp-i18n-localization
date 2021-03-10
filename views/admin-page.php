<script src="<?= i18nl_assets('js/app.js'); ?>"></script>
<link rel="stylesheet" href="<?= i18nl_assets('css/app.css'); ?>">

<h2>i18n settings</h2>

<div class="i18n__app">
    <ul class="app__menu">
        <li><a class="is-active" href="">Список локализации</a></li>
        <li><a class="" href="">Настройки</a></li>
    </ul>

    <hr>

    <div class="app__container">
        <?php
        var_dump($languages);
        ?>
        
        <div class="tabs__container">
            <div class="tabs">
                <?php foreach($languages as $index => $language): ?>
                    <div class="tabs__button <?=$index == 0 ? 'is-active': '';?>"><?= ucfirst($language['title']); ?></div>
                <?php endforeach; ?>
            </div>

            <div class="tabs-pages">
                <?php foreach($languages as $index => $language): ?>
                    <div class="tabs-pages__page <?=$index == 0 ? 'is-active': '';?>">
                        
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <footer class="app__footer">
            Copyright by <img width="20" src="<?= i18nl_assets('img/github.svg'); ?>">
            <a target="_blank" href="https://github.com/PHPTCloud/wp-i18n-localization">PHPTCloud</a>
        </footer>
    </div>
</div>

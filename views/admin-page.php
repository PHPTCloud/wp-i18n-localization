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
        
        <div class="tabs__container">
            <div class="tabs">
                <?php foreach($languages as $index => $language): ?>
                    <div onclick="selectTab(<?= $index; ?>)" data-target="tab-page-<?= $index; ?>" class="tabs__button <?=$index == 0 ? 'is-active': '';?>"><?= ucfirst($language['title']); ?></div>
                <?php endforeach; ?>
            </div>

            <div class="tabs-pages">
                <?php foreach($languages as $index => $language): ?>
                    <div id="tab-page-<?= $index; ?>" class="tabs-pages__page <?=$index == 0 ? 'is-active': '';?>">
                        <?php if(isset($language['localization'])): ?>
                            <form action="" method="POST">
                                <button class="save-localization-button">Сохранить "<?= ucfirst($language['title']); ?>"</button>
                                <button onclick="addRow('<?= $language['code']; ?>')" type="button" class="add-localization-button">Добавить</button>

                                <br><br>
                                
                                <input type="text" class="w-50p" disabled value="Ключ">
                                <input type="text" class="w-50p" disabled value="Значение">

                                <div id="inputs-<?= $language['code']; ?>">
                                    <?php foreach($language['localization'] as $key => $word): ?>
                                        <input 
                                            type="text" 
                                            name="localization[<?= $language['code']; ?>][<?= $key; ?>][key]" 
                                            class="w-50p key-input-js" 
                                            value="<?= $key; ?>"
                                        >

                                        <input 
                                            type="text" 
                                            name="localization[<?= $language['code']; ?>][<?= $key; ?>][word]" 
                                            class="w-50p word-input-js" 
                                            value="<?= $word; ?>"
                                        >
                                    <?php endforeach; ?>
                                </div>
                            </form>
                        <?php endif; ?>
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

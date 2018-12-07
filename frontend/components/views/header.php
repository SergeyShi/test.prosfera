<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\NavBar;
use yii\widgets\Menu;

?>
<header id="header" class="header-dynamic header-shadow-scroll">
    <div class="container">

        <a class="logo" href="index.php">
            <?= Html::img('@web/img/logos/header-light.png', ['alt' => '']) ?>
        </a>


        <nav>
            <?php

            echo Menu::widget([
                'options' => ['class' =>'nav-secondary'],
                'items' => [
                    [
                        'label' => ' +1 800 123 456 ', 'url' => ['/site/login'],
                        'template' => '<a href="{url}"><i class="fa fa-phone icon-left">{label}</i></a>',
                    ],
                    [   'label' => 'Чат поддержки ', 'url' => ['/site/login'],
                        'template' => '<a href="{url}"><i class="fa fa-comment icon-left">{label}</i></a>',],
                    [   'label' => 'База знаний ', 'url' => ['/site/login'],
                        'template' => '<a href="{url}"><i class="fa fa-question-circle icon-left">{label}</i></a>',],
                    [   'label' => 'Статус работы ', 'url' => ['/site/login'],
                        'template' => '<a href="{url}"><i class="fa fa-check icon-left">{label}</i></a>',],

                ],
            ]);
            echo Menu::widget([
                'options' => ['class' =>'nav-primary'],
                'items' => [
                    ['label' => 'Услуги', 'url' => ['/site/index'],
                        'items' => [
                            ['label' => 'Аренда 1С', 'url' => ['/site/index']],
                            ['label' => 'Создание сайтов', 'url' => ['/site/about']],
                        ],
                    ],
                    ['label' => 'О компании', 'url' => ['/site/about'],
                        'items' => [
                            ['label' => 'Команда', 'url' => ['/site/index']],
                            ['label' => 'Контакты', 'url' => ['/site/about']],
                        ],
                    ],

                    [
                        'label' => ' Войти', 'url' => ['/site/login'],
                        'template' => '<a href="{url}" class="button button-secondary"><i class="fa fa-lock icon-left">{label}</i></a>'

                    ],
                ],
            ]);

            ?>

        </nav>
    </div>
</header>
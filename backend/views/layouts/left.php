<aside class="main-sidebar">

    <section class="sidebar">

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    ['label' => 'Menu', 'options' => ['class' => 'header']],
                    ['label' => 'Category', 'icon' => 'angle-right', 'url' => ['/category']],
                    ['label' => 'Product', 'icon' => 'angle-right', 'url' => ['/product']],
                    ['label' => 'Banner', 'icon' => 'angle-right', 'url' => ['/banner']],
                    ['label' => 'Content', 'icon' => 'angle-right', 'url' => ['/content']],
                    ['label' => 'User', 'icon' => 'angle-right', 'url' => ['/user']],
                    ['label' => 'Gii', 'icon' => 'file', 'url' => ['/gii']],
                    ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug']],
                    ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                ],
            ]
        ) ?>

    </section>

</aside>

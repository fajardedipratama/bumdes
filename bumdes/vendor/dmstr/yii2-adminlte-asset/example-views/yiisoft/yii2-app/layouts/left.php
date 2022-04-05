<aside class="main-sidebar" style="position: fixed;">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="photos/user-profile-default.png" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p><?= Yii::$app->user->identity->profilname ?></p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    [
                        'label' => 'Kios Pasar',
                        'icon' => 'institution',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Data Kios', 'icon' => 'home', 'url' => ['/kios'],'active'=>in_array(\Yii::$app->controller->id,['kios'])],
                            ['label' => 'Pembayaran', 'icon' => 'money', 'url' => ['/setorankios'],'active'=>in_array(\Yii::$app->controller->id,['setorankios'])],
                        ],
                    ],
                    [
                        'label' => 'Sewa Mobil',
                        'icon' => 'car',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Data Mobil', 'icon' => 'car', 'url' => ['/mobil'],'active'=>in_array(\Yii::$app->controller->id,['mobil'])],
                            ['label' => 'Persewaan', 'icon' => 'calendar', 'url' => ['/mobilsewa'],'active'=>in_array(\Yii::$app->controller->id,['mobilsewa'])],
                            ['label' => 'Perawatan', 'icon' => 'wrench', 'url' => ['/mobilservis'],'active'=>in_array(\Yii::$app->controller->id,['mobilservis'])],
                        ],
                    ],
                    ['label' => 'Setoran Ponten', 'icon' => 'male', 'url' => ['/ponten'],'active'=>in_array(\Yii::$app->controller->id,['ponten'])],
                    ['label' => 'Setoran BGMart', 'icon' => 'cart-plus', 'url' => ['/bgmart'],'active'=>in_array(\Yii::$app->controller->id,['bgmart'])],
                    ['label' => 'Insentif', 'icon' => 'envelope', 'url' => ['/insentif'],'active'=>in_array(\Yii::$app->controller->id,['insentif'])],
                    [
                        'label' => 'Lain-Lain',
                        'icon' => 'dollar',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Pemasukan Lainnya', 'icon' => 'dollar', 'url' => ['/lainmasuk'],'active'=>in_array(\Yii::$app->controller->id,['lainmasuk'])],
                            ['label' => 'Pengeluaran Lainnya', 'icon' => 'dollar', 'url' => ['/lainkeluar'],'active'=>in_array(\Yii::$app->controller->id,['lainkeluar'])],
                        ],
                    ],
                    [
                        'label' => 'Laporan',
                        'icon' => 'book',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Laporan Bulanan', 'icon' => 'book', 'url' => ['/laporan'],'active'=>in_array(\Yii::$app->controller->id,['laporan'])],
                            ['label' => 'Rekap Tahunan', 'icon' => 'book', 'url' => ['/laporantahun'],'active'=>in_array(\Yii::$app->controller->id,['laporantahun','laporanbagian'])],
                        ],
                    ],
                    [
                        'label' => 'User',
                        'icon' => 'users',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Pengurus Bumdes', 'icon' => 'user', 'url' => ['/laporanuser'],'active'=>in_array(\Yii::$app->controller->id,['laporanuser'])],
                            ['label' => 'User Login', 'icon' => 'key', 'url' => ['/users'],'active'=>in_array(\Yii::$app->controller->id,['users'])],
                        ],
                    ],
                ],
            ]
        ) ?>

    </section>

</aside>

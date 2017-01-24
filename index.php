<?php

use yii\helpers\Html;
$this->title = 'My Yii Application';

$dirweb = '/My_Yii2/frontend/web/';

  echo dirname(__DIR__);

?>


<section id="slider"><!--slider  Стили классов слайдера-->
    <div class="container">  <!--Класс контейнер - блок-->
        <div class="row">      <!--Класс строки в блоке контейнера-->
            <div class="col-sm-12">   <!--Класс максимальной ширины-->
                <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                        <li data-target="#slider-carousel" data-slide-to="1"></li>
                        <li data-target="#slider-carousel" data-slide-to="2"></li>
                    </ol>

                    <div class="carousel-inner">
                        <div class="item active">
                            <div class="col-sm-6">  <!--Класс ширины = 1/3-->
                                <h1><span>Интернет</span>-Магазин</h1>
                                <h3>Свободный шаблон электронной коммерции</h3>
                                <p>Компания Ipsum выпускает красивую одежду, по максимальным скидкам, для скрытия усталости и полноты. </p>
                                <button type="button" class="btn btn-default get">Получить сейчас</button>
                            </div>
                            <div class="col-sm-6">
                                <!-- Отображение изображения для слайдера по указанному пути из папки -->
                                <?php echo '<img src="'.$dirweb.'images/home/girl1.jpg" class="girl img-responsive" alt="" />';
                                  echo '<img src="'.$dirweb.'images/home/pricing.png"  class="pricing" alt="" />'; ?>
                            </div>
                        </div>
                        <div class="item">
                            <div class="col-sm-6">
                                <h1><span>Интернет</span>-Магазин</h1>
                                <h2>100% Адаптивный Дизайн</h2>
                                <p>Компания Ipsum выпускает красивую одежду, по максимальным скидкам, для скрытия усталости и полноты. </p>
                                <button type="button" class="btn btn-default get">Получить сейчас</button>
                            </div>
                            <div class="col-sm-6">
                                <?php echo '<img src="'.$dirweb.'images/home/girl2.jpg" class="girl img-responsive" alt="" />';
                                  echo '<img src="'.$dirweb.'images/home/pricing.png"  class="pricing" alt="" />'; ?>
                            </div>
                        </div>

                        <div class="item">
                            <div class="col-sm-6">
                                <h1><span>Интернет</span>-Магазин</h1>
                                <h2>Свободный образец электронной коммерции</h2>
                                <p>Компания Ipsum выпускает красивую одежду, по максимальным скидкам, для скрытия усталости и полноты. </p>
                                <button type="button" class="btn btn-default get">Получить сейчас</button>
                            </div>
                            <div class="col-sm-6">
                                <?php echo '<img src="'.$dirweb.'images/home/girl3.jpg" class="girl img-responsive" alt="" />';
                                  echo '<img src="'.$dirweb.'images/home/pricing.png"  class="pricing" alt="" />'; ?>
                            </div>
                        </div>

                    </div>

                    <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                        <i class="fa fa-angle-left"></i>
                    </a>
                    <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>

            </div>
        </div>
    </div>
</section><!--/slider-->


<div class="col-sm-11 padding-right">
<?php if( !empty($hits) ): ?>
<div class="features_items"><!--features_items-->
    <h2 class="title text-center">Features Items</h2>
    <?php foreach($hits as $hit): ?>
    <div class="col-sm-4">
        <div class="product-image-wrapper">
            <div class="single-products">
                <div class="productinfo text-center">
                    <?= Html::img("@web/images/products/{$hit->img}", ['alt' => $hit->name])?>
                    <h2>$<?= $hit->price?></h2>
                    <p><a href="<?= \yii\helpers\Url::to(['product/view', 'id' => $hit->id]) ?>"><?= $hit->name?></a></p>
                    <a href="<?= \yii\helpers\Url::to(['cart/add', 'id' => $hit->id])?>" data-id="<?= $hit->id?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                </div>
                <?php if($hit->new): ?>
                    <?= Html::img("@web/images/home/new.png", ['alt' => 'Новинка', 'class' => 'new'])?>
                <?php endif?>
                <?php if($hit->sale): ?>
                    <?= Html::img("@web/images/home/sale.png", ['alt' => 'Распродажа', 'class' => 'new'])?>
                <?php endif?>
            </div>
            <div class="choose">
                <ul class="nav nav-pills nav-justified">
                    <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                    <li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
                </ul>
            </div>
        </div>
    </div>
    <?php endforeach;?>
  </div><!--features_items-->
  <?php endif; ?>
</div>

<button class="btn btn-success" id="btn">Click me...</button>

<?php //$this->registerJsFile('@web/js/scripts.js', ['depends' => 'yii\web\YiiAsset']) ?>
<?php //$this->registerJs("$('.container').append('<p>SHOW!!!</p>');", \yii\web\View::POS_LOAD) ?>

<?php

$js = <<<JS
    $('#btn').on('click', function(){
        $.ajax({
            url: 'index.php?r=post/index',
            data: {test: '123'},
            type: 'POST',
            success: function(res){
                console.log(res);
            },
            error: function(){
                alert('Error!');
            }
        });
    });
JS;

$this->registerJs($js);

?>
<?php  
  $baseUrl = Yii::app()->theme->baseUrl; 
  $cs = Yii::app()->getClientScript();
  $cs->registerScriptFile('http://www.google.com/jsapi');
  $cs->registerScriptFile('http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.min.js');
  $cs->registerCoreScript('jquery');
  $cs->registerScriptFile($baseUrl.'/js/jquery.gvChart-1.0.1.min.js');
  $cs->registerScriptFile($baseUrl.'/js/pbs.init.js');
  $cs->registerScriptFile($baseUrl.'/js/jquery-1.7.1.min.js');
  $cs->registerScriptFile($baseUrl.'/js/jquery.gvChart-1.0.1.min.js');
  $cs->registerScriptFile($baseUrl.'/js/bootstrap-transition.js');
  $cs->registerScriptFile($baseUrl.'/js/bootstrap-alert.js');
  $cs->registerScriptFile($baseUrl.'/js/bootstrap-modal.js');
  $cs->registerScriptFile($baseUrl.'/js/bootstrap-dropdown.js');
  $cs->registerScriptFile($baseUrl.'/js/bootstrap-scrollspy.js');
  $cs->registerScriptFile($baseUrl.'/js/bootstrap-tab.js');
  $cs->registerScriptFile($baseUrl.'/js/bootstrap-tooltip.js');
  $cs->registerScriptFile($baseUrl.'/js/bootstrap-popover.js');
  $cs->registerScriptFile($baseUrl.'/js/bootstrap-button.js');
  $cs->registerScriptFile($baseUrl.'/js/bootstrap-collapse.js');
  $cs->registerScriptFile($baseUrl.'/js/bootstrap-carousel.js');
  $cs->registerScriptFile($baseUrl.'/js/bootstrap-typeahead.js');
  $cs->registerCssFile($baseUrl.'/css/jquery.css');
  $cs->registerCssFile($baseUrl.'/css/bootstrap.min.css');
  
?>
	

<?php $this->pageTitle=Yii::app()->name; ?>

<h1>Welcome to <i><?php echo CHtml::encode(Yii::app()->name); ?></i> Homepage</h1>


<div class="slider-bootstrap"><!-- start slider -->
   
    	<div id="myCarousel" class="carousel slide" style="min-height:430px;">
          <?php 

            $this->widget('bootstrap.widgets.TbCarousel', array(
              'items'=>array(
                array(
                    'image'=>Yii::app()->request->baseUrl.'/images/homepage/bul1.jpg',
                    'label'=>CHtml::link('Bulukumba', array('/infonesia/view','id'=>'Bulukumba')),
                    'caption'=>'Kabupaten Bulukumba terletak di ujung paling selatan Semenanjung Sulawesi Selatan, atau sekitar 153 km dari selatan kota Makassar.' .
                    'Bulukumba dianugrahi alam yang indah dan menyimpan keajaiban menawan tersembunyi di pantai dan bawah lautnya. '
                ),
                array(
                    'image'=>Yii::app()->request->baseUrl.'/images/homepage/bun1.jpg',
                    'label'=>CHtml::link('Bunaken', array('/infonesia/view','id'=>'Bunaken')),
                    'caption'=>' Bunaken merupakan bagian dari pemerintahan kota Manado, ibu kota Sulawesi Utara.' .
                    'Taman laut di sekitar Bunaken adalah bagian dari Taman Nasional yang juga termasuk laut sekitar pulau Manado Tua yaitu Siladen dan Mantehage.'
                ),
                array(
                    'image'=>Yii::app()->request->baseUrl.'/images/homepage/giltraw5.jpg',
                    'label'=>CHtml::link('Gili Trawangan', array('/infonesia/view','id'=>'Gili Trawangan')),
                    'caption'=>'Gili Trawangan adalah pulau terbesar dari ketiga pulau kecil atau gili yang terdapat di sebelah barat laut Lombok. ' .
                    'Trawangan juga satu-satunya gili yang ketinggiannya di atas permukaan laut cukup signifikan. '
                ),
                array(
                    'image'=>Yii::app()->request->baseUrl.'/images/homepage/jimb4.jpg',
                    'label'=>CHtml::link('Jimbaran', array('/infonesia/view','id'=>'Jimbaran')),
                    'caption'=>'Jimbaran adalah sebuah pantai di Kabupaten Badung, Bali, Indonesia. ' .
                    'Jimbaran merupakan tempat wisata favorit di Bali, menawarkan berbagai daya tarik makanan laut / seafood centre yang terletak di pinggir pantai, suasana sunset (matahari tenggelam) yang indah kemudian suasana malam pantainya yang romantis'
                ),
                array(
                    'image'=>Yii::app()->request->baseUrl.'/images/homepage/lhok5.jpg',
                    'label'=>CHtml::link('Lhok Seudu', array('/infonesia/view','id'=>'Lhok Seudu')),
                    'caption'=>'Dengan berjarak sekitar 30 km dari kota Banda Aceh, Lhok Seudu merupakan suatu daerah yang berdekatan dengan sebelah barat Banda Aceh.  ' .
                    'LhokSeudu menyimpan potensi alam untuk wisata, khususnya untuk wisata memancing. Panorama alam kaki gunung kulu dan indahnya pantai pasir putih yang membentuk kolam seperti danau kecil di antara dua pulau membuat tempat ini menjadi salah satu tempat favorit para wisatawan maupun penduduk local untuk memancing '
                ),
              ),
            ));?>
    </div>
</div> <!-- /slider -->




    
    
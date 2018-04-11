 <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="3000">
  <div class="carousel-inner">
   <?php foreach ($banner as $key => $row): ?>
    <?php if($key == 0)  {  ?> 
    <div class="item active parallax"
    style = "background-image: url('<?php 
    echo str_replace('/apanel', '', BASE_URL) . "uploads/items/large/".$row->image?>');" id = "wid"> 
    <div class="carousel-caption">
     <h3 id = "caption"><?php echo $row->content; ?></h3>
   </div>
 </div>
 <?php }  else {  ?> 
 <div class="item parallax"
 style = "background-image: url('<?php 
 echo str_replace('/apanel', '', BASE_URL) . "uploads/items/large/".$row->image?>');" id = "wid"> 
 <div class="carousel-caption">
   <h3 id = "caption"><?php echo $row->content; ?></h3>
 </div>
</div>
<?php } ?> 

<?php endforeach ?>
</div>

<a class="left carousel-control" href="#myCarousel" data-slide="prev">
 <span class="glyphicon glyphicon-menu-left"></span>
 <span class="sr-only">Previous</span>
</a>
<a class="right carousel-control" href="#myCarousel" data-slide="next">
 <span class="glyphicon glyphicon-menu-right"></span>
 <span class="sr-only">Next</span>
</a>
</div>

<div class="wrapper">
  <main>
   <section id = "about">
    <div class="panel panel-default full-width">
     <div class="panel-heading" style = "background-image: url('<?= BASE_URL ?>assets/images/metal_nav.jpg');">
      <h3 style ="text-align: center; text-shadow: 1px 1px white;"><b>FILIPINAS ASIA SHUTTER DOOR CORPORATION</b></h3>
    </div>
    <section class="module content" style = "background-image: url('<?= BASE_URL ?>assets/images/metal.jpg');">
      <div class="container">

       <p id = "alignment">MISSION</p>
       <p id = "alignment"><?php echo $mission_content; ?></p>

       <p id = "alignment">VISION</p>
       <p id = "alignment"><?php echo $vision_content; ?></p>

       <p id = "alignment">COMMITMENT</p>
       <p id = "alignment"><?php echo $commitment_content; ?></p>

       <p id = "alignment">PROVEN TECHNOLOGY</p>
       <p id = "alignment"><?php echo $tech_content; ?></p>

     </div>
   </section>
 </div>
</section>

<section id = "products">
  <h3 class="full-width" style = "background-image: url('<?= BASE_URL ?>assets/images/metal_nav.jpg');">
   <div class="wrap">PRODUCT LINES</div>
   <section class="module content" style = "background-image: url('<?= BASE_URL ?>assets/images/metal.jpg');">
    <div class="container">
     <div class = "row">

       <div class="bstimeslider">
        <div id="rightArrow"><span class = "fa fa-chevron-right" style = "margin-top: 150px;"></span></div>
        <div id="viewContainer">
         <div id="tslshow">
          <?php foreach ($products as $key => $row) :?>
            <?php if($key % 2 == 0) { ?>
            <div class="bktibx">
              <?php
              echo '<img id = "pic" src="' . str_replace('/apanel', '', BASE_URL) . "uploads/items/thumb/".$row->image_1.'">' ?>
              <br>
              <br>
              <a id = "buttons" href="<?= BASE_URL ?>product/view/<?= $row->id ?>" class = "btn btn-default">
                <i class="fa fa-hand-o-right" aria-hidden="true"></i> LEARN MORE</a>
                <br>
                <br>
                <br>
                <?php  } else if($key % 2 == 1){ ?>
                <?php
                echo '<img id = "pic" src="' . str_replace('/apanel', '', BASE_URL) . "uploads/items/thumb/".$row->image_1.'">' ?>
                <br>
                <br>
                <a id = "buttons" href="<?= BASE_URL ?>product/view/<?= $row->id ?>" class = "btn btn-default">
                  <i class="fa fa-hand-o-right" aria-hidden="true"></i> LEARN MORE</a>
                  <br>
                  <br>
                </div>
                <?php  } ?>
              <?php endforeach; ?>
            </div>
          </div>
          <div id="leftArrow"><span class = "fa fa-chevron-left" style = "margin-left: 30px; margin-top: 150px;"></span></div>
        </div>
      </h3>
    </section>
  </section>

  <section id = "projects">
    <h3 class="full-width" style = "background-image: url('<?= BASE_URL ?>assets/images/metal_nav.jpg');">
     <div class = "wrap">PROJECT HIGHLIGHTS</div>
     <div id="myCarousel2" class="carousel slide" data-ride="carousel" data-interval="5000">
       <div class="carousel-inner">
         <?php foreach ($highlights as $key => $row) : ?>
           <?php  if($key == 0) { ?>
           <div class="item active parallax" style = "background-image: url('<?php 
           echo str_replace('/apanel', '', BASE_URL) . "uploads/items/large/".$row->image?>');" id = "wid">
           <div class="carousel-caption">
            <h3 id = "caption"><?php echo $row->title; ?>
              <br>
              <a href="<?= BASE_URL ?>highlights/view/<?= $row->id ?>" class = "btn btn-default">LEARN MORE</a>
            </h3>
          </div>
        </div>
        <?php  }  else { ?>

        <div class="item parallax" style = "background-image: url('<?php 
        echo str_replace('/apanel', '', BASE_URL) . "uploads/items/large/".$row->image?>');" id = "wid"> 
        <div class="carousel-caption">
          <h3 id = "caption"><?php echo $row->title; ?>
            <br>
            <a href="<?= BASE_URL ?>highlights/view/<?= $row->id ?>" class = "btn btn-default">LEARN MORE</a>
          </h3>
        </div>
      </div>
      <?php } ?> 

    <?php endforeach; ?>
  </div>

  <a class="left carousel-control" href="#myCarousel2" data-slide="prev">
    <span class="glyphicon glyphicon-menu-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel2" data-slide="next">
    <span class="glyphicon glyphicon-menu-right"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
</h3>
</section>

<section id = "lists">
 <h3 class="full-width" style = "background-image: url('<?= BASE_URL ?>assets/images/metal_nav.jpg');">
  <div class="wrap">LIST OF PROJECT AND CLIENTS</div>
  <div id="myCarousel3" class="carousel slide" data-ride="carousel" data-interval="5000">

   <div class="carousel-inner">
     <?php foreach ($projects as $key => $row) : ?>
       <?php  if($key == 0) { ?>
       <div class="item active parallax" style = "background-image: url('<?php 
       echo str_replace('/apanel', '', BASE_URL) . "uploads/items/large/".$row->image?>');" id = "wid"> 
       <div class="carousel-caption">
        <h3 id = "caption"><?php echo $row->title; ?>
          <br>
          <a href="<?= BASE_URL ?>projects/view/<?= $row->id ?>" class = "btn btn-default">LEARN MORE</a>
        </h3>
      </div>
    </div>
    <?php  }  else { ?>

    <div class="item parallax" style = "background-image: url('<?php 
    echo str_replace('/apanel', '', BASE_URL) . "uploads/items/large/".$row->image?>');" id = "wid"> 
    <div class="carousel-caption">
      <h3 id = "caption"><?php echo $row->title; ?>
        <br>
        <a href="<?= BASE_URL ?>projects/view/<?= $row->id ?>" class = "btn btn-default">LEARN MORE</a>
      </h3>
    </div>
  </div>
  <?php } ?> 

<?php endforeach; ?>

</div>

<a class="left carousel-control" href="#myCarousel3" data-slide="prev">
 <span class="glyphicon glyphicon-menu-left"></span>
 <span class="sr-only">Previous</span>
</a>
<a class="right carousel-control" href="#myCarousel3" data-slide="next">
 <span class="glyphicon glyphicon-menu-right"></span>
 <span class="sr-only">Next</span>
</a>
</div>
</h3>
</section>
</main><!-- /main -->
<br>

</div>

<script>
  $(document).ready(function(){
  // Add scrollspy to <body>
  $('body').scrollspy({target: ".navbar", offset: 50}); 

  $("#myNavbar a").on('click', function(event) {

    if (this.hash !== "") {

      event.preventDefault();

      var hash = this.hash;

      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 800, function(){
        window.location.hash = hash;
      });
    }
  });
});
</script>

<script>
  $(document).ready(function(){

  //Check to see if the window is top if not then display button
  $(window).scroll(function(){
    if ($(this).scrollTop() > 100) {
      $('.scrollToTop').fadeIn();
    } else {
      $('.scrollToTop').fadeOut();
    }
  });
  
  //Click event to scroll to top
  $('.scrollToTop').click(function(){
    $('html, body').animate({scrollTop : 0},800);
    return false;
  });
  
});
</script>

<script>
  var view = $("#tslshow");
  var move = "350px";
  var sliderLimit = -750;

  $("#rightArrow").click(function(){

    var currentPosition = parseInt(view.css("left"));
    if (currentPosition >= sliderLimit) view.stop(false,true).animate({left:"-="+move},{ duration: 100})

  });

  $("#leftArrow").click(function(){

    var currentPosition = parseInt(view.css("left"));
    if (currentPosition < 0) view.stop(false,true).animate({left:"+="+move},{ duration: 100})

  });
</script>
<!DOCTYPE html>
<html>
  <head>
    <title><?php echo $news['title']; ?></title>
    <?php $this->load->view('include/css_common'); ?>
  </head>
  <body class="">
    <?php $this->load->view('include/header');
      $pageURL = (@$_SERVER["HTTPS"] == "on") ? "https://" : "http://";
      if ($_SERVER["SERVER_PORT"] != "80") {
          $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
      }
      else {
          $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
      }
    ?>
    <div class="f8-sec-main container">
      <section class="f8-sec-top">

      </section>
      <section class="f8-sec-body">
        <div class="row f8-sec-body-inner">
          <div class="f8-sec-main-col col-lg-9 col-md-9 col-sm-8 col-xs-12">
            <div class="f8-sec-blocks">
              <div class="f8-news-single">
                <div class="news-title"><?php echo $news['title']; ?></div>
                <div class="news-time-author">
                  <span class="news-date-time"><?php echo $news['created']; ?></span>
                  <span class="news-author">By <?php echo $this->ion_auth->getUserName($news['author']); ?></span>
                </div>
                <div class="news-image-gallery">
                  <div id="carousel-news-image-gallery" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                      <?php
                        $images = explode(',', $news['images']);
                        $count = count($images);
                        $i = 0; foreach ($images as $image):
                      ?>
                      <!-- <li data-target="#carousel-news-image-gallery" data-slide-to="<?php echo $i; ?>" class="<?php if($i === 0 ) echo 'active'; ?>"></li> -->
                      <?php $i++; endforeach; ?>
                    </ol>

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner" role="listbox">
                      <?php
                        $i = 0; foreach ($images as $image):
                      ?>
                        <div class="item <?php if($i === 0 ) echo 'active'; ?>">
                          <img src="<?php echo base_url(UPLOADS  .  $image); ?>" alt="...">
                          <!-- <div class="carousel-caption">
                             Caption Goes HereCaption Goes HereCaption Goes HereCaption Goes HereCaption Goes HereCaption Goes Here
                          </div> -->
                        </div>
                      <?php $i++; endforeach; ?>
                    </div>

                    <!-- Controls -->
                    <a class="left carousel-control" href="#carousel-news-image-gallery" role="button" data-slide="prev">
                      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                      <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#carousel-news-image-gallery" role="button" data-slide="next">
                      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                      <span class="sr-only">Next</span>
                    </a>
                  </div>
                </div>
                <div class="news-body">
                  <div id="share" data-target-url="<?php echo $pageURL;?>"></div>
                  <?php echo $news['news_full']; ?>
                </div>
              </div>
            </div>
          </div>
          <div class="f8-sec-sidebar-col col-lg-3 col-md-3 col-sm-4 col-xs-12">
            <?php foreach($ads_infos as $ad_info): ?>
              <div class="well well-sm f8-sec-sidebar-block">
                <img src="<?php echo base_url(UPLOADS  .  explode(',', $ad_info->images)[0]) ; ?>" width="100%">
                <h4><?php echo $ad_info->ad_name ; ?></h4>
                <p><?php echo $ad_info->description ; ?></p>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      </section>
    </div>
    <?php $this->load->view('include/footer'); ?>
    <?php $this->load->view('include/templates'); ?>
    <?php $this->load->view('include/js_common'); ?>
  </body>
</html>

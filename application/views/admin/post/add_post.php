<!DOCTYPE html>
<html>
  <head>
    <title>f8news-Admin</title>
    <?php $this->load->view('include/css_common'); ?>
  </head>
  <body>
    <?php $this->load->view('include/header'); ?>
    <div class="f8-sec-main">
      <div class="f8-admin-container row">
        <section class="f8-sec-admin-sidebar  col-lg-2 col-md-3 col-sm-4 col-xs-12">
          <?php $this->load->view('admin/sidebar_menu'); ?>
        </section>
        <section class="f8-sec-admin-body  col-lg-10 col-md-9 col-sm-8 col-xs-12">
          <div class="f8-sec-inner-block">
            <div class="f8-sec-heading">
              Add New Article
            </div>

            <!-- <form method="post" action="#"> -->
            <?php echo form_open("article/create");?>
              <div class="form-group">
                <label for="input-post-title" class="control-label">Slug</label>
                <!-- <div class="col-sm-10"> -->
                <input name="article_title" type="text" class="form-control" id="article-title" placeholder="Title">
                <!-- </div> -->
              </div>
              <div class="form-group">
                <label for="input-post-brief" class="control-label">Brief Post</label>
                <!-- <div class="col-sm-10"> -->
                <textarea name="article_short" type="text" class="form-control" id="article-short" rows="5" cols="80">
                </textarea>
                <!-- </div> -->
              </div>
              <div class="form-group">
                <label for="input-last-name" class="control-label">Complete Post</label>
                <!-- <div class="col-sm-10"> -->
                <textarea name="article_full" type="text" class="form-control" id="article-full" rows="10" cols="80"></textarea>
                <!-- </div> -->
              </div>
              <div class="form-group">
                <div class="">
                  <button type="submit" class="btn btn-warning">Publish</button>
                  <button type="button" class="btn btn-default">Preview</button>
                </div>
              </div>
            </div>
          </form>
          </div>
        </section>
      </div>
    </div>
    <?php $this->load->view('include/footer'); ?>
    <?php $this->load->view('include/templates'); ?>
    <?php $this->load->view('include/js_common'); ?>
  </body>
</html>

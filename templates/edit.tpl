{c2r-return-message}
<div class="spacer30 mb-spacer15"></div>
<div class="row">
  <div class="col-md-4 tacenter">
        <div class="row">
              <img src="http://www.gravatar.com/avatar/{c2r-md5-mail}?s=300&r=g&d=mm" class="img-circle">
        </div>

        <div class="spacer30"></div>

        <div class="row">
              <!--USER INFO - BEGINS-->

              <p>{c2r-username}</p>
              <p>{c2r-email}</p>
              <p>{c2r-rank}</p>
              <p>{c2r-code}</p>

              <!--USER INFO - ENDS-->
        </div>

        <div class="spacer30"></div>

      <div class="row">
        <div class="col-md-12 tacenter">
            <center>
                <form method="post" name="form" id="form" action="{c2r-path-bo}/0/{c2r-lg}/{c2r-path-module}/remove/{c2r-user-id}" enctype="multipart/form-data">
                    <!-- CHECK IF DELETE FIELD-->
                    <div>
                      <div class="form-group">
                          <div class="checkbox">
                              <label><input name="inputRemove" id="inputRemove" type="checkbox" value="1" required>{c2r-lg-check-remove}</label>
                          </div>
                      </div>

                      <button type="submit" class="btn btn-save pull-center" name="remove_btn" id="remove_btn"><i class="fa fa-eraser" aria-hidden="true"></i><div class="block15"></div>{c2r-lg-remove}</button>

                    </div>
                </form>
            </center>
            <!--<a href="{c2r-path-bo}/0/{c2r-lg}/{c2r-path-module}/remove/{c2r-user-id}" class="btn btn-del" role="button" onclick="return confirm('{c2r-lg-sure}');"><i class="fa fa-eraser" aria-hidden="true"></i><div class="block15"></div>{c2r-lg-remove}</a>-->
        </div>
      </div>
  </div>
  <div class="col-md-8">
      {c2r-edituser-form}
  </div>
</div>

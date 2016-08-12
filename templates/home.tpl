<style>

  .table > tbody > tr > td
  {
    vertical-align: middle;
  }

</style>

<div class="container-fluid">
  <div class="row">
    <a href="http://ms.critec.pt/0/en/users/add" class="btn btn-add" role="button"><i class="fa fa-plus" aria-hidden="true"></i><div class="block15"></div>{c2r-lg-add-btn}</a>
  </div>

    <div class="row">
        <div class="col-sm-12">
            <table class="table table-striped">
              <tbody>
                <tr> <!--TABLE'S HEADINGS-->
                  <th>#</th><!--USER'S ID-->
                  <th>{c2r-lg-gravatar-title}</th><!--USER'S AVATAR-->
                  <th>{c2r-lg-username-title}</th><!--USER'S NAME-->
                  <th>{c2r-lg-email-title}</th><!--USER'S E-MAIL-->
                  <th>{c2r-lg-rank-title}</th><!--USER'S RANK-->
                  <th>{c2r-lg-status-title}</th><!--USER'S STATUS-->
                  <th>{c2r-lg-date-title}</th><!--USER'S REGISTRATION DATE-->
                  <th>{c2r-lg-action-title}</th><!--USER EDIT BTN-->
                </tr>

                {c2r-home-list}

              </tbody>
            </table>
        </div>
    </div>
</div>

<div class='panel panel-default'>
            <div class='panel-heading'>
                  <p>خيارات البحت</p>
            </div>
            <div class='panel-body'>
              <div class='container-fluid'>
                  <form action="search.php" method='POST'>
                      <div class='row'>
                      <div class='col-xs-12 col-sm-12 col-md-6 col-lg-6'>

                       <select name='minAge' class='form-control margin-UD'>
                           <option value="5">الحد الادنى للعمر</option>
                          <?php
                          for($x=6;$x<=91;$x++){
                              echo "<option value='$x'>$x</option>";
                          };
                          ?>
                       </select>

                       <select name='maxAge' class='form-control margin-UD'>
                           <option value="92">الحد الاقصى للعمر</option>
                           <?php
                          for($x=6;$x<=91;$x++){
                              echo "<option value='$x'>$x</option>";
                          };
                          ?>
                       </select>
                      </div>
                      <div class='col-xs-12 col-sm-12 col-md-6 col-lg-6'>

                       <select name='town' class='form-control margin-UD'>
                           <option value="%">المدينة</option>
                           <option value="طرابلس">طرابلس</option>
                           <option value="بنغازي">بنغازي</option>
                           <option value="مصراته">مصراته</option>
                           <option value="الخمس">الخمس</option>
                           <option value="زليطن">زليطن</option>
                       </select>

                       <select name='status' class='form-control margin-UD'>
                           <option value="%">الحالة الاجتماعية</option>
                           <option value='اعزب'>اعزب</option>
                           <option value="متزوج">متزوج</option>
                           <option value="مخطوب">مخطوب</option>
                       </select>
                      </div>
                      <div class='margin-UD col-sm-12'>
                            <button type='submit' class='button btn btn-info btn-block'><i class='fa fa-search margin-LR'></i>بحت</button>
                      </div>
                      </div>
                  </form>
              </div>
            </div>
          </div>
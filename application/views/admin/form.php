<?php $this->load->view('admin/header'); ?>
  <section id="content">
    <section class="main padder">
      <div class="clearfix">
        <h4><i class="icon-edit"></i>Form</h4>
      </div>
      <div class="row">
        <div class="col-lg-6">
          <section class="panel">
            <form class="form-horizontal" method="get" data-validate="parsley">
              <div class="form-group">
                <label class="col-lg-3 control-label">Photo</label>
                <div class="col-lg-9 media">
                  <div class="bg-light pull-left text-center media-large thumb-large"><i class="icon-user inline icon-light icon-3x m-t-large m-b-large"></i></div>
                  <div class="media-body">
                    <input type="file" name="file" title="Change" class="btn btn-small btn-info m-b-small"><br>
                    <button class="btn btn-small btn-default">Delete</button>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label class="col-lg-3 control-label">Email</label>
                <div class="col-lg-8">
                  <input type="text" name="email" placeholder="test@example.com" class="bg-focus form-control" data-required="true" data-type="email">
                </div>
              </div>
              <div class="form-group">
                <label class="col-lg-3 control-label">Password</label>
                <div class="col-lg-8">
                  <input type="password" name="password" placeholder="Password" class="bg-focus form-control">
                  <div class="line line-dashed m-t-large"></div>
                </div>
              </div>
              <div class="form-group">
                <label class="col-lg-3 control-label">Username</label>
                <div class="col-lg-8">
                  <input type="text" name="username" placeholder="Username" data-required="true" class="form-control">
                </div>
              </div>
              <div class="form-group">
                <label class="col-lg-3 control-label">Account</label>
                <div class="col-lg-4">
                  <select name="account" class="form-control">
                    <option value="1">Editor</option>
                    <option value="0">Admin</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="col-lg-3 control-label">Registered</label>
                <div class="col-lg-9">
                  <input type="text" class="combodate form-control" data-format="DD-MM-YYYY" data-template="D  MMM  YYYY" name="datetime" value="21-12-2012">
                </div>
              </div>
              <div class="form-group">
                <label class="col-lg-3 control-label">Profile</label>
                <div class="col-lg-8">
                  <textarea placeholder="Profile" rows="5" class="form-control" data-trigger="keyup" data-rangelength="[20,200]"></textarea>
                  <div class="checkbox">
                    <label>
                      <input name="agree" type="checkbox"> Agree the <a href="#">terms and policy</a>
                    </label>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="col-lg-9 col-offset-3">
                  <button type="submit" class="btn btn-white">Cancel</button>
                  <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
              </div>
            </form>
          </section>
          <section class="panel">
            <div class="wizard clearfix m-b" id="form-wizard">
              <ul class="steps">
                <li data-target="#step1" class="active"><span class="badge badge-info">1</span>Step 1</li>
                <li data-target="#step2"><span class="badge">2</span>Step 2</li>
                <li data-target="#step3"><span class="badge">3</span>Step 3</li>
              </ul>
            </div>
            <div class="step-content">
              <form>
                <div class="step-pane active" id="step1">
                  <p>Your website:</p>
                  <input type="text" class="input-small form-control" data-trigger="change" data-required="true" data-type="url" placeholder="website">
                </div>
                <div class="step-pane" id="step2">
                  <p>Your email:</p>
                  <input type="text" class="input-small form-control" data-trigger="change" data-required="true" data-type="email" placeholder="email address">
                </div>
                <div class="step-pane" id="step3">This is step 3</div>
              </form>
              <div class="actions m-t">
                <button type="button" class="btn btn-white btn-small btn-prev" data-target="#form-wizard" data-wizard="previous" disabled="disabled">Prev</button>
                <button type="button" class="btn btn-white btn-small btn-next" data-target="#form-wizard" data-wizard="next" data-last="Finish">Next</button>
              </div>
            </div>
          </section>
        </div>
        <div class="col-lg-6">
          <div class="panel">
            <div class="clearfix">
              <div class="col-lg-12">
                Radio and Checkbox (Retina display)
              </div>
              <div class="col-lg-6">
                <!-- radio -->
                <div class="radio">
                  <label class="radio-custom">
                    <input type="radio" name="radio" checked="checked">
                    <i class="icon-circle-blank"></i>
                    Item one checked
                  </label>
                </div>
                <div class="radio">
                  <label class="radio-custom">
                    <input type="radio" name="radio">
                    <i class="icon-circle-blank"></i>
                    Item two
                  </label>
                </div>
                <div class="radio">
                  <label class="radio-custom">
                    <input type="radio" name="radio" disabled="disabled">
                    <i class="icon-circle-blank"></i>
                    Item three disabled
                  </label>
                </div>
                <div class="radio">
                  <label class="radio-custom">
                    <input type="radio" checked="checked" disabled="disabled">
                    <i class="icon-circle-blank"></i>
                    Item four checked disabled
                  </label>
                </div>
              </div>
              <div class="col-lg-6">
                <!-- checkbox -->
                <div class="checkbox">
                  <label class="checkbox-custom">
                    <input type="checkbox" name="checkboxA" checked="checked">
                    <i class="icon-unchecked"></i>
                    Item one checked
                  </label>
                </div>
                <div class="checkbox">
                  <label class="checkbox-custom">
                    <input type="checkbox" name="checkboxB" id="2">
                    <i class="icon-unchecked"></i>
                    Item two
                  </label>
                </div>
                <div class="checkbox">
                  <label class="checkbox-custom">
                    <input type="checkbox" name="checkboxC" disabled="disabled">
                    <i class="icon-unchecked"></i>
                    Item three disabled
                  </label>
                </div>
                <div class="checkbox">
                  <label class="checkbox-custom">
                    <input type="checkbox" name="checkboxD" checked="checked" disabled="disabled">
                    <i class="icon-unchecked"></i>
                    Item four checked disabled
                  </label>
                </div>
              </div>
              <div class="col-lg-12">
                <p>Combobox</p>
                <div id="myCombobox" class="input-group dropdown combobox m-b">
                  <input class="input-small form-control" name="combobox" type="text">
                  <div class="input-group-btn">
                    <button type="button" class="btn btn-small btn-white dropdown-toggle" data-toggle="dropdown"><i class="caret"></i></button>
                    <ul class="dropdown-menu pull-right">
                      <li data-value="1" data-selected="true"><a href="#">Item One</a></li>
                      <li data-value="2"><a href="#">Item Two</a></li>
                      <li data-value="3" data-fizz="buzz"><a href="#">Item Three</a></li>
                      <li class="divider"></li>
                      <li data-value="4"><a href="#">Item Four</a></li>
                    </ul>
                  </div>
                </div>
                <p>Select</p>
                <div id="mySelect" class="select btn-group m-b" data-resize="auto">
                  <button type="button" data-toggle="dropdown" class="btn btn-white btn-small dropdown-toggle">
                    <span class="dropdown-label"></span> <span class="caret"></span>
                  </button>
                  <ul class="dropdown-menu">
                    <li data-value="1" data-selected="true"><a href="#">Item One</a></li>
                    <li data-value="2"><a href="#">Item Two</a></li>
                    <li data-value="3" data-fizz="buzz"><a href="#">Item Three</a></li>
                    <li class="divider"></li>
                    <li data-value="4"><a href="#">Item Four</a></li>
                  </ul>
                </div>
                <p>Spinner</p>
                <div id="MySpinner" class="spinner input-group m-b">
                  <input type="text" class="input-small spinner-input form-control" name="spinner" maxlength="3">
                  <div class="btn-group btn-group-vertical input-group-btn">
                    <button type="button" class="btn btn-white spinner-up">
                      <i class="icon-chevron-up"></i>
                    </button>
                    <button type="button" class="btn btn-white spinner-down">
                      <i class="icon-chevron-down"></i>
                    </button>
                  </div>
                </div>
                <p>Dropdown select</p>
                <div class="btn-group">
                  <button data-toggle="dropdown" class="btn btn-small btn-white dropdown-toggle">
                    <span class="dropdown-label">Option1</span>
                    <span class="caret"></span>
                  </button>
                  <ul class="dropdown-menu dropdown-select">
                    <li class="active"><a href="#"><input type="radio" name="d-s-r" checked="">Option1</a></li>
                    <li><a href="#"><input type="radio" name="d-s-r">Option2</a></li>
                    <li><a href="#"><input type="radio" name="d-s-r">Option3</a></li>
                    <li class="disabled"><a href="#"><input type="radio" name="d-s-r" disabled="">I'm disabled</a></li>
                  </ul>
                </div>
                <div class="btn-group">
                  <button data-toggle="dropdown" class="btn btn-small btn-white dropdown-toggle">
                    <span class="dropdown-label" data-placeholder="Please select">Please select</span>
                    <span class="caret"></span>
                  </button>
                  <ul class="dropdown-menu dropdown-select">
                    <li><a href="#"><input type="checkbox" name="d-s-c-1">Option1</a></li>
                    <li><a href="#"><input type="checkbox" name="d-s-c-2">Option2</a></li>
                    <li><a href="#"><input type="checkbox" name="d-s-c-3">Option3</a></li>
                    <li><a href="#"><input type="checkbox" name="d-s-c-4">Option4</a></li>
                    <li><a href="#"><input type="checkbox" name="d-s-c-5">Option5</a></li>
                  </ul>
                </div>
                <div class="input-group m-b m-t">
                  <input type="text" id="appendedInput" class="input-small form-control">
                  <div class="input-group-btn">
                    <button class="btn btn-white btn-small dropdown-toggle" data-toggle="dropdown">
                      <span class="dropdown-label">USD</span>
                      <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu dropdown-select pull-right">
                      <li class="active">
                        <a href="#"><input type="radio" value="USD" name="pay_unit" checked="">USD</a>
                      </li>
                      <li>
                        <a href="#"><input type="radio" value="GBP" name="pay_unit">GBP</a>
                      </li>
                    </ul>
                  </div>
                </div>
                <p>Pillbox</p>
                <div id="MyPillbox" class="pillbox clearfix m-b">
                  <ul>
                    <li class="label">Item One</li>
                    <li class="label bg-success">Item Two</li>
                    <li class="label bg-warning">Item Three</li>
                    <li class="label bg-danger">Item Four</li>
                    <li class="label bg-info">Item Five</li>
                    <li class="label bg-success">Item Six</li>
                    <li class="label bg-default">Item Seven</li>
                    <input type="text" placeHolder="add a pill">
                  </ul>
                </div>
                <p>Datepicker</p>
                <div class="m-b row">
                  <div class="col-lg-6">
                    <input class="input-small form-control datepicker" size="16" type="text" value="12-02-2013" data-date-format="dd-mm-yyyy" >
                  </div>
                </div>
                <p>Slider</p>
                <div>
                  <input class="slider" type="text" value="" data-slider-min="-20" data-slider-max="20" data-slider-step="1" data-slider-value="-14" data-slider-selection="after">
                </div>
                <div class="dropfile visible-lg m-t">
                  <small>Drag and Drop file here</small>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </section>
<?php $this->load->view('admin/footer'); ?>
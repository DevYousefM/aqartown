@extends('layouts.admin')

@section('content')

<div class="content-area">
              <div class="mr-breadcrumb">
                <div class="row">
                  <div class="col-lg-12">
                      <h4 class="heading">Template Settings</h4>
                    <ul class="links">
                      <li>
                        <a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }} </a>
                      </li>
                      <li>
                        <a href="javascript:;">{{ __('General Settings') }}</a>
                      </li>
                      <li>
                        <a href="{{ route('admin-template') }}">Template</a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="add-product-content">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="product-description">
                      <div class="body-area">
                        <div class="gocover" style="background: url({{asset('assets/images/'.$gs->admin_loader)}}) no-repeat scroll center center rgba(45, 45, 45, 0.5);"></div>
                        <form id="geniusform" action="{{ route('admin-gs-update') }}" method="POST" enctype="multipart/form-data">
                          {{ csrf_field() }}

                            @include('includes.admin.form-both')  

                     
                      <div class="row justify-content-center">
                              <div class="col-lg-3">
                                <div class="left-area">
                                  <h4 class="heading">
                                      
                                    
                                    Choose Template
                                  </h4>
                                </div>
                              </div>
                              <div class="col-lg-6">
                                  <div class="tawk-area">
                                  <select name="templatee_select"
                                   class="form-control">
                                   <option value="1">Free Template</option> 
                                    <option  value="11" > Template 1</option>
                                    <option  value="2" > Template 2</option>
                                    <option  value="222" > Template 2-new</option>
                                    <option  value="3" > Template 3</option>
                                   <option  value="4" > Template 4</option>
                                    <option  value="55" > Template 5-new</option>
                                    <option  value="5" > Template 5</option>
                                    <option  value="66" > Template 6 New</option>
                                    <option  value="6" > Template 6</option>
                                     <option  value="7" > Template 7</option>
                                    <option  value="8" > Template 8</option>
                                   <option  value="9" > Template 9</option>
                                      <option  value="10" > Template 10</option>
                                    <option  value="111" > Template 11</option>
                                    <option  value="1111" > Template 11 New</option>
                                    <option  value="12" > Template 12</option>
                                    <option  value="13" > Template 13</option>
                                     <option  value="14" > Template 14</option>
                                    <option  value="15" > Template 15</option>
                                    <option  value="155" > Template 15-new</option>
                                    <option  value="16" > Template 16</option>
                                    <option  value="166" > Template 16-new</option>
                                    <option  value="17" > Template 17</option>
                                    <option  value="18" > Template 18</option>
                                     <option  value="19" > Template 19</option>
                                    <option  value="20" > Template 20</option>
                                      <option  value="21" > Template 21</option>
                                      <option  value="22" > Template 22</option>
                                      <option  value="23" > Template 23</option>
                                      <option  value="24" > Template 24</option>
                                    <option  value="25" > Template 25</option>
                                      <option  value="26" > Template 26</option>
                                     <option  value="27" > Template 27</option>
                                      <option  value="28" > Template 28</option>
                                    <option  value="29" > Template 29</option>
                                     <option  value="30" > Template 30</option>
                                    <option  value="31" > Template 31</option>
                                     <option  value="32" > Template 32</option>
                                   </select>

                                  </div>
                              </div>
                            </div>          
                        <div class="row justify-content-center">
                          <div class="col-lg-3">
                            <div class="left-area">
                              
                            </div>
                          </div>
                          <div class="col-lg-6">
                            <button class="addProductSubmit-btn" type="submit">{{ __('Save') }}</button>
                          </div>
                        </div>
                     </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

@endsection
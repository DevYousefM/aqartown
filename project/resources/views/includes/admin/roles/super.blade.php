<li>
    <a href="#homepage" class="accordion-toggle wave-effect" data-toggle="collapse" aria-expanded="false">
        <i class="fas fa-edit"></i>{{ __('Home Page Settings') }}
    </a>
    <ul class="collapse list-unstyled" id="homepage" data-parent="#accordion">

        <li>
            <a href="{{ route('admin-sl-index') }}"><span>{{ __('Sliders') }}</span></a>
        </li>


        <li><a href="{{ route('admin-country-index') }}"><span>{{ __('abount us') }}</span></a></li>
        <!-- <li><a href="{{ route('admin-city-index') }}"><span>{{ __('Some Service Section') }}</span></a></li>
            <li><a href="{{ route('admin-country-management') }}"><span>{{ __('first about us') }}</span></a></li>




        <li>
            <a href="{{ route('admin-review-index') }}"> <span>{{ __('review') }}</span></a>
        </li>
        -->
        <li>
            <a href="{{ route('admin-ads-index') }}"> <span>{{ __('last work') }}</span></a>
        </li>

        {{--  <li>
              <a href="{{ route('admin-package-index') }}"><span>{{ __('counter') }}</span></a>
          </li> --}}

    </ul>
</li>
<!--   -->




<!--   -->
<li>
    <a href="#menu3" class="accordion-toggle wave-effect" data-toggle="collapse" aria-expanded="false">
        <i class="icofont-user"></i>{{ __('About us') }}
    </a>
    <ul class="collapse list-unstyled" id="menu3" data-parent="#accordion">


        <li><a href="{{ route('admin-home_about-index') }}"><span>{{ __('about us section') }}</span></a></li>


        <!--



      -->


        <!--


          -->
    </ul>
</li>

<li>
    <a href="#menu2" class="accordion-toggle wave-effect" data-toggle="collapse" aria-expanded="false">
        <i class="fas fa-fw fa-newspaper"></i>{{ __('unit rent') }}<span class="badge badge-danger">New</span>
    </a>
    <ul class="collapse list-unstyled" id="menu2" data-parent="#accordion">

        <!--<li class="@if (request()->is('admin/attribute/*/manage') && request()->input('type') == 'category') active @endif">
             <a href="{{ route('admin-cat-index') }}"><span>{{ __('Main unit') }}</span></a>
         </li>-->
        <li class="@if (request()->is('admin/attribute/*/manage') && request()->input('type') == 'subcategory') active @endif">
            <a href="{{ route('admin-subcat-index') }}"><span>{{ __('Sub') }}</span></a>
        </li>

        <li>
            <a href="{{ route('admin-prod-index') }}"> <span>{{ __('Products') }}</span></a>
        </li>
        {{--    <li>
                 <a href="{{ route('admin-prod-physical-create') }}"><span>{{ __('Add New Service') }}</span><span class="badge badge-danger">New</span></a>
             </li>


              <li>
                   <a href="{{ route('admin-prod-catalog-index') }}"><span>{{ __('Product Catalogs') }}</span></a>
               </li> --}}




        {{--
    {{--      <li class="@if (request()->is('admin/attribute/*/manage') && request()->input('type') == 'childcategory') active @endif">
                     <a href="{{ route('admin-childcat-index') }}"><span>{{ __('Child Category') }}</span></a>
                 </li> --}}





        {{-- <li>
              <a href="{{ route('admin-report-index') }}"><span>{{ __('Reports') }}</span></a>
          </li> --}}
    </ul>
    <!--  </li>
            <li>
                <a href="{{ route('admin-brand-index') }}" class=" wave-effect"><i class="fas fa-fw fa-newspaper"></i><span>{{ __('products') }}</span></a>
            </li>

 -->



    <!-- <li>
                <a href="{{ route('admin-service-index') }}"><span><i class="icofont-user"></i>{{ __('Our Team') }}</span></a>
         </li> -->


    <!-- <li>
        <a href="#Why" class="accordion-toggle wave-effect" data-toggle="collapse" aria-expanded="false">
            <i class="icofont-user"></i>{{ __('Why Us') }}
             </a>
             <ul class="collapse list-unstyled" id="Why" data-parent="#accordion">





             </ul>
         </li>



                  <li><a href="{{ route('admin-service-index') }}"><span><i class="fas fa-fw fa-newspaper"></i>{{ __('Services') }}</span></a></li>
            <li><a href="{{ route('admin-country-management') }}"><span><i class="fas fa-fw fa-newspaper"></i>{{ __('Management page') }}</span></a></li>
 -->

    <!---->
    <!-- -->

<li class="@if (request()->is('admin/attribute/*/manage') && request()->input('type') == 'services') active @endif">
    <a href="{{ route('admin-cat2-index') }}"><span><i
                class="fas fa-fw fa-newspaper"></i>{{ __('services') }}</span></a>
</li>
<!---->
<li>
    <a href="{{ route('admin-blog-index') }}"><span><i
                class="fas fa-fw fa-newspaper"></i>{{ __('Blogs') }}</span></a>
</li>

<!--
 <li>
     <a href="{{ route('admin-partner-index') }}"><span><i class="fas fa-fw fa-newspaper"></i>{{ __('Videos') }}</span></a>
 </li>
 <li>
     <a href="{{ route('admin-sb-large') }}"> <i class="fas fa-edit"></i><span>{{ __('Gallery') }}</span></a>
 </li>
<li>
     <a href="{{ route('admin-shipment-index') }}"> <i class="fas fa-edit"></i><span>{{ __('locations') }}</span></a>
 </li>

 <li>
    <a href="#blog" class="accordion-toggle wave-effect" data-toggle="collapse" aria-expanded="false">
        <i class="fas fa-fw fa-newspaper"></i>{{ __('Support') }}
    </a>
    <ul class="collapse list-unstyled" id="blog" data-parent="#accordion">

        <li><a href="{{ route('admin-country-index') }}"><span>{{ __('service') }}</span></a></li>

           <li>
                <a href="{{ route('admin-faq-index') }}"><span>{{ __('FAQ') }}</span></a>
            </li>
        <li>
            <a href="{{ route('admin-cblog-index') }}"><span>{{ __('Categories') }}</span></a>
        </li>
        <li>
            <a href="{{ route('admin-blog-index') }}"><span>{{ __('Posts') }}</span></a>
        </li>
         <li>
            <a href="{{ route('admin-comment-index') }}"><span>{{ __('Comments') }}</span></a>
        </li>
    </ul>
</li>   -->


<li>
    <a href="{{ route('admin-ps-contact') }}"><i class="fas fa-edit"></i><span>{{ __('Contact Us Page') }}</span></a>
</li>
<li>
    <a href="{{ route('admin-page-index') }}"><i class="fas fa-edit"></i><span>{{ __('Other Pages') }}</span></a>
</li>


<li>
    <a href="#menu8" class="accordion-toggle wave-effect" data-toggle="collapse" aria-expanded="false">
        <i class="icofont-user"></i>{{ __('search items') }}
    </a>
    <ul class="collapse list-unstyled" id="menu8" data-parent="#accordion">



        <li><a href="{{ route('admin-country-index2') }}"><span>{{ __('locations') }}</span></a></li>

        <li><a href="{{ route('admin-state-index') }}"><span>{{ __('property types') }}</span></a></li>

        <li><a href="{{ route('admin-city-index') }}"><span>{{ __('price range') }}</span></a></li>
    </ul>
</li>
<li>
    <a href="#menu9" class="accordion-toggle wave-effect" data-toggle="collapse" aria-expanded="false">
        <i class="icofont-user"></i>{{ __('Info') }}
    </a>
    <ul class="collapse list-unstyled" id="menu9" data-parent="#accordion">
        <li><a href="{{ route('admin-info-areas-index') }}"><span>{{ __('Areas') }}</span></a></li>
        <li><a href="{{ route('admin-info-budgets-index') }}"><span>{{ __('Budgets') }}</span></a></li>
    </ul>
</li>

<li>
    <a href="#vendor" class="accordion-toggle wave-effect" data-toggle="collapse" aria-expanded="false">
        <i class="icofont-ui-user-group"></i>{{ __('Customers') }}
    </a>
    <ul class="collapse list-unstyled" id="vendor" data-parent="#accordion">
        <li>
            <a href="{{ route('admin-user-index') }}"><span>{{ __('All Customers List') }}</span></a>
        </li>
        <li>
            <a href="{{ route('admin-vendor-index') }}"><span>{{ __('Vendor  List') }}</span></a>
        </li>

    </ul>
</li>


<!-- -->
<li>
    <a href="#general" class="accordion-toggle wave-effect" data-toggle="collapse" aria-expanded="false">
        <i class="fas fa-cogs"></i>{{ __('General Settings') }}
    </a>
    <ul class="collapse list-unstyled" id="general" data-parent="#accordion">


        <li>
            <a href="{{ route('admin-gs-logo') }}"><span>{{ __('Logo') }}</span></a>
        </li>

        <li>
            <a href="{{ route('admin-gs-block') }}"><span>{{ __('Banner Block Images') }}</span></a>
        </li>
        <!--   <li>
            <a href="{{ route('admin-gs-background') }}"><span>{{ __('background Images') }}</span></a>
        </li> -->
        <li>
            <a href="{{ route('admin-gs-fav') }}"><span>{{ __('Favicon') }}</span></a>
        </li>

        <li>
            <a href="{{ route('admin-gs-load2') }}"><span>{{ __('Admin Loader') }}</span></a>
        </li>


        <li>
            <a href="{{ route('admin-gs-contents') }}"><span>{{ __('Website Contents') }}</span></a>
        </li>


        <li>
            <a href="{{ route('admin-gs-footer') }}"><span>{{ __('Footer') }}</span></a>
        </li>
        <li><a href="{{ route('admin-social-index') }}"><span>{{ __('Social Links') }}</span></a></li>
        <li><a href="{{ route('admin-social-facebook') }}"><span>{{ __('Facebook Login') }}</span></a></li>
        <li><a href="{{ route('admin-social-google') }}"><span>{{ __('Google Login') }}</span></a></li>
        <!--     <li>
                <a href="{{ route('admin-gs-popup') }}"><span>{{ __('Popup Banner') }}</span></a>
            </li> -->


        <li>
            <a href="{{ route('admin-gs-maintenance') }}"><span>{{ __('Website Maintenance') }}</span></a>
        </li>
        <!--
        <li>
            <a href="{{ route('admin-role-index') }}" class=" wave-effect"><span>{{ __('Manage Roles') }}</span></a>
        </li>
        <li>
            <a href="{{ route('admin-staff-index') }}" class=" wave-effect"><span>{{ __('Manage Staffs') }}</span></a>
        </li> -->

    </ul>
</li>

<!--
<li>
    <a href="#emails" class="accordion-toggle wave-effect" data-toggle="collapse" aria-expanded="false">
        <i class="fas fa-at"></i>{{ __('Email Settings') }}
    </a>
    <ul class="collapse list-unstyled" id="emails" data-parent="#accordion">
        {{-- <li><a href="{{route('admin-mail-index')}}"><span>{{ __('Email Template') }}</span></a></li> --}}
        <li><a href="{{ route('admin-mail-config') }}"><span>{{ __('Email Configurations') }}</span></a></li>
        <li><a href="{{ route('admin-group-show') }}"><span>{{ __('Group Email') }}</span></a></li>
    </ul>
</li> -->

<!--

<li>
        <a href="{{ route('admin-subs-index') }}" class=" wave-effect"><i class="fas fa-users-cog mr-2"></i>{{ __('Subscribers') }}</a>
    </li>
  <li>
        <a href="{{ route('admin-subscribes-index') }}" class=" wave-effect"><i class="fas fa-users-cog mr-2"></i>{{ __('Subscribes') }}</a>
    </li>-->



<li>
    <a href="#langs" class="accordion-toggle wave-effect" data-toggle="collapse" aria-expanded="false">
        <i class="fas fa-language"></i>{{ __('Language Settings') }}
    </a>
    <ul class="collapse list-unstyled" id="langs" data-parent="#accordion">
        <li><a href="{{ route('admin-lang-index') }}"><span>{{ __('Website Language') }}</span></a></li>
        <li><a href="{{ route('admin-tlang-index') }}"><span>{{ __('Admin Panel Language') }}</span></a></li>

    </ul>
</li>
<li>
    <a href="#seoTools" class="accordion-toggle wave-effect" data-toggle="collapse" aria-expanded="false">
        <i class="fas fa-wrench"></i>{{ __('SEO Tools') }}
        <span class="badge badge-danger">New</span></a>
    <ul class="collapse list-unstyled" id="seoTools" data-parent="#accordion">
        <!-- <li>
            <a href="{{ route('admin-prod-popular', 30) }}"><span>{{ __('Popular service') }}</span></a>
        </li> -->
        <li>
            <a href="{{ route('admin-seotool-keywords') }}"><span>{{ __('All Website Meta') }}</span></a>
        </li>

        {{--     <li>
            <a href="{{ route('admin-product-header') }}"><span>{{ __('Service Page Header') }}</span></a>
        </li>



        <li>
            <a href="{{ route('admin-category-header') }}"><span>{{ __('Category Page Header') }}</span></a>
        </li>

 
        <li>
            <a href="{{ route('admin-subcategory-header') }}"><span>{{ __('SubCategory Page Header') }}</span></a>
        </li>


       <li>
            <a href="{{ route('admin-childcategory-header') }}"><span>{{ __('ChildCategory Page Header') }}</span></a>
        </li> --}}


        {{--  <li>
            <a href="{{ route('admin-offer-header') }}"><span>{{ __('Offer Page Header') }}</span></a>
        </li>


        <li>
            <a href="{{ route('admin-brand-header') }}"><span>{{ __('Brand Page Header') }}</span></a>
        </li> --}}


    </ul>
</li>


<li>
    <a href="{{ route('admin-cache-clear') }}" class=" wave-effect"><i
            class="fas fa-sync"></i>{{ __('Clear Cache') }}</a>
</li>

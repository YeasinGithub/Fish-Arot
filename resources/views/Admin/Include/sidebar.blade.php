<div id="sidebar-wrapper" data-simplebar="" data-simplebar-auto-hide="true" class="color-sidebar bg-dark">
     <div class="brand-logo">
      <a href="{{url('/home')}}">
       <img src="{{asset('Admin/assets/images/logo-icon.png')}}" class="logo-icon" alt="logo icon">
       <h5 class="logo-text">মৎস্য আড়ৎ</h5>
     </a>
   </div>
   <ul class="sidebar-menu do-nicescrol">
      <li class="sidebar-header">মৎস্য খামার</li>
      <li>
        <a class="badge badge-primary" style="color: #FFFFFF;"  href="javaScript:void();" class="waves-effect">
          <i class="fas fa-male"></i>
          <span>মহাজন&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="sidebar-submenu">
        <li><a href="{{url('/mohajon/show')}}"><i class="fa fa-circle-o"></i>নতুন মহাজন</a></li>
        <li><a href="{{url('/mohajon/show')}}"><i class="fa fa-circle-o"></i>সকল মহাজন</a></li>
        
        </ul>
      </li>
      <li>
        <a class="badge badge-primary" style="color: #FFFFFF;" href="javaScript:void();" class="waves-effect">
          <i class="fas fa-male"></i>
          <span>পাইকার খাতা &nbsp;&nbsp;&nbsp;</span> <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="sidebar-submenu">
        <li><a href="{{url('/paikar/show')}}"><i class="fa fa-circle-o"></i> নতুন পাইকার</a></li>
        <li><a href="{{url('/paikar/show')}}"><i class="fa fa-circle-o"></i>সকল পাইকার</a></li>
        
        </ul>
      </li>
      <li>
        <a class="badge badge-primary" style="color: #FFFFFF;" href="javaScript:void();" class="waves-effect">
          <i class="fas fa-fish"></i>
          <span>মাছ বিক্রয় খাতা</span> <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="sidebar-submenu">
        <li><a href="{{url('/sell/show')}}"><i class="fa fa-circle-o"></i> নতুন বিক্রি</a></li>
        <li><a href="{{url('/sell/show')}}"><i class="fa fa-circle-o"></i> সকল বিক্রি</a></li>
        <li><a href="{{url('/report/sell')}}"><i class="fa fa-circle-o"></i>সেল রিপোর্ট</a></li>
        
        </ul>
      </li>
      
      <li>
        <a class="badge badge-primary" style="color: #FFFFFF;" href="javaScript:void();" class="waves-effect">
          <i class="fas fa-book"></i>
          <span>বকেয়া খাতা&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="sidebar-submenu">
        <li><a href="{{url('/due/show')}}"><i class="fa fa-circle-o"></i>নতুন বকেয়া</a></li>
        <li><a href="{{url('/due/show')}}"><i class="fa fa-circle-o"></i>সকল বকেয়া</a></li>
        
        </ul>
      </li>
      <li>
        <a class="badge badge-primary" style="color: #FFFFFF;" href="javaScript:void();" class="waves-effect">
          <i class="icon-briefcase"></i>
          <span>দাদন খাতা&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="sidebar-submenu">
        <li><a href="{{url('/dadon/show')}}"><i class="fa fa-circle-o"></i>নতুন দাদন</a></li>
        <li><a href="{{url('/dadon/show')}}"><i class="fa fa-circle-o"></i>সকল দাদন</a></li>
        
        </ul>
      </li>
      <li>
        <a href="javaScript:void();" class="waves-effect">
          <i class="icon-briefcase"></i>
          <span>জমা খরচ&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="sidebar-submenu">
        <li><a href="{{url('/deposit')}}"><i class="fa fa-circle-o"></i>নতুন জমা খরচ</a></li>
        <li><a href="{{url('/deposit')}}"><i class="fa fa-circle-o"></i>সকল জমা খরচ</a></li>
        
        </ul>
      </li>
      <li>
        <a href="javaScript:void();" class="waves-effect">
          <i class="icon-briefcase"></i>
          <span>মোট ক্যাশ হিসাব</span> <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="sidebar-submenu">
        <li><a href="{{url('/cash/show')}}"><i class="fa fa-circle-o"></i>নতুন ক্যাশ</a></li>
        <li><a href="{{url('/cash/show')}}"><i class="fa fa-circle-o"></i>মোট ক্যাশ</a></li>
        
        </ul>
      </li>

      <li>
        <a href="javaScript:void();" class="waves-effect">
          <i class="icon-briefcase"></i>
          <span>চালান</span> <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="sidebar-submenu">
        <li><a href="{{url('/chalan')}}"><i class="fa fa-circle-o"></i>চালান</a></li>
        <li><a href="{{url('/chalan-bad')}}"><i class="fa fa-circle-o"></i>চালান বাদ</a></li>
        <li><a href="{{url('/chalan-bowser')}}"><i class="fa fa-circle-o"></i>চালান ভাউচার</a></li>
        
        </ul>
      </li>

      <li>
        <a href="javaScript:void();" class="waves-effect">
          <i class="fas fa-briefcase"></i>
          <span>লোন</span> <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="sidebar-submenu">
        <li><a href="{{url('/loan')}}"><i class="fa fa-circle-o"></i>লোন দেওয়া</a></li>
        <li><a href="{{url('/loans')}}"><i class="fa fa-circle-o"></i>লোন নেওয়া</a></li>
        
        </ul>
      </li>

      <li>
        <a href="javaScript:void();" class="waves-effect">
          <i class="fas fa-briefcase"></i>
          <span>নগদ বিক্রি</span> <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="sidebar-submenu">
        <li><a href="{{url('nagad')}}"><i class="fa fa-circle-o"></i>নগদ বিক্রি</a></li>
        
        </ul>
      </li>

      <li>
        <a href="javaScript:void();" class="waves-effect">
          <i class="fas fa-backspace"></i>
          <span>ইনএকটিভ</span> <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="sidebar-submenu">
        <li><a href="{{url('/mohajon/inactive')}}"><i class="fa fa-circle-o"></i>মহাজন</a></li>
        <li><a href="{{url('/paikar/inactive')}}"><i class="fa fa-circle-o"></i>পাইকার</a></li>
        
        </ul>
      </li>
    
    </ul>
   
   </div>
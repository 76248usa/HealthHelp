@include('admin.layouts.header')
  <div id="wrapper">

    @include('admin.layouts.sidebar')
    <!-- Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <!-- TopBar -->

@include('admin.layouts.navbar')
        <!-- Topbar -->

        <!-- Container Fluid-->

@yield('content')

@include('notify::messages')

        <x:notify-messages />
        @notifyJs



      </div>
      <!-- Footer -->

      <!-- Footer -->


    </div>

  </div>




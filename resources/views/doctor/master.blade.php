@include("doctor.components.head")
@include("doctor.components.header")
@include("doctor.components.sidebar")

 <main id="main" class="main">

    <div class="pagetitle">
      <h1>@yield('title-page')</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">@yield('title-page')</li>
        </ol>
      </nav>
    </div>
@yield("content")



 </main>



@include("doctor.components.footer")
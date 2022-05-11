
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Peduli Diri</title>

  @include('style.style')
</head>

<body>
  <div id="app">
    <div class="main-wrapper">
      @include('layouts.navbar')

      @include('layouts.sidebar')

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>@yield('title')</h1>
          </div>

          <div class="section-body">
            @yield('content')
          </div>
        </section>
      </div>
      <footer class="main-footer">
      </footer>
    </div>
  </div>
</body>
</html>

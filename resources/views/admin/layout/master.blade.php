<!DOCTYPE html>
    <html lang="en">
      <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>e-presensi</title>
        <!-- bootstrap 5 css -->
        <link
          rel="stylesheet"
          href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css"
          integrity="sha384-DhY6onE6f3zzKbjUPRc2hOzGAdEf4/Dz+WJwBvEYL/lkkIsI3ihufq9hk9K4lVoK"
          crossorigin="anonymous"
        />
    
        <!-- custom css -->
        <!-- <link rel="stylesheet" href="style.css" /> -->
        <link
          rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css"
        />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="{{asset('css/buttons.dataTables.min.css')}}">
  <link rel="stylesheet" href="{{asset('css/jquery.dataTables.min.css')}}">
        <style>
          li {
            list-style: none;
            margin: 20px 0 20px 0;
          }
    
          a {
            text-decoration: none;
          }
    
          .sidebar {
            width: 250px;
            height: 100vh;
            position: fixed;
            margin-left: -300px;
            transition: 0.4s;
          }
    
          .active-main-content {
            margin-left: 250px;
          }
    
          .active-sidebar {
            margin-left: 0;
          }
    
          #main-content {
            transition: 0.4s;
          }
        </style>
      </head>
    
      <body>
        <div>
          <div class="sidebar p-4 bg-primary" id="sidebar">
            
          <a href="{{route('admin.index')}}">
            <h4 class="mb-5 text-white">E-Presensi</h4>
          </a>
            <li>
              <a class="text-white" href="{{route('presensi.index')}}">
                <i class="bi bi-house mr-2"></i>
                Presensi
              </a>
            </li>
            <li>
              <a class="text-white" href="{{route('karyawan.index')}}">
                <i class="bi bi-fire mr-2"></i>
                Data Akun
              </a>
            </li>
            <li>
              <a class="text-white" href="{{route('cetaklaporan.index.tahun')}}">
                <i class="bi bi-newspaper mr-2"></i>
                Cetak Laporan
              </a>
            </li>
            
          </div>
        </div>
        <div class="p-4" id="main-content">
          <button class="btn btn-primary" id="button-toggle">
            <i class="bi bi-list"></i>
          </button>
          @yield('content')
        </div>
    
        <script>
    
          // event will be executed when the toggle-button is clicked
          document.getElementById("button-toggle").addEventListener("click", () => {
    
            // when the button-toggle is clicked, it will add/remove the active-sidebar class
            document.getElementById("sidebar").classList.toggle("active-sidebar");
    
            // when the button-toggle is clicked, it will add/remove the active-main-content class
            document.getElementById("main-content").classList.toggle("active-main-content");
          });
    
        </script>

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.3/umd/popper.min.js" integrity="sha512-/RjKxaI6N8rjA/ztmfQw83B/3aqrQ38nVb5C5u5mXZnlIZYkDY4pmdtvnAODwStVbP5lI2+7lRO5f0uXZTLlYw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.1/js/bootstrap.min.js" integrity="sha512-Zyx3z/1nJyz/No+U2aK9q3YfN8MBupTJmgRw+dnvr1K/gWJrHzr1hATnKjX9PmFJ6QmG6ohjKwViC+6j8s/ZWQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
     
      <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('node_modules/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('node_modules/datatables.net/js/jquery.dataTables.min.js') }}"></script>

      @stack('scripts')
    </body>
</html>
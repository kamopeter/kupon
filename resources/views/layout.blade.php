<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>Kuponok</title>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.21/af-2.3.5/b-1.6.3/cr-1.5.2/fc-3.3.1/fh-3.1.7/kt-2.5.2/r-2.2.5/rg-1.1.2/rr-1.2.7/sc-2.0.2/sp-1.1.1/sl-1.3.1/datatables.min.css"/>
    </head>
   <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Focivilág - Kuponok</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item active">
              <a class="nav-link" href="{{ route('home') }}">
               Kezelő
           </a>
            </li>
          </ul>
        </div>
      </nav>

      <div class="container">
         @yield('content')
      </div>

      <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
      <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.21/af-2.3.5/b-1.6.3/cr-1.5.2/fc-3.3.1/fh-3.1.7/kt-2.5.2/r-2.2.5/rg-1.1.2/rr-1.2.7/sc-2.0.2/sp-1.1.1/sl-1.3.1/datatables.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" type="text/js"></script>
      <script type="text/javascript">

        $(document).ready(function() {
        $('#table').DataTable( {
            responsive: true,
            select: true,
            colReorder: true,
            columnDefs: [{targets: 6,
                    render: function ( data, type, row ) {
                      var color = 'black';
                      if (data == 'nem') {
                        color = 'red';
                      }
                      return '<span style="color:' + color + '; font-size: 18px;">' + data + '</span>';
                    }
               }]
        });
    } );
          </script>
<script>
document.getElementById('datePicker').value = new Date().toDateInputValue();
</script>
    </body>
</html>

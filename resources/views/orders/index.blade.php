<!DOCTYPE html>
<html>
<head></head>
<title></title>
  <meta charset="UTF-8" ,="" name="viewport" content="width=device-width, initial-scale=1">
  <!--====== Required meta tags ======-->
  <meta charset="utf-8" />
  <meta http-equiv="x-ua-compatible" content="ie=edge" />
  <meta name="description" content="" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>

<style>
  body {
      background-color : burlywood;
  }
  td.content {
      width            : 100%;
  }
</style>

<body>
<table style="border-collapse: collapse; width: 100%;">
  <tbody>
    <tr>
      <td class="content">
        @include('orders.search')
        @include('orders.table')
      </td>
    </tr>
  </tbody>
</table>
</body>
</html>


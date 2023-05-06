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
<style>
  body {
      background-color : burlywood;
  }
  td.content {
      width            : 100%;
  }
</style>

<body>
@include('resellers.title')
<table style="border-collapse: collapse; width: 100%;">
  <tbody>
    <tr>
      <td class="content">
        @include('resellers.form')
      </td>
    </tr>
  </tbody>
</table>
</body>
<!--
<script src="https://sales.mdo.tw/js/jquery-validation/jquery.validate.min.js"></script>
-->
</html>


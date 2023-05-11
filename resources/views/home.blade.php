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
  div.row {
      width            : 100%;
  }
  span.advertising {
      margin-left      : 40px;
  }
  span.order {
      margin-left      : 40px;
  }
  span.share {
      margin-left      : 40px;
  }
  div.title {
      margin-bottom    : 30px;
      text-align       : center;
      color            : blue;
  }
  div.bottom {
      font-size        : 24px;
      text-align       : center;
      color            : red;
  }
</style>
<!-- Scripts -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<body>
  <div class="title"><b>領電視了</b></div>
  <div style="text-align: center;">
     <img src="picture-8.jpg" style="width: 90%" usemap="#image-map" id="map">
  </div>
  <div class="row">
     <span class="advertising"><a href="advertising"><img src="button1.gif" style="width: 20%;"></a>
     <span class="order"><a href="members/create?introducer={{ $introducer ?? 'manager' }}"><img src="button2.gif" style="width: 20%;"></a>
     <span class="share">
       <a href="javascript:void(window.open('https://lineit.line.me/share/ui?url='.concat(encodeURIComponent(location.href)) ))">
         <img src="button3.gif" style="width: 20%;">
       </a>
     </span>
  </div>
  <div class="bottom">
     續看網路有線電視+追劇<br>
     65吋/75吋隨你選任你挑<br>
  </div>
</body>
</html>


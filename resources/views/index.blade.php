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
<!-- Scripts -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="{{ asset('js/rmdImageMaps/jquery.rwdImageMaps.js') }}" defer></script>
<script src="{{ asset('js/rmdImageMaps/jquery.rwdImageMaps.min.js') }}" defer></script>
<script>
$(document).ready(function(e) {
    $('img#map').rwdImageMaps();
    $('area').on('mouseover', function(e) {
       $(this).focus();
    });
});
</script>
<body>
  <div style="text-align: center;">
     <img src="picture-6.jpg" style="width: 90%" usemap="#image-map" id="map">
  </div>
  <map name="image-map">
     <area target="" alt="看大電視" title="看大電視" shape="rect" coords="108,2522,687,2680" href="advertising">
     <area target="" alt="申領大電視" title="申領大電視" shape="rect" coords="785,2522,1363,2680" href="members/create?introducer={{ $introducer ?? 'manager' }}">
     <area target="" alt="分享" title="分享" shape="rect" coords="1473,2522,1727,2680"
           href="javascript:void(window.open('https://lineit.line.me/share/ui?url='.concat(encodeURIComponent(location.href)) ))">
  </map>
</body>
</html>


<div class="footer">
    <div class="wrapper">
        <p class="footer_design">NSU Internship Management System  &copy2022</p>
    </div>
</div>
</body>
</html>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
    
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>

  $(".nav").click(function(){
      $("#mySidenav").css('width','70px');
      $("#main").css('margin-left','75px');
      $(".logo").css('visibility', 'hidden');
      $(".icon-a").css('visibility', 'hidden');
      $(".icons").css('visibility', 'visible');
      $(".icons").css('margin-left', '-8px');
      $(".nav").css('display','none');
      $(".nav2").css('display','block');
  });

  $(".nav2").click(function(){
      $("#mySidenav").css('width','230px');
      $("#main").css('margin-left','214px');
      $(".logo").css('visibility', 'visible');
      $(".icon-a").css('visibility', 'visible');
      $(".icons").css('visibility', 'visible');
      $(".nav").css('display','block');
      $(".nav2").css('display','none');
 });
</script>

</body>
</html>

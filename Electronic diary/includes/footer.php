			</div>
		</div>
	</div>
<script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
<script>
  $('.left').click(function(){
    if ($('.hide').is(':visible')) {
      $(".hide").fadeOut(500);
    }
    else{
      $(".hide").fadeIn(1000);
    }
  });
</script>
</body>
</html>
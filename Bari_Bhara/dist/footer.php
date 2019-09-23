	<footer id="footer">
		<div id="div">
		</div>
	</footer>
	<!--Script Start From Here-->

	<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/fontawesome-all.js"></script>
	<script type="text/javascript" src="js/main.js"></script>
	<script type="text/javascript">
		var footer = document.getElementById('footer');
		var div = document.getElementById('div');
		var x = 0;
		footer.addEventListener("mouseover", myFunction);
		footer.addEventListener("mouseout", myFunction1);
		function myFunction() {
			div.style.bottom = '0px';
		}
		function myFunction1() {
			// if(x > 3) {
				div.style.bottom = '-100px';
				// x = 0;
				// return true;
			// }
			// x++;
			// setTimeout(myFunction1,1000);
		}
		
	</script>

	<!--Script End Here-->
</body>
</html>
 </div>
    <div id="footer">Copyright <?php echo date("Y");?>, Widget Corp</div>

</body>


</html>
<?php 
	//5. Close db connection
	if(isset($connection)){
		mysqli_close($connection);
	}
 ?>
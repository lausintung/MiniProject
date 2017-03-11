<?php
	session_start();
	function sortby(){
		$opt = "<option value='price' ";
		if ((isset($_GET['sort']))&&($_GET['sort'] == 'price'))
			$opt=$opt."selected";
		$opt=$opt.">Price</option><option value='name' ";
		if ((isset($_GET['sort']))&&($_GET['sort'] == 'name'))
			$opt=$opt."selected";
		$opt=$opt.">Room Type</option><option value='room.noOfGuest' ";
		if ((isset($_GET['sort']))&&($_GET['sort'] == 'room.noOfGuest'))
			$opt=$opt."selected";
		$opt=$opt.">Capacity</option>";
		return $opt;
	}
	
	$min = $_GET['min'];
	$max = $_GET['max'];
	$inD = $_GET['inD'];
	$outD = $_GET['outD'];
	$pp = $_GET['pp'];
	if (isset($_GET['key']))
		$key = '%'.$_GET['key'].'%';
	$conn = mysqli_connect("localhost", "root", "","hotel");
	if (!$conn)  { 
		exit("Unable to connect to database");
	}

	$query = "	SELECT * , MIN(price)
				FROM room 
				LEFT JOIN (
					Select booking.roomid
					FROM room
					INNER JOIN booking 
					ON room.roomID = booking.roomID
					WHERE ('".$inD."' >= checkindate  AND '".$inD."' < checkoutdate)
					OR ('".$outD."' > checkindate AND '".$outD."' <= checkoutdate)
				)a 
				ON a.roomid = room.roomid
				WHERE a.roomid is NULL
				AND noofguest >=".$pp."
				AND price BETWEEN ".$min." AND ".$max;
				
	if (isset($key))
		$query = $query.
			" 	AND (name LIKE '".$key."' OR description LIKE '".$key."')";
			
	$query = $query.
			" 	GROUP BY name";
			
	if (isset($_GET['sort']))
		$query = $query.
	
			" 	ORDER by ".$_GET['sort'];

	$result = $conn->query($query);
	if (!$result)  die ($query);
	else {
		$result->data_seek(0);
		$i = 0;
		if(mysqli_num_rows($result)>0){
			while ($row = $result->fetch_assoc())  {
				$roomID[$i]=$row['roomID'];
				$name[$i]=$row['name'];
				$price[$i]=$row['MIN(price)'];
				$photo[$i]=$row['photo'];
				$description[$i]=$row['description'];
				$noOfGuest[$i]=$row['noOfGuest'];
				$i++;
			}
			$response="
			<table style='color:white; border-top: 1px solid white;  border-collapse: collapse;'><col width='300px'><col width='500px'>
				<tr style='border-bottom: 1px solid white;'>
					<th>";
			if ($i == 1)
				$response=$response."
						<h3 style='text-align: left; margin:0 0 0 5px;'>".$i." result.</h3></th>
					<th></th>";
			else
				$response=$response."
						<h3 style='text-align: left; margin:0 0 0 5px;'>".$i." results.</h3></th>
					<th>
						<div>
							<h3 style='float: left; text-align:right;margin:0 0 0 325px;'>Sorted by </h3>
							<select style='float:right; margin: 2px 5px 0 0;' name='sort' id='sort' onchange='instantsearch()'>".sortby()."</select>
						</div>
					</th>";
			$response=$response."</tr>";
			for ($j=0; $j<$i; $j++){
				$ratingq = "Select avg(rating) from booking LEFT JOIN room on room.roomID=booking.roomID where name = '".$name[$j]."' group by name";
				$resultr = $conn->query($ratingq);
				if (!$resultr)  die ($ratingq);
				else {
					$resultr->data_seek(0);
					while ($row = $resultr->fetch_assoc())  
						if($row['avg(rating)']!=null)
							$rating=$row['avg(rating)'];
						else
							$rating=0;
				}
				
				$response=$response."
				<tr style='border-bottom: 1px solid white;'>
					<td><img src='img/photos/".$photo[$j]."' width='300px'></td>
					<td>
						<h2 style='margin: 0 0 0 5px;'>".$name[$j]."<button style='font-size: 13px;float:right; margin: 0 5px;' onclick=\"window.location.href='roomdetail.php?name=".$name[$j]."&roomid=".$roomID[$j]."&inD=".$inD."&outD=".$outD."&pp=".$pp."'\">Make a reservation</button></h2><br />
						<p style='margin: 0 5px 0 5px;'>".$description[$j]."</p><br />
						<div style='padding: 0 0 0 5px;'><span class='stars'>".$rating."</span></div><br />
						<h4 style='margin: 0 0 0 5px; text-align: left; float: left;'>Room Capacity: ".$noOfGuest[$j]."</h4>
						<h3 style='text-align: right; float: right; margin: 0 5px;'>From HKD".$price[$j]."</h3>
					</td>
				</tr>";
			}
			if ($i == 1)
				$response=$response."
				<tr style='border-bottom: 1px solid white;'>
					<td><h3 style='text-align: left; margin:0 0 0 5px;'>".$i." results.</h3></td>
					<td></td>
				</tr>
			</table>";
			else
				$response=$response."
				<tr style='border-bottom: 1px solid white;'>
					<td><h3 style='text-align: left; margin:0 0 0 5px;'>".$i." results.</h3></td>
					<td>
						<div><h3 style='float: left; text-align:right;margin:0 0 0 325px;'>Sorted by </h3>
							<select style='float:right; margin: 2px 5px 0 0;' name='sort' id='sort1' onchange='instantsearch()'>".sortby()."</select>
						</div>
					</td>
				</tr>
			</table>";
			echo $response;
		}
		else
			echo "<table style='color:white; border-top: 1px solid white;  border-collapse: collapse;'><col width='800px'>
			</tr>
			<tr style='border-bottom: 1px solid white;'>
				<th><h3 style='text-align: left; margin:0 0 0 5px;'>".$i." result.</h3></th>
			</tr>
			<tr style='border-bottom: 1px solid white;'><td align=center>
				<h1 style='padding: 40px 0 0 0; font-size: 74;'>Sorry, no room found! :(</h1></td>
			</tr>
			<tr style='border-bottom: 1px solid white;'>
				<td><h3 style='text-align: left; margin:0 0 0 5px;'>".$i." results.</h3></td>
			</tr>
		</table>";
	}
	$result->free();
	$conn->close();
?>
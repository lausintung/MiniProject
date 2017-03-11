<link rel="stylesheet" type="text/css" href="css/table.css">
<?php
	session_start();
	$conn = mysqli_connect("localhost", "root", "","hotel");
	if ($conn->connect_error)  {
		echo "Unable to connect to database";
		exit;
	}
	$query = 'select * from booking inner join room on booking.roomid = room.roomid where username = "'.$_SESSION['username'].'" ORDER BY checkoutDate desc';
	$result = $conn->query($query);
	if (!$result)  die ("");
	else {
		$result->data_seek(0);
		$j=0;
		if ($result->num_rows === 0)
			echo '	<table>
						<thead>
							<tr>
								<th colspan="3"><h3>Your Booking</h3></th>
							</tr>
							<tr>
								<th>You have not reserved any room yet. <a href="index.php"><br>Click here</a> to start your journey with us!</th>
								<th colspan="2"></th>
							</tr>
						</thead>
					</table>';
		else{
			while ($row = $result->fetch_assoc())  {
				$bookingid = $row['bookingID'];
				$checkindate = $row['checkinDate'];
				$checkoutdate = $row['checkoutDate'];
				$cm = $row['cm'];
				$rating = $row['rating'];
				$roomid = $row['roomID'];
				$roomname = $row['name'];
				$roomphoto = 'img/photos/'.$row['photo'];
				echo '	<table><col width="300px"><col width="500px">
							<thead>
								<tr>
									<th colspan="3"><h3>Your Booking</h3></th>
								</tr>
								<tr>
									<th>Booking ID</th>
									<th colspan="2">'.$bookingid.'</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>Check in date</td>
									<td>'.$checkindate.'</td>
									<td></td>
								</tr>
								<tr>
									<td>Check out date</td>
									<td>'.$checkoutdate.'</td>
									<td></td>
								</tr>
								<tr>
									<td>Room details</td>
									<td><img style="padding: 10 0 0 0;" src="'.$roomphoto.'" height="40%" width=auto/><br>'.$roomname.'<br>Room Number: '.$roomid.'</td>
									<td></td>
								</tr>
								<tr>
									<td></td>
									<td>'; if ($checkindate > date("Y-m-d")) echo '<i class="material-icons button delete" onclick="cancel('.$bookingid.')">Cancel Reservation</i>';
									else if ($checkoutdate < date("Y-m-d") && $rating == null) echo '
									<form name="review" id="review" method="post" action="review.php" onsubmit="return rvcheck()">
										<h4 style="padding: 0px 0px 0px; margin: 5px 0 5px 0">Please feel free to review our service:</h4>
										<input type = "text" name="bkid" value="'.$bookingid.'" hidden>
										<textarea style="resize: none;"name="cm" cols="45" rows="5"></textarea>
										<div class="stars">
											<input class="star star-5" id="star-5" type="radio" name="star" value="5"/>
											<label class="star star-5" for="star-5"></label>
											<input class="star star-4" id="star-4" type="radio" name="star" value="4"/>
											<label class="star star-4" for="star-4"></label>
											<input class="star star-3" id="star-3" type="radio" name="star" value="3"/>
											<label class="star star-3" for="star-3"></label>
											<input class="star star-2" id="star-2" type="radio" name="star" value="2"/>
											<label class="star star-2" for="star-2"></label>
											<input class="star star-1" id="star-1" type="radio" name="star" value="1"/>
											<label class="star star-1" for="star-1"></label><br /><br />
											<input type="submit">
									</form>

										</div>';
									echo '</td>
									<td></td>
								</tr>
							</tbody>
						</table>';
			}
		}
	}
	$result->free();
	$conn->close();
?>
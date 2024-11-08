<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="styles.css">
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-8 text-section">
				<div class="content">
					<h1>Welcome to Matrix Meet</h1>
					<h2>Connect and collaborate with ease.</h2>
				</div>
			</div>
			<div class="col-md-4 right-side">
				<div class="gallery-container">
					<div class="gallery">
						<div class="gallery-item">
							<img src="images/d1.png" alt="Meeting Image 1">
							<p class="caption">Meeting Image 1</p>
						</div>
						<div class="gallery-item">
							<img src="images/d2.png" alt="Meeting Image 2">
							<p class="caption">Meeting Image 2</p>
						</div>
						<div class="gallery-item">
							<img src="images/d3.png" alt="Meeting Image 3">
							<p class="caption">Meeting Image 3</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

<style>
body, html {
	margin: 0;
	padding: 0;
	height: 100%;
	font-family: Arial, sans-serif;
}

.container-fluid {
	height: 100%;
}

.row {
	display: flex;
	height: 100%;
}

.text-section {
	background: url('images/m1-bg.png') no-repeat center center;
	background-size: cover;
	color: white;
	display: flex;
	align-items: center;
	justify-content: center;
	height: 100vh;
	text-align: center;
	padding: 20px;
}

.content {
	background: rgba(0, 0, 0, 0.5);
	padding: 20px;
	border-radius: 10px;
}

.right-side {
	display: flex;
	align-items: flex-end;
	justify-content: flex-start;
	height: 2000vh;
	padding-left: 20px;
	padding-bottom: 20px;
	background-color: #f9f9f9;
}

.gallery-container {
	position: fixed;
	width: 300px;
	height: 500px;
	overflow: hidden;
	border-radius: 20px;
	background-color: #ffffff; /* Optional: Add background color for better contrast */
	box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Optional: Add shadow for a floating effect */
}

.gallery {
	display: flex;
	transition: transform 0.8s cubic-bezier(0.25, 0.46, 0.45, 0.94);
}

.gallery-item {
	position: relative;
	min-width: 300px;
	display: flex;
	flex-direction: column;
	align-items: center;
}

.gallery img {
	width: 500px;
	height: 500px;
	object-fit: cover;
	border-radius: 20px; /* Keeps rounded edges */
}

.caption-box {
	width: 100%;
	display: flex;
	justify-content: center;
	padding: 10px;
}

.caption {
	position: absolute;
	bottom: -15px;
	width: 100%;
	background: rgba(0, 0, 0, 0.6); /* Semi-transparent black for overlay */
	color: white;
	padding: 10px;
	text-align: center;
	backdrop-filter: blur(5px); /* Adds a blur effect */
	border-bottom-left-radius: 20px;
	border-bottom-right-radius: 20px;
}
.right-side {
	display: flex;
	align-items: flex-end;
	justify-content: flex-start;
	height: 100vh;
	padding-left: 80px;
	padding-bottom: 70px;
	background-color: #f9f9f9;
}

</style>

<script>
	const gallery = document.querySelector('.gallery');
	let scrollAmount = 0;
	const scrollStep = 300;

	function scrollGallery() {
		if (scrollAmount < gallery.scrollWidth - gallery.clientWidth) {
			scrollAmount += scrollStep;
		} else {
			scrollAmount = 0;
		}
		gallery.style.transform = `translateX(-${scrollAmount}px)`;
	}

	setInterval(scrollGallery, 2500); // Faster transition every 1 second
</script>
</body>
</html>

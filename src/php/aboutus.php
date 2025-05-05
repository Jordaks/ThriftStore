<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>About Us</title>
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            background-color: #fffaf0;
            text-align: center;
            padding: 20px;
            margin: 0;
              text-shadow: 1px 1px 2px rgba(0,0,0,0.2); /* <-- Add this line */
        }
        h1 {
            font-size: 80px;
            color: #4A90E2;
            font-weight: bold;
            margin-bottom: 40px;
        }
        .line {
            height: 3px;
            background-color: black;
            margin: 20px auto;
            width: 90%;
            position: relative;
            top: 20px;
        }
        .tshirts {
            display: flex;
            justify-content: center;
            align-items: flex-start;
            gap: 40px;
            margin-top: 60px;
        }
        .tshirt-container {
            position: relative;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .clip {
            width: 30px;
            height: 30px;
            background-color: #ddd;
            border: 2px solid black;
            border-bottom: none;
            position: absolute;
            top: -30px;
            z-index: 2;
            border-top-left-radius: 5px;
            border-top-right-radius: 5px;
        }
        .tshirt {
            position: relative;
            width: 200px;
            height: 250px;
            border: 3px solid black;
            border-radius: 20px;
            padding: 15px;
            box-sizing: border-box;
            background-color: white;
            margin-top: 0px;
			display: flex;
            align-items: center;
            justify-content: center;
        }
        .tshirt p {
            font-size: 19px;
            color: #FF1493;
            text-align: justify;
			margin: 0;
        }
        .story-title {
            margin-top: 10px;
            font-weight: bold;
            color: #003300;
            font-size: 20px;
        }
    </style>
</head>
<body>

    <h1>About us</h1>

    <div class="line"></div>

    <div class="tshirts">
        <div class="tshirt-container">
            <div class="clip"></div>
            <div class="tshirt">
                <p>To create a world where fashion is a force for good — empowering individuality, fostering community, and inspiring a more sustainable future.</p>
            </div>
            <div class="story-title">Our Story</div>
        </div>

        <div class="tshirt-container">
            <div class="clip"></div>
            <div class="tshirt">
                <p>To make thrifting modern, meaningful, and accessible by connecting buyers and sellers through a curated</p>
            </div>
            <div class="story-title">Our Story</div>
        </div>

        <div class="tshirt-container">
            <div class="clip"></div>
            <div class="tshirt">
                <p>We are a passionate team dedicated to providing the best online shopping experience. Thank you for choosing us!</p>
            </div>
            <div class="story-title">Our Story</div>
        </div>
    </div>

</body>
</html>
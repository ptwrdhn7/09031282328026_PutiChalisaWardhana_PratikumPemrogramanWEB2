<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login and Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
        }
        .container {
            margin: 50px auto;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            max-width: 800px;
            width: 90%;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }
        .profile-header {
            text-align: center;
            margin-bottom: 30px;
        }
        .profile-header img {
            border-radius: 50%;
            width: 150px;
            height: 150px;
            object-fit: cover;
            border: 5px solid #4CAF50;
        }
        .profile-header h1 {
            margin: 10px 0 5px;
            font-size: 24px;
        }
        .profile-header p {
            font-size: 16px;
            color: #555;
        }
        .profile-content {
            display: flex;
            justify-content: space-between;
            gap: 20px;
        }
        .profile-section {
            flex: 1;
            background: #f9f9f9;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .profile-section h2 {
            margin-bottom: 15px;
            font-size: 18px;
        }
        .profile-section p {
            margin: 10px 0;
        }
        .moving-text {
            width: 100%;
            overflow: hidden;
            white-space: nowrap;
            box-sizing: border-box;
            background: #4CAF50;
            color: white;
            padding: 10px 0;
            text-align: center;
        }
        .moving-text span {
            display: inline-block;
            animation: moveText 10s linear infinite;
        }
        @keyframes moveText {
            from {
                transform: translateX(100%);
            }
            to {
                transform: translateX(-100%);
            }
        }
    </style>
</head>
<body>
    <div class="moving-text">
        <span>Welcome to My Personalized Profile Page! Discover my journey, 
            celebrate milestones, and stay motivated every step of the way.</span>
    </div>
    <div class="container">
        <?php
        session_start();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['email']) && isset($_POST['password'])) {
                $_SESSION['email'] = $_POST['email'];
                $_SESSION['name'] = "Hi! I'm Puti";
                $_SESSION['photo'] = "DSC07088.JPG";
                $_SESSION['bio'] = "I am an undergraduate student at Sriwijaya University, 
                Faculty of Computer Science, majoring in Information Systems.";
                $_SESSION['story'] = "I am currently pursuing a bachelor's degree at Sriwijaya University, 
                Faculty of Computer Science, majoring in Information Systems. I chose this field because 
                of my interest in technology and how information can be processed to create innovative solutions. 
                Throughout my educational journey, I have learned various topics, ranging from p
                rogramming to project management, which have further strengthened my passion for this field.";
                $_SESSION['names'] = "Puti Chalisa Wardhana";
                $_SESSION['age'] = 20;
                $_SESSION['phone'] = "+6285272xxxxxx";
                $_SESSION['address'] = "Indralaya";
            } elseif (isset($_POST['logout'])) {
                session_destroy();
                header("Location: " . $_SERVER['PHP_SELF']);
                exit;
            }
        }

        if (isset($_SESSION['email'])) {
        ?>

        <!-- Halaman kedua (Profile) -->
        <div id="profilePage">
            <div class="profile-header">
                <img src="<?php echo htmlspecialchars($_SESSION['photo']); ?>" alt="Profile Picture">
                <h1><?php echo htmlspecialchars($_SESSION['name']); ?></h1>
                <p><?php echo htmlspecialchars($_SESSION['bio']); ?></p>
            </div>
            <div class="profile-content">
                <div class="profile-section">
                    <h2>Personal Information</h2>
                    <p><strong>Name:</strong> <?php echo htmlspecialchars($_SESSION['names']); ?></p>
                    <p><strong>Age:</strong> <?php echo htmlspecialchars($_SESSION['age']); ?> years</p>
                    <p><strong>Email:</strong> <?php echo htmlspecialchars($_SESSION['email']); ?></p>
                    <p><strong>Phone:</strong> <?php echo htmlspecialchars($_SESSION['phone']); ?></p>
                    <p><strong>Address:</strong> <?php echo htmlspecialchars($_SESSION['address']); ?></p>
                </div>
                <div class="profile-section">
                    <h2>My Story</h2>
                    <p style="text-align: justify"><?php echo htmlspecialchars($_SESSION['story']); ?></p>
                </div>
            </div>
            <form method="post" style="text-align: center; margin-top: 20px;">
                <button type="submit" name="logout">Logout</button>
            </form>
        </div>
        <?php
        } else {
        ?>

        <!-- Halaman pertama (Login) -->
        <div id="loginPage">
            <h1>Login</h1>
            <form method="post">
                <input type="email" name="email" placeholder="Enter your email" required>
                <input type="password" name="password" placeholder="Enter your password" required>
                <button type="submit">Login</button>
            </form>
        </div>
        <?php
        }
        ?>
    </div>
</body>
</html>
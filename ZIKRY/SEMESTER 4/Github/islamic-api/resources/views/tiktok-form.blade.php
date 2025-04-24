<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TikTok Video Downloader</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
        
        :root {
            --primary: #fe2c55;
            --secondary: #25f4ee;
            --dark: #161823;
            --light: #ffffff;
            --gray: #f1f1f2;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            transition: all 0.3s ease;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        
        .container {
            max-width: 600px;
            width: 100%;
            background: var(--light);
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transform: translateY(20px);
            opacity: 1;
            animation: fadeIn 0.6s forwards;
        }
        
        @keyframes fadeIn {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        header {
            background: var(--dark);
            padding: 20px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        
        header .logo {
            font-size: 24px;
            font-weight: 700;
            color: var(--light);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            margin-bottom: 10px;
        }
        
        header .logo i {
            color: var(--primary);
            animation: bounce 2s infinite;
        }
        
        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% {
                transform: translateY(0);
            }
            40% {
                transform: translateY(-10px);
            }
            60% {
                transform: translateY(-5px);
            }
        }
        
        header h1 {
            color: var(--light);
            font-size: 24px;
            margin: 0;
        }
        
        /* Decorative circles */
        .circle {
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
        }
        
        .circle-1 {
            width: 100px;
            height: 100px;
            top: -30px;
            left: -30px;
        }
        
        .circle-2 {
            width: 60px;
            height: 60px;
            bottom: -20px;
            right: 30px;
        }
        
        .form-container {
            padding: 30px;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: var(--dark);
        }
        
        .input-group {
            position: relative;
            display: flex;
            align-items: center;
            margin-bottom: 5px;
        }
        
        .input-group i {
            position: absolute;
            left: 15px;
            color: #aaa;
            font-size: 18px;
        }
        
        input[type="text"] {
            width: 100%;
            padding: 15px 15px 15px 45px;
            border: 2px solid #eee;
            border-radius: 12px;
            font-size: 16px;
            transition: all 0.3s;
            font-family: 'Poppins', sans-serif;
            background: #f9f9f9;
        }
        
        input[type="text"]:focus {
            border-color: var(--secondary);
            box-shadow: 0 0 0 3px rgba(37, 244, 238, 0.2);
            outline: none;
            background: #fff;
        }
        
        input[type="text"]::placeholder {
            color: #bbb;
        }
        
        .helper-text {
            font-size: 12px;
            color: #777;
            margin-top: 5px;
            margin-left: 5px;
        }
        
        button {
            width: 100%;
            padding: 15px;
            background: var(--primary);
            color: white;
            border: none;
            border-radius: 12px;
            font-weight: 600;
            font-size: 16px;
            cursor: pointer;
            position: relative;
            overflow: hidden;
            font-family: 'Poppins', sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            box-shadow: 0 4px 15px rgba(254, 44, 85, 0.3);
            transform: translateY(20px);
            opacity: 0;
            animation: slideUp 0.4s 0.4s forwards;
        }
        
        @keyframes slideUp {
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }
        
        button:after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            transition: width 0.3s, height 0.3s;
            transform: translate(-50%, -50%);
        }
        
        button:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(254, 44, 85, 0.4);
        }
        
        button:hover:after {
            width: 300px;
            height: 300px;
        }
        
        button:active {
            transform: translateY(0);
        }
        
        button i {
            font-size: 18px;
        }
        
        .example-section {
            padding: 20px 30px;
            background: #f8f9fa;
            border-top: 1px solid #eee;
            opacity: 0;
            transform: translateY(20px);
            animation: slideUp 0.4s 0.6s forwards;
        }
        
        .example-section h3 {
            font-size: 16px;
            color: #555;
            margin-bottom: 10px;
        }
        
        .example-links {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }
        
        .example-link {
            padding: 8px 15px;
            background: #e9ecef;
            border-radius: 20px;
            color: #495057;
            text-decoration: none;
            font-size: 13px;
            transition: all 0.2s;
        }
        
        .example-link:hover {
            background: var(--secondary);
            color: white;
        }
        
        footer {
            text-align: center;
            color: #666;
            font-size: 14px;
            padding: 20px;
            margin-top: 30px;
            opacity: 0;
            animation: fadeIn 0.6s 0.8s forwards;
        }
        
        /* Loading animation */
        .loading {
            display: inline-block;
            position: relative;
            width: 20px;
            height: 20px;
            display: none;
        }
        
        .loading div {
            box-sizing: border-box;
            display: block;
            position: absolute;
            width: 20px;
            height: 20px;
            border: 3px solid #fff;
            border-radius: 50%;
            animation: loading 1.2s cubic-bezier(0.5, 0, 0.5, 1) infinite;
            border-color: #fff transparent transparent transparent;
        }
        
        @keyframes loading {
            0% {
                transform: rotate(0deg);
            }
            100% {
                transform: rotate(360deg);
            }
        }
        
        /* Floating animation for the entire container */
        .container {
            animation: floating 6s ease-in-out infinite;
        }
        
        @keyframes floating {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
            100% { transform: translateY(0px); }
        }
        
        /* Responsive styles */
        @media (max-width: 768px) {
            .container {
                width: 95%;
            }
            
            input[type="text"], button {
                padding: 12px;
            }
            
            .form-container {
                padding: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <div class="circle circle-1"></div>
            <div class="circle circle-2"></div>
            
            <div class="logo">
                <i class="fab fa-tiktok"></i>
                <span>TikTok Downloader By Zikry Kurniawan</span>
            </div>
            <h1>Download Any TikTok Video </h1>
        </header>
        
        <div class="form-container">
            <form action="{{ url('/tiktok/video') }}" method="POST" id="tiktok-form">
                @csrf
                <div class="form-group">
                    <label for="video_url">Enter Video URL:</label>
                    <div class="input-group">
                        <i class="fas fa-link"></i>
                        <input 
                            type="text" 
                            name="video_url" 
                            id="video_url" 
                            placeholder="Paste TikTok video link here..." 
                            required
                            autocomplete="off"
                        >
                    </div>
                    <div class="helper-text">Example: https://www.tiktok.com/@username/video/1234567890123456789</div>
                </div>
                
                <button type="submit" id="submit-btn">
                    <i class="fas fa-search"></i>
                    <span>Find Video</span>
                    <div class="loading"><div></div></div>
                </button>
            </form>
        </div>
        
        <div class="example-section">
            <h3>How it works:</h3>
            <ol style="margin-left: 20px; margin-bottom: 15px; font-size: 14px; color: #555;">
                <li>Copy the URL of any TikTok video</li>
                <li>Paste it in the input field above</li>
                <li>Click the "Find Video" button</li>
                <li>Download your video without watermark!</li>
            </ol>
        </div>
    </div>
    
    <footer>
        <p>© 2025 TikTok Video Downloader By Zikry | All Rights Reserved</p>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('tiktok-form');
            const submitBtn = document.getElementById('submit-btn');
            const loading = document.querySelector('.loading');
            const btnText = submitBtn.querySelector('span');
            const btnIcon = submitBtn.querySelector('i');
            
            // Focus the input field on page load
            document.getElementById('video_url').focus();
            
            // Add ripple effect to button
            submitBtn.addEventListener('click', function(e) {
                if (!form.checkValidity()) return;
                
                // Show loading state
                loading.style.display = 'inline-block';
                btnText.textContent = 'Processing...';
                btnIcon.className = 'fas fa-spinner fa-spin';
                
                // Allow the form to submit
                setTimeout(() => {
                    form.submit();
                }, 100);
            });
            
            // Add animation to input field
            const input = document.getElementById('video_url');
            
            input.addEventListener('focus', function() {
                this.parentElement.style.transform = 'scale(1.02)';
            });
            
            input.addEventListener('blur', function() {
                this.parentElement.style.transform = 'scale(1)';
            });
            
            // Paste button functionality
            input.addEventListener('paste', function() {
                setTimeout(() => {
                    this.style.borderColor = var(--secondary);
                    setTimeout(() => {
                        this.style.borderColor = '';
                    }, 300);
                }, 10);
            });
            
            // Show "paste from clipboard" message when field is empty and focused
            input.addEventListener('click', function() {
                if (this.value === '') {
                    navigator.clipboard.readText()
                        .then(text => {
                            if (text.includes('tiktok.com')) {
                                this.value = text;
                                this.style.borderColor = var(--secondary);
                                setTimeout(() => {
                                    this.style.borderColor = '';
                                }, 300);
                            }
                        })
                        .catch(err => {
                            // Handle potential errors
                        });
                }
            });
            
            // Easter egg - Logo animation
            const logo = document.querySelector('.logo i');
            logo.addEventListener('click', function() {
                this.style.transform = 'rotate(360deg)';
                setTimeout(() => {
                    this.style.transform = '';
                }, 500);
            });
        });
    </script>
</body>
</html>
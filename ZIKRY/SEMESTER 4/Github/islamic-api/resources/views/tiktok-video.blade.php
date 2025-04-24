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
            padding: 20px;
        }
        
        .container {
            max-width: 800px;
            width: 100%;
            background: var(--light);
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            margin-bottom: 40px;
            opacity: 0;
            transform: translateY(20px);
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
            display: flex;
            align-items: center;
            gap: 12px;
        }
        
        header .logo {
            font-size: 24px;
            font-weight: 700;
            color: var(--light);
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        header .logo i {
            color: var(--primary);
        }
        
        header h1 {
            color: var(--light);
            font-size: 24px;
            margin: 0;
            flex-grow: 1;
            text-align: center;
        }
        
        .content {
            padding: 30px;
        }
        
        .error {
            color: var(--primary);
            padding: 12px;
            border-radius: 8px;
            background: rgba(254, 44, 85, 0.1);
            margin-bottom: 20px;
            text-align: center;
            font-weight: 500;
        }
        
        .video-container {
            position: relative;
            border-radius: 12px;
            overflow: hidden;
            margin-bottom: 30px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            opacity: 0;
            transform: scale(0.95);
            animation: scaleIn 0.5s 0.3s forwards;
        }
        
        @keyframes scaleIn {
            to {
                opacity: 1;
                transform: scale(1);
            }
        }
        
        video {
            width: 100%;
            height: auto;
            background: #000;
            display: block;
        }
        
        .actions {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            justify-content: center;
            margin-top: 20px;
        }
        
        .btn {
            background: var(--dark);
            color: var(--light);
            padding: 12px 24px;
            border-radius: 12px;
            text-decoration: none;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 8px;
            border: none;
            cursor: pointer;
            position: relative;
            overflow: hidden;
            z-index: 1;
            flex: 1;
            min-width: 200px;
            justify-content: center;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            transform: translateY(20px);
            opacity: 0;
        }
        
        .btn:nth-child(1) {
            animation: slideUp 0.4s 0.5s forwards;
        }
        
        .btn:nth-child(2) {
            animation: slideUp 0.4s 0.7s forwards;
        }
        
        .btn:nth-child(3) {
            animation: slideUp 0.4s 0.9s forwards;
        }
        
        @keyframes slideUp {
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }
        
        .btn:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 0;
            background: var(--primary);
            z-index: -1;
            transition: height 0.3s ease;
        }
        
        .btn:hover:after {
            height: 100%;
        }
        
        .btn:active {
            transform: scale(0.98);
        }
        
        .btn i {
            font-size: 18px;
        }
        
        .no-video {
            text-align: center;
            padding: 40px 20px;
            color: #666;
            font-weight: 500;
        }
        
        .no-video i {
            font-size: 48px;
            color: #ddd;
            margin-bottom: 20px;
            display: block;
        }
        
        .back-btn {
            background: var(--secondary);
            margin-top: 20px;
        }
        
        .divider {
            height: 1px;
            background: #eee;
            margin: 20px 0;
            position: relative;
        }
        
        .divider:before {
            content: 'OR';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: white;
            padding: 0 15px;
            font-size: 12px;
            color: #999;
        }
        
        .loading {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 40px;
            height: 40px;
            border: 4px solid rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            border-top-color: var(--primary);
            animation: spin 1s linear infinite;
            display: none;
        }
        
        @keyframes spin {
            to {
                transform: translate(-50%, -50%) rotate(360deg);
            }
        }
        
        .video-loaded .loading {
            display: none;
        }
        
        footer {
            margin-top: auto;
            text-align: center;
            color: #666;
            font-size: 14px;
            padding: 20px;
        }
        
        /* Responsive styles */
        @media (max-width: 768px) {
            .container {
                width: 100%;
            }
            
            header {
                flex-direction: column;
                text-align: center;
            }
            
            .actions {
                flex-direction: column;
            }
            
            .btn {
                width: 100%;
            }
        }
        
        /* Animation for video controls */
        video::-webkit-media-controls {
            opacity: 0;
            transition: opacity 0.3s;
        }
        
        video:hover::-webkit-media-controls {
            opacity: 1;
        }
        
        /* Pulse animation for download buttons */
        .pulse {
            animation: pulse 2s infinite;
        }
        
        @keyframes pulse {
            0% {
                box-shadow: 0 0 0 0 rgba(254, 44, 85, 0.4);
            }
            70% {
                box-shadow: 0 0 0 10px rgba(254, 44, 85, 0);
            }
            100% {
                box-shadow: 0 0 0 0 rgba(254, 44, 85, 0);
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <div class="logo">
                <i class="fab fa-tiktok"></i>
            </div>
            <h1>TikTok Video Downloader</h1>
        </header>
        
        <div class="content">
            @if(isset($video['error']))
                <div class="error">
                    <i class="fas fa-exclamation-circle"></i>
                    {{ $video['error'] }}
                </div>
            @elseif(isset($video['play']))
                <div class="video-container video-loaded">
                    <div class="loading"></div>
                    <video controls id="tiktok-video">
                        <source src="{{ $video['play'] }}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </div>
                
                <div class="actions">
                    <a href="{{ route('tiktok.download', ['type' => 'nowm', 'url' => $video['play']]) }}" class="btn pulse">
                        <i class="fas fa-download"></i> Download No Watermark
                    </a>
                    <a href="{{ route('tiktok.download', ['type' => 'wm', 'url' => $video['play_watermark']]) }}" class="btn">
                        <i class="fas fa-download"></i> Download With Watermark
                    </a>
                </div>
            @else
                <div class="no-video">
                    <i class="fas fa-video-slash"></i>
                    <p>No video found. Please try another TikTok URL.</p>
                </div>
            @endif
            
            <div class="divider"></div>
            
            <div class="actions">
                <a href="/tiktok/form" class="btn back-btn">
                    <i class="fas fa-arrow-left"></i> Back to Search
                </a>
            </div>
        </div>
    </div>
    
    <footer>
        <p>© 2025 TikTok Video Downloader By Zikry | All Rights Reserved</p>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Video loading animation
            const video = document.getElementById('tiktok-video');
            if (video) {
                const videoContainer = video.closest('.video-container');
                const loading = videoContainer.querySelector('.loading');
                
                if (loading) {
                    loading.style.display = 'block';
                    
                    video.addEventListener('loadeddata', function() {
                        loading.style.display = 'none';
                        videoContainer.classList.add('video-loaded');
                    });
                    
                    video.addEventListener('error', function() {
                        loading.style.display = 'none';
                        videoContainer.innerHTML = '<div class="error"><i class="fas fa-exclamation-triangle"></i> Failed to load video</div>';
                    });
                }
            }
            
            // Add hover effects for buttons
            const buttons = document.querySelectorAll('.btn');
            buttons.forEach(btn => {
                btn.addEventListener('mouseover', function() {
                    this.style.transform = 'translateY(-3px)';
                });
                
                btn.addEventListener('mouseout', function() {
                    this.style.transform = 'translateY(0)';
                });
                
                btn.addEventListener('click', function() {
                    this.classList.add('clicked');
                    setTimeout(() => {
                        this.classList.remove('clicked');
                    }, 200);
                });
            });
        });
    </script>
</body>
</html>
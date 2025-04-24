# 🎵 TikTok Video Downloader

A Laravel-based web application that allows users to download TikTok videos — with or without watermark — quickly and easily. Built using the [TikTok API](https://rapidapi.com/) from RapidAPI.

---

## 🚀 Features

- 🔗 Paste TikTok video URL and download instantly
- 📥 Option to download with or without watermark
- 💻 User-friendly, responsive UI with animations
- ⛔ Handles error limits (e.g., quota exceeded)
- 🧩 Auto-fetch clipboard link if available
- 🌀 Stylish loading and interaction effects

---

## 📸 Screenshot

> You can include a screenshot here for better visual reference.
>  
> Example:  
> ![Preview Screenshot](public/assets/preview.png)

---

## 🛠️ Installation

### 1. Clone the Repository

```bash
git clone https://github.com/your-username/tiktok-downloader.git
cd tiktok-downloader
```

### 2. Install Dependencies

```bash
composer install
npm install && npm run dev
```

### 3. Configure Environment

Copy the `.env.example` file and configure it:

```bash
cp .env.example .env
php artisan key:generate
```

### 4. Set Your RapidAPI Key

Edit your `.env` file and add the following:

```env
RAPIDAPI_KEY=your_rapidapi_key_here
```

You can get your key by signing up on [RapidAPI TikTok API](https://rapidapi.com/).

### 5. Run the Application

```bash
php artisan serve
```

Then open your browser at [http://127.0.0.1:8000](http://127.0.0.1:8000)

---

## 🧠 Important Note

> ⚠️ If you encounter this error:

```json
"429 Too Many Requests"
```

> This means you’ve **exceeded the daily quota** for the "Download Video" endpoint on your current API plan (usually the free/BASIC one).

### ✅ Solution:
- Upgrade your plan on [RapidAPI](https://rapidapi.com/).
- **OR** generate a new API key from another RapidAPI account and replace your `RAPIDAPI_KEY` in `.env`.

---

## 📁 Folder Structure

```plaintext
├── app/
│   └── Http/
│       └── Controllers/
│           └── TikTokDownloadController.php
├── public/
│   └── assets/
├── resources/
│   └── views/
│       └── tiktok-video.blade.php
├── routes/
│   └── web.php
├── .env
├── README.md
├── composer.json
├── package.json
```

---

## 🔧 Usage

1. Paste a valid TikTok video URL into the form.
2. Click **"Find Video"** to fetch video data.
3. Once processed, you'll be able to **download the video** either with or without watermark.
4. Use the **Back** button to go to search again.

---

## ✅ API Used

This app uses the [TikTok Video Downloader API](https://rapidapi.com/tiktok-api23/api/tiktok-api23) hosted on RapidAPI.

---

## 🤝 Credits

- **Laravel** – Backend framework
- **RapidAPI** – For TikTok video processing
- **FontAwesome** – Icons
- **Google Fonts (Poppins)** – Typography
- **You** – For building something cool 😎

---

## 📄 License

MIT License  
© 2025 [Wanssss]

---

## 📬 Contact

If you want to contribute or collaborate
- 🐙 GitHub: [github.com/awanbadut](https://github.com/awanbadut)

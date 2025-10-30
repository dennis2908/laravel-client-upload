# Laravel Client Request Uploader
Using PHP Laravel, Composer, Postman
## Setup

- git clone https://github.com/dennis2908/laravel-client-upload

- download file_to_download.txt (100 mb+) from :

  https://drive.google.com/file/d/1MqY5jwXdJt5fHFR66IWo5SSBWC2K_p_0/view?usp=sharing

  and put it inside the main directory

### Server
Run this as a server:
```bash
composer install
php artisan key:generate
php artisan serve
```

### Client
Run this as a client:
```bash
php client.php
```

It will register automatically and create new Client ID

### Postman
- Open Postman <br/>
- import file (Server-Request-Upload.postman_collection.json) inside folder postman to Postman <br/>
- Open POST Server-Request-Upload inside Collection "Server-Request-Upload"
- Change client_6902c4af1e75a to new Client ID from bash "client.php" 
- Run the POST Server-Request-Upload
- If works, then the system wll automatically upload file_to_download.txt to storage\app\client_uploads

Upload process :
<img width="1919" height="461" alt="image" src="https://github.com/user-attachments/assets/dde7319c-cf7f-40a7-9b71-90803dc59f8a" />

API Request to upload from Postman :
<img width="1487" height="638" alt="image" src="https://github.com/user-attachments/assets/bf5f7765-4ee3-4f38-b557-8f6a1aba0ff7" />

Upload succeed :
<img width="1915" height="594" alt="image" src="https://github.com/user-attachments/assets/49c0f08a-935b-4811-a576-0305fb553f1c" />

New file added to server:
<img width="1152" height="649" alt="image" src="https://github.com/user-attachments/assets/e63b745f-ce04-47b3-92a9-5f188e44e66b" />

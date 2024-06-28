# E-commerce(Amazon Clone)
### Technologies Used: 
Laravel, Vue, Inertia, Stripe Payment Gateway


### Description:
Developed a robust e-commerce platform inspired by Amazon's architecture, leveraging Laravel for backend functionality and Vue with Inertia for a seamless single-page application experience. Integrated Stripe for secure and efficient payment processing, ensuring smooth transactions and enhanced user security. Emphasized scalable design and responsive user interface to enhance user engagement and satisfaction.

## Installation
git clone https://github.com/SHShuvo/E-commerce.git

composer install 

cp .env.example .env 

php artisan cache:clear 

composer dump-autoload 

php artisan key:generate

composer require laravel/breeze --dev

php artisan breeze:install vue --inertia

### Setup Env File

Now go to https://stripe.com/ and create your account to get public and secret key.

Add STRIPE_PUBLIC_KEY and STRIPE_SECRET_KEY in your .env file.

Fill db credentials properly in your .env file.

Now migrate your DB and seed by php artisan migrate and php artisan db:seed

#### Connect Mailtrap

Add the mail details to .env

Now run this command to start the project

npm i & npm run dev

## You should be good to go!

### Landing Page
<img src="/public/readme/landingCapture.JPG" width="800">

### Category Page
<img src="/public/readme/category.JPG" width="800">

### Cart Page
<img src="/public/readme/88Capture.JPG" width="800">

### Checkout Page
<img src="/public/readme/Screenshot (7).png" width="800">

### Success Page
<img src="/public/readme/succCapture.JPG" width="800">

### Stripe Dashboard
<img src="/public/readme/Screenshot (8).png" width="800">

### Mailtrap Inbox
<img src="/public/readme/mailtrapCapture.JPG" width="800">



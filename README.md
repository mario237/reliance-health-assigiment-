
<!-- PROJECT HEADER -->
<br />
<div>
  <h3 style="text-align: center">Laravel 9 Transactions Manager App</h3>

  <p style="text-align: center">
    <a href="https://github.com/mario237/log-viewer.git">
      <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" alt="Laravel Logo" width="400">
    </a>
  </p>
</div>




<!-- ABOUT THE PROJECT -->
## 1. About The Project

This a Simple Laravel 9 App for Transactions



<!-- GETTING STARTED -->
## 2. Getting Started

This is an example of how you may be setting up your project locally.
To get a local copy up and running follow these simple example steps.

### Prerequisites

The following tools and services need to be installed on your development or production environment.
If these tools or services aren't installed yet, please follow the installation guides of the tools or services itself.

***Required***
* git [download](https://git-scm.com/downloads)
* composer 2+ [download](https://getcomposer.org/download/)



### Installation

1. Clone the repo
   ```sh
   git clone https://github.com/mario237/reliance-health-assiginment
   ```
2. Change to the working directory
   ```sh
   cd reliance-health-assiginment
   ```
3. Install Composer packages
   ```sh
   composer install
   ```
4. Copy the example environment variables
   ```sh
   cp .env.example .env
   ```
5. Serve Laravel Sail to dockerized an application 
(if you face and error in ports, stop nginx or apache and try again)
   ```sh
   ./vendor/bin/sail up -d
   ```

6. Generate the application key in `.env`
   ```sh
   ./vendor/bin/sail artisan key:generate
   ```
7. Open the app in browser
   ```sh
   url: http://laravel.test
   ```



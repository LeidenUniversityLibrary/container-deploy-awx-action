<!-- Improved compatibility of back to top link: See: https://github.com/othneildrew/Best-README-Template/pull/73 -->
<a name="readme-top"></a>

<!-- PROJECT SHIELDS -->
<!--
*** Using markdown "reference style" links for readability.
*** Reference links are enclosed in brackets [ ] instead of parentheses ( ).
*** See the bottom of this document for the declaration of the reference variables
*** for contributors-url, forks-url, etc. This is an optional, concise syntax you may use.
*** https://www.markdownguide.org/basic-syntax/#reference-style-links
-->
[![Contributors][contributors-shield]][contributors-url]
[![Forks][forks-shield]][forks-url]
[![Issues][issues-shield]][issues-url]
[![GPL-3.0][license-shield]][license-url]

<!-- PROJECT LOGO -->
<br />
<div align="center">
  <a href="https://github.com/LeidenUniversityLibrary/UBL-repository-template">
    <img src="README/ul_logo.png" alt="Leiden University Libraries logo" height="160">
  </a>

<h3 align="center">UBL Laravel Template</h3>

  <p align="center">
    A Laravel template that includes most of the stuff required to get a Laravel project going at the UB!
    <br />
    <a href="https://github.com/LeidenUniversityLibrary/UBL-repository-template"><strong>Explore the docs »</strong></a>
    <br />
    <br />
    <a href="https://github.com/LeidenUniversityLibrary/UBL-repository-template">View Demo</a>
    ·
    <a href="https://github.com/LeidenUniversityLibrary/UBL-repository-template/issues">Report Bug</a>
    ·
    <a href="https://github.com/LeidenUniversityLibrary/UBL-repository-template/issues">Request Feature</a>
  </p>
</div>

<!-- TABLE OF CONTENTS -->
<details>
  <summary>Table of Contents</summary>
  <ol>
    <li>
      <a href="#about-the-project">About The Project</a>
      <ul>
        <li><a href="#features">Features</a></li>
        <li><a href="#built-with">Built With</a></li>
      </ul>
    </li>
    <li>
      <a href="#getting-started">Getting Started</a>
      <ul>
        <li><a href="#prerequisites">Prerequisites</a></li>
        <li><a href="#installation">Installation</a></li>
      </ul>
    </li>
    <li><a href="#contact">Contact</a></li>
    <li><a href="#acknowledgments">Acknowledgments</a></li>
  </ol>
</details>

## About the project

The UBL Laravel Template repository is developed to include most of the usual requirements to create a new UBL web application. It includes SAML2 scaffolding, custom error pages, the Leiden University color scheme, and more.

<p align="right">(<a href="#readme-top">back to top</a>)</p>

### Features

* SAML2 integration, optimized for ULCN and for local development
* Custom error pages with the Leiden University logo
* Admin home page
* Log viewer for admins
* Microsoft Teams notifications
* Bootstrap 5
* Leiden University logos and color scheme
* MkDocs material template for technical documentation
* Pre-generated Issues, Feature Requests, TODO, and Pull Requests templates for GitHub

<p align="right">(<a href="#readme-top">back to top</a>)</p>

### Built with

* [![Laravel][Laravel.com]][Laravel-url]
* [![Bootstrap][Bootstrap.com]][Bootstrap-url]

<p align="right">(<a href="#readme-top">back to top</a>)</p>

## Getting started

### Prerequisites

This is an example of how to list things you need to use the software and how to install them.

* PHP ^8.1 - The version available on the Leiden University Libraries servers
* MySQL + a database
* [Composer](https://getcomposer.org/)
* Python 3.* - Required for MkDocs
* npm - for publishing the css, js, etc. To install on a semi-managed machine:

  ```sh
  npm install npm@latest -g
  ```

### Installation

1. Clone the repo

   ```sh
   git clone https://github.com/LeidenUniversityLibrary/UBL-repository-template.git
   ```

2. Install composer packages. In the cloned repository's folder:

    ```sh
    composer install
    ```

3. Copy the .env.example file to a .env. In the cloned repository's folder:

   ```sh
   cp .env.example .env
   ```

4. Generate and application key

   ```sh
   php artisan key:generate
   ```

5. Modify the `.env` file with your local details. Pay attention to the `DB_DATABASE=` field: it must match the one you generated on your machine. Insert your ulcn username in `SAML2_ULCN_USERNAME=` field.
6. `php artisan migrate:fresh --seed` to create tables and create a dummy admin for local environments. The admin name will be `SAML2_ULCN_USERNAME=`
7. `npm install && npm run dev` to generate the required resources (css, js, etc.)
8. `php artisan serve` to launch your application locally

<p align="right">(<a href="#readme-top">back to top</a>)</p>

## Contact

 [Leiden University Libraries - Digitale Diensten](mailto:beheer@library.leidenuniv.nl)
Project link: [https://github.com/LeidenUniversityLibrary/UBL-repository-template](https://github.com/LeidenUniversityLibrary/UBL-repository-template)

<p align="right">(<a href="#readme-top">back to top</a>)</p>

## Acknowledgments

* [Material for MkDocs](https://squidfunk.github.io/mkdocs-material/)
* [Best-README-Template](https://github.com/othneildrew/Best-README-Template)

<p align="right">(<a href="#readme-top">back to top</a>)</p>

## License

Distributed under the GNU General Public License v3.0 License. See `LICENSE` for more information.

<p align="right">(<a href="#readme-top">back to top</a>)</p>
<!-- MARKDOWN LINKS & IMAGES -->
<!-- https://www.markdownguide.org/basic-syntax/#reference-style-links -->

[contributors-shield]: https://img.shields.io/github/contributors/LeidenUniversityLibrary/UBL-repository-template.svg?style=for-the-badge

[contributors-url]: https://github.com/LeidenUniversityLibrary/UBL-repository-template/graphs/contributors

[forks-shield]: https://img.shields.io/github/forks/LeidenUniversityLibrary/UBL-repository-template.svg?style=for-the-badge

[forks-url]: https://github.com/LeidenUniversityLibrary/UBL-repository-template/network/members

[issues-shield]: https://img.shields.io/github/issues/LeidenUniversityLibrary/UBL-repository-template.svg?style=for-the-badge

[issues-url]: https://github.com/LeidenUniversityLibrary/UBL-repository-template/issues

[license-shield]: https://img.shields.io/github/license/LeidenUniversityLibrary/UBL-repository-template.svg?style=for-the-badge

[license-url]: https://github.com/LeidenUniversityLibrary/UBL-repository-template/blob/master/LICENSE.txt

[contributors-shield]: https://img.shields.io/github/contributors/LeidenUniversityLibrary/repo_name.svg?style=for-the-badge
[contributors-url]: https://github.com/LeidenUniversityLibrary/repo_name/graphs/contributors
[license-shield]: https://img.shields.io/github/license/LeidenUniversityLibrary/repo_name.svg?style=for-the-badge
[license-url]: https://github.com/LeidenUniversityLibrary/repo_name/blob/master/LICENSE.txt
[Laravel.com]: https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white

[Laravel-url]: https://laravel.com

[Bootstrap.com]: https://img.shields.io/badge/Bootstrap-563D7C?style=for-the-badge&logo=bootstrap&logoColor=white

[Bootstrap-url]: https://getbootstrap.com

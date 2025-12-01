# CPUBChurchV3

The third version of cpubchurch.com written in 2025.

This is a child theme for [understrap 1.2.4](https://github.com/understrap/understrap). It uses [understrap-child 1.2.0](https://github.com/understrap/understrap-child) as a base.

It uses the following plugins:

- [Simple Calendar](https://wordpress.org/plugins/google-calendar-events/)
- [Contact Form 7](https://wordpress.org/plugins/contact-form-7/)
- [Advanced Custom Fields](https://wordpress.org/plugins/advanced-custom-fields/)
- [Advanced Custom Fields: Image Aspect Ratio Crop](https://wordpress.org/plugins/acf-image-aspect-ratio-crop/)

## Getting Started

To run locally you need to have Docker and Node installed.

1. Create an `.env` file in the root with the following:

   ```
   WORDPRESS_DB_NAME=db_name
   WORDPRESS_DB_USER=username
   WORDPRESS_DB_PASSWORD=password
   ```

1. You can add a `dump.sql` file to the root of the project with a Wordpress database export and it will be imported on the first run of the Docker container.
1. Run `npm run docker:up` to create the Wordpress instance in Docker.
1. Run `npm run watch` to start the site in watch mode.
1. The first time you will need to setup Wordpress, if you didn't import a database, and activate this theme. It will prompt you to install the parent theme when you activate.
1. Modify the files inside the wp-content/themes/cpubchurchv3 folder.

## Deploying

1. Update style.css with a new version number, this will reflect in Wordpress as a new version.
1. Run the `Deployment Workflow` action in Github to deploy the new version.

# CPUBChurchV3

The third version of cpubchurch.com written in 2025.

This is a child theme for [understrap 1.1.0](https://github.com/understrap/understrap). It uses [understrap-child 1.1.0](https://github.com/understrap/understrap-child) as a base.

It uses the following plugins:

- [Simple Calendar](https://wordpress.org/plugins/google-calendar-events/)
- [Contact Form 7](https://wordpress.org/plugins/contact-form-7/)
- [Advanced Custom Fields](https://wordpress.org/plugins/advanced-custom-fields/)

## Getting Started

To run locally you need to have Docker and Node installed.

1. Run `npm run docker-up` to create the Wordpress instance in Docker.
1. Run `npm run watch-bs` to start the site in watch mode.
1. The first time you will need to setup Wordpress and activate this theme. It will prompt you to install the parent theme when you activate.
1. Modify the files inside the wp-content/themes/cpubchurchv3 folder.

## Deploying

The cpubchurchv3 folder in the root is the compiled version of the theme. To compile the theme:

1. Update style.css with a new version number, this will reflect in Wordpress as a new version.
1. Run `npm run dist-build`.
1. Use the WP-Pusher Wordpress plugin to register the github repository and point to the compiled folder.

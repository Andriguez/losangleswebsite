#!/bin/sh

# Replace the placeholder in the template with the actual PORT value
envsubst '${PORT}' < /etc/nginx/nginx.conf.template > /etc/nginx/nginx.conf

# Start Nginx
nginx -g 'daemon off;'
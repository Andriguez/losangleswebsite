# Use the official Nginx image as a base
FROM nginx:latest

# Remove the default nginx configuration
RUN rm /etc/nginx/conf.d/default.conf

# Copy your custom Nginx configuration file
COPY nginx.conf /etc/nginx/nginx.conf

# Copy static files into the Nginx container
COPY ./app/public /usr/share/nginx/html

# Expose port 80
EXPOSE 80

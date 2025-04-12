# Use the official Apache HTTP Server image from the Docker Hub
FROM httpd:2.4

# Copy custom configuration file to the image
COPY ./apache/httpd.conf /usr/local/apache2/conf/httpd.conf

# Expose port 80
EXPOSE 80

# Start the Apache server
CMD ["httpd-foreground"]

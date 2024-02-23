# Use the official Ubuntu image as the base image
FROM ubuntu:20.04

# Set environment variables to prevent interactive prompts during installation
ENV DEBIAN_FRONTEND=noninteractive

# Install Apache, MySQL, PHP, and PHPMyAdmin
RUN apt-get update && \
    apt-get install -y apache2 mysql-server php php-mysql phpmyadmin && \
    apt-get clean && \
    rm -rf /var/lib/apt/lists/*

# Configure PHPMyAdmin to allow access from any IP address
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf && \
    echo "Include /etc/phpmyadmin/apache.conf" >> /etc/apache2/apache2.conf

# Expose ports for Apache and MySQL
EXPOSE 80 3306

# Start Apache and MySQL services
CMD service mysql start && service apache2 start && tail -f /dev/null

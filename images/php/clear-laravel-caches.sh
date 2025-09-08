#!/bin/bash

echo "Clearing route cache..."
php artisan route:clear

echo "Clearing config cache..."
php artisan config:clear

echo "Clearing view cache..."
php artisan view:clear

echo "Clearing application cache..."
php artisan cache:clear

echo "✅ All Laravel caches cleared"

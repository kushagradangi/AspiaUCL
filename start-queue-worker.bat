@echo off
title Aspia UCL Queue Worker
color 0B
echo ============================================================
echo   Aspia UCL - Background Import & Queue Worker
echo ============================================================
echo   Listening for Excel imports and background jobs...
echo   Keep this window open (minimized) while using the application.
echo ============================================================
echo.
php -d max_execution_time=0 artisan queue:work --memory=512 --timeout=1800
pause


# Configuration
$SERVER_USER = "root"
$SERVER_IP = "139.180.133.67"
$PROJECT_PATH = "/var/www/jx-pay"

Write-Host "Starting deployment process..." -ForegroundColor Green

# SSH into server and execute commands
$sshCommand = "cd $PROJECT_PATH && git pull && sudo systemctl reload nginx"

try {
    # Execute SSH command
    ssh "$SERVER_USER@$SERVER_IP" $sshCommand
    
    Write-Host "Deployment completed successfully!" -ForegroundColor Green
}
catch {
    Write-Host "Deployment failed!" -ForegroundColor Red
    Write-Host $_.Exception.Message
    exit 1
} 
#!/bin/bash

# Configuration
SERVER_USER="root"
SERVER_IP="139.180.133.67"
PROJECT_PATH="/var/www/jx-pay"

# Colors for output
GREEN='\033[0;32m'
RED='\033[0;31m'
NC='\033[0m' # No Color

echo -e "${GREEN}Starting deployment process...${NC}"

# SSH into server and execute commands
ssh $SERVER_USER@$SERVER_IP << 'ENDSSH'
    echo -e "${GREEN}Connected to server${NC}"
    
    # Navigate to project directory
    cd $PROJECT_PATH
    
    # Pull latest changes
    echo -e "${GREEN}Pulling latest changes from git...${NC}"
    git pull
    
    # Reload Nginx
    echo -e "${GREEN}Reloading Nginx...${NC}"
    sudo systemctl reload nginx
    
    echo -e "${GREEN}Deployment completed successfully!${NC}"
ENDSSH

# Check if the SSH command was successful
if [ $? -eq 0 ]; then
    echo -e "${GREEN}Deployment completed successfully!${NC}"
else
    echo -e "${RED}Deployment failed!${NC}"
    exit 1
fi 
# Treinamento WSO2

 - https://wso2.com/api-management/install/docker-compose/get-started/

 - https://wso2.com/api-management/install/docker/get-started/

 - https://apim.docs.wso2.com/en/latest/install-and-setup/setup/setting-up-databases/overview/

 - https://apim.docs.wso2.com/en/latest/get-started/api-manager-quick-start-guide/


## Login 

    docker login docker.wso2.com

## Baixa Imagem

     docker run -it \
   -p 9443:9443 \
   -p 8243:8243 \
   -p 8280:8280 \
   docker.wso2.com/wso2am

## Links 

    Publisher - https://localhost:9443/publisher
    Store - https://localhost:9443/devportal
    Admin console - https://localhost:9443/admin
    Carbon console - https://localhost:9443/carbon

## Default credencials 

### Publisher 

    admin
    admin

# OAuth

    Environment	Sandbox
    Token Endpoint	https://localhost:9443/oauth2/token
    Revoke Endpoint	https://localhost:9443/oauth2/revoke

    Access_token : eyJ4NXQiOiJOMkpqTWpOaU0yRXhZalJrTnpaalptWTFZVEF4Tm1GbE5qZzRPV1UxWVdRMll6YzFObVk1TlEiLCJraWQiOiJNREpsTmpJeE4yRTFPR1psT0dWbU1HUXhPVEZsTXpCbU5tRmpaalEwWTJZd09HWTBOMkkwWXpFNFl6WmpOalJoWW1SbU1tUTBPRGRpTkRoak1HRXdNQV9SUzI1NiIsImFsZyI6IlJTMjU2In0.eyJzdWIiOiJhZG1pbiIsImF1dCI6IkFQUExJQ0FUSU9OIiwiYXVkIjoiY2tRNDhHOGRiaVp0MFQyS0hRYzVXSkF4R2lvYSIsIm5iZiI6MTY2NDE5NjE3NSwiYXpwIjoiY2tRNDhHOGRiaVp0MFQyS0hRYzVXSkF4R2lvYSIsInNjb3BlIjoiZGVmYXVsdCIsImlzcyI6Imh0dHBzOlwvXC9sb2NhbGhvc3Q6OTQ0M1wvb2F1dGgyXC90b2tlbiIsImV4cCI6MTY2NDE5OTc3NSwiaWF0IjoxNjY0MTk2MTc1LCJqdGkiOiJiY2JkYjgzZi1mYjUwLTRlZDEtYmRlZS1hODUyMjA1MzM5NjQifQ.gSsMw4SIPCF6_RHPMDLl05uXSPxC1uGoO5rA84-Ao_oiCQiYfV7frO0KQdlVgVCiiY7sqEe3iB806h1tIeY5lOzSfyH3WjBousveRzpkCfTrxA5j4dK4tWC05tJ71Nqzw8Xz2CJ62bBjE9oOIvKR4jvuz0vvaKEILia2fCAQqiGuKsUTDIto3Hri73M063CqlrQ_-p7LlvatFV2RvVZxZ95hG18pYzIiBPEucFyMAdM10hh1Hcxs1NC1_Y2PnJU8wc8S_oznYtxnKnwLk6gJ4OC0kFhKbHqxP-Cbqb4bSuWjJxwqCbnW8PLrpgNsVb6R-fHM9jWrbGtzZmT7csYWPA

    
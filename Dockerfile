#set the base image to create the image for  react app
FROM node:20-alpine

#Create a user with permissions to run the app
#-S -> create a system user
#-G   add the user to specify  group 
#This is done to avoid running the app as root
#If the app is run as root, any vulnerabilities in the app could be exploited to gain root access to the container
#It's a best practice to run applications as a non-root user
RUN addgroup app && adduser -S -G app app

#set the user to run the app
USER app 

#set the working directory to /app
WORKDIR /app

#Copy package.json and package-lock.json to the working directory
#This is done before copying the rest of the files to take advantage of Docker's caching
#If the package.json or package-lock.json files havn't changed, Docker will use the cached layer and dependencies
COPY package*.json ./

#sometimes the ownership of the copied files may not be correct and changed to root
#and thus the app may not have permission to access these files and throw errors -> EACCES : permission denied
#To avoid this, we can change the ownership of the copied files to the root user
USER root

#Change the ownership of the /app directory to the app user
#chown -R <user>:<group> <directory>
#chown command changes the user and/or group ownership of a file or directory given
RUN chown -R app:app  .

#install dependencies
RUN npm install

#Copy the rest of the application code to the working directory
COPY . . 

#Expose the port 5173 to tell Docker that this container will listen on this specific port at runtime
EXPOSE 5173

#command to run the app
CMD ["php", "artisan", "serve", "--host=0.0.0.0"]
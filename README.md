# docker-project
first of all you need to create an image. in order to do that upload the docker file, go to it's directory and in your terminal type <b>Docker build -t "nameOfImage:tag"</b> . pay attention to ".". it means the Dockerfile exists in the current directory.<br>
each repository contains a microservice. for instance a repository for nutritin container,a repository for login container, a repositry for food container and a repository for library container. each container has it's own css,jquery and php files.
in order to use containers you should run them seperatly.<br>
first of all we have to run mysql (mysql:5.7). then run the authentication service (makbn/cc-authentication-service:v2) and link it to the mysql which has been created earlier. at the end run other containers one by one. fortunately docker-compose do it for us automaticly. if you want to use it, you have to download otehr repositories, put it in a directory and paste the <i>docker-compose.yml</i> in the directory.<br>
now you have to open your terminal, go to the directory which contains login, nutrition, library and education and run <b>sudo docker-compose up</b>. now your containers are accessible.<br> if you want to see login page type localhost (127.0.0.1) in your browser.
other services are ready to use but because of authentication functions you have to sign in first and then go to the other pages , otherwise you are not able to use other services.

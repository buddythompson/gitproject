STEPS FOR REPOFINDER2000 Installation

1. install guzzle on your web server by executing the following command: 'composer require guzzlehttp/guzzle'
2. If mysql is not installed on your db server, execute the following command: 'mysql-ctl start'
3. if phpmyadmin is not installed  on your db server, execute the following command: 'phpmyadmin-ctl install'
4. open phpmyadmin, open a sql window and execute the sql in 'setup/repoDB.sql' to build the database
5. open 'server/dbconn.php' and change the $ip, $port and $user values to the correct values for your mysql instance 
6. open 'index.html' in your web browser and click the 'Refresh Repo Details to get your first download

voila!! REPOFINDER2000 is now initialized!

you can find a working copy of this project here: <a href='https://githubrepositoryproject-buddythompson.c9users.io/#'>https://githubrepositoryproject-buddythompson.c9users.io/#</a>


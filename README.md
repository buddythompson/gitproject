REPOFINDER2000 is a simple utility used to view the most popular PHP repositories on Github based on star count.

The following third party technologies are in use:
<ol>
<li>Guzzle - a php http client that I find easier to use and more intuitive than cURL<a href='http://docs.guzzle.org' target='_blank'>docs.guzzle.org</a></li>
<li>Bootstrap v3.3.7 - a front-end framework that allows for quick prototyping <a href='http://getbootstrap.com' target='_blank'>getbootstrap.com</a></li>
<li>Bootswatch - a Bootstrap compatible CSS <a href='http://bootswatch.com' target='_blank'>bootswatch.com</a> </li>
</li>DataTable.js - a jQuery  library for making HTML tables interactive - <a href='https://datatables.net' target='_blank'>datatables.net</a></li>
</ol>

<strong>STEPS FOR REPOFINDER2000 Installation</strong>

1. install guzzle on your web server by executing the following command: 'composer require guzzlehttp/guzzle'
2. If mysql is not installed on your db server, execute the following command: 'mysql-ctl start'
3. if phpmyadmin is not installed  on your db server, execute the following command: 'phpmyadmin-ctl install'
4. open phpmyadmin, open a sql window and execute the sql in 'setup/repoDB.sql' to build the database
5. open 'server/dbconn.php' and change the $ip, $port and $user values to the correct values for your mysql instance 
6. open 'index.html' in your web browser and click the 'Refresh Repo Details to get your first download

voila!! REPOFINDER2000 is now initialized!

you can find a working copy of this project here: <a href='https://githubrepositoryproject-buddythompson.c9users.io/#'>https://githubrepositoryproject-buddythompson.c9users.io/#</a>


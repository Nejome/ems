<?php
return <<<body



<h3>Welcome .. $user[name]</h3>

<p>$now</p>


<p>Now you have been registered to Garden City University Employee Management System , <br>
To login to the system please enter this information :- 
</p>


<li>Username : <b>$data[user_name]</b></li>
<li>Password : <b>$data[user_password]</b></li>

<p>It's recommended to change this password </p>

<p>Thanks ..</p>


body;
